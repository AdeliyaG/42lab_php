<?php
require_once "app\ComplexNumber.php";

use PHPUnit\Framework\TestCase;
use ComplexNumber\ComplexNumber;

class ComplexNumberTest extends TestCase
{
    public function testAdd()
    {
        $complexNum = new ComplexNumber(10, 20);
        $expected = new ComplexNumber(15, 30);
        $this->assertEquals($expected, $complexNum->add(new ComplexNumber(5, 10)));
    }

    public function testSub()
    {
        $complexNum = new ComplexNumber(10, 20);
        $expected = new ComplexNumber(5, 10);
        $this->assertEquals($expected, $complexNum->sub(new ComplexNumber(5, 10)));
    }

    public function testMult()
    {
        $complexNum = new ComplexNumber(10, 20);
        $expected = new ComplexNumber(-150, 200);
        $this->assertEquals($expected, $complexNum->mult(new ComplexNumber(5, 10)));
    }

    public function testDiv()
    {
        $complexNum = new ComplexNumber(10, 20);
        $expected = new ComplexNumber(2, 1.6);
        $this->assertEquals($expected, $complexNum->div(new ComplexNumber(5, 10)));
    }

    public function testAbs()
    {
        $complexNum = new ComplexNumber(10, 20);
        $expected = 22.3607;
        $this->assertEquals($expected, $complexNum->abs());
    }

    public function testDivByZero()
    {
        $complexNum = new ComplexNumber(10, 20);
        $complexNum->div(new ComplexNumber(0, 0));
        $this->expectOutputString("Divider is zero.");
    }

    function testToString() {
        $complexNum = new ComplexNumber(10, 20);
        $expected = "10 20";
        $this->assertEquals($expected, $complexNum->__toString());
    }
}