<?php 
abstract class ChessFigure {
    
    public $positionX = null;
    public $positionY = null;

    public $canMove = null;

    public $color = null;

    public $name = null;


    /**
    * @return string
    */
    public function name()
    {
      return static::class;
    }

    public function drawFigure(){

    }


}




?>