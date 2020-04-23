<?php
include_once "File.php";
include_once "Browser.php";

if (isset($_POST["send"])) {
    $text = $_POST['text'];

    if (!empty($text)) {
        if (isset($_POST['logger'])) {
            $logger = $_POST['logger'];

            if ($logger == "fileWriter") {
                $filename = $_POST['filename'];
                $res = new File($filename);
                $res->stringWriter($text);
                $res->stringWriter(" - ".checkUpperCase($text));
            }

            if ($logger == "browserPrinter") {
                if (isset($_POST['choice'])) {
                    $dateType = $_POST['choice'];
                    $res = new Browser($dateType);
                    $res->stringWriter($text);
                    print "<br/>".checkUpperCase($text);
                } else print "Choose data type!";
            }
        } else print "Choose logger type!";
    }

} else {
    include "index.html";
}

function checkUpperCase($text) {
    if (strtolower($text) == $text) {
        return 'String "' . $text . '" does not contains uppercase letters.';
    } else
        return 'String "' . $text . '" contains uppercase letters.';
}

?>