<?php
include_once "../../config/database.php";
include_once "../objects/variedad.php";

$database = new Database();
$db = $database->getConnection();
$update = new crud($db);

$update->id = htmlspecialchars($_POST["id_up"]);
$update->nombre = htmlspecialchars($_POST["nombre_up"]);
$update->periodo_vegetal = htmlspecialchars($_POST["periodo_vegetal_up"]);
$update->rendimiento = htmlspecialchars($_POST["rendimiento_up"]);

if ($update->makeUpdate() == true) {
    echo json_encode(array('success' => 1));
} elseif ($update->makeUpdate() == false) {
    echo json_encode(array('success' => 0));
}
