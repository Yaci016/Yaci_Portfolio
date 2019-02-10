<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 07/11/18
 * Time: 15:03
 */

class Cercle extends Shape
{
    protected $radius;

    public function __construct($opacity, $location, $color, $radius)
    {
        parent:: __construct($opacity, $location, $color);
        $this->radius = $radius;
    }

    public function draw(Moteur $moteur)
    {
        $moteur->drawCircle($this->_opacity, $this->_location, $this->_color, $this->radius);
    }

}