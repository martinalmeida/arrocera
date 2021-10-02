<?php
include_once "../../config/database.php";
include_once "../objects/reportes_socios.php";

$database = new Database();
$db = $database->getConnection();
$selector = new crud($db);

$selector->id = htmlspecialchars($_POST["socio"]);

$selector->selectreport();
