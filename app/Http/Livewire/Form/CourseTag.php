<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class CourseTag extends Component
{
    public $data;
    public function create(){
        \App\Repository\CourseTag::create($this->data);
    }
    public function render()
    {
        return view('livewire.form.course-tag');
    }
}
