<?php
include_once "../../config/database.php";
include_once "../objects/produccion.php";

$database = new Database();
$db = $database->getConnection();
$selector = new crud($db);

$selector->data = file_get_contents("php://input");

$selector->selectupdate();
