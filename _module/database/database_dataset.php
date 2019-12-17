<?php
//$sql="insert into moniteur values (null,'moniteur 1'),(null,'moniteur 2'), (null,'moniteur 3')"

//composer require fzaninotto/faker
require "../_include/inc_config.php";
require_once '../vendor/autoload.php';
// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create("fr_FR");

$vue="../_module/{$module}/vue_{$module}_{$action}.php";
require "../_include/gabarit.php";
