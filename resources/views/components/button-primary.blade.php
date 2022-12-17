@props(['link'=>'#', 'title'=>'No title'])
<a href='{{ $link }}' {{ isset($live)?'wire:click.prevent='.$live:'' }} class='rounded-sm bg-primary px-4 py-1.5 text-base font-semibold  text-white border-primary border border-2 hover:bg-primary-light'>
    {{ $title }}
</a>
