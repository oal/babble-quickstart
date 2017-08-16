<?php

require_once '../vendor/autoload.php';

if (preg_match('/^(\/(static|admin|uploads)(\/|$))/', $_SERVER['REQUEST_URI'])) {
    return false;
}

use Babble\Babble;
$babble = new Babble();
$babble->serve();
