<?php
include_once "../../config/database.php";
include_once "../objects/produccion.php";

$database = new Database();
$db = $database->getConnection();
$update = new crud($db);

$update->id = htmlspecialchars($_POST["id_up"]);
$update->fk_socio = htmlspecialchars($_POST["fk_socio_up"]);
$update->area_sembrado = htmlspecialchars($_POST["area_sembrado_up"]);
$update->fecha = htmlspecialchars($_POST["fecha_up"]);
$update->fk_variedad = htmlspecialchars($_POST["fk_variedad_up"]);

if ($update->makeUpdate() == true) {
    echo json_encode(array('success' => 1));
} elseif ($update->makeUpdate() == false) {
    echo json_encode(array('success' => 0));
}
