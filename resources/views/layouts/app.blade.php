<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap"
      rel="stylesheet"
    />
</head>
@include('layouts.footer')
<body class="bg-gray-300">
    <nav class="p-6 bg-blue-900 flex justify-between">
        <ul class="flex items-center">
            <li><a href="/" class="p-3 text-white font-M">Home</a></li>
            <li><a href="{{ route('dashboard') }}" class="p-3 text-white font-M">Dashboard</a></li>
            <li><a href="{{route('posts')}}" class="p-3 text-white font-M">Posts</a></li>

        </ul>
        <div class="text-center">
            <p class="p-3 text-[40px] text-white text-center font-M">EXPORTIN</p>
        </div>

        <ul class="flex items-center">
                @auth
                    <li>
                        <a href="" class="p-3">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('register') }}" class="p-3 text-blue-900 bg-white rounded-3xl  font-M mx-2 ">Free Register</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="p-3 text-white font-M bg-sky-700 rounded-3xl mx-2">Login</a>
                    </li>
                @endguest
            </ul>
    </nav>
    @yield('content')
</body>

@yield('footer')

</html>
