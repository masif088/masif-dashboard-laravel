<?php

if (!function_exists('array_to_object')) {
    function array_to_object($array)
    {
        return json_decode(json_encode($array));
    }
}
if (!function_exists('eloquent_to_options')) {
    function eloquent_to_options($array, $value = 'id', $title = 'title')
    {
        $arr = array();
        foreach ($array as $index => $a) {
            $arr[$index]['value'] = $a->$value;
            $arr[$index]['title'] = $a->$title;
        }
        return $arr;
    }
}
if (!function_exists('month_name')) {
    function month_name($month)
    {
        $monthName = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return $monthName[$month];
    }
}
if (!function_exists('numberToRomanRepresentation')) {
    function numberToRomanRepresentation($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}
if (!function_exists('empty_fallback')) {
    function empty_fallback($data)
    {
        return ($data) ? $data : "-";
    }
}

if (!function_exists('blank_model')) {
    function blank_model($array)
    {
        $data = [];
        foreach ($array as $arr) {
            $data[$arr] = null;
        }
        return $data;
    }
}

if (!function_exists('form_model')) {
    function form_model($model, $dataId = null)
    {
        return ($dataId != null) ? $model::find($dataId)->only($model::getForm()) : blank_model($model::getForm());
    }
}

if (!function_exists('thousand_format')) {
    function thousand_format($integer)
    {
        return number_format($integer, '0', ',', '.');
    }
}
