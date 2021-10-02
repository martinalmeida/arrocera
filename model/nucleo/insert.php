<?php
include_once "../../config/database.php";
include_once "../objects/nucleo.php";

$database = new Database();
$db = $database->getConnection();
$insert = new crud($db);

$insert->nombre = htmlspecialchars($_POST["nombre"]);
$insert->fk_responsable = htmlspecialchars($_POST["fk_responsable"]);
$insert->fk_trillador = htmlspecialchars($_POST["fk_trillador"]);
$insert->observaciones = htmlspecialchars($_POST["observaciones"]);

if ($insert->create() == true) {
    echo json_encode(array('success' => 1));
} elseif ($insert->create() == false) {
    echo json_encode(array('success' => 0));
}
