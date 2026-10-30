<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = ['John', 'Jane', 'Jim'];
        /* 48. Вывод переменных в тегах Blade*/
        $data = [
            'var1' => 'aaa',
            'var2' => 'bbb',
            'var3' => 'ccc',

            'cls' => 'active',
            'val' => 'text',
            /* 50. Выполнение произвольного кода в командах Blade */
            'first' => 'john',
            'last' => 'smith',
            /* 51. Арифметически операции в Blade в Laravel */
            'a' => 10,
            'b' => 3,
            /* 52. Работа с массивами в Blade */
            'arr' => [1, 2, 3, 5, 7, 8],
            /* 53. Проверка переменных в Blade */
            'var' => true,
            /* 54. Вывод неэкраннированных данных в Blade*/
            'name' => '<b>John</b>',
            /* 56. Условия в Blade в Laravel */
            'isAuth' => true,
            /* 58. Директива @elseif в Blade */
            'num' => 5,
            /* 59. Директива @ unless - является отрицанием */
            'Auth' => false,
            /* 60. Сложные команды в условиях Blade */
            'arr1' => [1, 2, 3],
            /* 61. Директива @foreach */
            'arr2' => ['a', 'b', 'c', 'd', 'e', 'f'],
            /* 63. Условия и циклы @ foreach в Blade */
            'arr3' => [-1, 2, -3, 4, 5],
            /* 64. Вложенные циклы @ foreach в Blade */
            'arr4' => [[1, 2, 3], [4, 5, 6], [7, 8, 9]],
            /* 65. Перебор многомерных массивов */
            'users1' => [
                [
                    'name' => 'user1',
                    'age' => 21,
                ],
                [
                    'name' => 'user2',
                    'age' => 22,
                ],
                [
                    'name' => 'user3',
                    'age' => 23,
                ],
            ],
            /* 66. @ forelse в Blade */
            'arr5' => ['a', 'b', 'c'],
            /* 68. Директива @ break в Blade*/
            'arr6' => [1, 2, 3, 4, 5],
            /* 70. Цикл for в Blade */
            'count' => 3,

            // 48
            'name1' => 'john',
            'age' => 25,
            'salary' => 1000,

            // 49
            /* Задание 1 */
            'cls1' => 'success',
            /* Задание 2 */
            'val11' => 'a',
            'val22' => 'b',
            'val33' => 'c',
            /* Задание 3 */
            'style' => 'color: red;',
            /* Задание 4 */
            'text' => 'link text',
            'href' => 'https://example.com',

            // 50
            /* Задание 1 */
            date('d.m.Y'),

            // 51
            /* Задание 1 */
            'c' => 7,
            'd' => 2,
            /* Задание 2 */
            'price' => 100,
            'discount' => 10,

            // 52
            /* Задание 1 */
            'employee' => [
                'name' => 'john',
                'age' => 25,
                'salary' => 1000,
            ],
            /* Задание 1 */
            'arr7' => [1, 2, 3, 4, 5],

            // 53
            /* Задание 1 */
            'city' => 'Minsk',
            /* Задание 2 */
            'location' => [
                'country' => 'Belarus',
                'city' => 'Minsk',
            ],
            /* Задание 3 */
            'year' => 2026,
            'month' => 9,
            'day' => 15,

            // 54
            'str' => '<b>text</b>',

            // 56 - 57
            'age1' => 20,

            // 58
            'age2' => 18,

            // 59
            'age3' => 15,

            //60
            'arr9' => [1, 2, 3, 4],

            //61
            /* Задание 1 */
            'arr10' => [1, 2, 3, 4, 5],

            //62
            'arr11' => ['a', 'b', 'c', 'd'],

            //63
            /* Задание 1 */
            'arr12' => [1, 2, 3, 4, 5, 6],
            /* Задание 2 */
            'data' => [1, 2, 3],

            //64
            'arr13' => [[1, 2], [3, 4], [5, 6]],

            //65
            'employees' => [
                [
                    'name' => 'user1',
                    'surname' => 'surname1',
                    'salary' => 1000,
                ],
                [
                    'name' => 'user2',
                    'surname' => 'surname2',
                    'salary' => 2000,
                ],
                [
                    'name' => 'user3',
                    'surname' => 'surname3',
                    'salary' => 3000,
                ],
            ],

            // 66
            'users' => ['user1', 'user2', 'user3'],

            //67
            /* Задание 1 */
            'arr14' => ['a', 'b', 'c', 'd'],
            /* Задание 2 */
            'arr15' => [1, 2, 3, 4, 5],

            //68
            'arr16' => [1, 2, 0, 4, 5],

            //69
            'arr17' => [1, 0, 2, 0, 3],

            // 70
            'count1' => 3,

            // 71
            /* Задание 1 */
            'a1' => 2,
            'b1' => 3,

            // 72
            /* Задание 1 */
            'links' => [
                [
                    'text' => 'text1',
                    'href' => 'href1',
                ],
                [
                    'text' => 'text2',
                    'href' => 'href2',
                ],
                [
                    'text' => 'text3',
                    'href' => 'href3',
                ],
            ],
            /* Задание 3, 4, 5 ,6 */
            'employees1' => [
                [
                    'name' => 'user1',
                    'surn' => 'surn1',
                    'salary' => 1000,
                ],
                [
                    'name' => 'user2',
                    'surn' => 'surn2',
                    'salary' => 2000,
                ],
                [
                    'name' => 'user3',
                    'surn' => 'surn3',
                    'salary' => 3000,
                ],
                [
                    'name' => 'user4',
                    'surn' => 'surn4',
                    'salary' => 4000,
                ],
                [
                    'name' => 'user5',
                    'surn' => 'surn5',
                    'salary' => 5000,
                ],
            ],
            /* Задание 7, 8 */
            'users2' => [
                [
                    'name' => 'user1',
                    'surn' => 'surn1',
                    'banned' => true,
                ],
                [
                    'name' => 'user2',
                    'surn' => 'surn2',
                    'banned' => false,
                ],
                [
                    'name' => 'user3',
                    'surn' => 'surn3',
                    'banned' => true,
                ],
                [
                    'name' => 'user4',
                    'surn' => 'surn4',
                    'banned' => false,
                ],
                [
                    'name' => 'user5',
                    'surn' => 'surn5',
                    'banned' => false,
                ],
            ],
            /* Задание 9 */
            'arr18' => ['aaa', 'bbb', 'ccc', 'ddd'],
            /* Задание 10 */
            'cities' => ['Moscow', 'London', 'Paris'],
            /* Задание 11 */
            'days' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15,
                16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31],
            'today' => 10,
        ];
        return view('users', compact('users'), $data);
    }
}
