<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
        // 221 Пароль при валидации в Laravel
        public function form(Request $request)
        {
            if ($request->isMethod('post')) {
                $validated = $request->validate([
                    'password' => ['required', 'password:min_length,letters,numbers,symbols'],
                ]);

                dump($validated);
            }

            return view('validation');
        }
        // 220 Чекбокс при валидации в Laravel
        /*
        public function form(Request $request)
        {
            if ($request->isMethod('post')) {
                $validated = $request->validate([
                    'terms' => 'accepted',
                    'is_active' => 'boolean'
                ]);

                dump($validated);
            }

            return view('validation');
        }
        */
        // 219 Список значений при валидации в Laravel
        /*
        public function form(Request $request)
        {
            if ($request->isMethod('post')) {
                $validated = $request->validate([
                    'status' => 'in:draft,published',
                    'role' => 'in:user,admin'
                ]);

                dump($validated);
            }

            return view('validation');
        }
        */
        // 218 Дата при валидации в Laravel
        /*
        public function form(Request $request)
        {
            if ($request->isMethod('post')) {
                $validated = $request->validate([
                    'birthday' => 'date',
                    'deadline' => 'after:today',
                    'start_at' => 'before:end_at'
                ]);

                dump($validated);
            }

            return view('validation');
        }
        */
    // 217 Обязательность полей формы в Laravel
    /*
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required',
                'note' => 'nullable'
                // required означает, что поле должно быть передано в запросе и не быть пустым.
                // filled означает, что если поле передано в запросе, оно не должно быть пустым (но само поле можно вообще не включать в запрос).
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    // 216 Валидация URL в Laravel
    /*
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'website' => 'url',
                'slug' => 'alpha_dash'
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    // 215 Цифры при валидации в Laravel
    /*
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'year' => 'digits:4',
                'sms_code' => 'digits:6'
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    // 214 Буквы при валидации в Laravel
    /*
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'alpha',
                'login' => 'alpha_num'
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    // 213 Точный размер при валидации в Laravel
    /*
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'code' => 'size:4',
                'pin' => 'size:6'
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    // 212 Диапазон при валидации в Laravel
    /*
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'age' => 'between:18,100',
                'price' => 'between:1,9999'
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    // 211 Тип значения при валидации в Laravel
    /*
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'title' => 'string|min:5|max:100',
                'password' => 'string|min:8'
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    // 210. Тип значения при валидации в Laravel
    /*
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'title' => 'string',
                'age' => 'integer', // проверка целое число
                'price' => 'numeric' // проверка числовых значений
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    // 209. Несколько правил для одного поля в Laravel
    /*
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'title' => 'required',
                'email' => 'required|email'
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    /* 205. Успешная проверка формы в Laravel
       206. Ошибка проверки формы в Laravel
       207. Первая ошибка поля в Laravel
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'title' => 'required',
                'email' => 'email'
            ]);

            dump($validated);
        }

        return view('validation');
    }
    */
    /* 204. Метод validate в Laravel

     public function form(Request $request)
       {
           if ($request->isMethod('post')) {
               $request->validate([
                   'title' => 'required',
                   'email' => 'email'
               ]);

                dump('данные прошли проверку');
            }

            return view('validation');
        }
     */
    /*
        Задание 1
    public function form(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'title' => 'required',
                'email' => 'email'
            ]);

            dump($request->input('title'));
            dump($request->input('email'));
        }

        return view('validation');
    }
    */
    /* 203. Форма для проверки в Laravel
    public function form1(Request $request)
    {
        if ($request->isMethod('POST')) {
            dump($request->input('title'));
            dump($request->input('email'));
        }

        return view('validation');
    }*/
}
