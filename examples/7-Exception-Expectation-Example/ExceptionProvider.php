<?php

class ExceptionProvider
{
    private $defaultValue;
    
    public function __construct($defaultValue = false)
    {
        if ($defaultValue) {
            $this->defaultValue = $defaultValue;
        }
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function getDefaultValue()
    {
        if ($this->defaultValue) {
            return $this->defaultValue;
        }

        throw new Exception('Default value is not set!', 123);
    }
}

?>