<?php
require "../_include/inc_config.php";
require "../_entite/client.php";

if (isset($_GET["id"])) {
    $mo_id=$_GET["id"];
    $data=findLeconByClient($mo_id);
} else {
    header("location:" . hlien("client","index"));
}

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";
