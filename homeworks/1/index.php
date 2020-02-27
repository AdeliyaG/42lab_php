<?php

$cells = array(0);
$code = $_POST['bfCode'];
$enter = $_POST['enterData'];

$indexCell = 0;
$indexEnter = 0;
$indexCode = 0;

$codeArr = str_split($code);
$enterArr = str_split($enter);

$output = '';


foreach ($codeArr as $item) {
    switch ($item) {
        case '>':
            $indexCell++;
            $indexCode++;
            break;

        case '<':
            $indexCell--;
            $indexCode++;
            break;

        case '+':
            $cells[$indexCell]++;
            $indexCode++;
            break;

        case '-':
            $cells[$indexCell]--;
            $indexCode++;
            break;

        case '.':
            $output .= chr($cells[$indexCell]);
            break;

        case ',':
            $cells[$indexCell] = ord($enterArr[$indexEnter]);
            $indexEnter++;
            $indexCode++;
            break;

        case '[':
            if ($cells[$indexCell] == 0) {
                $brc = 1;
                while ($brc != 0) {
                    switch ($codeArr[$indexCell]) {
                        case '[' :
                            $brc++;
                            break;
                        case ']' :
                            $brc--;
                            break;
                    }
                }
            }
            $indexCode++;
            break;

        case ']':
            if ($cells[$indexCell] != 0) {
                $brc = 1;
                while ($brc != 0) {
//                    switch ($codeArr[$indexCode--]) {
//                        case '[' :
//                            $brc--;
//                            break;
//                        case ']' :
//                            $brc++;
//                            break;
//                    }
                    if ($codeArr[$indexCode--] = '[') {
                        $brc--;
                    } else if ($codeArr[$indexCode--] = ']') {
                        $brc++;
                    } else {
                        $indexCode--;
                    }
                }
            }
            $indexCode++;
            break;
    }
}
echo $output;

?>