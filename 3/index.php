<?php
if (isset($_POST["send"])) {
    $text = $_POST['text'];
    $text = explode("\n", $text); // разделяет текст по строкам
    $enterStrArr = array();
    $textArr = array();
    $exitArr = array();

    for ($i = 0; $i < count($text); $i++) {
        $enterStrArr[$i] = explode(" ", $text[$i]);
        $textArr[$i] = explode(" ", $text[$i]); // разделяет строки по словам
        shuffle($textArr[$i]);
    }

    $fullArr = array_merge($enterStrArr, $textArr);

    function compare($a, $b) {
        if ($a[1] < $b[1]) {
            return -1;
        } else return 1;
    }

    usort($fullArr, "compare");

    for ($i = 0; $i < count($fullArr); $i++) {
        $exitArr[$i] = implode(" ", $fullArr[$i]);
        print_r($exitArr[$i]. "<br/>");
    }

} else {
    include "form.html";
}
?>
