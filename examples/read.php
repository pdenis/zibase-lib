<?php

ini_set('display_errors', 1);
include_once '../vendor/autoload.php';

use Snide\Zibase;
use Snide\Zibase\Manager\ZibaseManager;
use Snide\Zibase\Factory\CommandFactory;

$zibase = new Zibase("localhost");
$commandFactory = new CommandFactory();
$manager = new ZibaseManager($zibase, $commandFactory);
print_r($manager->writeVariable(1, 2)); echo '<br />';

print_r($manager->readVariable(1)); echo '<br />';
print_r($manager->writeVariable(1, 0)); echo '<br />';
print_r($manager->readVariable(2)); echo '<br />'; 
print_r($manager->readVariable(3)); echo '<br />';
print_r($manager->readVariable(4)); echo '<br />';
print_r($manager->readVariable(5)); echo '<br />';
print_r($manager->readVariable(6)); echo '<br />';
print_r($manager->readVariable(7)); echo '<br />';
print_r($manager->readVariable(8)); echo '<br />';
print_r($manager->readVariable(9)); echo '<br />';
print_r($manager->readVariable(10)); echo '<br />';
print_r($manager->readVariable(11)); echo '<br />';
print_r($manager->readVariable(12)); echo '<br />';
print_r($manager->readVariable(13)); echo '<br />';
print_r($manager->readVariable(14)); echo '<br />';

