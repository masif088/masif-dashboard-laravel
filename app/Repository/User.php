<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


class UserRepository extends User implements Repository {


    public static function formRules(): array
    {
        return [
            "data.name"     => 'required',
            'data.email'    => 'required',
            'data.password' => 'required',
        ];
    }

    public static function formMessages(): array
    {
        return [];
    }

    public static function formBlank(): array
    {
        return form_model((new self)->getFillable());
    }


    public static function formField(): array
    {
        return [
            [
                'title'       => 'Nama',
                'type'        => 'text',
                'model'        => 'name',
                'required'    => true,
                'placeholder' => 'Nama',
            ],
            [
                'title'       => 'Password',
                'type'        => 'file',
                'model'        => 'password',
                'required'    => true,
                'step'=>'0.2'

            ],
            [
                'title'       => 'Email',
                'type'        => 'email',
                'model'        => 'email',
                'required'    => true,
                'placeholder' => '',
            ],
        ];
    }

    public static function search($query, $dataId = null): Builder
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%');
    }
}
