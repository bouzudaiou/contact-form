<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }
        .welcome-box {
            background-color: #f0f8ff;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        h1 {
            color: #2196F3;
        }
        .user-info {
            margin: 20px 0;
            font-size: 18px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .logout-button {
            background-color: #f44336;
            color: white;
            border: none;
        }
        .logout-button:hover {
            background-color: #da190b;
        }
        .link-button {
            background-color: #4CAF50;
            color: white;
        }
        .link-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="welcome-box">
        <h1>ログインに成功しました！</h1>
        <div class="user-info">
            ようこそ、<strong>{{ Auth::user()->name }}</strong> さん
        </div>
        <p>メールアドレス: {{ Auth::user()->email }}</p>
    </div>

    <div>
        <a href="/contacts" class="button link-button">お問い合わせ一覧へ</a>
    </div>

    <div style="margin-top: 20px;">
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="button logout-button">ログアウト</button>
        </form>
    </div>
</body>
</html>