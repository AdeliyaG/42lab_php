<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="index.php" method="GET">
    <input type="text"
           name="enterData"
           value="<?php
           if (isset($_COOKIE["string"])) {
               echo $_COOKIE["string"];
           }
           ?>"
    >
    </br>
    <input type="submit" name="send" style="margin-top: 5px">
</form>
</body>
</html>