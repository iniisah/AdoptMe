<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield("title")</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

</head>
<body class="m-0 p-0 overflow-x-hidden">

    {{-- Sidebar selalu ada --}}
    @if(request()->routeIs('dashboard') || request()->routeIs('pengelolaan'))
        <x-sidebar />
    @endif

    {{-- Wrapper konten utama --}}
    <div id="mainContent" class="transition-all duration-300 {{ request()->routeIs('login') || request()->routeIs('register') ? 'pl-0' : 'pl-12' }}">

        {{-- Navbar --}}
        @if(!request()->routeIs('login') && !request()->routeIs('register') && !request()->routeIs(patterns:'profile'))
            <x-navbar />
        @endif

        {{-- Konten --}}
        @if(request()->routeIs('login') || request()->routeIs('register'))
            @yield('content')
        @else
            <main class="p-6">
                @yield('content')
            </main>
        @endif

    </div>

    {{-- Script toggle sidebar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const sidebarContent = document.getElementById('sidebarContent');
            const toggleBtn = document.getElementById('toggleSidebarBtn');
            const mainContent = document.getElementById('mainContent');

            let isExpanded = false;

            toggleBtn?.addEventListener('click', () => {
                isExpanded = !isExpanded;

                sidebar.classList.toggle('w-12', !isExpanded);
                sidebar.classList.toggle('w-64', isExpanded);

                sidebarContent.classList.toggle('opacity-0', !isExpanded);
                sidebarContent.classList.toggle('opacity-100', isExpanded);

                mainContent.classList.toggle('pl-12', !isExpanded);
                mainContent.classList.toggle('pl-64', isExpanded);
            });
        });
    </script>
    
    @if(!request()->routeIs('login'))
        <x-footer />
    @endif

</body>
</html>