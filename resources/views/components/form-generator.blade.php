@props(['repositories'])
@php
    $model = "\App\Repository\\$repositories";
	$model= new $model();
	$repositories = $model::formField();
@endphp
@foreach($repositories as $repository)
    @switch($repository)
        @case($repository['type']=="select2")
            <x-form-generator-component.select2 :repository="$repository"/>
            @break
        @case($repository['type']=="select")
            <x-form-generator-component.select :repository="$repository"/>
            @break
        @case($repository['type']=="textarea")
            <x-form-generator-component.textarea :repository="$repository"/>
            @break
        @case($repository['type']=="editor")
            <x-form-generator-component.editor :repository="$repository"/>
            @break
        @default
            <x-form-generator-component.input :repository="$repository"/>
    @endswitch
@endforeach
