<?php
class Room
{
    protected $number;
    protected $capacity;

    public function __construct($_number, $_capacity = 150)
    {
        $this->number = $_number;
        $this->capacity = $_capacity;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($_number)
    {
        $this->number = $_number;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setCapacity($_capacity)
    {
        $this->capacity = $_capacity;
    }

    public function getInfo()
    {
        return $this->number . ", capacity:  " . $this->capacity;
    }
}
