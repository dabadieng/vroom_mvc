<?php
require "../_include/inc_config.php";
require "../_entite/moniteur.php";
$data=findAllMoniteur();

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";
