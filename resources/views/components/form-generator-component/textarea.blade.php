@props(['repository'])
<div>
    @isset($repository['title'])
    <label class="block text-gray-500 text-sm font-bold mb-2 dark:text-light" for="username">
        {{ $repository['title'] }}
    </label>
    @endisset
    <textarea @isset($repository['placeholder']) placeholder="{{ $repository['placeholder'] }}" @endisset
    @isset($repository['required']) required @endisset
    wire:model="{{'data.'.$repository['model']}}"
              rows="5"
    class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white">
    </textarea>
    @error('data.'.$repository['model']) <span class="text-danger">{{ $message }}</span> @enderror
</div>
