<?php

class Rectangle extends Shape
{
    private $_height;
    private $_largeur;

    public function __construct($opacity, $location, $color, $height, $largeur)
    {
        parent:: __construct($opacity, $location, $color);
        $this->_height = $height;
        $this->_largeur = $largeur;
    }

    public function draw(Moteur $moteur)
    {
        $moteur->drawRectangle($this->_opacity, $this->_location, $this->_color, $this->_height, $this->_largeur);
    }

}