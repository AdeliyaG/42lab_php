<?php

function check($json, $sumWeight) {
    $array = json_decode($json, true);
    $data = $array["data"];

    $count = array_fill(0, count($data),0);
    $result = array();

    for ($num = 0; $num < 10000; $num++) {
        $generator = generator($data, $sumWeight);
        foreach ($generator as $value) {
            $index = array_search($value, $data);
            $count[$index]++;
        }
    }

    for ($i = 0; $i < count($data); $i++) {
        array_push($result, ["text" => $data[$i], "count" => $count[$i], "calculated_probability" => $count[$i] / 10000]);
    }
    return $result;
}

function generator($data, $sumWeight) {

    for ($i = 0; $i < 1000; $i++) {
        $rand = mt_rand(1, $sumWeight);
        $index = -1;
        $num = 0;

        while ($num < $rand && $num != $sumWeight) {
            $index++;
            $num += (int)$data[$index]["weight"];
        }
        yield $data[$index];
    }
}


?>
