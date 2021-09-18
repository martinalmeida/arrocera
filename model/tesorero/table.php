<?php
include_once "../../config/database.php";
include_once "../objects/tesorero.php";

$database = new Database();
$db = $database->getConnection();
$crud = new crud($db);

$crud->table();
