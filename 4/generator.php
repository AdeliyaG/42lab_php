<?php

function check($strings, $sumWeight) {
    $num = 0;
    $count = array_fill(0, count($strings),0);
    $result = array();

    for ($num = 0; $num < 10000; $num++) {
        $generator = generator($strings, $sumWeight);
        foreach ($generator as $value) {
            $index = array_search($value, $strings);
            $count[$index]++;
        }
    }

    for ($i = 0; $i < count($strings); $i++) {
        array_push($result, ["text" => $strings[$i], "count" => $count[$i], "calculated_probability" => $count[$i] / 10000]);
    }
    return $result;
}

function generator($strings, $sumWeight) {
    $indexedArr = array();

//    for ($i = 0; $i < count($strings); $i++) {
//        $words[$i] = explode(" ", $strings[$i]);
//        $weight = (int) end($words[$i]);
//        $probability = (float) $weight/$sumWeight;
//        array_push($probabilityArr, $probability);
//    }

//    foreach ($strings as $string) {
//        array_push($indexedArr, $string);
//    }

//    $maxProbability = array_sum($probabilityArr);

    $rand = mt_rand(0, $sumWeight);

    for ($i = 0; $i < count($strings); $i++) {
        if ($rand == $i) {
            yield $strings[$rand];
        }
    }
}


?>
