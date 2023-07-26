<!-- Navbar -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>prapatan jaya trans</title>
    <style>

    </style>
</head>
<body>
    <!-- Navbar goes here -->
    <!-- Navbar goes here -->
    <nav class="bg-gray-100 border-gray-200 pt-6 dark:bg-gray-900 shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center mx-auto max-w-screen-xl px-4 md:px-6 py-2.5">
                <div class="flex flex flex-row mt-0 mr-6 space-x-8 text-sm font-medium">
                    <div>
                        <!-- Website Logo -->
                        <a href="/" class="flex items-center py-4 px-2">
                            <img src="{{url('images/icon/iconbg.png')}}" alt="Logo" class="h-8 w-8 mr-2">
                            <span class="font-semibold text-black-500 text-lg">Prapatan Jaya Trans</span>
                        </a>
                    </div>
                    <!-- Primary Navbar items -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="{{ route('home.index') }}"
                            class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Home</a>
                        <a href="{{ route('mobil.index') }}"
                            class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Layanan
                            Sewa</a>
                        @if (Auth::check() && Auth::user()->level == 'User')
                        <a href="{{ route('transaksi.index') }}"
                            class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Transaksi</a>
                        @else
                        @endif

                    </div>
                </div>
                <!-- Secondary Navbar items -->
                <div class="hidden md:flex items-center space-x-3 ">
                    @if (Auth::check() && Auth::user()->level == 'User')
                    <p class="nama-user pr-4">{{ Auth::user()->nama }}</p>
                    @else
                    <a href="{{ route('login.index') }}"
                        class="mr-6 text-sm font-medium text-gray-500 dark:text-white hover:underline">Login</a>
                    @endif

                    @if (Auth::check() && Auth::user()->level == 'User')
                    <button type="button"
                        class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 " src="{{url('/images/icon/profile.png')}}" alt="user photo">
                    </button>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            @if (Auth::check())
                            <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->nama }}</span>
                            <span
                                class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                            @else
                            @endif
                        </div>

                        <ul class="py-1" aria-labelledby="user-menu-button">
                            <li>
                                <a href="{{ route('transaksi.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Pesanan
                                    Saya</a>
                            </li>
                            <li>
                                <a href="/logout"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                    @else
                    @endif
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-500 hover:text-green-500" x-show="!showMenu" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- mobile menu -->
        <div class="hidden mobile-menu">
            <ul class="">
                @if (Auth::check())
                <li>
                    <a class="flex items-center text-sm px-2 py-4 hover:bg-green-500 transition duration-300" href="#">
                        <img class="w-8 h-8 rounded-full mr-2" src="images/icon/profile.png" alt="user photo">
                        <div>
                            <span class="block">{{ Auth::user()->nama }}</span>
                            <span class="block text-xs">{{ Auth::user()->email }}</span>
                        </div>
                    </a>
                </li>
                @else
                @endif
                <li class="active"><a href="{{ route('login.index') }}"
                        class="block text-sm px-2 py-4 text-black bg-green-500 font-semibold hover:text-green-500  transition duration-300">Login</a>
                </li>
                <li class="active"><a href="{{ route('home.index') }}"
                        class="block text-sm px-2 py-4 text-black bg-green-500 font-semibold hover:text-green-500  transition duration-300">Home</a>
                </li>
                <li><a href="{{ route('mobil.index') }}"
                        class="block text-sm px-2 py-4 text-black bg-green-500 font-semibold hover:text-green-500  transition duration-300">Layanan
                        Sewa</a></li>
                @if (Auth::check() && Auth::user()->level == 'User')
                <li><a href="{{ route('transaksi.index') }}"
                        class="block text-sm px-2 py-4 text-black bg-green-500 font-semibold hover:text-green-500  transition duration-300">Transaksi</a>
                </li>
                <li><a href="/logout"
                        class="block text-sm px-2 py-4 text-black bg-green-500 font-semibold hover:text-green-500  transition duration-300">Logout</a>
                </li>
                @else
                @endif

            </ul>
        </div>
        <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
        </script>
    </nav>

</body>

</html>