@php
    use App\Models\User;use Carbon\Carbon;
$a=new \App\Repository\User();
@endphp
<x-masif-dashboard>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <x-slot name="subtitles">
        Data,{{route('admin.dashboard')}}
    </x-slot>
    <div class="mt-2">

        <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">

            <div
                class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker dark:shadow-none dark:border-primary dark:border shadow-soft-xl">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-lighter">
                        Users
                    </h6>
                    <span class="text-xl font-semibold">
{{--                        {{ User::getCountUser() }}--}}
                    </span>
                    <span
                        class="inline-block px-2 py-px ml-2 text-xs rounded-md">
{{--                            {{ User::getIncreaseUser() }}%--}}
                        </span>
                </div>
                <div>
                    <i class="fa-solid fa-users text-3xl text-primary-dark dark:text-primary-100"></i>
                </div>
            </div>

            <div
                class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker dark:shadow-none dark:border-primary dark:border shadow-soft-xl">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-lighter">
                        Users
                    </h6>
                    <span class="text-xl font-semibold">
{{--                        {{ User::getCountUser() }}--}}
                    </span>
                    <span
                        class="inline-block px-2 py-px ml-2 text-xs  rounded-md">
{{--                            {{ User::getIncreaseUser() }}%--}}
                        </span>

                </div>

                <div>
                    <i class="fa-solid fa-users text-3xl text-primary-dark dark:text-primary-100"></i>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-12">
            <div class="col-span-8 bg-white rounded-md dark:bg-darker shadow-soft-xl p-5">
                <div class="text-5xl font-bold text-primary dark:text-primary-light float-left">
                    Selamat Datang
                </div>
                <br>
                <br>
                <div class="text-xl font-bold text-primary dark:text-primary-light float-left">
                    Ingin belajar apa kamu hari ini
                </div>
                <img src="{{ asset('masif-dashboard/images/ilustration-1.png') }}" class="float-right"
                     style="width: 80%" alt="">
                <br>
            </div>
            <div class="col-span-4 bg-white rounded-md dark:bg-darker shadow-soft-xl p-5">

                @php $events=[
	['title'=>'Yesterday Event ','date'=>Carbon::now()->subDay()],
	['title'=>'This Day Event 1','date'=>Carbon::now()],
	['title'=>'This Day Event 2','date'=>Carbon::now()->addHour()],
	['title'=>'Tomorrow Event 1','date'=>Carbon::now()->addDay()],
	['title'=>'Tomorrow Event 2','date'=>Carbon::now()->addDay()],
] @endphp
                <x-calendar :events="$events"/>
            </div>


        </div>

        <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-12">


            <div class="col-span-8 bg-white rounded-md dark:bg-darker shadow-soft-xl"
                 x-data="{ isOn: false }">
                <!-- Card header 1 -->

                {{--                <textarea>Next, use our Get Started docs to setup Tiny!</textarea>--}}
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-bold text-primary-dark dark:text-primary-light">Header 1</h4>
                </div>
                <!-- Card body 1 -->
                <div class="relative p-4">
                    @php
                        $chart1=[
							'type'=>'line',
							'categories'=> ["January","February","March","April","May","June","July",
							"August","September","October","November","December"],
							'data'=> [
								[ 'label'=>'income' ,'value'=>[11,22,35,14,15,11,22,35,14,15,20,22]],
								[ 'label'=>'outcome' ,'value'=>[15,14,32,21,11,14,32,21,14,32,14,32]],
							]
						];
                    @endphp
                    <x-chart :chart="$chart1"/>

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
                <div class="relative p-4 ">
                    @php
                        $chart2=[
							'type'=>'pie',
							'categories'=>['Food','Drink'],
							'data'=> [120,220]
						];
                    @endphp
                    <x-chart :chart="$chart2"/>
                </div>

            </div>

            <div class="col-span-12 dark:bg-darker bg-white rounded-md shadow-soft-xl">
                @livewire('table.main',['name'=>'User'])
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
