<?php

class RomanNumerals
{
    const NUMERALS = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    ];

    public static function convert($number)
    {
        $result = '';

        foreach (static::NUMERALS AS $numeral=>$value)
        {
            while ($number >= $value) {
                $number -=$value;
                $result .=$numeral;
            }
        }

        return $result;
    }
}