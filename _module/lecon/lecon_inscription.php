<?php
require "../_include/inc_config.php";
$data=[];
if (isset($_GET["id"])) {
    $le_id=$_GET["id"];
} else if (isset($_POST["btsubmit"])) {
    extract($_POST);
    $sql="select * from client where cl_nom like '$chercher%' and cl_id not in (select pl_client from plannifier where pl_lecon=$le_id)";
    $result=$link->query($sql);
    $data=$result->fetchAll();
} else if (isset($_GET["cl_id"]) and isset($_GET["le_id"])) {
    extract($_GET);
    $sql="insert into plannifier values (null,:le_id, :cl_id)";
    $statement = $link->prepare($sql);
    $statement->execute([":le_id"=>$le_id,":cl_id"=>$cl_id]);
    header("location:" . hlien("lecon","edit","&id=$le_id"));
}

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";