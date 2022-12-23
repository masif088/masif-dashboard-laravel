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
                    ['route'=>'admin.dashboard','icon'=>'fa fa-eye','title'=>'Dashboard'],
                    ['link'=>'https://goolge.com','icon'=>'far fa-google','title'=>'Link'],
                ]
            ],
            [
                'title'=>'Example',
                'sub-link'=>[
                    ['route'=>'admin.form-example','icon'=>'fa fa-file-alt','title'=>'Form Example'],
                    ['route'=>'admin.table-example','icon'=>'fa fa-table','title'=>'Table Example'],
                ]
            ],
//            [
//                'title'=>'Finance',
//                'sub-link'=>[
//                    ['link'=>"#",'icon'=>'fa fa-eye','title'=>'RAB'],
//                    ['link'=>"#",'icon'=>'fa fa-file-alt','title'=>'SPJ'],
//                    ['link'=>"#",'icon'=>'fa fa-envelope','title'=>'Budget'],
//                    ['link'=>"#",'icon'=>'fa fa-envelope','title'=>'Gaji'],
//                ]
//            ]
        ];
        return view('layouts.masif-dashboard',compact('sidebar'));
    }
}
