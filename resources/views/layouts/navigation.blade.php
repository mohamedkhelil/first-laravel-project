<nav x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-50">
    <!-- Desktop Sidebar -->
    <div :class="{'w-64': sidebarOpen, 'w-20': !sidebarOpen}" 
         class="hidden sm:flex flex-col bg-white border-r border-gray-200 transition-all duration-300 ease-in-out">
        
        <!-- Sidebar Header -->
        <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200">
            <div v-show="sidebarOpen" class="flex items-center space-x-2">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-8 w-auto fill-current text-gray-800" />
                </a>
            </div>
            <button @click="sidebarOpen = !sidebarOpen" 
                    class="p-1 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 transition">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="sidebarOpen ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7'" />
                </svg>
            </button>
        </div>

        <!-- User Profile Section -->
        <div class="px-4 py-6 border-b border-gray-200">
            <div v-show="sidebarOpen" class="space-y-3">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-800 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Links -->
        <div class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center space-x-3 px-3 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-indigo-100 text-indigo-700' : 'text-gray-700 hover:bg-gray-100' }} transition">
                <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l4-4m0 0l4 4m-4-4V5" />
                </svg>
                <span v-show="sidebarOpen" class="text-sm font-medium">Dashboard</span>
            </a>

            <a href="{{ route('tasks.index') }}" 
               class="flex items-center space-x-3 px-3 py-2 rounded-lg {{ request()->routeIs('tasks.*') ? 'bg-indigo-100 text-indigo-700' : 'text-gray-700 hover:bg-gray-100' }} transition">
                <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span v-show="sidebarOpen" class="text-sm font-medium">Tasks</span>
            </a>
        </div>

        <!-- Sidebar Footer -->
        <div class="px-4 py-4 border-t border-gray-200 space-y-2">
            <a href="{{ route('profile.edit') }}" 
               class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span v-show="sidebarOpen" class="text-sm font-medium">Settings</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span v-show="sidebarOpen" class="text-sm font-medium">Logout</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Mobile Top Bar -->
    <div class="flex-1 flex flex-col sm:hidden">
        <div class="flex items-center justify-between h-16 bg-white border-b border-gray-200 px-4">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-8 w-auto fill-current text-gray-800" />
            </a>
            <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Sidebar -->
        <div v-show="sidebarOpen" class="fixed inset-0 bg-black/50 z-40 sm:hidden" @click="sidebarOpen = false"></div>
        <div :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" 
             class="fixed inset-y-0 left-0 w-64 bg-white transform transition ease-in-out duration-300 z-50 sm:hidden overflow-y-auto">
            
            <div class="px-4 py-6 space-y-4">
                <!-- User Profile -->
                <div class="pb-4 border-b border-gray-200">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <!-- Links -->
                <a href="{{ route('dashboard') }}" @click="sidebarOpen = false"
                   class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">Dashboard</a>
                <a href="{{ route('tasks.index') }}" @click="sidebarOpen = false"
                   class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">Tasks</a>
                <a href="{{ route('profile.edit') }}" @click="sidebarOpen = false"
                   class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">Settings</a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
