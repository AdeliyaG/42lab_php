<?php
$rules = parse_ini_file("index.ini", true, INI_SCANNER_TYPED);
$pointer = fopen($rules['main']['filename'], "r");

while (!feof($pointer)) {
    $string = fgets($pointer);
    $res = "";

    switch ($string) {
        case (strpos($string, $rules['first_rule']['symbol']) !== false):
            if ($rules['first_rule']['upper']) {
                $res = strtoupper($string);
            } else {
                $res = strtolower($string);
            }
            print_r($res."<br/>");
            break;

        case (strpos($string, $rules['second_rule']['symbol']) !== false):
            $strArr = str_split($string);
            if ($rules['second_rule']['direction'] == "+") {
                for ($i = 0; $i < count($strArr); $i++) {
                    if (is_numeric($strArr[$i]) && $strArr[$i] != 9) {
                        $strArr[$i]++;
                    } else if (is_numeric($strArr[$i]) && $strArr[$i] == 9) {
                        $strArr[$i] = 0;
                    }
                }
            } else if ($rules['second_rule']['direction'] == "-") {
                for ($i = 0; $i < count($strArr); $i++) {
                    if (is_numeric($strArr[$i]) && $strArr[$i] != 0) {
                        $strArr[$i]--;
                    } else if (is_numeric($strArr[$i]) && $strArr[$i] == 0) {
                        $strArr[$i] = 9;
                    }
                }
            }
            print_r(implode($strArr)."<br/>");
            break;

        case (strpos($string, $rules['third_rule']['symbol']) !== false):
            $symbol = $rules['third_rule']['delete'];
            $res = str_replace($symbol, "", $string);
            print_r($res."<br/>");
            break;

        default:
            print_r($string." — your string doesn't have a special symbol<br/>");
    }
}

fclose($pointer);
?>
