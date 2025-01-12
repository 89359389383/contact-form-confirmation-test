<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ完了</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
            background: white;
            position: relative;
            overflow: hidden;
        }

        .background-text {
            position: absolute;
            font-size: 180px;
            color: rgba(0, 0, 0, 0.03);
            white-space: nowrap;
            user-select: none;
            pointer-events: none;
            z-index: -1;
            width: 100%;
            text-align: center;
            top: 50%;
            transform: translateY(-50%);
        }

        .content {
            text-align: center;
            z-index: 1;
        }

        h1 {
            font-size: 24px;
            color: #4a4a4a;
            margin-bottom: 30px;
            font-weight: normal;
        }

        .home-button {
            display: inline-block;
            padding: 10px 40px;
            background-color: #8b7355;
            color: white;
            text-decoration: none;
            font-size: 14px;
            border-radius: 2px;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #6d5b43;
        }
    </style>
</head>

<body>
    <div class="background-text">Thank you</div>
    <div class="content">
        <h1>お問い合わせありがとうございました</h1>
        <a href="/" class="home-button">HOME</a>
    </div>
</body>

</html>