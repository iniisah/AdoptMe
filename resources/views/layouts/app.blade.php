<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield("title")</title>
</head>
<body class="m-0 p-0">

    {{-- Navbar --}}
    @if(!request()->routeIs('login') && !request()->routeIs('register') && !request()->routeIs(patterns:'profile'))
        <x-navbar />
    @endif

    {{-- Jika halaman login atau register, tampilkan langsung konten --}}
    @if(request()->routeIs('login') || request()->routeIs('register'))
        @yield('content')
    @else
        <div class="flex min-h-screen">
            {{-- Sidebar --}}
            @if(request()->routeIs('dashboard') || request()->routeIs('pengelolaan'))
                <x-sidebar />
            @endif

            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    @endif

</body>
</html>
