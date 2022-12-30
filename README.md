# Laravel 9 + Masif Dashboard + Jetstream + Livewire + Custom Component

***

## I'm lazy that's why I made this convenience

[//]: # ([![contributions welcome]&#40;https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat&#41;]&#40;https://github.com/nyancodeid/laravel-8-stisla-jetstream/issues&#41;)

Masif dashboard have base design from [kwd-dashboard](https://github.com/Kamona-WD/kwd-dashboard).
<br>
Component data-table inspire from [laravel-8-stisla-jetstream
](https://github.com/nyancodeid/laravel-8-stisla-jetstream)
<br>


***

## Inside

- Laravel ^9.45.1 - [laravel.com/docs/9.x](https://laravel.com/docs/9.x)
- Laravel Jetstream ^2.12 - [jetstream.laravel.com](https://jetstream.laravel.com/)
- Livewire ^2.5 - [laravel-livewire.com](https://laravel-livewire.com)
- Masif Dashboard ^2.3.0 - [masif088](https://github.com/masif088/kwd-dashboard-asif)
- Custom Component [ Chart | Form Generator | Data Table ]

***

## Look

![](https://github.com/masif088/masif-dashboard-laravel/blob/main/public/masif-dashboard/asset/img1.png?raw=true)   |   ![](https://github.com/masif088/masif-dashboard-laravel/blob/main/public/masif-dashboard/asset/img2.png?raw=true)
:---:|:---:
![](https://github.com/masif088/masif-dashboard-laravel/blob/main/public/masif-dashboard/asset/img3.png?raw=true)   |   ![](https://github.com/masif088/masif-dashboard-laravel/blob/main/public/masif-dashboard/asset/img4.png?raw=true)

***

## Install

After clone or download this repository, next step is install all dependency required by laravel and vite.

```shell
# install composer-dependency
$ composer install
# install npm package
$ npm install
```

Before we start web server make sure we already generate app key, configure `.env` file and do migration.

```shell
# create copy of .env
$ cp .env.example .env
# create laravel key
$ php artisan key:generate
# laravel migrate
$ php artisan migrate
# laravel link up storage files
$ php artisan storage:link
```

We need 2 terminal tab for running laravel and vite.

```shell
# run laravel 
$ php artisan serve
# run vite on another terminal
$ npm run dev
```

***

## Use

Create mirror file from Models then extend them and implement Repository. <br>
This class for preparation on view
<br>
for more explain read below

```php
<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;

class Example extends \App\Models\Example implements Repository {

    public static function formRules(): array
    {
        return [
            "data.text"           => 'required|max:255',
            'data.number'         => 'required',
            'data.password'       => 'required',
            'data.email'          => 'required',
            'data.file'           => 'required|mimes:jpg,png,jpeg',
            'data.time'           => 'required',
            'data.date'           => 'required',
            'data.datetime-local' => 'required',
            'data.select2'        => 'required',
            'data.select'         => 'required',
            'data.textarea'       => 'required',
            'data.editor'         => 'required',
        ];
    }

    public static function formMessages(): array
    {
        return [];
    }


    public static function formField($params = null): array
    {

        /**
         * title      : label of input
         * model      : name of column
         * required   : name of column
         */

        /**
         * type of input on this version :
         * text => tag input with type text
         * number => tag input with type number for integer and double
         * email => tag input with type email
         * password => tag input with type password
         * file => tag input with type file
         * date => tag input with type date
         * time => tag input with type time
         * datetime-local => tag input with type datetime-local
         * select => tag select with option inside
         * select2 => tag select with custom for multiple choice with option inside
         * textarea => tag textarea
         * editor => tag textarea with custom for "what you see is what you get" (WYSIWYG)
         */
        return [
            [
                'type'        => 'text', //required|string
                'title'       => 'text', //option
                'model'       => 'text', //required|string
                'required'    => false, //option|default:false|enum:[true|false]
                'placeholder' => 'placeholder', //option|string
            ],
            [
                'type'        => 'number', //required|string
                'title'       => 'number', //option
                'model'       => 'number', //required|string
                'required'    => false, //option|default:false|enum:[true|false]
                'placeholder' => 'placeholder', //optional|string
                'step'        => '0.2' //option|default:any
            ],
            [
                'type'        => 'email', //required|string
                'title'       => 'email', //option
                'model'       => 'email', //required|string
                'required'    => false, //option|default:false|enum:[true|false]
                'placeholder' => 'placeholder', //option|string
            ],
            [
                'type'        => 'password', //required|string
                'title'       => 'password', //option
                'model'       => 'password', //required|string
                'required'    => false, //option|default:false|enum:[true|false]
                'placeholder' => 'placeholder', //option|string
            ],
            [
                'type'        => 'file', //required|string
                'title'       => 'file', //option
                'model'       => 'file', //required|string
                'required'    => false, //option|default:false|enum:[true|false]
                'placeholder' => 'placeholder', //optional|string
                'accept'      => 'image/*' //option|default:any|enum:[file_extension|audio/*|video/*|image/*|media_type]
            ],
            [
                'type'        => 'date', //required|string
                'title'       => 'date', //option
                'model'       => 'date', //required|string
                'required'    => false, //option|default:false|enum:[true|false]
                'placeholder' => 'placeholder', //option|string
            ],
            [
                'type'        => 'time', //required|string
                'title'       => 'time', //option
                'model'       => 'time', //required|string
                'required'    => false, //option|default:false|enum:[true|false]
                'placeholder' => 'placeholder', //option|string
            ],
            [
                'type'        => 'datetime-local', //required|string
                'title'       => 'datetime-local', //option|string
                'model'       => 'datetime-local', //required|string
                'required'    => false, //option|default:false|enum:[true|false]
                'placeholder' => 'placeholder', //option|string
            ],
            [
                'type'    => 'select', //required|string
                'title'   => 'select', //option|string
                'model'   => 'select', //required|string
                'options' => [ // required|array[value,title]
                               ['value' => 1, 'title' => 'option1'],
                               ['value' => 2, 'title' => 'option2'],
                               ['value' => 3, 'title' => 'option3'],
                               ['value' => 4, 'title' => 'option4'],
                               ['value' => 5, 'title' => 'option5'],
                               ['value' => 6, 'title' => 'option6'],
                ],
            ],
            [
                'type'    => 'select2', //required|string
                'title'   => 'select2', //option|string
                'model'   => 'select2', //required|string
                'options' => [ // required|array[value,title]
                               ['value' => 1, 'title' => 'option1'],
                               ['value' => 2, 'title' => 'option2'],
                               ['value' => 3, 'title' => 'option3'],
                               ['value' => 4, 'title' => 'option4'],
                               ['value' => 5, 'title' => 'option5'],
                               ['value' => 6, 'title' => 'option6'],
                ],

            ],
            [
                'type'        => 'textarea', //required|string
                'title'       => 'textarea', //option
                'model'       => 'textarea', //required|string
                'required'    => false, //option|default:false|enum:[true|false]
                'placeholder' => 'placeholder', //option|string
            ],
            [
                'type'        => 'editor', //required|string
                'title'       => 'editor', //option
                'model'       => 'editor', //required|string
            ],
        ];
    }

    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query() // ->where()  // if have specific where on default
            : static::where('text', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')
                ->orWhereHas('relation',function($q) use ($query){
                    $q->where('columnName', 'like', '%' . $query . '%')
                });
    }

    public static function tableView(): array
    {
        return [
            'searchable' => true,
        ];
    }

    public static function tableField(): array
    {
        /**
         * label    => header of table
         * sort     => option|sort from column
         * width    => for size
         */
        return [
            ['label' => '#', 'sort' => 'id', 'width' => '7%'],
            ['label' => 'Text', 'sort' => 'text'],
            ['label' => 'Email', 'sort' => 'email'],
            ['label' => 'Number', 'sort' => 'number'],
            ['label' => 'Action'],
        ];
    }

    public static function tableData($data = null): array
    {
        /**
         * type                 => type of data
         *** index              => for numbering data
         *** string             => for text without tag html
         *** thousand_format    => for integer with separate . every 3 number
         *** raw_html           => for custom action  or WYSIWYG text
         *** img                => for image
         *** action             => for button
         * note                 => index don't need data parameter
         *
         * data                 => data is value
         ** for action need array with format [title(required),background(option),icon(option),link(for link), live(for livewire)]
         */
        $edit = route('admin.dashboard'); //for action
        return [
            ['type' => 'index'],
            ['type' => 'string', 'data' => $data->text],
            ['type' => 'string', 'data' => $data->email],
            ['type' => 'thousand_format', 'data' => $data->number],
            [
                'type' => 'action', 'data' =>
                [
                    [
                        'title'      => 'Edit',
                        'background' => 'bg-primary',
                        'icon'       => 'fa fa-eye',
                        'link'       => $edit,
                    ],
                    [
                        'title'      => 'Hapus',
                        'background' => 'bg-secondary',
                        'icon'       => 'fa fa-trash',
                        'live'       => 'delete',
                    ],

                ],
            ],
        ];
    }
}
```

***

Call **DATA-TABLE** <br> Example is name of Model and Repository

```html

<lievwire:table.main name="Example"/>
or
@livewire('table.main',['name' => 'Example'])
```

***

Call **FORM**<br>  Example is name of Model and Repository <br>
This form need live on livewire beacuse i love livewire :)

```html

<form wire:submit.prevent="create">
    <x-form-generator repositories="Example"/>
    <br>
    <x-form-button/>
</form>
```

```php
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
```

or you can call with action another route.    
Form have name from model on repository

```html

<form action="{{ route('route-name') }}">
    <x-form-generator repositories="Example"/>
    <br>
    <x-form-button/>
</form>
```

***

Call **Chart**  
Chart you just need array with specific format :)

*For time series chart [line,area,bar]*

```php
$chart=[
    'type'=>'line',
    'categories'=> ["January","February","March","April","May","June","July",
            "August","September","October","November","December"];,
    'data'=> [
        [ 'label'=>'income' ,'value'=>[11,22,35,14,15,11,22,35,14,15,20,22]],
        [ 'label'=>'outcome' ,'value'=>[15,14,32,21,11,14,32,21,14,32,14,32]],
    ]
];
```

*For non time series chart [pie,donut]*

```php
$chart=[
    'type'=>'pie',
    'categories'=>['Food','Drink'],
    'data'=> [120,220]
];                 
```
*Then call them :)*
```html
<x-chart :chart="$chart"/>
```
