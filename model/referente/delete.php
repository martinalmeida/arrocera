<?php
include_once "../../config/database.php";
include_once "../objects/referente.php";

$database = new Database();
$db = $database->getConnection();
$delete = new crud($db);

$delete->data = file_get_contents("php://input");

$delete->delete();
