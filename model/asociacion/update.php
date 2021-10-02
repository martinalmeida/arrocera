<?php
include_once "../../config/database.php";
include_once "../objects/asociacion.php";

$database = new Database();
$db = $database->getConnection();
$update = new crud($db);

$update->id = htmlspecialchars($_POST["id_up"]);
$update->nombre_asoci = htmlspecialchars($_POST["nombre_asoci_up"]);
$update->nit = htmlspecialchars($_POST["nit_up"]);
$update->fk_representante = htmlspecialchars($_POST["fk_representante_up"]);
$update->fk_tesorero = htmlspecialchars($_POST["fk_tesorero_up"]);
$update->fk_fiscal = htmlspecialchars($_POST["fk_fiscal_up"]);

if ($update->makeUpdate() == true) {
    echo json_encode(array('success' => 1));
} elseif ($update->makeUpdate() == false) {
    echo json_encode(array('success' => 0));
}
