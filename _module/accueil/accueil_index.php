<?php
require "../_include/inc_config.php";
require "../_entite/moniteur.php";

if (isset($_POST["btsubmit"])) {
    extract($_POST);
    //si le login existe en BDD
    if ($row=findMoniteurByLogin($mo_login)) {
        //si le mot de passe correspond
        if (password_verify($mo_mdp,$row["mo_mdp"])) {
            echo "<h1>AUTHENTIFIED</h1>";
        } else {
            echo "<h1>PAS OK</h1>";
        }
    } else {
        echo "<h1>PAS de login correspondant</h1>";
    }
}

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";
