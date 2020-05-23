<?php
spl_autoload_register();

include ("vendor/autoload.php");

use logger\Logger;

$logger = new Logger("index.txt");
$context = array();
array_push($context, "Info content");
$logger->info("info message", $context);