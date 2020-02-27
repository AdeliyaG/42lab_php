<?php

if (isset($_POST["send"])) {
    $cells = array(0);
    $code = $_POST['bfCode'];
    $enter = $_POST['enterData'];

    $indexCell = 0;
    $indexEnter = 0;
    $indexCode = 0;

    $codeArr = str_split($code);
    $enterArr = str_split($enter);

    for ($indexCode; $indexCode < count($codeArr); $indexCode++) {
        switch ($codeArr[$indexCode]) {
            case '>':
                $indexCell++;
                break;

            case '<':
                $indexCell--;
                break;

            case '+':
                $cells[$indexCell]++;
                break;

            case '-':
                $cells[$indexCell]--;
                break;

            case '.':
                print(chr($cells[$indexCell]));
                break;

            case ',':
                $cells[$indexCell] = ord($enterArr[$indexEnter]);
                $indexEnter++;
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
                break;

            case ']':
                if ($cells[$indexCell] != 0) {
                    $brc = 1;
                    while ($brc != 0) {
                        $indexCode--;
                        switch ($codeArr[$indexCode]) {
                            case '[' :
                                $brc--;
                                break;
                            case ']' :
                                $brc++;
                                break;
                        }
                    }
                }
                break;
        }
    }
} else {
    include "form.html";
}
