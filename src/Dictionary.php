<?php

require_once 'GetInterface.php';

class Dictionary implements GetInterface
{
    /**
     * @var false|resource
     */
    private $dictionary;

    /**
     * Dictionary constructor.
     * @param string $fileName
     * @throws Exception
     */
    public function __construct(string $fileName)
    {
        if (!file_exists($fileName)) {
            throw new Exception('Nonexistent file');
        }

        $this->dictionary = fopen($fileName, "r");
    }

    /**
     * @inheritDoc
     */
    public function get()
    {
        return fgets($this->dictionary);
    }

    /**
     * Dictionary destructor.
     */
    public function __destruct()
    {
        fclose($this->dictionary);
    }
}