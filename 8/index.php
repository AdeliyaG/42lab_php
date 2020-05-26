<?php

if (isset($_POST["send"])) {
    if (isset($_POST['month'])) {
        $month = $_POST['month'];
    } else {
        $today = new DateTime("now");
        
    }


    

} else {
    include "index.html";
}

?>