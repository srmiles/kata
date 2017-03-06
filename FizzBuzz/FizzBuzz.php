<?php
    
    
class FizzBuzz 
{
    public static function stage1(int $number)
    {
        $result = null;

        if ( $number % 3 == 0 ) $result.= 'Fizz';
        
        if ( $number % 5 == 0 ) $result.= 'Buzz';
        
        return $result ?? $number;
    }


    public static function stage2(int $number)
    {
        $result = null;

        if ( $number % 3 == 0 || strpos($number,3) !== false ) $result.= 'Fizz';
        
        if ( $number % 5 == 0 || strpos($number,5) !== false ) $result.= 'Buzz';
        
        return $result ?? $number;
    }


}