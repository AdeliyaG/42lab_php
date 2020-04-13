<?php
header('Content-type: text/html; charset=cp-1251');

if (isset($_POST["send"])) {
    $address = $_POST['address'];
    $address = escapeshellcmd($address);

    if (!empty($address)) {
        if (isset($_POST['choice'])) {
            $utility = $_POST['choice'];

            if ($utility == "ping") {
                exec("ping " . $address, $resArr);

                if (isset($resArr[1])) {
                    $ipAddress = addressCheck($address, $resArr);
                    ping($resArr, $ipAddress);
                } else {
                    print "Your ip-address is incorrect";
                }

            } elseif ($utility == "tracert") {
                exec("tracert " . $address, $resArr);
                $ipAddress = addressCheck($address, $resArr);

                if ($ipAddress !== "-d") { // костыль костыльный, но работает, и ничего лучше я не придумала
                    tracert($resArr, $ipAddress);
                } else {
                    print "Your ip-address is incorrect";
                }
            }
        } else {
            print("You didn't choose the utility: ping or tracert");
        }
    } else {
        print("Your data is empty");
    }


} else {
    include "index.html";
}

function addressCheck($address, $resArr) {
    if (is_numeric(substr($address, 0, 1))) {
        if (filter_var($address, FILTER_VALIDATE_IP)) {
            return $address;
        }
    } elseif (strpos($resArr[1], "[")) {
        $ipAddress = "";
        for ($i = strpos($resArr[1], "[") + 1; $i <= strpos($resArr[1], "]") - 1; $i++) {
            $ipAddress .= $resArr[1][$i];
        }
        return $ipAddress;
    }
}

function ping($resArr, $ipAddress){
    $successPercentage = "";

    foreach ($resArr as $value) {
        if (strpos($value, "%")) {
            $lossPercentage = "";
            for ($i = strpos($value, "(") + 1; $i <= strpos($value, "%") - 1; $i++) {
                $lossPercentage .= $value[$i];
            }
            $successPercentage = 100 - (int)$lossPercentage;
        }
    }

    print "<p>IP-address: <b> " . $ipAddress . "</b></p>";
    print "<p> " . $successPercentage . "% successful</p>";
}

function tracert($resArr, $ipAddress) {
    print "<p>IP-address: <b> " . $ipAddress . "</b></p>";

    unset($resArr[1]); // удаляю элемент с адресом сайта
    foreach ($resArr as $value) {
        if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $value, $match)) {
            if (filter_var($match[0], FILTER_VALIDATE_IP)) {
                print_r($match[0] . "<br/>");
            }
        }
    }
}

?>