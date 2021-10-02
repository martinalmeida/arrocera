<?php
include_once "../../config/database.php";
include_once "../objects/subnucleo.php";

$database = new Database();
$db = $database->getConnection();
$insert = new crud($db);

$insert->nombre = htmlspecialchars($_POST["nombre"]);
$insert->fk_referente_sub = htmlspecialchars($_POST["fk_referente_sub"]);

if ($insert->create() == true) {
    echo json_encode(array('success' => 1));
} elseif ($insert->create() == false) {
    echo json_encode(array('success' => 0));
}
