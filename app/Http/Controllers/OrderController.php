<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 201 Сохранение данных формы в БД в Laravel
    /*
    public function user4(Request $request)
    {
        if ($request->has('name') && $request->has('email') && $request->has('login')) {
            User::create($request->only(['name', 'email', 'login']));
            return 'user saved';
        }

        return view('post.form');
    }
    */
    /*
    public function store(Request $request)
    {
        Post::create($request->only(['title', 'slug', 'text']));

        return 'post saved';
    }
    protected $fillable = ['title', 'slug', 'text'];

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->text  = $request->input('text');
        $post->save();

        return 'post saved';
    }
    */
    // 200 Внедрение зависимости и параметры маршрута в Laravel
    public function test1(Request $request, $id, $login)
    {
        dump($id);
        dump($login);

        dump($request->all());

        return view('post.form');
    }
    /*
    public function test($id)
    {

    }
    public function test(Request $request, $id)
    {

    }
    */
    // 199 Сложные имена полей в формах в Laravel
    public function user2(Request $request)
    {
        $name = $request->input('user.name');
        $surname = $request->input('user.surname');
        $email = $request->input('user.email');

        return view('post.form', [
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
    ]);
    }
    // $name = $request->input('user.name');
    // $name = $request->input('user.surname');
    // 198 Исключение части данных формы в Laravel
    public function user1(Request $request)
    {
        $data = $request->except('password', 'email');

        return view('post.form', ['data' => $data]);
    }
    // $data = $request->except(['title', 'text']);
    // $data = $request->except(['title', 'text']);
    // 197 Получение части данных формы в Laravel
    public function user(Request $request)
    {
        $data = $request->only('name', 'login');

        return view('post.form', ['data' => $data]);
    }
    // $data = $request->only(['title', 'text']);
    // $data = $request->only(['title', 'text']);

    // 196 Данные формы в виде массива в Laravel
    public function form2(Request $request)
    {
        $data = $request->all();

        return view('post.form', ['data' => $data]);
    }
    public function result(Request $request)
    {
        $data = $request->all();
        return view('post.form', ['data' => $data]);
    }
    // 195. Задание 1
    public function form1(Request $request)
    {
        $city = null;
        $country = null;

        // Проверяем, была ли отправлена форма
        if ($request->has('city') && $request->has('country')) {
            $city = $request->input('city');
            $country = $request->input('country');
        }

        // Передаем переменные в представление
        return view('post.form', [
            'city' => $city,
            'country' => $country
        ]);
    }
    /*
    public function form1(Request $request)
    {
        if ($request->has('title') && $request->has('slug')) {
            dump($request->input('title'));
            dump($request->input('slug'));
        }

        return view('post.form');
    }
    */
    // 194
    /*
    public function result(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $salary = $request->input('salary');

        return view('post.form', [
            'name' => $name, 'age' => $age, 'salary' => $salary
        ]);
    }
    public function form()
    {
        return view('post.form');
    }
    */
    /*
    public function result(Request $request)
    {
        $title = $request->input('title');
        $slug = $request->input('slug');

        return view('post.form', [
            'title' => $title, 'slug' => $slug
        ]);
    }
    public function form()
    {
        return view('post.form');
    }
    */
    // 192. Объект Request в Laravel
    // теперь укажем объект ззапроса параметром действия, используя контроль типов
    // laravel обнаружит, что мы хотим "внедрить" объект запроса в действие и автоматически передает его в нужные параметр
    // в результате в действии у нас будет доступна переменна $request.
    public function indexes(Request $request)
    {

    }

    // 191. Доп. возможности связей моделей
    // Проверка наличия связей
    // Метод has - оставляет только те записи, укоторых есть связанные/метод doesntHave - наоборот
    // $users = User::has('posts')->get();
    public function index()
    {
        $client = Order::find(5)->client;
        dump($client);

        $clients5 = Order::where('client_id', '>', 5)->get();
        dump($clients5);

        $orders = Order::with(['orderlists', 'client'])->get();
        foreach ($orders as $order) {
            dump($order);
            dump($order->orderlists);
            dump($order->client);
        }

        $orders = Order::all();
        dump($orders);
    }
    // 181. Получени данных связь один ко многим
    public function show()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            dump($order->id);

            if ($order->client) {
                dump($order->client->id);
                dump($order->client->name);
            }
        }

        $order = Order::find(1);
        // Получили клиента по заказу
        dump($order->client);
    }
}
