<?php
include_once "../../config/database.php";
include_once "../objects/fincas.php";

$database = new Database();
$db = $database->getConnection();
$update = new crud($db);

$update->id = htmlspecialchars($_POST["id_up"]);
$update->nombre_finca = htmlspecialchars($_POST["nombre_finca_up"]);
$update->area = htmlspecialchars($_POST["area_up"]);
$update->fk_vereda = htmlspecialchars($_POST["fk_vereda_up"]);

if ($update->makeUpdate() == true) {
    echo json_encode(array('success' => 1));
} elseif ($update->makeUpdate() == false) {
    echo json_encode(array('success' => 0));
}
