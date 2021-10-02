<?php
include_once "../../config/database.php";
include_once "../objects/socios.php";

$database = new Database();
$db = $database->getConnection();
$update = new crud($db);

$update->id = htmlspecialchars($_POST["id_up"]);
$update->nombre_apellido = htmlspecialchars($_POST["nombre_apellido_up"]);
$update->cedula = htmlspecialchars($_POST["cedula_up"]);
$update->fk_finca = htmlspecialchars($_POST["fk_finca_up"]);
$update->telefono = htmlspecialchars($_POST["telefono_up"]);
$update->whatsapp = htmlspecialchars($_POST["whatsapp_up"]);
$update->correo = htmlspecialchars($_POST["correo_up"]);
$update->fk_asociacion = htmlspecialchars($_POST["fk_asociacion_up"]);
$update->fk_nucleo = htmlspecialchars($_POST["fk_nucleo_up"]);
$update->fk_sub_nucleo = htmlspecialchars($_POST["fk_sub_nucleo_up"]);

if ($update->makeUpdate() == true) {
    echo json_encode(array('success' => 1));
} elseif ($update->makeUpdate() == false) {
    echo json_encode(array('success' => 0));
}
