<?php
require "../_include/inc_config.php";
require "../_entite/lecon.php";

extract($_GET);
desincrire($le_id,$cl_id);
header("location:" . hlien("lecon","edit","&id=$le_id") );