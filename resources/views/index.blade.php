<x-masif-dashboard>
    <x-slot name="title">
        Title
    </x-slot>
    <x-slot name="subtitles">
        p,{{route('dashboard')}};
        cc,{{route('dashboard')}}
    </x-slot>
    <div class="mt-2">
        <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
            @for($i=0;$i<4;$i++)
                <div
                    class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker dark:shadow-none dark:border-primary dark:border shadow-soft-xl">
                    <div>
                        <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-lighter">
                            Value
                        </h6>
                        <span class="text-xl font-semibold">$30,000</span>
                        <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                            +4.4%
                        </span>
                    </div>
                    <div>
                        <i class="fa-solid fa-dollar-sign text-3xl text-primary-dark dark:text-primary-100"></i>
                    </div>
                </div>
            @endfor
        </div>

        <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-12">

            <div class="col-span-8 bg-white rounded-md dark:bg-darker shadow-soft-xl"
                 x-data="{ isOn: false }">
                <!-- Card header 1 -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-bold text-primary-dark dark:text-primary-light">Header 1</h4>
                </div>
                <!-- Card body 1 -->
                <div class="relative p-4 h-72">

                </div>
            </div>

            <div class="bg-white rounded-md dark:bg-darker col-span-4" x-data="{ isOn: false }">
                <!-- Card header 2 -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-bold text-primary-dark dark:text-primary-light">
                        Header 2
                    </h4>
                    <div class="flex items-center">

                    </div>
                </div>
                <!-- Card body 2 -->
                <div class="relative p-4 h-72">

                </div>
            </div>

            <div class="bg-white rounded-md dark:bg-darker col-span-4" x-data="{ isOn: false }">
                <!-- Card header 2 -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-bold text-primary-dark dark:text-primary-light">
                        Header 2
                    </h4>
                    <div class="flex items-center">

                    </div>
                </div>
                <!-- Card body 2 -->
                <div class="relative p-4 h-72">

                </div>
            </div>

            <div class="bg-white rounded-md dark:bg-darker col-span-4" x-data="{ isOn: false }">
                <!-- Card header 2 -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-bold text-primary-dark dark:text-primary-light">
                        Header 2
                    </h4>
                    <div class="flex items-center">

                    </div>
                </div>
                <!-- Card body 2 -->
                <div class="relative p-4 h-72">

                </div>
            </div>

            <div class="bg-white rounded-md dark:bg-darker col-span-4" x-data="{ isOn: false }">
                <!-- Card header 2 -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-bold text-primary-dark dark:text-primary-light">
                        Header 2
                    </h4>
                    <div class="flex items-center">

                    </div>
                </div>
                <!-- Card body 2 -->
                <div class="relative p-4 h-72">

                </div>
            </div>

        </div>
    </div>
</x-masif-dashboard>
