@props(['repository'])

<div>
    @if($repository['title']!=null)
        <label class="block text-gray-500 text-sm font-bold mb-2 dark:text-light" for="username"">{{ $repository['title'] }}</label>
    @endif
    <select
        wire:model="data.{{ $repository['model'] }}"
        class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white">
        <option></option>
        @for($i=0;$i<count($repository['options']) ;$i++)
            <option value="{{$repository['options'][$i]['value']}}"
                    style="padding: 0 25px">
                {{$repository['options'][$i]['title']}} . {{$repository['options'][$i]['value']}}
            </option>
        @endfor
        @error( $repository['model'] ) <span class="error">{{ $message }}</span> @enderror
    </select>
</div>
