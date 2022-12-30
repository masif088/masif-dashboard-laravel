@props(['repository'])
<div>
    @isset($repository['title'])
    <label class="block text-gray-500 text-sm font-bold mb-2 dark:text-light" for="username">
        {{ $repository['title'] }}
    </label>
    @endisset
    <input
        type="{{ $repository['type'] }}"
        @isset($repository['placeholder']) placeholder="{{ $repository['placeholder'] }}" @endisset
    @isset($repository['required']) @if($repository['required']) required @endif @endisset
    @isset($repository['step']) step="{{ $repository['step'] }}" @else step="any" @endisset
    @isset($repository['accept']) accept="{{ $repository['accept'] }}" @endisset
    wire:model="{{'data.'.$repository['model']}}"
        name="{{ $repository['model'] }}"
    class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white"
    >
    @if($repository['type']=="file")
    <div wire:loading wire:target="{{ 'data.'.$repository['model'] }}">
        Proses upload
    </div>
    @endif

    @error('data.'.$repository['model']) <span class="text-danger">{{ $message }}</span> @enderror
</div>

