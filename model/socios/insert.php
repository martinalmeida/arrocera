<?php
include_once "../../config/database.php";
include_once "../objects/socios.php";

$database = new Database();
$db = $database->getConnection();
$insert = new crud($db);

$insert->nombre_apellido = htmlspecialchars($_POST["nombre_apellido"]);
$insert->cedula = htmlspecialchars($_POST["cedula"]);
$insert->fk_finca = htmlspecialchars($_POST["fk_finca"]);
$insert->telefono = htmlspecialchars($_POST["telefono"]);
$insert->whatsapp = htmlspecialchars($_POST["whatsapp"]);
$insert->correo = htmlspecialchars($_POST["correo"]);
$insert->fk_asociacion = htmlspecialchars($_POST["fk_asociacion"]);
$insert->fk_nucleo = htmlspecialchars($_POST["fk_nucleo"]);
$insert->fk_sub_nucleo = htmlspecialchars($_POST["fk_sub_nucleo"]);

if ($insert->create() == true) {
    echo json_encode(array('success' => 1));
} elseif ($insert->create() == false) {
    echo json_encode(array('success' => 0));
}
