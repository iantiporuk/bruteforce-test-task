<?php

class Result
{

    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @var string
     */
    private $encryptedPassword;

    /**
     * @var int
     */
    private $count;

    /**
     * @var float|null
     */
    private $time;

    /**
     * Result constructor.
     * @param string $plainPassword
     * @param string $encryptedPassword
     * @param int $count
     */
    public function __construct(string $plainPassword, string $encryptedPassword, int $count)
    {
        $this->plainPassword = $plainPassword;
        $this->encryptedPassword = $encryptedPassword;
        $this->count = $count;
    }

    /**
     * @param float $time
     */
    public function setTime(float $time)
    {
        $this->time = round($time, 2);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $output = [
            "$this->plainPassword = $this->encryptedPassword",
            "count = $this->count",
        ];

        if ($this->time) {
            array_push($output, "time = $this->time");
        }

        return implode(PHP_EOL, $output);
    }
}