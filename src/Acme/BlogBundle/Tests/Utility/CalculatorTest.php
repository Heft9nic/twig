<?php

namespace Acme\BlogBundle\Tests\Utility;

use Acme\BlogBundle\Utility\Calculator;

class CalculatorTest extends  \PHPUnit_Framework_TestCase
{
    public  function  testAdd()
    {
        $cals = new Calculator();
        $result = $cals->add(30, 12);

        $this->assertEquals(42, $result);
    }

}