<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 07/11/18
 * Time: 14:52
 */

class Elipse extends Shape
{
    protected $horizontal_Radius;
    protected $vertical_radius;

    public function __construct($opacity, $location, $color, $horizontal_Radius, $vertical_radius)
    {
        parent:: __construct($opacity, $location, $color);
        $this->horizontal_Radius = $horizontal_Radius;
        $this->vertical_radius = $vertical_radius;
    }

    public function draw(Moteur $moteur)
    {
        $moteur->drawEllipse($this->_opacity, $this->_location, $this->_color, $this->horizontal_Radius, $this->vertical_radius);
    }
}