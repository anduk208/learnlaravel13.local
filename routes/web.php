<?php

use App\Http\Controllers\UserController;
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
// 15. Введение в маршруты в Laravel
// Задание 1
Route::get('/test', function () {
    return 'любой текст';
});
// Задание 2
Route::get('/dir/test', function () {
    return 'любой текст2';
});
// Задание 3
Route::get('/about', function () {
    return 'about';
});
Route::get('/contacts', function () {
    return 'contacts';
});

// 16. Параметры маршрутов в Laravel
// Задание 1
Route::get('/user/{id}', function ($id) {
    return 'user ' . $id;
});
// Задание 2
Route::get('/user/{name}', function ($name) {
    return 'user ' . $name;
});
// Задание 3
Route::get('/city/{name}', function ($name) {
    return 'Город ' . $name;
});

// 17. Несколько параметров маршрутов в Laravel
// Задание 1
Route::get('/user/{surname}/{name}', function ($surname, $name) {
    return 'Ваша имя: ' . $name . ' Ваша фамилия: ' . $surname;
});
// Задание 2
Route::get('/city/{country}/{name}', function ($country, $name) {
    return 'Город: ' . $name . ' Страна: ' . $country;
});
// Задание 3
Route::get('/post/{id}/comment/{num}', function ($id, $num) {
    return 'Номер поста: ' . $id . ' Номер комментария: ' . $num;
});

// 18. Необязательные параметры маршрутов в Laravel
// Задание 1
Route::get('/city/{city?}', function ($city = 'minsk') {
    return 'Город: ' . $city;
});
// Задание 2
Route::get('/page/{num?}', function ($num = 1) {
    return 'Страница: ' . $num;
});

// 19. Ограничения параметров маршрутов в Laravel
// Задание 1, 2, 3
Route::get('/user/{id}', function ($id) {
    return 'user ' . $id;
})->where('id', '[0-9]+');
// Вывело 5 как я и хотел
// Вывело на сатйе Error
// Задание 4
Route::get('/product/{code}', function ($code) {
    return 'product ' . $code;
})->where('code', '[0-9]{4}');

// 20, Ограничения на несколько параметров маршрутов в Laravel
// Задание 1
Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'user ' . $id . ' ' . $name;
})->where([
    'id'   => '[0-9]+',
    'name' => '[a-z]{3,}',
]);
// Задание 2
Route::get('/posts/{date}', function ($date) {
    return 'date ' . $date;
})->where('date', '[0-9]{4}-[0-9]{2}-[0-9]{2}');
// Задание 3
Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    return $year . '-' . $month . '-' . $day;
})->where([
    'year'  => '[0-9]{4}',
    'month' => '[0-9]{2}',
    'day'   => '[0-9]{2}',
]);
// Задание 4
Route::get('/users/{order}', function ($order) {
    return 'order by ' . $order;
})->where('order', 'name|surname|age');
// Задание 5
Route::get('/product/{code}', function ($code) {
    return 'product code ' . $code;
})->where('code', '[0-9]{4}');

// 21. Шаблонные ограничения параметров маршрутов в Laravel
// Задание 1
Route::get('/user/{id}', function ($id) {
    return 'user ' . $id;
})->whereNumber('id');
// Задание 2
Route::get('/city/{name}', function ($name) {
    return 'city ' . $name;
})->whereAlpha('name');
// Задание 3
Route::get('/tag/{slug}', function ($slug) {
    return 'tag ' . $slug;
})->whereAlphaNumeric('slug');
// Задание 4
Route::get('/user/{order}', function ($order) {
    return 'user ' . $order;
})->whereIn('order', ['name', 'surname', 'age']);

// 22. Глобальные ограничения параметров в Laravel
/*
// Задание 1
class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('slug1', '[a-z0-9_-]+');
    }
}
Route::get('/post/{slug1}', function ($slug1) {
    return '!!!';
});

// Задание 2
class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('id', '[0-9]+');
    }
}
Route::get('/post/{id}', function ($id) {
    return '!!!';
});
*/
// 23. Разрешение конфликтов маршрутов в Laravel
// Задание 1
	Route::get('/user/{id?}', function ($id) {
		return 'id';
	})->whereNumber('id');
	Route::get('/user/all', function () {
		return 'all';
	});
// Задание 2
Route::get('/page2/{num}', function ($num) {
    return 'num';
})->whereNumber('num');
Route::get('/page2/about', function () {
    return 'about';
});
Route::get('/page2', function () {
    return 'page';
});
// Задание 3
Route::get('/user', function () {
    return 'user';
});
Route::get('/user/{id?}', function ($id = null) {
    return 'id';
})->whereNumber('id');
Route::get('/user/all', function () {
    return 'all';
});
// Задание 4
Route::get('/user3/{name}/{id?}', function ($name, $id = null) {
    return 'name id';
})->whereNumber('id');
Route::get('/user3/all', function () {
    return 'all';
});
Route::get('/user3/all/desc', function () {
    return 'all desc';
});

// 24. Группировка маршрутов в Laravel
// Задание 1
Route::prefix('blog')->group(function () {
    Route::get('/admin/users', function () {
        return 'all';
    });
    Route::get('/admin/user/{id}', function ($id) {
        return $id;
    });
});
// Задание 2
Route::prefix('blog2')->group(function () {
    Route::get('/shop/product/all', function () {
        return 'all';
    });
    Route::get('/shop/product/{id}', function ($id) {
        return $id;
    });
    Route::get('/shop/category/{id}', function ($id) {
        return $id;
    });
});

// 25. Именованные маршруты в Laravel
// Задание 1
Route::get('/user/profile', function () {
    return 'profile';
})->name('profile');
Route::get('/user/{id}', function ($id) {
    return $id;
})->name('id');
// Задание 2
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

/* 47. Введение в Blade в Laravel*/
Route::get('/users', [UserController::class, 'index']);
