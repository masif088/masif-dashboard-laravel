<div>
    <div class="grid grid-cols-1 gap-3 p-4 lg:grid-cols-2 xl:grid-cols-2">
        <div class="flex items-center">
            <span>
            Per Page: &nbsp;
            <select wire:model="perPage"
                    class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white"
                    style="">
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
            </span>

        </div>
        {{--        {{dd($searchable)}}--}}
        @if($searchable)
            <div class="float-right top-2">
                <br>
                <input wire:model="search"
                       class="text-dark bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white"
                       type="text" placeholder="Pencarian...">
            </div>
        @endif

    </div>
    <div class="grid grid-cols-1 gap-3 p-4 lg:grid-cols-1 xl:grid-cols-1">
        <div class="overflow-x-auto relative ">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded">
                <thead class=" text-md text-uppercase text-gray-700 uppercase dark:bg-dark dark:text-white text-bold">
                <tr class="border-b border-primary">
                    @foreach($model::tableField() as $field)
                        <th class="py-2 px-6">
                            <a @isset($field['sort']) wire:click.prevent="sortBy('{{ $field['sort'] }}')"
                               @endisset role="button" href="#">
                                {{$field['label']}} @isset($field['sort'])
                                    @include('components.data-table-component.sort-icon', ['field' => $field['sort']])
                                @endif
                            </a>
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach ($datas as $index=>$data)
                    <tr class=" dark:text-white text-black @if($index%2!=0) bg-gray-300 dark:bg-primary-darker @endif">
                        @foreach ($model::tableData($data) as $data)
                            @switch($data['type'])
                                @case('index')
                                    <td class="py-2 px-6">{{ $index+1 + ($page-1)*$perPage }}</td>
                                    @break
                                @case('string')
                                    <td class="py-2 px-6">{{ $data['data'] }}</td>
                                    @break
                                @case('thousand_format')
                                    <td class="py-2 px-6">{{ thousand_format($data['data']) }}</td>
                                    @break
                                @case('raw_html')
                                    <td class="py-2 px-6">{!! $data['data'] !!}</td>
                                    @break
                                @case('img')
                                    <td class="py-2 px-6">
                                        <img src="{{ $data['data'] }}" alt=""
                                             style="{{ isset($data['width'])?'width:'.$data['width'].';':'' }}
                                             {{ isset($data['height'])?'height:'.$data['height'].';':'' }}">
                                    </td>
                                    @break
                                @case('action')
                                    <td class="py-2 px-6">
                                        @foreach($data['data'] as $action)
                                            @isset($action['link'])
                                                <a href='{{ $action['link'] }}'
                                                   class="bg-primary hover:bg-primary-dark text-white font-bold px-3 rounded m-1">
                                                    @isset($action['icon'])
                                                        <i class="{{ $action['icon'] }}"></i>
                                                    @endisset
                                                    {{ $action['title'] }}
                                                </a>
                                            @endisset
                                            @isset($action['live'])
                                                <a href='#' wire:click.prevent='{{$action['live']}}'
                                                   class="bg-primary hover:bg-primary-dark text-white font-bold px-3 rounded m-1">
                                                    {{ $action['title'] }}
                                                </a>
                                            @endisset
                                        @endforeach
                                    </td>
                                    @break
                            @endswitch
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="table_pagination" class="py-3">
            {{ $datas->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>
</div>

