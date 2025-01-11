<?php

namespace App\Http\Controllers;
// cSpell:ignore nameemail
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * 管理画面のトップページ表示
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // フォームから送られた検索条件を取得します。
        $nameemail = $request->input('nameemail'); // 名前やメールアドレス
        $gender = $request->input('gender'); // 性別
        $category_id = $request->input('category_id'); // お問い合わせの種類
        $date_from = $request->input('date_from'); // 検索開始日
        $date_to = $request->input('date_to'); // 検索終了日

        // データベースから情報を検索する準備をします。
        $query = Contact::query();

        // 名前やメールアドレスが入力されている場合
        if ($nameemail) {
            $query->where(function ($q) use ($nameemail) {
                $q->where('first_name', 'like', "%$nameemail%")
                    ->orWhere('last_name', 'like', "%$nameemail%")
                    ->orWhere('email', 'like', "%$nameemail%");
            });
        }

        // 性別の検索条件が選ばれている場合
        if ($gender) {
            // 性別が選択された値と一致するデータを探します。
            $query->where('gender', $gender);
        }

        // お問い合わせの種類が選ばれている場合
        if ($category_id) {
            // お問い合わせの種類が選択された値と一致するデータを探します。
            $query->where('category_id', $category_id);
        }

        // 検索開始日が入力されている場合
        if ($date_from) {
            // 作成日が検索開始日以降のデータを探します。
            $query->whereDate('created_at', '>=', $date_from);
        }

        // 検索終了日が入力されている場合
        if ($date_to) {
            // 作成日が検索終了日以前のデータを探します。
            $query->whereDate('created_at', '<=', $date_to);
        }

        // 検索条件に合ったデータを1ページに7件ずつ取得します。
        $contacts = $query->paginate(7);

        // お問い合わせ種類（カテゴリ）の一覧を取得します（検索フォームで使うため）。
        $categories = Category::all();

        // 検索結果やフォームに入力された条件をビュー（HTML画面）に渡します。
        return view('admin.index', compact('contacts', 'categories', 'nameemail', 'gender', 'category_id', 'date_from', 'date_to'));
    }

    public function export(Request $request)
    {
        // 検索条件を取得
        $nameemail = $request->input('nameemail');
        $gender = $request->input('gender');
        $category_id = $request->input('category_id');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        // データベースのクエリを構築
        $query = Contact::query();

        if ($nameemail) {
            $query->where(function ($q) use ($nameemail) {
                $q->where('first_name', 'like', "%$nameemail%")
                    ->orWhere('last_name', 'like', "%$nameemail%")
                    ->orWhere('email', 'like', "%$nameemail%");
            });
        }

        if ($gender) {
            $query->where('gender', $gender);
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if ($date_from) {
            $query->whereDate('created_at', '>=', $date_from);
        }

        if ($date_to) {
            $query->whereDate('created_at', '<=', $date_to);
        }

        // データを取得
        $contacts = $query->get();

        // CSVデータの作成
        $csvData = [];
        $csvData[] = ['お名前', '性別', 'メールアドレス', 'お問い合わせ種類', '作成日'];

        foreach ($contacts as $contact) {
            $csvData[] = [
                $contact->first_name . ' ' . $contact->last_name,
                $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                $contact->email,
                $contact->category->content,
                $contact->created_at->format('Y-m-d H:i:s'),
            ];
        }

        // CSVファイルを作成して返却（Shift-JISエンコーディングに変換）
        $fileName = 'contacts_export_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv; charset=Shift-JIS',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $callback = function () use ($csvData) {
            $handle = fopen('php://output', 'w');
            // PHPでShift-JISに変換して出力
            foreach ($csvData as $row) {
                mb_convert_variables('SJIS-win', 'UTF-8', $row); // UTF-8からShift-JISに変換
                fputcsv($handle, $row);
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(['message' => '削除が完了しました']);
    }
}
