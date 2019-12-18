<?php
require "../_include/inc_config.php";
require "../_entite/client.php";

if (isset($_POST["btsubmit"])) {
    extract($_POST);  
    $option[":cl_nom"]=$cl_nom;
    if ($cl_id==0)
        insertClient($option);
    else
        updateClient($option,$cl_id);       

    header("location:" . hlien("client","index") );

} else {

    extract($_GET);
    if ($id > 0) { //UPDATE        
        $row=findClientById($id);       
        extract($row);
    } else { //INSERT
        $cl_id=0;
        $cl_nom="";
    }
}

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";