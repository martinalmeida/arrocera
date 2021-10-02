<?php
include_once "../../config/database.php";
include_once "../objects/produccion.php";

$database = new Database();
$db = $database->getConnection();
$insert = new crud($db);

$insert->fk_socio = htmlspecialchars($_POST["fk_socio"]);
$insert->area_sembrado = htmlspecialchars($_POST["area_sembrado"]);
$insert->fecha = htmlspecialchars($_POST["fecha"]);
$insert->fk_variedad = htmlspecialchars($_POST["fk_variedad"]);

if ($insert->create() == true) {
    echo json_encode(array('success' => 1));
} elseif ($insert->create() == false) {
    echo json_encode(array('success' => 0));
}
