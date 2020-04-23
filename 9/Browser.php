<?php
include_once "Logger.php";

class Browser extends Logger {
    private $datatype;

    function __construct($datatype) {
        $this->datatype = $datatype;
    }

    public function stringWriter($str) {
        switch ($this->datatype) {
            case "time":
                date_default_timezone_set("Europe/Moscow");
                $date = date("H:i:s");
                print $date."<br/>".$str;
                break;
            case "dateAndTime":
                date_default_timezone_set("Europe/Moscow");
                $date = date("d.m.Y H:i:s");
                print $date."<br/>".$str;
                break;
            case "off":
                print $str;
                break;
            default:
                print "Choose data type!";
        }
    }

}