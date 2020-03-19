<?php

if (isset($_POST["send"])) {
    $password = $_POST['password'];

    $length = "/.{10,}/";
    $symbols = "/(?=..*[a-z])(?=..*[A-Z])(?=.*[0-9])(?=..*[%$#_*])/";
    $moreThanThree = "";

    if (!(preg_match($length, $password))) {
        print ("Your password contains less than 10 characters");
    } else if (!(preg_match($symbols, $password))) {
        print ("Your password contains less than 2 special characters");
    } else if ((preg_match("([a-z]{4,})", $password)) || (preg_match("([A-Z]{4,})", $password)) || (preg_match("([0-9]{4,})", $password)) || (preg_match("([%$#_*]{4,})", $password))) {
        print ("Your password contains more than 3 digits in a row");
    } else {
        print ("Correct password");
    }

} else {
    include "form.html";
}
?>
