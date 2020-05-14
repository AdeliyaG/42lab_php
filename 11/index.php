<?php
spl_autoload_register();

include ("vendor/autoload.php");

use logger\Logger;

$logger = new Logger("index.txt");
$context = array();
array_push($context, "Alert content");
$logger->log("alert", "Alert message", $context);