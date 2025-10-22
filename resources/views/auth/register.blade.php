<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - Корочки.есть</title>
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

        <!-- Registration Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8 transform hover:shadow-2xl transition duration-300">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <i class="fas fa-user-plus text-2xl text-blue-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Регистрация</h1>
                <p class="text-gray-600">Создайте аккаунт для доступа к курсам</p>
            </div>

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 animate-pulse">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-exclamation-circle"></i>
                        <span class="font-semibold">Пожалуйста, исправьте ошибки:</span>
                    </div>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 animate-pulse">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
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
                           pattern="[a-zA-Z0-9]{6,}"
                           title="Латиница и цифры, не менее 6 символов"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 @error('login') border-red-500 @enderror"
                           placeholder="Введите ваш логин">
                    <p class="text-sm text-gray-500 mt-1">Только латинские буквы и цифры, минимум 6 символов</p>
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
                           minlength="8"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 @error('password') border-red-500 @enderror"
                           placeholder="Введите пароль">
                    <p class="text-sm text-gray-500 mt-1">Минимум 8 символов</p>
                </div>

                <!-- Full Name Field -->
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-id-card mr-2 text-blue-600"></i>ФИО
                    </label>
                    <input type="text"
                           id="full_name"
                           name="full_name"
                           value="{{ old('full_name') }}"
                           required
                           pattern="[а-яА-ЯёЁ\s]+"
                           title="Только кириллица и пробелы"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 @error('full_name') border-red-500 @enderror"
                           placeholder="Иванов Иван Иванович">
                </div>

                <!-- Phone Field -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-phone mr-2 text-blue-600"></i>Телефон
                    </label>
                    <input type="tel"
                           id="phone"
                           name="phone"
                           value="{{ old('phone') }}"
                           required
                           pattern="8\(\d{3}\)\d{3}-\d{2}-\d{2}"
                           title="Формат: 8(XXX)XXX-XX-XX"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 @error('phone') border-red-500 @enderror"
                           placeholder="8(999)123-45-67">
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-600"></i>Email
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 @error('email') border-red-500 @enderror"
                           placeholder="example@mail.ru">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-semibold transition duration-300 transform hover:scale-105 focus:ring-4 focus:ring-blue-200">
                    <i class="fas fa-user-plus mr-2"></i>Создать аккаунт
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-6 pt-6 border-t border-gray-200">
                <p class="text-gray-600">Уже есть аккаунт?</p>
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold transition duration-300 inline-flex items-center space-x-1 mt-2">
                    <span>Войти в систему</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
