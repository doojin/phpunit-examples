<?php

class StringConcatenator
{
    private $strings = array();

    /**
     * @param string $string
     */
    public function addString($string)
    {
        $this->strings[] = $string;
    }

    /**
     * @return string
     */
    public function merge()
    {
        return implode('', $this->strings);
    }
}