<?php

require_once __DIR__ . '/autoload.php';

use App\CLI\CommandLineInterface;

$app = new CommandLineInterface();
$app->run();
