{{--
<form action="/result" method="POST">
    @csrf
    <input name="title">
    <input name="slug">
    <input type="submit">
</form>

<form>
    <h1>{{ $title }}</h1>
    <h1>{{ $slug }}</h1>
</form>
--}}
<!-- Задание 1 194-->
{{--
<form action="/result" method="POST">
    @csrf
    <input placeholder="Имя пользователя" name="name">
    <input placeholder="Возраст пользователя" name="age">
    <input placeholder="Зарплата пользователя" name="salary">
    <input type="submit">
</form>

<form>
    <h1>{{ $name }}</h1>
    <h1>{{ $age }}</h1>
    <h1>{{ $salary }}</h1>
</form>
--}}
<!-- 195. Задание 1 -->
{{--
@if($city && $country)
    <p>Вы указали: город — <strong>{{ $city }}</strong>, страна — <strong>{{ $country }}</strong>.</p>
@endif

<form action="" method="POST">
    @csrf
    <label>
        Город:
        <input name="city" type="text" required>
    </label>
    <br><br>
    <label>
        Страна:
        <input name="country" type="text" required>
    </label>
    <br><br>
    <input type="submit" value="Отправить">
</form>
--}}
{{-- 196
<form action="/result" method="POST">
    @csrf
    <input name="title">
    <input name="slug">
    <input name="text">
    <input type="submit">
</form>

<ul>
    @foreach($data as $name => $value)
        <li>{{ $name }}: {{ $value }}</li>
    @endforeach
</ul>
--}}
{{-- 196
@if($data)
    <ul>
        @foreach ($data as $name => $value)
            <li>{{ $name }}: {{ $value }}</li>
        @endforeach
    </ul>
@endif

<form action="" method="POST">
    @csrf
    <input name="field1" placeholder="Поле 1">
    <input name="field2" placeholder="Поле 2">
    <input name="field3" placeholder="Поле 3">
    <input type="submit" value="Отправить">
</form>
--}}
{{-- 197
@if($data)
    <ul>
        @foreach ($data as $key => $value)
            <li>{{ $key }}: {{ $value }}</li>
        @endforeach
    </ul>
@endif


<form action="" method="POST">
    @csrf
    <input name="name" placeholder="Имя">
    <input name="surname" placeholder="Фамилия">
    <input name="email" placeholder="Email">
    <input name="login" placeholder="Логин">
    <input name="password" type="password" placeholder="Пароль">
    <input type="submit" value="Отправить">
</form>
--}}
{{-- 198
@if($data)
    <ul>
        @foreach ($data as $key => $value)
            <li>{{ $key }}: {{ $value }}</li>
        @endforeach
    </ul>
@endif


<form action="" method="POST">
    @csrf
    <input name="name" placeholder="Имя">
    <input name="surname" placeholder="Фамилия">
    <input name="email" placeholder="Email">
    <input name="login" placeholder="Логин">
    <input name="password" type="password" placeholder="Пароль">
    <input type="submit" value="Отправить">
</form>
--}}
<!-- Сложные имена полей в формах в Laravel -->
{{--
<form action="">
    <input type="text" name="user[name]">
    <input type="text" name="user[surname]">
    <input type="submit">
</form>
--}}
<!-- Сложные имена полей в формах в Laravel -->
{{--
<form action="">
    <input type="text" name="user[name]">
    <input type="text" name="user[surname]">
    <input type="text" name="user[email]">
    <input type="submit">
</form>
<p>{{ $name }}</p>
<p>{{ $surname }}</p>
<p>{{ $email }}</p>
--}}
<!-- 200 Внедрение зависимости и параметры маршрута в Laravel -->
{{--
<form action="/user/{id}/{login}" method="POST">
    @csrf
    <input name="name" placeholder="Имя">
    <input name="email" placeholder="Email">
    <input type="submit" value="Отправить">
</form>
--}}
<!-- 201 Сохранение данных формы в БД в Laravel -->
{{--
<form action="/post" method="POST">
    @csrf
    <input name="title">
    <input name="slug">
    <textarea name="text"></textarea>
    <input type="submit">
</form>
--}}
<form action="" method="POST">
    @csrf
    <input name="name" placeholder="Имя">
    <input name="email" placeholder="Email">
    <input name="login" placeholder="Логин">
    <input type="submit" value="Сохранить">
</form>

