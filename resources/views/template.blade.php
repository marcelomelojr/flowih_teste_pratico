<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    {{--    <script src="https://unpkg.com/@phosphor-icons/web"></script>--}}
    @yield('css')
    <title>{{ $title ?? 'Car' }}</title>
</head>
<body>
<header class="header  top-0  shadow-md flex items-center justify-between px-8 py-02 bg-red-500">
    <!-- logo -->
    <h1 class="w-3/12">
        <a href="{{ route('home') }}">
            <i class="ph ph-car text-4xl text-white"> <span class="font-bold font-sans text-white">Cars</span></i>
        </a>
    </h1>

    <!-- navigation -->
    <nav class="nav font-semibold text-lg">
        <ul class="flex items-center">
            <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-white duration-200 cursor-pointer active">
                <a href="{{ route('home') }}">Carros</a>
            </li>
            @auth()
                <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-white duration-200 cursor-pointer active">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            @endif
        </ul>
    </nav>

    <!-- buttons --->
    <div class="w-3/12 flex justify-end">
        @auth()
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button :href="route('logout')"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <i class="ph ph-user text-md text-white"> Logout</i>
                </button>
            </form>
        @else
            <div class="space-x-4">
                <a href="{{ route('login') }}">
                    <i class="ph ph-sign-in text-md text-white"> Login</i>
                </a>
                <a href="{{ route('register') }}">
                    <i class="ph ph-user-plus text-md text-white"> Registrar</i>
                </a>
            </div>

        @endauth

    </div>
</header>
<div class="container">
    @yield('content')
</div>
<div class="flex bg-black justify-center py-12 mt-4">

    <p class="text-white">Teste prático - Desenvolvedor Flowih</p>
</div>
@yield('js')
</body>
</html>
