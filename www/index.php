<?php
$module = $_GET["module"] ?? "accueil";
$action = $_GET["action"] ?? "index";
require "../_module/{$module}/{$module}_{$action}.php";
