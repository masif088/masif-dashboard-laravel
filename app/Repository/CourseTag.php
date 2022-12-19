<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;

class CourseTag extends \App\Models\CourseTag implements Repository {

	public static function tableSearch($params): Builder
	{
        $query = $params['query'];
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%');
	}

	public static function tableView(): array
	{
        return [
            'searchable' => true,
        ];
	}

	public static function tableField(): array
	{
        return [
            ['label' => '#', 'sort' => 'id','width'=>'7%'],
            ['label' => 'Tag', 'sort' => 'title'],
            ['label' => 'Action'],
        ];
	}

	public static function tableData($data): array
	{
        $edit = route('admin.course-tag.edit');
        return [
            ['type' => 'index'],
            ['type' => 'string', 'data' => $data->title],
            ['type' => 'action', 'data' => [
                ['title'=>'Edit','icon'=>'fa fa-eye', 'link'=>$edit],
                ['title'=>'Hapus','icon'=>'fa fa-trash', 'live'=>'delete'],

            ],
            ],
        ];
	}

	public static function formField($params = null): array
	{
        return [
            [
                'title'       => 'Tag',
                'type'        => 'text',
                'model'       => 'title',
                'required'    => false,
                'placeholder' => 'Tag',
            ],
        ];
	}

	public static function formRules(): array
	{
		return [
            'data.tag'=>'required|max:255'
        ];
	}

	public static function formMessages(): array
	{
		return [];
	}
}
