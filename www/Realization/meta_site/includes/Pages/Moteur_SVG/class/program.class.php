<?php
/**
 * Created by PhpStorm.
 * User: wali7
 * Date: 07/11/18
 * Time: 15:16
 */

class program
{
    protected $moteur;

    public function __construct(Moteur $moteur)
    {
        $this -> moteur = $moteur;
    }

    public function dessinerForme($forme){
        switch ($forme) {
            case 'rectangle':

                $opacity = $_POST['opacity'];
                $positionX = $_POST['posX'];
                $positionY = $_POST['posY'];
                $color = $_POST['color'];
                $height = $_POST['height'];
                $width = $_POST['width'];
                $rectangle = new Rectangle($opacity, new Point($positionX, $positionY), $color, $height, $width);
                $this -> moteur->addShape($rectangle);
                break;
            case 'Care':
                $opacity = $_POST['opacity'];
                $positionX = $_POST['posX'];
                $positionY = $_POST['posY'];
                $color = $_POST['color'];
                $cote = $_POST['cote'];
                $care = new Care($opacity, new Point($positionX, $positionY), $color, $cote);
                $this -> moteur->addShape($care);
                break;
            case 'Elipse':
                $opacity = $_POST['opacity'];
                $positionX = $_POST['posX'];
                $positionY = $_POST['posY'];
                $color = $_POST['color'];
                $horizontal_radius = $_POST['horizontal_radius'];
                $vertical_radius = $_POST['vertical_radius'];
                $elipse = new Elipse($opacity, new Point($positionX, $positionY), $color, $horizontal_radius, $vertical_radius);
                $this -> moteur->addShape($elipse);
                break;
            case 'Cercle':
                $opacity = $_POST['opacity'];
                $positionX = $_POST['posX'];
                $positionY = $_POST['posY'];
                $color = $_POST['color'];
                $radius = $_POST['radius'];
                $circle = new Cercle($opacity, new Point($positionX, $positionY), $color, $radius);
                $this->moteur->addShape($circle);
                  break;
            case 'triangle':
                $opacity = $_POST['opacity'];
                $color = $_POST['color'];
                $px1 = $_POST['px1'];
                $py1 = $_POST['py1'];
                $px2 = $_POST['px2'];
                $py2 = $_POST['py2'];
                $px3 = $_POST['px3'];
                $py3 = $_POST['py3'];
                //code here
                $triangle = new triangle($opacity, $color, new Point($px1, $py1), new Point($px2, $py2), new Point($px3, $py3));
                $this -> moteur->addShape($triangle);
                break;
        }
    }
    public function run()
    {
        $this -> moteur ->run();
        $this -> moteur ->getResult();
    }
}