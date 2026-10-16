<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider; /* Глобальное ограничение */

/* 22. Глобальное ограничение
class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('id', '[0-9]+');
    }
}
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return '!!!';
});
Route::get('/about', function () {
    return 'about page';
});
Route::get('/about/{id}', function ($id) {
    return 'Номер страницы ' . $id;
});
Route::get('/animals/about/{catId}/{mouseId?}', function ($catId, $mouseId = 1) {
    return 'ID кошки ' . $catId . ' ID мыши ' . $mouseId;
});

// Ограничение параметров маршрутов в Laravel
Route::get('/post/{id}', function ($id) {
    return 'post ' . $id;
})->where('id', '[0-9]+'); // where - условия "где"

// Ограничения на несколько параметров
Route::get('/post/{slug}/{id}', function ($slug, $id) {
    return 'post ' . $slug . 'id' . $id;
})->where('slug', '[a-z0-9_-]+') // a-z - любые строчные (маленькие) буквы латиского алфавита от a до z
    ->where('id', '[0-9]+'); // 0-9 - любые цифры от 0 до 9

// Шаблонные ограничение параметров маршрутов
route::get('/posts/{id}', function ($id) {
   return 'post ' . $id;
})->whereNumber('id'); // ограничение только цифрами

route::get('/posts/{slug}', function ($slug) {
    return 'post ' . $slug;
})->whereAlpha('slug'); // ограничение только буквами

route::get('/posts/{slug}', function ($slug) {
    return 'post ' . $slug;
})->whereAlphaNumeric('slug'); // ограничение только цифрами и буквами

route::get('/users/{order}', function ($order) {
    return 'post ' . $order;
})->whereIn('order', ['name', 'surname', 'age']); // ограничение только цифрами и буквами
