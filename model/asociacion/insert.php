<?php
include_once "../../config/database.php";
include_once "../objects/asociacion.php";

$database = new Database();
$db = $database->getConnection();
$insert = new crud($db);

$insert->nombre_asoci = htmlspecialchars($_POST["nombre_asoci"]);
$insert->nit = htmlspecialchars($_POST["nit"]);
$insert->fk_representante = htmlspecialchars($_POST["fk_representante"]);
$insert->fk_tesorero = htmlspecialchars($_POST["fk_tesorero"]);
$insert->fk_fiscal = htmlspecialchars($_POST["fk_fiscal"]);

if ($insert->create() == true) {
    echo json_encode(array('success' => 1));
} elseif ($insert->create() == false) {
    echo json_encode(array('success' => 0));
}
