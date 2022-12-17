<x-data-table :model="$datas" :searchable="$searchable">
    <x-slot name="head">
        <tr class="border-b border-primary">

{{--            <th><a wire:click.prevent="sortBy('school_id')" role="button" href="#">--}}
{{--                    Sekolah @include('components.sort-icon', ['field' => 'school_id'])--}}
{{--                </a></th>--}}
{{--            <th><a wire:click.prevent="sortBy('title')" role="button" href="#">--}}
{{--                    Judul @include('components.sort-icon', ['field' => 'title'])--}}
{{--                </a></th>--}}
{{--            <th>Jumlah</th>--}}
{{--            <th>Aksi</th>--}}
            <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID @include('components.data-table-component.sort-icon', ['field' => 'id'])
                </a>
            </th>

        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($datas as $index=>$data)
            <tr class=" dark:text-white text-black @if($index%2!=0) bg-gray-300 dark:bg-primary-darker @endif">
                @foreach (\App\Repository\User::tableData($data) as $index=>$data)
                <td class="py-2 px-6">{{ $data['data']=='index'?$index+1 + ($page-1)*$perPage:$data['data'] }}</td>
                @endforeach
{{--                <td class="py-2 px-6">{{ $data->name }}</td>--}}
{{--                <td class="py-2 px-6">{{ $data->email }}</td>--}}
{{--                <td class="py-2 px-6">{{ $data->role }}</td>--}}
            </tr>
        @endforeach

                <tr class=" dark:text-white text-black @if($index%2!=0) bg-gray-300 dark:bg-primary-darker @endif">
                    <td class="py-2 px-6">{{ $index+1 + ($page-1)*$perPage }}</td>
                    <td class="py-2 px-6">{!! $data['data'] !!}</td>
{{--                    <td class="py-2 px-6">{{ $data->email }}</td>--}}
{{--                    <td class="py-2 px-6">{{ $data->role }}</td>--}}
                </tr>

    </x-slot>
</x-data-table>

