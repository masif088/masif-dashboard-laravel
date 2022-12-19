<form wire:submit.prevent="create" >
    <x-form-generator :repositories="\App\Repository\CourseTag::formField()"/>
    <br>
    <x-form-button/>
</form>
