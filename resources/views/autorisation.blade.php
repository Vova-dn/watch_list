<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="{{asset('css/authorisation.css')}}">
    <script src="/JS/autorize.js"></script>
</head>
<body>
<div class="autorise">

    <div class="sign_in" id="si">
        <form class="sign_in" action="{{route('kisinka')}}" method="POST">@csrf
            <h1 class="sign_in">Введіть нікнейм або пошту:</h1>
            <input class="field" id="email" name="email">
            <h1 class="sign_in">Введіть пароль:</h1>
            <input class="field" id="password" name="password">
            <button class="sign_in">Вход</button>
        </form>
        <hr class="line">
        <button class="registration" id="reg">Регистрация</button>
    </div>

    <div class="registration" id="sii">
        <form class="registration" action="{{route('autoriz')}}" method="POST">@csrf
            <h1 class="sign_in">Введіть нікнейм:</h1>
            <input class="field" name="name" required>
            <h1 class="sign_in">Введіть пароль:</h1>
            <input class="field" name="password" required>
            <h1 class="sign_in">Введіть пoшту:</h1>
            <input class="field" type="email" id="email" name="email" required>
            <button class="registration">Зарегестрироваться</button>
        </form>
        <hr class="line">
        <button class="registration" id="prev"><<<-Назад</button>
    </div>

</div>
</body>
