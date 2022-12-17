<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;

interface  Repository {

    public static function tableSearch($params): Builder;

    public static function tableView(): array;

    public static function tableField(): array;

    public static function tableData($data): array;

    public static function formField($params = null): array;

    public static function formRules(): array;

    public static function formMessages(): array;
}
