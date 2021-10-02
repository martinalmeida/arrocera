<?php
include_once "../../config/database.php";
include_once "../objects/subnucleo.php";

$database = new Database();
$db = $database->getConnection();
$update = new crud($db);

$update->id = htmlspecialchars($_POST["id_up"]);
$update->nombre = htmlspecialchars($_POST["nombre_up"]);
$update->fk_referente_sub = htmlspecialchars($_POST["fk_referente_sub_up"]);

if ($update->makeUpdate() == true) {
    echo json_encode(array('success' => 1));
} elseif ($update->makeUpdate() == false) {
    echo json_encode(array('success' => 0));
}
