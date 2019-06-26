<?php

use Bejeweled\Bejeweled;
use DI\Container;

require 'vendor/autoload.php';

$container = new Container();
$bejeweled = $container->get(Bejeweled::class);
$bejeweled->init();
