<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 07/11/18
 * Time: 15:14
 */

class triangle extends Shape
{
    private $point1;
    private $point2;
    private $point3;

    public function __construct($opacity, $color, $point1, $point2, $point3)
    {
        parent:: __construct($opacity, $color);
        $this->point1 = $point1;
        $this->point2 = $point2;
        $this->point3 = $point3;
    }

    public function draw(Moteur $moteur)
    {
        $moteur->drawTriangle($this->_opacity, $this->_color, $this->point1, $this->point2, $this->point3);
    }

}