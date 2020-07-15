<?php

require_once 'ExistsInterface.php';

class Passwords implements ExistsInterface
{
    /**
     * @var array
     */
    private $passwords;

    /**
     * Passwords constructor.
     * @param string $fileName
     * @throws Exception
     */
    public function __construct(string $fileName)
    {
        if (!file_exists($fileName)) {
            throw new Exception('Nonexistent file');
        }

        $this->passwords = file($fileName, FILE_IGNORE_NEW_LINES);
    }

    /**
     * @inheritDoc
     */
    public function exists(string $password)
    {
        return in_array($password, $this->passwords);
    }
}