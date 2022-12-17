@props(['repositories'])

@foreach($repositories as $repository)
    @switch($repository)
        @case($repository['type']=="select2")
            <x-form-generator-component.select2 :repository="$repository" />
            @break
        @case($repository['type']=="select")
            <x-form-generator-component.select :repository="$repository" />
            @break
        @default
            <x-form-generator-component.input :repository="$repository"/>
    @endswitch
@endforeach
