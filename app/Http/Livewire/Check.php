<?php

namespace App\Http\Livewire;

use App\Repository\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Check extends Component
{
    use WithFileUploads;
    public $data;
    public $user;
    public $selectedA;
    public $a;
    public $chart;
    public function mount(){
        $this->chart=[
            'type'=>'line',
            'categories'=>['a','b','c','d','e'],
            'data'=> [
                [ 'label'=>'Asif' ,'value'=>[11,22,35,14,15]],
                [ 'label'=>'Amalia' ,'value'=>[15,14,32,21,11]],
            ]
        ];


        $this->a=[
            ['value'=>1,'title'=>'asdasd'],
            ['value'=>2,'title'=>'asdaaaasd'],
            ['value'=>3,'title'=>'asdaaaasd'],
            ['value'=>4,'title'=>'asdaaaasd'],
            ['value'=>5,'title'=>'asdaaaasd'],
            ['value'=>6,'title'=>'asdaaaasd'],
        ];

        $this->data=form_model(User::class,1);
//        $a['a']='aaa';
//        $v=explode('.','a.a');
////        dd($v);
//        dd(${$v[0]}[$v[1]]);
//        $this->data=User::create(['name' =>'', 'password' =>bcrypt('a'), 'email' =>'a@aaaa']);
//        dd($this->data);
    }
    public function create(){
        dd($this->data);
    }
    public function render()
    {
        return view('livewire.check');
    }
}
