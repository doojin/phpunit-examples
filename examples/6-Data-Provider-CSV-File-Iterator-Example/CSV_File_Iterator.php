<?php

class CSV_File_Iterator implements Iterator
{
    private $file;
    private $key = 0;
    private $current;
    
    public function __construct($filename)
    {
        $this->file = fopen($filename, 'r');
    }
    
    public function __destruct()
    {
        fclose($this->file);
    }
    
    public function current()
    {
        return $this->current;
    }
    
    public function rewind()
    {
        rewind($this->file);
        $this->current = fgetcsv($this->file);
        $this->key = 0;
    }
    
    public function valid()
    {
        return !feof($this->file);
    }
    
    public function key()
    {
        return $this->key;
    }
    
    public function next()
    {
        $this->current = fgetcsv($this->file);
        $this->key++;
    }
}

?>