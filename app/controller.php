<?php

date_default_timezone_set("Asia/Baku");

require_once "./app/connection.php";
$DB = new DBConnection;
require_once "./app/crud.php";
$CRUD = new CRUD;


// FUNCTIONS

$emps = $CRUD->Select("telebeler", true);



if (isset($_POST['add_emp'])) {
    $col = "
    ad soyad =: fullname,
    ixtisas =: special, 
    telefon =: phone,
    cinsi =: gender
    ";

    $col = preg_replace('/\s+/', '', $col);

    $arr = [
        "fullname" => $_POST['fullname'],
        "special" => $_POST['specialty'],
        "phone" => $_POST['phone'],
        "gender" => $_POST['gender']
    ];

    $ins = $CRUD->Insert("telebeler", $col, $arr);
    if ($ins) {
        header("Location:index.php?add_emp=ok");
        exit;
    } else {
        header("Location:index.php?add_emp=no");
        exit;
    }
}

if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
    $del = $CRUD->Delete("telebeler", $_GET['id']);
    header("Location:index.php?delete=".($del ? "ok" : "no"));
    exit;
}

if (isset($_POST['edit_emp'])) {
    $col = "
    ad soyad=: fullname,
    ixtisas=: special, 
    telefon=: phone,
    cinsi=: gender
    ";

    $col = preg_replace('/\s+/', '', $col);

    $arr = [
        "fullname" => $_POST['fullname'],
        "special" => $_POST['specialty'],
        "phone" => $_POST['phone'],
        "gender" => $_POST['gender'],
        "id" => $_POST['edit_id']
    ];

    $ins = $CRUD->Update("telebeler", $col, $arr, "WHERE id=:id");
    if ($ins) {
        header("Location:index.php?edit_emp=ok");
        exit;
    } else {
        header("Location:index.php?edit_emp=no");
        exit;
    }
}