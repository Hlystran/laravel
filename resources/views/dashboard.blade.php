<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управления - Корочки.есть</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-graduation-cap text-2xl text-blue-600"></i>
                    <div>
                        <span class="text-xl font-bold text-gray-800">Корочки.есть</span>
                        <p class="text-sm text-gray-600">Панель управления</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Добро пожаловать, {{ auth()->user()->full_name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center space-x-2">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Выйти</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- User Info Card -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Профиль</h3>
                        <p class="text-gray-600">Ваши данные</p>
                    </div>
                </div>
                <div class="space-y-2">
                    <p><span class="font-semibold">Логин:</span> {{ auth()->user()->login }}</p>
                    <p><span class="font-semibold">ФИО:</span> {{ auth()->user()->full_name }}</p>
                    <p><span class="font-semibold">Телефон:</span> {{ auth()->user()->phone }}</p>
                    <p><span class="font-semibold">Email:</span> {{ auth()->user()->email }}</p>
                    @if(auth()->user()->isAdmin())
                        <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Администратор</span>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Быстрые действия</h3>
                <div class="space-y-3">
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition duration-300 flex items-center justify-between">
                        <span>Мои курсы</span>
                        <i class="fas fa-book"></i>
                    </button>
                    <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition duration-300 flex items-center justify-between">
                        <span>Подать заявку</span>
                        <i class="fas fa-plus"></i>
                    </button>
                    <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg transition duration-300 flex items-center justify-between">
                        <span>Мои документы</span>
                        <i class="fas fa-file-certificate"></i>
                    </button>
                </div>
            </div>

            <!-- Statistics -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Статистика</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-play-circle text-blue-600"></i>
                            <span>Активные курсы</span>
                        </div>
                        <span class="bg-blue-600 text-white px-2 py-1 rounded-full text-sm">0</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <span>Завершено курсов</span>
                        </div>
                        <span class="bg-green-600 text-white px-2 py-1 rounded-full text-sm">0</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-certificate text-purple-600"></i>
                            <span>Получено документов</span>
                        </div>
                        <span class="bg-purple-600 text-white px-2 py-1 rounded-full text-sm">0</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome Message -->
        <div class="mt-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-xl p-8 text-white">
            <div class="max-w-2xl">
                <h2 class="text-3xl font-bold mb-4">Добро пожаловать в систему!</h2>
                <p class="text-blue-100 text-lg mb-6">
                    Теперь у вас есть доступ к платформе дополнительного профессионального образования.
                    Вы можете подавать заявки на курсы, отслеживать прогресс обучения и получать официальные документы.
                </p>
                <div class="flex space-x-4">
                    <button class="bg-white text-blue-600 hover:bg-blue-50 px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105">
                        <i class="fas fa-rocket mr-2"></i>Начать обучение
                    </button>
                    <button class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 px-6 py-3 rounded-lg font-semibold transition duration-300">
                        <i class="fas fa-question-circle mr-2"></i>Помощь
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
