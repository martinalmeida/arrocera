<?php

include_once "../../config/database.php";
include_once "../objects/login.php";

// http://profesores.fi-b.unam.mx/carlos/java/java_basico4_2.html
$database = new Database();
$db = $database->getConnection();
$login = new login($db);

$login->logout();
