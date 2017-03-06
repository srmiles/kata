<?php

class PrimeFactors
{
    public static function generate($number)
    {
        $results = [];

        for ($i=2;$i>1 && $i <= $number;$i++) {
            for (; $number % $i == 0; $number /= $i) {
                $results[] = $i;
            }
        }
        return $results;
    }

}