<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            "50": "#f0fdfa",
                            "100": "#ccfbf1",
                            "200": "#99f6e4",
                            "300": "#5eead4",
                            "400": "#2dd4bf",
                            "500": "#14b8a6",
                            "600": "#0d9488",
                            "700": "#0f766e",
                            "800": "#115e59",
                            "900": "#134e4a",
                            "950": "#042f2e"
                        }
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif']
                    },
                    keyframes: {
                        bounce: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        }
                    },
                    animation: {
                        bounce: 'bounce 1s ease infinite',
                        fadeIn: 'fadeIn 1s ease forwards'
                    }
                }
            }
        }
    </script>
    <style>
        /* Background animation with 3D effect */
        body {
            background: linear-gradient(135deg, #3cbd8f, #2ab88d, #00b4b2, #2cc4c7, #00b4b2);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            perspective: 1000px; /* Adds depth perception */
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* 3D Layer Effect */
        .background-layer {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            transform: translateZ(-1px) scale(2); /* Moves the layer back */
            z-index: 0; /* Sets layer order */
            backdrop-filter: blur(20px); /* Adds a blur effect */
        }

        .content {
            position: relative;
            z-index: 1; /* Brings the content in front of the background */
        }
    </style>
</head>
<body>
    <div class="background-layer"></div>
    <div class="content min-h-screen flex items-center justify-center p-6">
        <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto space-y-6 animate-fadeIn">
            <div class="w-full bg-white rounded-xl shadow-xl dark:border dark:border-gray-700 sm:max-w-md xl:p-0 dark:bg-gray-800">
                <div class="p-6 space-y-6 sm:p-8">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900 md:text-4xl dark:text-white text-center animate-bounce">
                        Login Petugas
                    </h1>
                    <form class="space-y-6" action="proses_login_petugas.php" method="post">
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username Petugas</label>
                            <input type="text" name="username" id="username" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white transition duration-300 ease-in-out transform hover:scale-105" placeholder="Masukkan username Anda" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white transition duration-300 ease-in-out transform hover:scale-105" placeholder="••••••••" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:ring-offset-gray-800">
                                </div>
                                <label for="remember" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-300">Ingat saya</label>
                            </div>
                        </div>
                        <button type="submit" name="login_petugas" class="w-full text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-500 dark:hover:bg-teal-600 dark:focus:ring-teal-800 transition duration-300 ease-in-out transform hover:scale-105">
                            Login sebagai Petugas
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
