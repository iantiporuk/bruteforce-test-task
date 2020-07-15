<?php

interface ExistsInterface
{
    /**
     * Check if string exists in list
     * @param string $string
     * @return bool
     */
    public function exists(string $string);
}
