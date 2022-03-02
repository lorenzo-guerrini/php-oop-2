<?php
class Show
{
    private $movie;
    private $room;
    private $date;
    private $time;
    private $priceFull;
    private $priceReduced;

    public function __construct($_movie, $_room, $_date, $_time, $_priceFull)
    {
        $this->movie = $_movie;
        $this->room = $_room;
        $this->date = $_date;
        $this->time = $_time;
        $this->priceFull = $_priceFull;
        $this->priceReduced = $_priceFull - ($_priceFull * 50) / 100;
    }

    public function getMovie()
    {
        return $this->movie;
    }

    public function setMovie($_movie)
    {
        $this->movie = $_movie;
    }

    public function getRoom()
    {
        return $this->room;
    }

    public function setRoom($_room)
    {
        $this->room = $_room;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($_date) {
        $this->date = $_date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($_time)
    {
        $this->time = $_time;
    }

    public function getPriceFull()
    {
        return $this->priceFull;
    }

    public function getPriceReduced()
    {
        return $this->priceReduced;
    }

    public function setPrice($_priceFull)
    {
        $this->priceFulll = $_priceFull;
        $this->priceReduced = $_priceFull - ($_priceFull * 50) / 100;
    }
}
