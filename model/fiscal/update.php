<?php
include_once "../../config/database.php";
include_once "../objects/fiscal.php";

$database = new Database();
$db = $database->getConnection();
$update = new crud($db);

$update->id = htmlspecialchars($_POST["id_up"]);
$update->nombre = htmlspecialchars($_POST["nombre_up"]);
$update->cedula = htmlspecialchars($_POST["cedula_up"]);
$update->telefono = htmlspecialchars($_POST["telefono_up"]);
$update->correo = htmlspecialchars($_POST["correo_up"]);
$update->whatsapp = htmlspecialchars($_POST["whatsapp_up"]);

if ($update->makeUpdate() == true) {
    echo json_encode(array('success' => 1));
} elseif ($update->makeUpdate() == false) {
    echo json_encode(array('success' => 0));
}
