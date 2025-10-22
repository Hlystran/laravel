<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistration()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|unique:users|min:6|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|min:8',
            'full_name' => 'required|regex:/^[а-яА-ЯёЁ\s]+$/u',
            'phone' => 'required|regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
            'email' => 'required|email'
        ], [
            'login.regex' => 'Логин должен содержать только латинские буквы и цифры',
            'full_name.regex' => 'ФИО должно содержать только кириллицу и пробелы',
            'phone.regex' => 'Телефон должен быть в формате 8(XXX)XXX-XX-XX'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return redirect()->route('login')->with('success', 'Регистрация успешна! Теперь вы можете войти.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Проверка администратора
        if ($request->login === 'Admin' && $request->password === 'KorokNET') {
            $user = User::where('login', 'Admin')->first();
            if (!$user) {
                $user = User::create([
                    'login' => 'Admin',
                    'password' => Hash::make('KorokNET'),
                    'full_name' => 'Администратор',
                    'phone' => '8(000)000-00-00',
                    'email' => 'admin@korochki.ru',
                    'is_admin' => true
                ]);
            }
            auth()->login($user);
            return redirect()->intended('/dashboard');
        }

        // Обычная аутентификация
        $user = User::where('login', $request->login)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            auth()->login($user);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'login' => 'Неверные учетные данные.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
