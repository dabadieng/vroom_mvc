<?php
require "../_include/inc_config.php";
require "../_entite/client.php";

extract($_GET);
deleteClient($id);
header("location:" . hlien("client","index"));