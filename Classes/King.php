<?php 
class King extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure(){
        if($this->color == "white") {
            return "<img src='/images/figures2/wking.png' width='50' height='62' style='cursor:move' >";
        } else {
            return "<img src='/images/figures2/bking.png' width='50' height='62' style='cursor:move' >";
        }
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