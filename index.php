<?php

require_once 'src/BruteforceLogTimeProxy.php';
require_once 'src/Passwords.php';
require_once 'src/Dictionary.php';

$bruteforce = new BruteforceLogTimeProxy(
    new Passwords('data/passwords'),
    new Dictionary('data/dictionary')
);

$bruteforce->run();
$bruteforce->printResult();