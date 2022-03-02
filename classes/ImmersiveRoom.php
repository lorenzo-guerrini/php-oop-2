<?php
require_once __DIR__ . '/Room.php';
class ImmersiveRoom extends Room
{
    private $specialEffects;

    public function __construct($_number, $_specialEffects, $_capacity = 300)
    {
        parent::__construct($_number, $_capacity);
        $this->specialEffects = $_specialEffects;
    }

    public function addSpecialEffect($effect)
    {
        $this->specialEffects[] = $effect;
    }

    public function setSpecialEffects($_effects)
    {
        $this->specialEffects = $_effects;
    }

    public function getSpecialEffects()
    {
        return $this->specialEffects;
    }

    public function getSpecialEffectsString()
    {
        return implode(", ", $this->specialEffects);
    }

    public function getInfo()
    {
        return parent::getInfo() . ", effetti speciali:  " . $this->getSpecialEffectsString();
    }
}
