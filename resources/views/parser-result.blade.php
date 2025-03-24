<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/constructor.css')}}">

    <title>Результат парсера</title>
</head>
<body>
    <form class="constructor" action="/constructor" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="image" type="file" name="image" accept="image/jpeg" required>
        <input class="content" name="name" required>
        <input class="content" name="type" required>
        <input class="content" name="episodes" required>
        <input class="content" name="time" required>
        <button></button>
    </form>

</body>
</html>
