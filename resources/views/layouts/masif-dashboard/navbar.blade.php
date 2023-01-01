<!-- Navbar -->
<header class="relative">
    <div class="flex items-center justify-between p-4 border-b dark:border-primary">
        <!-- Mobile menu button -->
        <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
                class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
            <span class="sr-only">Open main menu</span>
            <span aria-hidden="true"><i class="fa-solid fa-bars"></i></span>
        </button>

        <button
            class="inline-block text-l font-bold tracking-wider uppercase text-primary-dark dark:text-primary-light">
            <ol class="list-reset flex">
                <li>
                    <a class="text-primary-dark font-bold dark:text-primary-light opacity-50" href="#">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                @isset($subtitles)
                    @foreach(explode(';',$subtitles) as $st)
                        @php($link=explode(',',$st))
                        <li>
                            <a class="text-primary-dark font-bold dark:text-primary-light opacity-50"
                               href="{{ $link[1] }}">{{ $link[0] }}</a>
                        </li>
                        <li><span class="text-gray-500 mx-2">/</span></li>
                    @endforeach
                @endisset
                <li class="text-primary-darker font-bold dark:text-primary-lighter">{{ $title }}</li>
            </ol>
        </button>

        <!-- Mobile sub menu button -->
        <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
                class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
            <span class="sr-only">Open sub menu</span>
            <span aria-hidden="true">
                            <img alt="Ahmed Kamel" class="w-10 h-10 rounded-full"
                                 src="masif-dashboard/images/avatar.jpg"/>
                        </span>
        </button>

        <!-- Desktop Right buttons -->
        <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
            <!-- Toggle dark theme button -->
            <button
                aria-hidden="true"
                class="p-2 transition-colors duration-200 text-primary hover:text-primary-lighter dark:hover:text-light focus:outline-none"
                x-cloak>
                {{--                <div :class="{ 'translate-x-0 -translate-y-px': !isDark }">--}}
                {{--                    <i class="fa-solid fa-moon text-xl" x-show="isDark"></i>--}}
                {{--                    <i class="fa-solid fa-sun text-xl" x-show="!isDark"></i>--}}
                {{--                </div>--}}
                <label class="swap swap-rotate" @click="toggleTheme">
                    <!-- this hidden checkbox controls the state -->
                    <input type="checkbox" style="display: none" @click="toggleTheme" id="sunMoon"/>
                    <i class="swap-on fa-solid fa-moon text-xl"></i>
                    <i class="swap-off fa-solid fa-sun text-xl"></i>
                </label>
            </button>


            <!-- Settings button -->
            <button @click="openSettingsPanel"
                    class="p-2 transition-colors duration-200 text-primary hover:text-primary-lighter dark:hover:text-light focus:outline-none ">
                <span class="sr-only">Open settings panel</span>
                <i class="fa-solid fa-gear text-xl"></i>
            </button>

            <!-- User avatar button -->
            <div class="relative" x-data="{ open: false }">
                <button :aria-expanded="open ? 'true' : 'false'"
                        @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })"
                        aria-haspopup="true"
                        class="flex transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100"
                        type="button">
                    <img alt="Ahmed Kamel" class="w-10 h-10 rounded-full"
                         src="masif-dashboard/images/avatar.jpg"/>
                    <div class="ml-2 h-10 align-top ">
                        <div class="text-left text-md font-bold">Masif</div>
                        <div class="text-left text-sm">Super admin</div>
                    </div>
                </button>

                <!-- User dropdown menu -->
                <div @click.away="open = false"
                     @keydown.escape="open = false"
                     aria-label="User menu"
                     aria-orientation="vertical"
                     class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-darker focus:outline-none dark:shadow-soft-light-sm"
                     role="menu"
                     tabindex="-1"
                     x-ref="userMenu"
                     x-show="open"
                     x-transition:enter="transition-all transform ease-out"
                     x-transition:enter-end="translate-y-0 opacity-100"
                     x-transition:enter-start="translate-y-1/2 opacity-0"
                     x-transition:leave="transition-all transform ease-in"
                     x-transition:leave-end="translate-y-1/2 opacity-0"
                     x-transition:leave-start="translate-y-0 opacity-100">
                    <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                       href="#" role="menuitem">
                        Your Profile
                    </a>
                    <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                       href="#" role="menuitem">
                        Settings
                    </a>
                    <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                       href="#" role="menuitem">
                        Logout
                    </a>
                </div>
            </div>
        </nav>

        <!-- Mobile sub menu -->
        <nav @click.away="isMobileSubMenuOpen = false"
             aria-label="Secondary"
             class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden align-middle"
             x-show="isMobileSubMenuOpen"
             x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
             x-transition:enter-end="translate-y-0 opacity-100"
             x-transition:enter-start="-translate-y-full opacity-0"
             x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
             x-transition:leave-end="-translate-y-full opacity-0"
             x-transition:leave-start="translate-y-0 opacity-100">
            <div class="space-x-2">
                <!-- Toggle dark theme button -->
                <button @click="toggleTheme" aria-hidden="true"
                        class="relative focus:outline-none align-middle" x-cloak>
                    <div
                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter"></div>
                    <div
                        :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }"
                        class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm">
                        <i class="fa-solid fa-moon text-m w-4 h-4" x-show="isDark"></i>
                        <i class="fa-solid fa-sun text-m w-4 h-4" x-show="!isDark"></i>

                    </div>

                </button>

                <!-- Settings button -->
                <button @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                        class="p-2 transition-colors duration-200 rounded-full text-primary-lighter hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker align-middle">
                    <i class="fa-solid fa-gear text-xl"></i><span class="text-sm">Setting</span>
                </button>
            </div>

            <!-- User avatar button -->
            <div class="relative ml-auto" x-data="{ open: false }">
                <button
                    :aria-expanded="open ? 'true' : 'false'"
                    @click="open = !open"
                    aria-haspopup="true"
                    class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100"
                    type="button"
                >
                    <span class="sr-only">User menu</span>
                    <img alt="Ahmed Kamel" class="w-10 h-10 rounded-full"
                         src="masif-dashboard/images/avatar.jpg"/>
                </button>

                <!-- User dropdown menu -->
                <div @click.away="open = false"
                     aria-label="User menu"
                     aria-orientation="vertical"
                     class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
                     role="menu"
                     x-show="open"
                     x-transition:enter="transition-all transform ease-out"
                     x-transition:enter-end="translate-y-0 opacity-100"
                     x-transition:enter-start="translate-y-1/2 opacity-0"
                     x-transition:leave="transition-all transform ease-in"
                     x-transition:leave-end="translate-y-1/2 opacity-0"
                     x-transition:leave-start="translate-y-0 opacity-100">
                    <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                       href="#" role="menuitem">
                        Your Profile
                    </a>
                    <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                       href="#" role="menuitem">
                        Settings
                    </a>
                    <a class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary"
                       href="#" role="menuitem">
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Mobile main manu -->
    <div @click.away="isMobileMainMenuOpen = false"
         class="border-b md:hidden dark:border-primary-darker"
         x-show="isMobileMainMenuOpen">
        <nav aria-label="Main" class="px-2 py-4 space-y-2">
            <!-- Dashboards links -->
            @php($menu = ['file','image','eye'])
            @foreach($menu as $m)
                <div x-data="{ isActive: true, open: true}">
                    <a class="block flex pr-2 pl-1 text-sm text-gray-400 transition-all text-primary-light duration-200 rounded-md dark:text-light hover:text-gray-700 rounded-md  transition-all transition ease-in-out hover:-translate-y-1"
                       href="#" role="menuitem">
                        <span
                            class="bg-gradient-to-tl from-primary to-secondary mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa fa-{{ $m }} text-md text-white"></i>
                        </span>
                        <span class="flex ml-1 align-middle inline-block p-1 font-bold ">{{ $m }}</span>
                    </a>
                </div>
            @endforeach
        </nav>
    </div>
</header>
