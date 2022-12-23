<?php

namespace App\Http\Livewire\Form;

use App\Repository\Example as Repository;
use Livewire\Component;

class Example extends Component
{
    public $data;
    public $dataId; // for update and pre value
    public $action; // for check action

    public function mount(){
        $this->data=form_model(Repository::class,$this->dataId);
    }
    public function create(){
        Repository::create($this->data);
    }
    public function update(){
        Repository::find($this->dataId)->update($this->data);
    }

    public function render()
    {
        return view('livewire.form.example');
    }
}
