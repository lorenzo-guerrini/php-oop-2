<?php

class ImmersiveRoom extends Room {
    private $specialEffects;

    public function __construct($_number, $_seats = 300, $_specialEffects) {
        parent::__construct($_number, $_seats = 300);
        $this->specialEffects = $_specialEffects;
    }

    public function addSpecialEffect($effect) {
        $this->specialEffects[] = $effect;
    }

    public function getSpecialEffects() {
        return $this->specialEffects;
    }

    public function getSpecialEffectsString() {
        $output = "";
        foreach ($this->specialEffects as $effect) {
            $output .= $effect . " ";
        }
        return $output;
    }

    public function getInfo()
    {
        $effects = $this->getSpecialEffectsString();
        return parent::getNumber() . " " . $effects;
    }
}