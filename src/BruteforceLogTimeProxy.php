<?php

require_once 'Bruteforce.php';

class BruteforceLogTimeProxy extends Bruteforce
{
    /**
     * @inheritDoc
     */
    public function run()
    {
        $start = microtime(true);
        parent::run();
        $end = microtime(true);

        $this->result->setTime($end - $start);
    }
}