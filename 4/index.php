<?php
include "generator.php";

if (isset($_POST["send"])) {
    $text = $_POST['text'];
    $strings = explode("\n", $text); // разделяет текст по строкам
    $sumWeight = 0;

    for ($i = 0; $i < count($strings); $i++) {
        $words[$i] = explode(" ", $strings[$i]); // разделяет строки по словам
        $weight = (int) end($words[$i]);
        $sumWeight += $weight;
    }

    $json = ["sum" => $sumWeight, "data" => []];

    for ($i = 0; $i < count($strings); $i++) {
        $words[$i] = explode(" ", $strings[$i]);
        $words[$i] = str_replace("\r", "", $words[$i]); // удаляет символ возврата каретки
        $weight = (int) end($words[$i]);
        $probability = (float) $weight/$sumWeight;
        array_push($json["data"], ["text" => $words[$i], "weight" => $weight, "probability" => $probability]);
    }

    print_r(json_encode($json, JSON_PRETTY_PRINT));

    print_r("<br/>"."<br/>");

    $arr = check($strings, $sumWeight);
    print_r(json_encode($arr, JSON_PRETTY_PRINT));

} else {
    include "form.html";
}
?>
