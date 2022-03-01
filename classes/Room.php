<?php
class Room {
    protected $number;
    protected $seats;
    
    public function __construct($_number, $_seats = 150)
    {
        $this->number = $_number;
        $this->seats = $_seats;
    }
}