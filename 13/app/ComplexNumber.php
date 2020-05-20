<?php

namespace ComplexNumber;

class ComplexNumber
{
    public float $a, $b;

    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    function __toString()
    {
        return (string)$this->a . " " . (string)$this->b;
    }

    function add(ComplexNumber $number)
    {
        return new ComplexNumber($this->a + $number->a, $this->b + $number->b);
    }

    function sub(ComplexNumber $number)
    {
        return new ComplexNumber($this->a - $number->a, $this->b - $number->b);
    }

    function mult(ComplexNumber $number)
    {
        $c = $this->a;
        $d = $this->b;
        $this->a = $this->a * $number->a - $this->b * $number->b;
        $this->b = $c * $number->b + $d * $number->a;
        return new ComplexNumber($this->a, $this->b);
    }

    function div(ComplexNumber $number)
    {
        $c = $this->a;
        $this->a = ($this->a * $number->a + $this->b * $number->b) / (pow($number->a, 2) + pow($number->b, 2));
        $this->b = ($this->b * $number->a + $c * $number->b) / (pow($number->a, 2) + pow($number->b, 2));
        return new ComplexNumber($this->a, $this->b);
    }

    function abs()
    {
        $result = sqrt(pow($this->a, 2) + pow($this->b, 2));
        return number_format($result, 4, ".", "");
    }
}