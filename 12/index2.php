<?php

if (isset($_GET["send"])) {
    $str = $_GET['enterData'];
    $newStr = change($str)[0];
    $countChanges = change($str)[1];
    print ($newStr);
    print (" " . $countChanges);

} else {
    include "form.php";
}

function check($str)
{
    $countChanges = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        switch ($str[$i]) {
            case "h":
                yield "4";
                $countChanges++;
                break;
            case "l":
                yield "1";
                $countChanges++;
                break;
            case "e":
                yield "3";
                $countChanges++;
                break;
            case "o":
                yield "0";
                $countChanges++;
                break;
            default:
                yield $str[$i];
                break;
        }
    }
    return $countChanges;
}

function change($str)
{
    $newStr = "";
    $check = check($str);
    foreach ($check as $ch) {
        $newStr .= $ch;
    }
    $countChanges = $check->getReturn();
    return [$newStr, $countChanges];
}

?>
