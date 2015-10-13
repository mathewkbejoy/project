<?php
try{
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
}catch(Exception $e){
    $error = "I can't seem to find my inventory";
    include(ROOT_PATH."inc/errorhandler.php");
    exit;
}
