<!-- resources/views/top.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .container {
            display: flex;
            height: 100vh;
        }
        .left-side {
            flex: 1;
            background-image: url(''{{ asset('images/todo.png') }}'');
            background-size: cover;
            background-position: center;
        }
        .right-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            font-size: 16px;
            color: #fff;
            background-color: #f043df;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #070407;
        }

        .loginimg {
            height: 500px;
            padding-top: 130px;
            padding-left: 50px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img class="loginimg" src="{{ asset('images/Project2.png') }}" alt="">
        </div>
        <div class="right-side">
            {{-- <img class="logo" src="{{ asset{{ 'image/todologo.png' }} }}"> --}}
            <a href="{{ route('login') }}" class="button">Login</a>
            <a href="{{ route('register') }}" class="button">Register</a>
        </div>
    </div>
</body>
</html>
