<?php
require "../_include/inc_config.php";
require "../_entite/lecon.php";

$data=findAllLecon();

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";
