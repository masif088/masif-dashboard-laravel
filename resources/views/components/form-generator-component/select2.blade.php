@props(['repository'])
<div wire:ignore>
    <label for="{{'data'.$repository['model']}}"
           class="block text-gray-500 text-sm font-bold mb-2 dark:text-light" for="username">
        {{ $repository['title'] }}
    </label>
    <select id="{{'data'.$repository['model']}}"
            class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white select2"
            multiple=""
            name="{{ $repository['model'] }}"
            style="padding:0  100px" wire:model="{{'data.'.$repository['model']}}">
        @for($i=0;$i<count($repository['options']) ;$i++)
            <option value="{{$repository['options'][$i]['value']}}"
                    style="padding: 0 25px">
                {{$repository['options'][$i]['title']}} . {{$repository['options'][$i]['value']}}
            </option>
        @endfor
    </select>
    <script>
        document.addEventListener('livewire:load', function () {
            let data;
            $('#{{'data'.$repository['model']}}').select2();
            $('#{{'data'.$repository['model']}}').on('change', function (e) {
                data = $('#{{'data'.$repository['model']}}').select2("val");
                @this.set('{{'data.'.$repository['model']}}', data);
            })
        });
    </script>
</div>
