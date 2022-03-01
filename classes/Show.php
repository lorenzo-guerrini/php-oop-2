<?php
class Show {
    private $movie;
    private $room;
    private $time;
    private $priceFull;
    private $priceReduced;

    public function __construct($_movie, $_room, $_time, $_priceFull)
    {
        $this->movie = $_movie;
        $this->room = $_room;
        $this->time = $_time;
        $this->priceFull = $_priceFull;
        $this->priceReduced = $_priceFull - ($_priceFull*50)/100;
    }

    
}