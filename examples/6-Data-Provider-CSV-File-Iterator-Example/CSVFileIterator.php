<?php

class CSVFileIterator implements Iterator
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

    /**
     * @return string mixed
     */
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

    /**
     * @return bool
     */
    public function valid()
    {
        return !feof($this->file);
    }

    /**
     * @return int
     */
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