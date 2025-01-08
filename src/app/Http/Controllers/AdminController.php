<?php

namespace App\Http\Controllers;

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
        // 検索条件を取得
        $name = $request->input('name');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $category_id = $request->input('category_id');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        // クエリビルダを使用した検索条件の動的生成
        $query = Contact::query();

        if ($name) {
            $query->where(function ($q) use ($name) {
                $q->where('first_name', 'like', "%$name%")
                    ->orWhere('last_name', 'like', "%$name%");
            });
        }

        if ($email) {
            $query->where('email', 'like', "%$email%");
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

        // ページネーション（1ページあたり7件表示）
        $contacts = $query->paginate(7);

        // カテゴリーデータを取得（検索フォーム用）
        $categories = Category::all();

        // 管理画面ビューにデータを渡す
        return view('admin.index', compact('contacts', 'categories', 'name', 'email', 'gender', 'category_id', 'date_from', 'date_to'));
    }
}
