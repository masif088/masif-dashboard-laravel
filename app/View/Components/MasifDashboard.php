<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MasifDashboard extends Component
{

    public function render()
    {
        $sidebar = [
            [
                'title'=>'General',
                'sub-link'=>[
                    ['link'=>'dashboard','icon'=>'fa fa-eye','title'=>'Dashboard'],
                    ['link'=>'dashboard','icon'=>'fa fa-file-alt','title'=>'Document'],
                    ['link'=>'www.google.com','icon'=>'fa fa-envelope','title'=>'Mail'],
                ]
            ],
            [
                'title'=>'Finance',
                'sub-link'=>[
                    ['link'=>"#",'icon'=>'fa fa-eye','title'=>'RAB'],
                    ['link'=>"#",'icon'=>'fa fa-file-alt','title'=>'SPJ'],
                    ['link'=>"#",'icon'=>'fa fa-envelope','title'=>'Budget'],
                    ['link'=>"#",'icon'=>'fa fa-envelope','title'=>'Gaji'],
                ]
            ]
        ];
        return view('layouts.masif-dashboard',compact('sidebar'));
    }
}
