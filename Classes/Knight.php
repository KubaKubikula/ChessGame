<?php 
class Knight extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure() {
        return "<img src='/images/figures/knight.png' width='30' height='65' style='cursor:move' >";
    }

    public function posibleMovements($x, $y) {

            return array(
                array($x + 2, $y + 1),
                array($x - 2, $y - 1),
                array($x - 2, $y + 1),
                array($x + 2, $y - 1),
                array($x + 1, $y + 2),
                array($x - 1, $y - 2),
                array($x + 1, $y - 2),
                array($x - 1, $y + 2),  
            );

        

    }

}