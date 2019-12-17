<?php
require "../_include/inc_config.php";
require "../_entite/moniteur.php";

if (isset($_GET["id"])) {
    $mo_id=$_GET["id"];
    $data=findLeconByMoniteur($mo_id);
} else {
    header("location:" . hlien("moniteur","index"));
}

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";
