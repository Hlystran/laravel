<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корочки.есть - Образовательный портал</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Header -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-graduation-cap text-2xl text-blue-600"></i>
                    <span class="text-xl font-bold text-gray-800">Корочки.есть</span>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-300 transform hover:scale-105">
                        Войти
                    </a>
                    <a href="{{ route('register') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition duration-300 transform hover:scale-105">
                        Регистрация
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-6 animate-fade-in">
                Добро пожаловать на <span class="text-blue-600">Корочки.есть</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                Онлайн-платформа для дополнительного профессионального образования.
                Получите новые знания и официальные документы о квалификации.
            </p>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <i class="fas fa-laptop-code text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Онлайн-курсы</h3>
                    <p class="text-gray-600">Обучение в удобное время из любой точки мира</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <i class="fas fa-certificate text-4xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Официальные документы</h3>
                    <p class="text-gray-600">Получите удостоверения установленного образца</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <i class="fas fa-chalkboard-teacher text-4xl text-purple-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Профессиональные преподаватели</h3>
                    <p class="text-gray-600">Опытные специалисты с практическими знаниями</p>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-user-plus mr-2"></i>Начать обучение
                </a>
                <a href="{{ route('login') }}" class="bg-white hover:bg-gray-50 text-blue-600 border border-blue-600 px-8 py-4 rounded-lg text-lg font-semibold transition duration-300 transform hover:scale-105">
                    <i class="fas fa-sign-in-alt mr-2"></i>Войти в систему
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="text-center">
                <p>&copy; 2024 Корочки.есть. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <style>
        .animate-fade-in {
            animation: fadeIn 1s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</body>
</html>
