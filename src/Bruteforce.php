<?php

require_once 'Result.php';

class Bruteforce
{
    /**
     * Salt characters
     */
    const SALT = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k'];

    /**
     * @var Result|null;
     */
    protected $result;

    /**
     * @var Passwords
     */
    private $passwords;

    /**
     * @var Dictionary
     */
    private $dictionary;

    /**
     * Bruteforce constructor.
     * @param ExistsInterface $passwords
     * @param GetInterface $dictionary
     */
    public function __construct(ExistsInterface $passwords, GetInterface $dictionary)
    {
        $this->passwords = $passwords;
        $this->dictionary = $dictionary;
    }

    /**
     * Run bruteforce
     */
    public function run()
    {
        $count = 0;
        while ($plainPassword = $this->dictionary->get()) {
            $plainPassword = rtrim($plainPassword);
            foreach ($this->getSalt() as $salt) {
                $plainPasswordWithSalt = $salt . '$' . $plainPassword;
                $encodedPassword = $this->encodePassword($plainPasswordWithSalt);

                $count++;

                if ($this->passwords->exists($encodedPassword)) {
                    $this->result = new Result($plainPassword, $encodedPassword, $count);
                    return;
                }
            }
        }
    }

    /**
     * Print result
     */
    public function printResult()
    {
        if ($this->result instanceof Result) {
            echo $this->result;
        } else {
            echo "There is no result";
        }
    }

    /**
     * Encode password
     * @param string $password
     * @return string
     */
    protected function encodePassword(string $password)
    {
        return md5($password);
    }

    /**
     * @return Generator
     */
    private function getSalt()
    {
        foreach (self::SALT as $firstChar) {
            foreach (self::SALT as $secondChar) {
                yield $firstChar . $secondChar;
            }
        }
    }
}