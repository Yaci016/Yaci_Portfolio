<?php

class Care extends Shape
{
    protected $cote;

    public function __construct($opacity, $location, $color, $cote)
    {
        parent:: __construct($opacity, $location, $color);
        $this->cote = $cote;
    }

    public function draw(Moteur $moteur)
    {
        $moteur->drawCare($this->_opacity, $this->_location, $this->_color, $this->cote);
    }
}