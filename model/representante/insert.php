<?php
include_once "../../config/database.php";
include_once "../objects/representante.php";

$database = new Database();
$db = $database->getConnection();
$insert = new crud($db);

$insert->nombre_repre = htmlspecialchars($_POST["nombre_repre"]);
$insert->cedula = htmlspecialchars($_POST["cedula"]);
$insert->telefono = htmlspecialchars($_POST["telefono"]);
$insert->correo = htmlspecialchars($_POST["correo"]);
$insert->whatsapp = htmlspecialchars($_POST["whatsapp"]);

if ($insert->create() == true) {
    echo json_encode(array('success' => 1));
} elseif ($insert->create() == false) {
    echo json_encode(array('success' => 0));
}
