<?php

if (isset($_GET["send"])) {
    $str = $_GET["enterData"];

    if (!isset($_COOKIE["string"])) {
        setcookie("string", $str, time() + 60);
    }

    if (isset($_COOKIE["string"])) {
        setcookie("string", $str, time() + 60);
    }

    header("Location: http://localhost:63342/12/index2.php?enterData=$str&send=send");
} else {
    include "form.php";
}

?>