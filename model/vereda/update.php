<?php
include_once "../../config/database.php";
include_once "../objects/vereda.php";

$database = new Database();
$db = $database->getConnection();
$update = new crud($db);

$update->id = htmlspecialchars($_POST["id_up"]);
$update->nombre_vereda = htmlspecialchars($_POST["nombre_vereda_up"]);
$update->descripcion = htmlspecialchars($_POST["descripcion_up"]);

if ($update->makeUpdate() == true) {
    echo json_encode(array('success' => 1));
} elseif ($update->makeUpdate() == false) {
    echo json_encode(array('success' => 0));
}
