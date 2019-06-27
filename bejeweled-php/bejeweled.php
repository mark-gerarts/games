<?php

use Bejeweled\Bejeweled;
use Bejeweled\Debug\Debugger;
use DI\Container;

require 'vendor/autoload.php';

Debugger::setOutputFile(__DIR__ . '/debug/debug.html');
Debugger::initHandler();

$container = new Container();
$bejeweled = $container->get(Bejeweled::class);
$bejeweled->init();
