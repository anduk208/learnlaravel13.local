<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Введение в Blade</title>
</head>
<body>
<p>

    <p>Параграф</p>
    <ul>
        @foreach($users as $user)
            <li>{{ $user }}</li>
        @endforeach
    </ul>
    <!-- 48. Вывод переменных в тегах Blade -->
    <p>{{ $var1 }}</p>
    <p>{{ $var2 }}</p>
    <p>{{ $var3 }}</p>
    <!-- 49. Вывод переменных в атрибуты -->
    <p class="{{ $cls }}"></p>
    <input value="{{ $val }}">
    <!-- 50. Выполнение произвольного кода в командах Blade -->
    <p>current timestamp: {{ time() }}</p>
    <p>today: {{ date('d.m.Y') }}</p>
    <p>full name: {{ $first . ' ' . $last }}</p>
    <p>length: {{ strlen($first) }}</p>
    <!-- 51. Арифметические операции в Blade в Laravel -->
    <p>sum: {{ $a + $b }}</p>
    <p>diff: {{ $a - $b }}</p>
    <p>product: {{ $a * $b }}</p>
    <p>quotient: {{ $a / $b }}</p>
    <p>power: {{ $a ** $b }}</p>
    <!-- 52. Работа с массивами в Blade -->
    <p>first element: {{ $arr[0] }}</p>
    <p>second element: {{ $arr[1] }}</p>
    <p>summa element: {{ $arr[0] + $arr[1] + $arr[2] + $arr[5] }}</p>
    <p>quantity element: {{ count($arr) }}</p>
    <!-- 53. Проверка переменных в Blade -->
    <p>{{ $var ? 'eee' : 'bbb' }}</p>
    <p>{{ $var ?? 'eee' }}</p>
    <p>{{ $var ?? date('Y') }}</p>
    <!-- 54. Вывод неэкраннированных данных в Blade -->
    <p>Hello, {!! $name !!}</p>
    <!-- 55. Комментарии в Blade -->
    <p>{{-- Комментарий --}}</p>
    <!-- 56. Условия в Blade в Laravel -->
    <p>@if(!$isAuth)
           Вы авторизированы
        @endif
        @if(!$isAuth)
            Вы не авторизированы
        @endif
    </p>
    <!-- 57. Директива @ else в Blade -->
    <p>@if($isAuth)
            Вы авторизированы
        @else
            Вы не авторизированы
        @endif
    </p>
    <!-- 58. Директива @ elseif в Blade -->
    <p>
        @if ($num > 0)
            больше нуля
        @elseif ($num === 0)
            равняется нулю
        @else
            меньше нуля
            @endif
    </p>
    <!-- 59. Директива @ unless - является отрицанием -->
    <p>
        @unless($Auth)
            вы пока не авторизованы
        @endunless
    </p>
    <!-- 60. Сложные команды в условиях Blade -->
    @if(count($arr1) >= 1)
        в массиве есть записи
    @else
        в массиве нет записи
    @endif
    <!-- 61. Директива @ foreach -->
    <p>
        @foreach ($arr2 as $elem)
            {{ $elem }}
            @endforeach
    </p>
    <p>
        @foreach ($arr2 as $elem)
            <b>{{ $elem }}</b>
        @endforeach
    </p>
    <p>
        @foreach ($arr2 as $elem)
            <li>{{ $elem }}</li>
        @endforeach
    </p>
    <!-- 62. Ключи массива в цикле foreach -->
    <p>
        @foreach ($arr2 as $key => $elem)
            {{ $key + 1 }} {{ $elem }}
        @endforeach
    </p>
    <!-- 63. Условия и цикла @ foreach в Blade -->
    <!-- положительные элементы массива -->
    <ul>
        @foreach($arr3 as $elem)
            @if ($elem > 0)
            <li>{{ $elem }}</li>
            @endif
        @endforeach
    </ul>
    <!-- выводи, если кол-во элементов в массиве больше нуля -->
    @if (count($arr3) > 0)
        <ul>
            @foreach($arr3 as $elem)
                <li>{{ $elem }}</li>
            @endforeach
        </ul>
    @endif
    <!-- 64. Вложенные циклы @ foreach в Blade -->
    <!-- вывод элементов массива через вложенные директивы foreach -->
    <p>
        @foreach($arr4 as $subArr)
            @foreach($subArr as $elem)
                {{ $elem }}
            @endforeach
        @endforeach
    </p>
    <ul>
        @foreach($arr4 as $subArr)
            <li>
                <ul>
                    @foreach($subArr as $elem)
                        <li>{{ $elem }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
    <!-- 65. Перебор многомерных массивов -->
    @foreach($users1 as $user)
        <li>{{ $user['name'] }} {{ $user['age'] }}</li>
    @endforeach
    <!-- 66. Цикл @ forelse в Blade-->
    @forelse ($arr5 as $elem)
        <p>{{ $elem }}</p>
    @empty
        <p>массив пустой</p>
    @endforelse
    <!-- 67. Переменная $loop в Blade -->
    @foreach($arr5 as $elem)
        @if($loop->first)
            первая интерация
        @endif

        @if ($loop->last)
            последняя интерация
        @endif

        {{ $elem }}
    @endforeach
    <!-- четность итерации цикла-->
    <br>
    @foreach($arr5 as $elem)
        @if($loop->odd)
            нечетная итерация
        @endif

        @if ($loop->even)
            четная итерация
        @endif
    @endforeach
    <!-- итерации (узнать индекс текущий итерации -->
    <!-- идекс текущий итерации -->
    <br>
    @foreach($arr5 as $elem)
        {{ $loop->index }}
        {{ $elem }}
    @endforeach
    <!-- номер текущий итерации -->
    <br>
    @foreach($arr5 as $elem)
        {{ $loop->iteration }}
        {{ $elem }}
    @endforeach
    <!-- сколько итерации осталось -->
    <br>
    @foreach($arr5 as $elem)
        {{ $loop->remaining }}
        {{ $elem }}
    @endforeach
    <!-- количество элементов -->
    @foreach($arr5 as $elem)
        {{ $loop->count }}
        {{ $elem }}
    @endforeach
    <!-- 68. Директива @ break в Blade -->
    <br>
    @foreach($arr6 as $elem)
        {{ $elem }}
        @if ($elem == 3)
            @break
        @endif
    @endforeach
    <!-- включение условия в строку объявления директивы -->
    <br>
    @foreach($arr6 as $elem)
        {{ $elem }}
        @break($elem == 3)
    @endforeach
    <!-- 69. Директива @ cotinue в Blade -->
    <br>
    <!-- переход к следующей итерации цикла при помощи continue -->
    @foreach($arr6 as $elem)
        @if($elem == 3)
            @continue
        @endif

        {{ $elem }}
    @endforeach
    <!-- включение условия в строку объявления директивы -->
    <br>
    @foreach($arr6 as $elem)
        @continue($elem == 3)
            {{ $elem }}
    @endforeach
    <!-- 70. Цикл for в Blade -->
    <!-- счетчик от 0 до 9-->
    @for ($i = 0; $i < 10; $i++)
        counter: {{ $i }}
    @endfor
    <!-- вывод для разметки списка-->
    <ul>
        @for ($i = 1; $i <= 5; $i++)
            <li>элемент {{ $i }}</li>
        @endfor
    </ul>
    @for($i = 1; $i <= $count; $i++)
        <p>шаг {{ $i }}</p>
    @endfor
    <!-- 71. Блок PHP кода в Blude -->
    @php
        echo 123;
    @endphp
    <!-- Задачки от 48 до 72 -->

    <!-- 48 -->
    <p>{{ $name1 }}</p>
    <p>{{ $age }}</p>
    <p>{{ $salary }}</p>

    <!-- 49 -->
    <!-- Задание 1 -->
    <p class="{{ $cls1 }}">текст</p>
    <!-- Задание 2 -->
    <input value="{{ $val11 }}">
    <input value="{{ $val22 }}">
    <input value="{{ $val33 }}">
    <!-- Задание 3 -->
    <p style="{{ $style }}">Текст</p>
    <!-- Задание 4 -->
    <a href="{{ $href }}">{{ $text }}</a>

    <!-- 50 Задание 2-->
    <p>{{ strtoupper($name) }}</p>
    <p>{{ strlen($name) }}</p>

    <!-- 51 -->
    <!-- Задание 1 -->
    <p>sum: {{ $c + $d }}</p>
    <p>diff: {{ $c - $d }}</p>
    <!-- Задание 2 -->
    <p>diff: {{ $price - $discount }}</p>
    <!-- Задание 3 -->
    <p>power: {{ $c ** $d }}</p>

    <!-- 52 -->
    <!-- Задание 1 -->
    <p>{{ $employee['name'] }}</p>
    <p>{{ $employee['age'] }}</p>
    <p>{{ $employee['salary'] }}</p>
    <!-- Задание 2 -->
    <p>{{ count($arr7) }}</p>

    <!-- 53 -->
    <!-- Задание 1 -->
    <p>{{ $city ?? 'Moscow' }}</p>
    <!-- Задание 2 -->
    <p>{{ $location['country'] ?? 'Russia' }}</p>
    <p>{{ $location['city'] ?? 'Moscow' }}</p>
    <!-- Задание 3 -->
    <p>{{ $year ?? date('Y') }}</p>
    <p>{{ $month ?? date('m') }}</p>
    <p>{{ $day ?? date('d') }}</p>

    <!-- 54 -->
    <!-- Задание 1 -->
    <p>string: {!! $str !!}</p>

    <!-- 55 -->
    <p>string: {{-- $str --}}</p>

    <!-- 56 -->
    @if ($age1 > 18)
        Показываю текст кому есть 18
    @endif

    <!-- 57 -->
    <br>
    @if ($age1 > 18)
        Тебе точно есть 18
    @else
        Извини, но тебе нет 18(
    @endif

    <!-- 58 -->
    <br>
    @if ($age2 > 18)
        Ты старше 18 лет
    @elseif ($age2 === 18)
        Тебе сейчас 18 лет
    @else
        Ты младшее 18 лет
    @endif

    <!-- 59 -->
    <br>
    @unless ($age3 > 18)
        Ты ещё подросток
    @endunless

    <!-- 60 -->
    <br>
    @if (count($arr9) > 0)
        {{ array_sum($arr9) }}
    @else
        У вашего массива меньше нуля
    @endif

    <!-- 61 -->
    <!-- Задание 1 -->
    <ul>
        @foreach($arr10 as $elem)
            <li>{{ $elem }}</li>
        @endforeach
    </ul>
    <!-- Задание 2 -->
    <ul>
        @foreach($arr10 as $elem)
            <li>{{ $elem * $elem }}</li>
        @endforeach
    </ul>
    <!-- Задание 3 -->
    <ul>
        @foreach($arr10 as $elem)
            <li>{{ sqrt($elem)}}</li>
        @endforeach
    </ul>

    <!-- 62 -->
    <!-- Задание 1 -->
    <ul>
        @foreach($arr11 as $key => $elem)
            {{ $key }} {{ $elem }}
        @endforeach
    </ul>
    <!-- Задание 2 -->
    <ul>
        @foreach($arr11 as $key => $elem)
            {{ $key + 1 }} {{ $elem }}
        @endforeach
    </ul>

    <!-- 63 -->
    <!-- Задание 1 -->
    <ul>
        @foreach($arr12 as $elem)
            @if($elem % 2 == 0)
                {{ $elem }}
            @endif
        @endforeach
    </ul>
    <!-- Задание 2 -->
    @if(is_array($data))
        <ul>
            @foreach ($data as $elem)
                <li>{{ $elem }}</li>
            @endforeach
        </ul>
        @else
            <p>{{ $data }}</p>
    @endif

    <!-- 64 -->
    <table>
        @foreach($arr13 as $subArr)
            <tr>
                @foreach($subArr as $elem)
                    {{ $elem }}
                @endforeach
            </tr>
        @endforeach
    </table>

    <!-- 65 -->
    <!-- Задача 1 -->
    <ul>
        @foreach ($employees as $employee)
            <li>{{ $employee['name'] }} {{ $employee['surname'] }} {{ $employee['salary'] }}</li>
        @endforeach
    </ul>
    <!-- Задача 2 -->
    <table>
        @foreach ($employees as $employee)
            <tr>{{ $employee['name'] }}  {{ $employee['surname'] }}  {{ $employee['salary'] }} <br></tr>
        @endforeach
    </table>

    <!-- 66 -->
    @forelse ($users as $user)
        <p>{{ $user }}</p>
    @empty
        <p>Список пользователей пуст</p>
    @endforelse

    <!-- 67 -->
    <!-- Задание 1 -->
    <br>
    <ul>
        @foreach ($arr as $elem)
            <li>{{ $loop->index }}</li>
            <li>{{ $elem }}</li>
        @endforeach
    </ul>
    <!-- Задание 2 -->
    <br>
    <ul>
        @foreach ($arr as $elem)
            <li>{{ $loop->iteration }}</li>
            <li>{{ $elem }}</li>
        @endforeach
    </ul>
    <!-- Задание 3 -->
    <br>
    <ul>
        @foreach ($arr as $elem)
            <li class="first">{{ $loop->iteration }}</li>
            <li class="last">{{ $elem }}</li>
        @endforeach
    </ul>
    <!-- Задание 4 -->
    <br>
    @foreach ($arr as $elem)
        @if ($loop->remaining < 3)
            <i>{{ $elem }}</i>
        @else
            <b>{{ $elem }}</b>
        @endif
    @endforeach

    <!-- 68 -->
    <br>
    @foreach($arr16 as $elem)
        {{ $elem }}
        @break($elem == 0)
    @endforeach

    <!-- 69 -->
    <br>
    <ul>
    @foreach ($arr17 as $elem)
        @if ($elem == 0)
            @continue
        @endif
        <li>{{ $elem }}</li>
    @endforeach
    </ul>

    <!-- 70 -->
    <!-- Задание 1 -->
    @for ($i = 1; $i < 11; $i++)
        <p>{{ $i }}</p>
    @endfor
    <!-- Задание 2 -->
    <br>
    @for ($i = 1; $i <= 5; $i++)
        <p>{{ $i * $i}}</p>
    @endfor
    <!-- Задание 3 -->
    <br>
    @for ($i = 1; $i <= $count1; $i++)
        <p>step {{ $i }}</p>
    @endfor

    <!-- 71 -->
    <!-- Задание 1 -->
    @php
        $sum = $a1 + $b1;
        echo $sum
    @endphp
    <!-- Задание 2 -->
    @php
        $today = date('d.m.Y');
    @endphp
    {{ $today }}

    <!-- 72 -->
    <!-- Задание 1 -->
    <br>
    @foreach($links as $link)
        <a href="http://{{ $link['href'] }}">{{ $link['text'] }}</a>
    @endforeach
    <!-- Задание 2 -->
    <ul>
    @foreach($links as $link)
        <li><a href="http://{{ $link['href'] }}">{{ $link['text'] }}</a></li>
    @endforeach
    </ul>
    <!-- Задание 3 -->
    <table>
        @foreach($employees1 as $emp)
            <tr>
                <td>{{ $emp['name'] }}</td>
                <td>{{ $emp['surn'] }}</td>
                <td>{{ $emp['salary'] }}</td>
            </tr>
        @endforeach
    </table>
    <!-- Задание 4 -->
    <table>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Salary</th>
        </tr>
        @foreach($employees1 as $emp)
            <tr>
                <td>{{ $emp['name'] }}</td>
                <td>{{ $emp['surn'] }}</td>
                <td>{{ $emp['salary'] }}</td>
            </tr>
        @endforeach
    </table>
    <!-- Задание 5 -->
    <table>
        <tr>
            <td>#</td>
            <th>Name</th>
            <th>Surname</th>
            <th>Salary</th>
        </tr>
        @foreach($employees1 as $emp)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $emp['name'] }}</td>
                <td>{{ $emp['surn'] }}</td>
                <td>{{ $emp['salary'] }}</td>
            </tr>
        @endforeach
    </table>
    <!-- Задание 6 -->
    <table>
        @foreach($employees1 as $emp)
            @if($emp['salary'] > 2000)
                <tr>
                    <td>{{ $emp['name'] }}</td>
                    <td>{{ $emp['surn'] }}</td>
                    <td>{{ $emp['salary'] }}</td>
                </tr>
            @endif
        @endforeach
    </table>
    <!-- Задание 7 -->
    <table>
        @foreach($users2 as $user)
                <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['surn'] }}</td>
                    @if($user['banned'] )
                        <td>banned</td>
                    @else
                        <td>active</td>
                    @endif

                </tr>
        @endforeach
    </table>
    <!-- Задание 8 -->
    <table>
        @foreach($users2 as $user)
            @if($user['banned'])
            <tr style="color: red">
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['surn'] }}</td>
                    <td>banned</td>
            </tr>
            @else
                <tr style="color: green">
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['surn'] }}</td>
                        <td>active</td>
                </tr>
            @endif
        @endforeach
    </table>
    <!-- Задание 9 -->
    @foreach($arr18 as $item)
        <input value="{{ $item }}">
    @endforeach
    <!-- Задание 10 -->
    <select>
        @foreach($cities as $item)
            <option>{{ $item }}
        @endforeach
    </select>
    <!-- Задание 11 -->
    <ul>
        @foreach($days1 as $day)
        <li @if ($day == $today1)
                class="active" style="color: red;
                font-size: 150px;"
        @endif>{{ $day }}</li>
    @endforeach
    </ul>
</body>
</html>
