<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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
