<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход - Корочки.есть</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-8">
    <div class="max-w-md mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="inline-flex items-center space-x-2 text-blue-600 hover:text-blue-700 transition duration-300">
                <i class="fas fa-arrow-left"></i>
                <span>На главную</span>
            </a>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8 transform hover:shadow-2xl transition duration-300">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <i class="fas fa-sign-in-alt text-2xl text-blue-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Вход в систему</h1>
                <p class="text-gray-600">Войдите в свой аккаунт</p>
            </div>

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 animate-pulse">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-exclamation-circle"></i>
                        <span class="font-semibold">Ошибка авторизации</span>
                    </div>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Login Field -->
                <div>
                    <label for="login" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-blue-600"></i>Логин
                    </label>
                    <input type="text"
                           id="login"
                           name="login"
                           value="{{ old('login') }}"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 @error('login') border-red-500 @enderror"
                           placeholder="Введите ваш логин">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-blue-600"></i>Пароль
                    </label>
                    <input type="password"
                           id="password"
                           name="password"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 @error('password') border-red-500 @enderror"
                           placeholder="Введите ваш пароль">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-semibold transition duration-300 transform hover:scale-105 focus:ring-4 focus:ring-blue-200">
                    <i class="fas fa-sign-in-alt mr-2"></i>Войти в систему
                </button>
            </form>

            <!-- Registration Link -->
            <div class="text-center mt-6 pt-6 border-t border-gray-200">
                <p class="text-gray-600">Еще нет аккаунта?</p>
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-semibold transition duration-300 inline-flex items-center space-x-1 mt-2">
                    <span>Зарегистрироваться</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Admin Hint -->
            <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <div class="flex items-center space-x-2 text-yellow-800">
                    <i class="fas fa-info-circle"></i>
                    <span class="text-sm font-semibold">Для администраторов:</span>
                </div>
                <p class="text-sm text-yellow-700 mt-1">Логин: Admin, Пароль: 1111</p>
            </div>
        </div>
    </div>
</body>
</html>
