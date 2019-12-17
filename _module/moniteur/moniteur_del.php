<?php
require "../_include/inc_config.php";
require "../_entite/moniteur.php";

extract($_GET);
deleteMoniteur($id);
header("location:" . hlien("moniteur","index"));