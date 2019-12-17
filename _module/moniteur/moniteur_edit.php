<?php
require "../_include/inc_config.php";
require "../_entite/moniteur.php";

if (isset($_POST["btsubmit"])) {
    extract($_POST);  
    $option=[":mo_nom"=>$mo_nom,":mo_id"=>$mo_id];
    if ($mo_id==0)
        insertMoniteur([":mo_nom"=>$mo_nom]);
    else
        updatetMoniteur($option);

    header("location:" . hlien("moniteur","index"));
} else {
    extract($_GET);
    if ($id > 0) { //UPDATE
        $row=findMoniteurById($id);       
        extract($row);
    } else { //INSERT
        $mo_id=0;
        $mo_nom="";
    }
}

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";
