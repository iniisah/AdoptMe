<aside id="sidebar"
    class="fixed top-0 left-0 h-screen bg-gray-100 shadow-md p-4 transition-all duration-300 z-50 w-12 overflow-hidden"
    aria-label="Sidebar">
    <button id="toggleSidebarBtn" class="text-gray-700 mb-4 w-full">
        <img src="{{ asset('images/hamburger.png') }}" alt="Toggle Sidebar" class="h-6 w-6 ml-auto" />
    </button>

    <div id="sidebarContent" class="opacity-0 transition-opacity duration-300">
        <ul class="space-y-4 mt-4">
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
    </div>
</aside>
