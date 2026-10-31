<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // импортируем фасад баз данных

class RequestController extends Controller
{
    public function show()
    {
        // 141. Соединение таблиц Laravel
        // leftJoin - можно выполнять соединение таблиц, пусть у нас кроме таблицы с постами есть
        // еще и таблица с категориями, которым принадлежат посты.
        // Запрос, который получит посты вместе с их категориями
        /*
        $posts = DB::table('posts')
                ->leftJoin('categories', 'created_id', '=', 'categories.id')
            ->get();
        dump($posts);
        */

        // 140. Удаление данных через QB в Laravel
        // delete - для изменения данных.
        // удалим запись с указанным id
        DB::table('posts')
            ->where('id',  1)
            ->delete();
        // удалим заданную группу записей
        DB::table('posts')
            ->where('id','>',  5)
            ->delete();
        // Удалим вообще все записи
        DB::table('posts')->delete();

        // 139. Инкремент и декремент данных через QB в Laravel
        // increment и decrement - можно увеличить значения числовых полей
        // увелечим значение поля
        DB::table('posts')
            ->where('id', 1)
            ->increment('likes');
        // уменьшим значение поля
        DB::table('posts')
            ->where('id', 1)
            ->decrement('likes');
        // увеличим значение поля на заданное значение
        DB::table('posts')
            ->where('id', 1)
            ->increment('likes', 5);

        // 138. Обновление данных через QB в Laravel
        // update - для изменения данных, он принимает параметров массив имен столбцов и значений.
        // с указанным id
        DB::table('posts')->where('id', 1)->update([
            'title' => 'page',
            'slug' => 'slug',
        ]);
        // заданную группу записей
        DB::table('posts')->where('id', '>', 5)->update([
            'title' => 'page',
            'slug' => 'slug',
        ]);
        // вообще все записи
        DB::table('posts')->update([
            'title' => 'page',
            'slug' => 'slug',
        ]);

        // 137. Массовая вставка записей через QB в Laravel
        // insert - можно вставить в таблицу сразу несколько записей одним вызовом
        /*
        DB::table('posts')->insert([
            [
                'title' => 'page1',
                'slug' => 'slug1',
            ],
            [
                'title' => 'page2',
                'slug' => 'slug2',
            ]
        ]);
        */

        // 136. Получение id вставенной записи через QB в Laravel
        // insertGetId - можно получить id вставленной записи
        /*
        $id = DB::table('posts')->insertGetId([
            'title' => 'page',
            'slug' => 'page',
        ]);
        echo $id;
        */

        // 135. Вставка одной записи через Qb в Laravel
        // insert - для вставки данных, он принимает параметров массив имен столбоцв и значений
        /*
        DB::table('posts')->insert([
           'title' => 'page',
           'slug' => 'slug',
        ]);
        */

        // 134. Сдвиг при выборке через QB в Laravel
        // skip - позволяет задать сдвиг при выборке. Обязательно должен использовать в комбинации take.
        $posts = DB::table('posts')
            ->skip(3)
            ->take(5)
            ->get();

        // 133. Количество записей в выборке через QB в Laravel
        // take - позволяет задать количество получаемых записей. получем первых 5 записей
        $posts = DB::table('posts')
            ->take(5)
            ->get();
        dump($posts);

        // 132. Случайная сортировка при выборке через QB и Laravel
        // inRandomOrder - для сортировки результатов запроса в случайном порядке
        $posts = DB::table('posts')
            ->inRandomOrder()
            ->get();
        dump($posts);
        // получем один пост
        $posts = DB::table('posts')
            ->inRandomOrder()
            ->first();
        dump($posts);

        // 131. Сортировка по дате при выборке через QB в Laravel
        // latest и oldest позволяют легко отсортировать результаты по дате
        // по убыванию даты
        $posts = DB::table('posts')
            ->latest()
            ->get();
        dump($posts);
        // по возрастанию даты
        $posts = DB::table('posts')
            ->oldest()
            ->get();
        dump($posts);
        // Указание поля сортировка, давайте отсортируем по возрастанию даты, хранящейся в поле date:
        $posts = DB::table('posts')
            ->oldest('date')
            ->get();
        dump($posts);

        // 130. Сортировка данных при выборке через QB в Laravel
        // orderBy - позволяет отсортироват результат запроса по заданному столбцу
        $posts = DB::table('posts')
            ->orderBy('likes')
            ->get();
        dump($posts);
        // направление сортировки 'asc' и 'desc'
        $posts = DB::table('posts')
            ->orderBy('likes', 'desc')
            ->get();
        dump($posts);

        // 129. Комбинации динамических условий QB в Laravel
        // комбинацировать условия в одном методе
        $post = DB::table('posts')
            ->whereIdAndSlug(1, 'my-page')
            ->first();
        dump($post);
        // также оюъединять условия через логическое OR
        $post = DB::table('posts')
            ->whereIdOrSlug(1, 'my-page')
            ->first();
        dump($post);

        // 128. Динамические условия при выборке в QB в Laravel
        // Можно использовать динамически услови, в которых после слова where - будет написано имя поля таблицы
        $post = DB::table('posts')
            ->whereId(1)
            ->get();
        dump($post);
        // условия по полю slug
        $post = DB::table('posts')
            ->whereSlug('my-page')
            ->get();
        dump($post);

        // 127. Проверка на NULL при выборке через QB в Laravel
        // whereNull - проверяет, что значения стобца равны NULL
        $posts = DB::table('posts')
            ->whereNull('updated_at')
            ->get();
        dump($posts);
        // whereNotNull - проверяет, что значение столбца не равны NULL
        $posts = DB::table('posts')
            ->whereNotNull('updated_at')
            ->get();
        dump($posts);

        //126. Условия whereIn при выборке через QB в Laravel
        // проверяет whereIn, что значения столбца содержатся в указанном массиве
        $posts = DB::table('posts')
            ->whereIn('id', [1, 2, 3])
            ->get();
        dump($posts);
        // whereNotIn проверяет, что значения столбца не содержатся в указанном массиве
        $posts = DB::table('posts')
            ->whereNotIn('id', [1, 2, 3])
            ->get();
        dump($posts);

        // 125. Условие whereBetween при выборке через QB в Laravel
        // whereBetween проверяет, что значения столбца находится в указанном интервале
        $posts = DB::table('posts')
            ->whereBetween('created_at', [1, 100])
            ->get();
        dump($posts);
        // whereNotBetween проверят, что значения столбца находится вне указанного интервала
        $posts = DB::table('posts')
            ->whereNotBetween('created_at', [1, 100])
            ->get();
        dump($posts);

        // 124. Получение коллекции значений столбца через QB в Laravel
        // для получения колекции одного столбца, собранную со всех рядов, используется метод pluck
        /*
        $title = DB::table('posts')->pluck('title');
        dump($title);
        // можно перебрать полученные данные циклом
        $titles = DB::table('posts')->pluck('title');
        foreach ($titles as $title) {
            echo "<br>";
            echo $title;
        }
        // можно получить не все посты, а только попадающие под условие
        $title = DB::table('posts')
            ->where('id', '>', '3')
            ->pluck('title');
        dump($title);
        */

        // 123. Получение значения одного столбца QueryBuilder в Laravel
        /*
        $title = DB::table('posts')->where('id', 1)->value('title');
        echo $title;
        */

        // 122. Получение одной строки через QB в Laravel
        /*
        $post = DB::table('posts')->where('id', 1)->first();
        return view('post.show', compact('post'));
        */

        // 121. Сложные условия при выборке QB в Laravel
        /*
        $posts = DB::table('posts')
            ->where('id', '=', 3)
            ->orWhere(function ($query) {
                $query
                    ->where('likes', '>', 5000)
                    ->where('likes', '<', 20000);
            })
            ->get();
        return view('post.show', compact('posts'));
        */

        // 120. Условия orWhere при выборке через QB в Laravel
        /*
        $posts = DB::table('posts')
            ->where('id', '<', 3)
            ->orWhere('likes','>',3000)
            ->get();
        */

        // 119. Несколько условий where при выборке через QB в Laravel
        /*
        $posts = DB::table('posts')
            ->where('likes','>', 4000)
            ->where('likes','<', 20000)
            ->get();
        return view('post.show', compact('posts'));
        */

        // 118. Условия where при выборке через QB в Laravel
        /*
        $posts = DB::table('posts')->where('likes', '>',100)->get();
        return view('post.show', compact('posts'));
        */

        // 117. Поля выборки через QB в Laravel (select - выбираем два поля - title и text)
        /*
        $post = DB::table('posts')->select('title','text')->get();
        // Перемеименование столбцов
        $post = DB::table('posts')->select('title','text as post_text')->get();
        */

        // 116. Просмотр SQL запросов в Laravel
        /*
        // через QueryLog
        DB::enableQueryLog();
        DB::table('posts')->where('id', '>', 2)->get();
        dump(DB::getQueryLog());
        // вывод через toSql
        $query = DB::table('posts')->where('id', '>', 2)->toSql(0);
        dump($query);
        // Просмотр запроса через метод dump and die (dd)
        DB::table('posts')->where('id', '>', 2)->dd();
        // просмотр запроса через метод dump
        //DB::table('posts')->where('id', '>', 2)->dump();
        */


        // 115. Вывод полученных записей в представлении в Laravel
        /*
        $posts = DB::table('posts')->get();
        return view('post.show', ['posts' => $posts]);
        */

        // 114. Получение все хзаписей через Query Builder
        /*
        $posts = DB::table('posts')->get();
        dump($posts);

        foreach ($posts as $post) {
            dump($post->title);
            dump($post->text);
        }
        */
    }
}
