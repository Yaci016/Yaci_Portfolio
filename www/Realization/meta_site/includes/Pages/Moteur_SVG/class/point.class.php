<?php

class Point
{
    protected $_x = 0;
    protected $_y = 0;

    public function __construct($x, $y)
    {
        $this->_x = $x;
        $this->_y = $y;
    }

    public function getX()
    {
        return $this->_x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function move($x, $y)
    {
        if (!is_int($x) && !is_int($y)) {
            echo 'x et y doivent etre des entiers';
            return;
        }
        $this->_x = $this->_x + $x;
        $this->_y = $this->_y + $y;
    }

    public function moveTo($x, $y)
    {
        if (!is_int($x) && !is_int($y)) {
            echo 'x et y doivent etre des entiers';
            return;
        }
        $this->_x = $x;
        $this->_y = $y;
    }

}