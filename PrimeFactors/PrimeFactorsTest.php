<?php
include("PrimeFactors.php");

use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /**
     * @test
     * @dataProvider factorProvider
     */
    public function testPrimeFactors($number,$expected)
    {
         $this->assertEquals($expected,PrimeFactors::generate($number));
    }

    public function factorProvider()
    {
        return [
            [1,[]],
            [2,[2]],
            [3,[3]],
            [4,[2,2]],
            [5,[5]],
            [6,[2,3]],
            [7,[7]],
            [8,[2,2,2]],
            [9,[3,3]],
            [10,[2,5]],
            [100,[2,2,5,5]]
        ];
    }

}