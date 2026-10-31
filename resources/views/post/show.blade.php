<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Получение данных</title>
</head>
<body>
<!-- 122. Получение одной строки -->
<div>
    <h2>{{ $post->title }}</h2>
    <h2>{{ $post->id }}</h2>
    <div>
        {{ $post->text }}
    </div>
</div>
<!-- Работа с коллекцией -->
{{--
    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <h2>{{ $post->id }}</h2>
            <div>
                {{ $post->text }}
            </div>
        </div>
    @endforeach
    --}}
</body>
</html>
