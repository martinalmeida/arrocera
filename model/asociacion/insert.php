<?php
include_once "../../config/database.php";
include_once "../objects/fincas.php";

$database = new Database();
$db = $database->getConnection();
$insert = new crud($db);

$insert->nombre_finca = htmlspecialchars($_POST["nombre_finca"]);
$insert->area = htmlspecialchars($_POST["area"]);
$insert->fk_vereda = htmlspecialchars($_POST["fk_vereda"]);

if ($insert->create() == true) {
    echo json_encode(array('success' => 1));
} elseif ($insert->create() == false) {
    echo json_encode(array('success' => 0));
}
