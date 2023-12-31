<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $result = strlen(trim($value));
        return $result >= $min && $result <= $max;
    }


    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}