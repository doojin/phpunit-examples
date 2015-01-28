<?php

class Exception_Provider
{
    private $default_value;
    
    public function __construct($default_value = false)
    {
        if ($default_value)
        {
            $this->default_value = $default_value;
        }
    }
    
    public function get_default_value()
    {
        if ($this->default_value)
        {
            return $this->default_value;
        }
        
        throw new Exception('Default value is not set!', 123);
    }
}

?>