<?php 
class Knight extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure() {
        if($this->color == "white") {
            return "<img src='/images/figures2/wknight.png' width='50' height='62' style='cursor:move' >";
        } else {
            return "<img src='/images/figures2/bknight.png' width='50' height='62' style='cursor:move' >";
        }
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