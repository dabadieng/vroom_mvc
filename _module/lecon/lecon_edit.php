<?php
require "../_include/inc_config.php";
require "../_entite/lecon.php";

if (isset($_POST["btsubmit"])) {
    extract($_POST);  
    $option[":le_moniteur"]=$le_moniteur;
    $option[":le_voiture"]=$le_voiture;
    $option[":le_date"]=$le_date;
    $option[":le_heure_debut"]=$le_heure_debut;
    $option[":le_heure_fin"]=$le_heure_fin;
    if ($le_id==0)
        insertLecon($option);
    else
        updateLecon($option,$le_id);       

    header("location:" . hlien("lecon","index") );

} else {

    extract($_GET);
    if ($id > 0) { //UPDATE        
        $row=findLeconById($id);       
        extract($row);
    } else { //INSERT
        $le_id=0;
        $le_date="";
        $le_heure_debut="";
        $le_heure_fin="";
        $le_moniteur="";
        $le_voiture="";
    }
}

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";