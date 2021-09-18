<?php
include_once "../../config/database.php";
include_once "../objects/vereda.php";

$database = new Database();
$db = $database->getConnection();
$insert = new crud($db);

$insert->nombre_vereda = htmlspecialchars($_POST["nombre_vereda"]);
$insert->descripcion = htmlspecialchars($_POST["descripcion"]);

if ($insert->create() == true) {
    echo json_encode(array('success' => 1));
} elseif ($insert->create() == false) {
    echo json_encode(array('success' => 0));
}
