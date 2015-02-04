<?php

class Message
{
    /**
     * @var string
     */
    public $from;

    /**
     * @var string
     */
    public $to;

    /**
     * @var string
     */
    public $message;

    /**
     * @param string $from
     * @param string $to
     * @param string $message
     */
    public function __construct($from = '', $to = '', $message = '')
    {
        $this->from = $from;
        $this->to = $to;
        $this->message = $message;
    }
}