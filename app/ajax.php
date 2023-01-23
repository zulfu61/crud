<?php

date_default_timezone_set("Asia/Baku");

require_once "../app/connection.php";
$DB = new DBConnection;
require_once "../app/crud.php";
$CRUD = new CRUD;


// FUNCTIONS



if (isset($_POST['view']) && $_POST['view'] == "ok") {
    $data = $CRUD->Select("telebeler", false, "*", "WHERE id=:id", ['id' => $_POST['id']]);
    if ($data) {
        echo json_encode($data, true);
    } else {
        echo [];
    }
}