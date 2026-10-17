<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider; /* Глобальное ограничение */
use App\Http\Controllers\PostController; /* Покдлючение контроллера */
use App\Http\Controllers\TestController; /* Покдлючение контроллера */

Route::get('/newpost', [PostController::class, 'show']); // Сокращенная запись обращения к контроллеру
Route::get('/newposts', [PostController::class, 'all']); // Обращение ко второму методу контроллера
Route::get('/longpost', [\App\Http\Controllers\Controller::class, '#']); // Удлиненная запись

Route::get('/rarepost/{id}', [PostController::class, 'shows']);
Route::get('/rarepost/{surname}/{name}', [PostController::class, 'newshow']);
Route::get('/oldshow/{id}', [PostController::class, 'oldshow']);

Route::get('/oldpost', [TestController::class, 'show']);
Route::get('/oldpost/newpost/1', [TestController::class, 'oldshow']);

/* 39. Представления в Laravel*/
Route::get('/views', [TestController::class, 'view']);
Route::get('/newviews', [TestController::class, 'newview']);

// 41. Структура предслений
Route::get('/example', [PostController::class, 'example']);
Route::get('/example/1', function () {
    return view('components.layout');
});

/* 22.0  Глобальное ограничение
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

// Разрешение конфликтов маршрутов
Route::get('/get/{id}', function ($id) {
    return 'id';
})->whereNumber('id');
Route::get('/get/all', function () {
    return 'all';
});

// Группировка маршрутов в Laravel
// вынесем общую часть через prefix и group
Route::prefix('blog')->group(function() {
    Route::get('/blog/post/all', function() {
        return 'all';
    });
    Route::get('/blog/post/{id}', function($id) {
        return $id;
    });
});

// Именованные маршруты в Laravel
Route::get('/newblog/all/{id}', function($id) {
    return 'blogs' . $id;
})->name('blogs');


