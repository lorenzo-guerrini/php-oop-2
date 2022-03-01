<?php
class Room
{
    protected $number;
    protected $seats;

    public function __construct($_number, $_seats = 150)
    {
        $this->number = $_number;
        $this->seats = $_seats;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($_number)
    {
        $this->number = $_number;
    }

    public function sellTicket($seat, $name)
    {
        $this->seats[$seat] = $name;
    }
}
