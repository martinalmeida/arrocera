<?php
include_once "../../config/database.php";
include_once "../objects/variedad.php";

$database = new Database();
$db = $database->getConnection();
$insert = new crud($db);

$insert->nombre = htmlspecialchars($_POST["nombre"]);
$insert->periodo_vegetal = htmlspecialchars($_POST["periodo_vegetal"]);
$insert->rendimiento = htmlspecialchars($_POST["rendimiento"]);

if ($insert->create() == true) {
    echo json_encode(array('success' => 1));
} elseif ($insert->create() == false) {
    echo json_encode(array('success' => 0));
}
