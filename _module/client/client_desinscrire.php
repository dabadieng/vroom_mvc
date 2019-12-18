<?php
require "../_include/inc_config.php";
require "../_entite/client.php";

extract($_GET);
desincrire($le_id,$cl_id);
header("location:" . hlien("client","edit","&id=$le_id") );