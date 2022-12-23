@php
    use App\Models\User;
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


        <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-12">
            <div class="col-span-12 bg-white rounded-md dark:bg-darker shadow-soft-xl p-5">
                @livewire('table.main',['name' => 'Example'])
            </div>
        </div>
    </div>


</x-masif-dashboard>
