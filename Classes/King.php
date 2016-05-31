<?php 
class King extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure(){
        return "<img src='/images/figures/king.png' width='30' height='72' style='cursor:move' >";
    }


    public function posibleMovements($x, $y) {

            return array(
                array($x + 1, $y),
                array($x - 1, $y),
                array($x, $y + 1),
                array($x, $y - 1),
            );
            

    }

}