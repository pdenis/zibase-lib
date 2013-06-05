<?php

ini_set('display_errors', 1);
include_once '../vendor/autoload.php';

use Snide\Zibase;
use Snide\Zibase\Manager\ZibaseManager;
use Snide\Zibase\Factory\CommandFactory;


$zibase = new Zibase("localhost", 49999, 2);
echo 'PORT : 49999';
$commandFactory = new CommandFactory();
$manager = new ZibaseManager($zibase, $commandFactory);
if($manager->ping()) {
	echo 'PING OK';
}else {
	print_r($manager->getException());
}
$zibase = new Zibase("localhost", 4999, 2);
$commandFactory = new CommandFactory();
$manager = new ZibaseManager($zibase, $commandFactory);
echo 'PORT : 4999';
if($manager->ping()) {
	echo 'PING OK';
}else {
	print_r($manager->getException());
}
