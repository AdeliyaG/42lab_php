<?php
include_once "Logger.php";

class File extends Logger {
    private $fileName;

    function __construct($name) {
        $this->fileName = fopen($name, 'w');
    }

    function __destruct() {
        fclose($this->fileName);
        print "Success!";
    }

    function stringWriter($str) {
        fwrite($this->fileName, $str);
    }
}