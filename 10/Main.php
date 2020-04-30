<?php

class Main {
    function randomNumber() {
        return rand(1, 5);
    }

    function randomException($randomNumber) {
        switch ($randomNumber) {
            case 1:
                throw new \exception\Exception1("1");
                break;
            case 2:
                throw new \exception\Exception2("2");
                break;
            case 3:
                throw new \exception\Exception3("3");
                break;
            case 4:
                throw new \exception\Exception4("4");
                break;
            case 5:
                throw new \exception\Exception5("5");
                break;
            default:
                print "No exceptions";
                break;
        }
    }

    function throwException1() {
        $this->randomException($this->randomNumber());
    }

    function throwException2() {
        $this->randomException($this->randomNumber());
    }

    function throwException3() {
        $this->randomException($this->randomNumber());
    }

    function throwException4() {
        $this->randomException($this->randomNumber());
    }



}