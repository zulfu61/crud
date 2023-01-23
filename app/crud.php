<?php

class CRUD
{

    public function Select($table, $multi = false, $col = "*", $con = null, $arr = null)
    {
        global $DB;
        $slc = $DB->prepare("SELECT $col from $table $con");
        $slc->execute($arr);
        return $multi ? $slc->fetchAll(PDO::FETCH_ASSOC) : $slc->fetch(PDO::FETCH_ASSOC);
    }


    public function Insert($table, $col, $arr)
    {
        global $DB;
        $ins = $DB->prepare("INSERT INTO $table SET $col");
        return $ins->execute($arr) ?? null;
    }

    public function Update($table, $col, $arr, $con = null)
    {
        global $DB;
        $upd = $DB->prepare("UPDATE $table SET $col $con");
        return $upd->execute($arr) ?? null;
    }

    public function Delete($table, $id)
    {
        global $DB;
        $del = $DB->prepare("DELETE FROM $table where id=$id");
        return $del->execute() ?? null;
    }
}