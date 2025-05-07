<aside id="sidebar" class="w-64 bg-white shadow-md p-6 sticky top-0 h-screen hidden md:block z-50">
    <ul class="space-y-4">
        <li>
            <a href="{{ route('dashboard') }}"
               class="block {{ request()->is('dashboard') ? 'text-blue-600 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('pengelolaan') }}"
               class="block {{ request()->is('kelola') ? 'text-blue-600 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">
                Kelola
            </a>
        </li>
    </ul>
</aside>
