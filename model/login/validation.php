<?php

include_once "../../config/database.php";
include_once "../objects/login.php";

// http://profesores.fi-b.unam.mx/carlos/java/java_basico4_2.html
$database = new Database();
$db = $database->getConnection();
$login = new login($db);

$login->correo = htmlspecialchars($_POST["correo"]);
$login->password = htmlspecialchars($_POST["password"]);

if ($login->validation() == true) {
    echo json_encode(array('success'=>1));
} elseif ($login->validation() == false) {
    echo json_encode(array('success'=>0));
}
