<!-- 202 Введение в валидацию форм в Laravel -->
<!--
№1. Валидация нужна для проверки данных перед их сохранением в базу, чтобы не допускать попадания туда пустых, некорректных или опасных значений.
№2.
Пустое поле имени.
Email без символа «@».
Слишком короткий пароль (например, «12»).
№3. Пользователя вернет на страницу с формой, где рядом с полями будут выведены понятные сообщения о том, какие именно данные нужно исправить.
-->
<!-- 203 Форма для проверки в Laravel
     204 Метод validate в Laravel
     205 Успешная проверка формы в Laravel
     206 Ошибка проверки формы в Laravel
     207 Первая ошибка поля в Laravel -->
{{--
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('title') }}
        <br><input name="title" value="{{ old('title')}}" readonly>
    </div>
    <div>
        {{ $errors->first('email') }}
        <br><input name="email" value="{{ old("email") }}">
    </div>
    <input type="submit">
</form>

<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('title') }}
        <br><input name="title" value="{{ old('title')}}" readonly>
    </div>
    <div>
        {{ $errors->first('email') }}
        <br><input name="email" value="{{ old("email") }}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 208 Директива @error в Laravel
<form action="" method="POST">
    @csrf
    <div>
        @error('title')
        <span>{{ $message }}</span>
        @enderror
        <br><input name="title" value="{{ old('title')}}" readonly>
    </div>
    <div>
        @error('email')
        <div>{{ $message }}</div>
        @enderror
        <br><input name="email" value="{{ old("email") }}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 209 Несколько правил для одного поля в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('title') }}
        <br><input name="title" value="{{ old('title')}}">
    </div>
    <div>
        {{ $errors->first('email') }}
        <br><input name="email" value="{{ old("email") }}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 210 Тип значения при валидации в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('title') }}
        <br><input name="title" value="{{ old('title')}}">
    </div>
    <div>
        {{ $errors->first('age') }}
        <br><input name="age" value="{{ old("age") }}">
    </div>
    <div>
        {{ $errors->first('price') }}
        <br><input name="price" value="{{ old("price") }}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 211 Тип значения при валидации в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('title') }}
        <br><input name="title" value="{{ old('title')}}">
    </div>
    <div>
        {{ $errors->first('password') }}
        <br><input name="password" value="{{ old("password ") }}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 212 Диапазон при валидации в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('age') }}
        <br><input name="age" value="{{ old('age')}}">
    </div>
    <div>
        {{ $errors->first('price') }}
        <br><input name="price" value="{{ old("price") }}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 213 Точный размер при валидации в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('code') }}
        <br><input name="code" value="{{ old('code')}}">
    </div>
    <div>
        {{ $errors->first('pin') }}
        <br><input name="pin" value="{{ old("pin")}}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 214 Буквы при валидации в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('name') }}
        <br><input name="name" value="{{ old('name')}}">
    </div>
    <div>
        {{ $errors->first('login') }}
        <br><input name="login" value="{{ old("login")}}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 215 Цифры при валидации в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('year') }}
        <br><input name="year" value="{{ old('year')}}">
    </div>
    <div>
        {{ $errors->first('sms_code') }}
        <br><input name="sms_code" value="{{ old("sms_code")}}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 216 Валидация URL в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('website') }}
        <br><input name="website" value="{{ old('website')}}">
    </div>
    <div>
        {{ $errors->first('slug') }}
        <br><input name="slug" value="{{ old("slug")}}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 217 Обязательность полей формы в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('name') }}
        <br><input name="name" value="{{ old('name')}}">
    </div>
    <div>
        {{ $errors->first('note') }}
        <br><input name="note" value="{{ old("note")}}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 218 Дата при валидации в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('birthday') }}
        <br><input name="birthday" value="{{ old('birthday')}}">
    </div>
    <div>
        {{ $errors->first('deadline') }}
        <br><input name="deadline" value="{{ old("deadline")}}">
    </div>
    <div>
        {{ $errors->first('start_at') }}
        <br><input name="start_at" value="{{ old("start_at")}}">
    </div>
    <div>
        {{ $errors->first('end_at') }}
        <br><input name="end_at" value="{{ old("end_at")}}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 219 Список значений при валидации в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('status') }}
        <br><input name="status" value="{{ old('status') }}">
    </div>
    <div>
        {{ $errors->first('role') }}
        <br><input name="role" value="{{ old('role') }}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 220 Чекбокс при валидации в Laravel
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('terms') }}
        <br><input name="terms" value="{{ old('terms')}}">
    </div>
    <div>
        {{ $errors->first('is_active') }}
        <br><input name="is_active" value="{{ old('is_active') }}">
    </div>
    <input type="submit">
</form>
--}}
{{-- 221 Пароль при валидации в Laravel --}}
<form action="" method="POST">
    @csrf
    <div>
        {{ $errors->first('password') }}
        <br><input name="password" value="{{ old('password')}}">
    </div>
    <div>
        {{ $errors->first('is_active') }}
        <br><input name="is_active" value="{{ old('is_active') }}">
    </div>
    <input type="submit">
</form>
