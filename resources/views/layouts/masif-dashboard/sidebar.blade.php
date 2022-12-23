<!-- Sidebar -->
<aside :class="{ '-ml-64': !sidebarOpen }"
       class="flex-shrink-0 hidden w-64 rounded-md p-4 dark:bg-dark md:block transition-all duration-1000">

    <div class="flex flex-col h-full">
        <div class="px-2 py-4">
            <h1 class="text-2xl font-bold inline-block tracking-wider uppercase text-primary-dark dark:text-light">
                Logo disini
            </h1>
        </div>

        <!-- Sidebar links -->
        <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
            <!-- Dashboards links -->
            <div x-data="{ isActive: true, open: true}">
                @foreach($sidebar as $m)
                    <h1 class="font-bold dark:text-light text-primary mt-4">{{ $m['title'] }}</h1>
                    @foreach($m['sub-link'] as $link)
                        <div aria-label="Dashboards" class="mt-3 space-y-4 px-2" role="menu" x-show="open">
                            <a class="dark:border-darker  dark:border dark:hover:shadow-soft-light-sm
                                shadow-soft-3xl hover:shadow-soft-sm
                                block flex p-2 text-sm transition-all duration-200
                                dark:hover:text-light hover:text-gray-700  rounded-md  transition-all transition ease-in-out
                                 hover:bg-primary-100  dark:hover:bg-primary hover:-translate-y-1
                                {{ isset($link['route']) && (Route::currentRouteName()== $link['route']) ?'bg-primary-100  dark:bg-primary dark:text-light text-gray-700' : 'text-primary-light bg-white dark:bg-darker ' }}"
                               href="{{ isset($link['route'])?isset($link['params'])?route($link['route'],$link['params']):route($link['route']):$link['link']  }}"
                               role="menuitem">
                                <span
                                    class="bg-gradient-to-tl from-primary to-primary-lighter mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="{{ $link['icon'] }} text-md text-white"></i>
                                </span>
                                <span class="flex ml-1 align-middle inline-block p-1 font-bold ">
                                    {{ $link['title'] }}
                                </span>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </nav>
    </div>
</aside>
