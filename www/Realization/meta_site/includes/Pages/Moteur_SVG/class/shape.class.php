<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 07/11/18
 * Time: 09:39
 */

abstract class Shape
{
    protected $_opacity;
    protected $_location;
    protected $_color;

    public function __construct($opacity = 0, $location = 0, $color = 0)
    {
        $this->_opacity = $opacity;
        $this->_location = $location;
        $this->_color = $color;
    }

    public function setOpacity($opacity)
    {
        $this->_opacity = $opacity;
    }

    public function setlocation($location)
    {
        $this->_location = $location;
    }

    public function setColor($color)
    {
        $this->_color = $color;
    }

}