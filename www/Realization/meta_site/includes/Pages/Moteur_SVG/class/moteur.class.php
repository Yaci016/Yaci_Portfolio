<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 07/11/18
 * Time: 09:38
 */

class Moteur
{
    protected $_results = [];//balise svg
    protected $_shapes = []; //objet

    public function addShape()
    {
        $les_elements_ajoute = func_get_args();
        foreach ($les_elements_ajoute as $element) {
            $this->_shapes[] = $element;
        }
    }
    public function drawCare($opacity, Point $location, $color, $cote)
    {
        $x = $location->getX();
        $y = $location->getY();
        $care = "<rect x=\"$x\" y=\"$y\" width=\"$cote\" height=\"$cote\"style=\"fill:$color;stroke:$color;stroke-width:5;opacity:$opacity\" />";
        $this->_results[] = $care;
    }
    public function drawRectangle($opacity, Point $location, $color, $height, $largeur)
    {
        $x = $location->getX();
        $y = $location->getY();
        $rectangle = "<rect x=\"$x\" y=\"$y\" width=\"$largeur\" height=\"$height\"style=\"fill:$color;stroke:$color;stroke-width:5;opacity:$opacity\" />";
        $this->_results[] = $rectangle;
    }
    public function drawCircle($opacity, Point $location, $color, $radius)
    {
        $x = $location->getX();
        $y = $location->getY();
        $circle = "<circle cx=\"$x\" cy=\"$y\" r=\"$radius\" style=\"fill:$color;opacity:$opacity\" />";
        $this->_results[] = $circle;
    }
    public function drawEllipse($opacity, Point $location, $color, $horizontal_Radius, $vertical_radius)
    {
        $x = $location->getX();
        $y = $location->getY();
        $elipse = "<ellipse cx=\"$x\" cy=\"$y\" rx=\"$horizontal_Radius\" ry=\"$vertical_radius\" style=\"fill:$color;opacity:$opacity\"/>";
        $this->_results[] = $elipse;
    }

    public function drawTriangle($opacity, $color, Point $point1, Point $point2, Point $point3)
    {


        $px1 = $point1->getX();
        $py1 = $point1->getY();

        $px2 = $point2->getX();
        $py2 = $point2->getY();

        $px3 = $point3->getX();
        $py3 = $point3->getY();
        $triangle = "<polygon points=\"$px1,$py1 $px2,$py2 $px3,$py3\" style=\"fill:$color;stroke-width:1;opacity:$opacity\" />";
        $this->_results[] = $triangle;
    }
    public function getResult()
    {

        foreach ($this->_results as $result) {

            array_push($_SESSION['results'], $result);
        }

        if (isset($_SESSION['results'])) {
            foreach ($_SESSION['results'] as $result) {
                echo $result;
            }
        }
    }
    public function run()
    {
        foreach ($this->_shapes as $shape) {
            $shape->draw($this);
        }
    }
}
