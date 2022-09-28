<?php
namespace App\Tools;

class FilterArray
{
    public function get_filter_array($array)
    {
        foreach($array as $key => $value) 
        {
            if ($value <= 0) {
                unset($array[$key]);
            }
        }

        return $array;
    }
}