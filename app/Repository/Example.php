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
//            ->orWhereHas('relation',function($q) use ($query){        //where on relation
//            $q->where('columnName', 'like', '%' . $query . '%')

//
//});
            ;
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
