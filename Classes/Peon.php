<?php 
class Peon extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure(){
        return "<img src='/images/figures/peon.png' width='30' height='50' style='cursor:move' >";
    }

    public function posibleMovements($x, $y) {

        if($this->color == "black") {
            if($x == 7) {
                return array( 
                    array( $x - 1 , $y),
                    array( $x - 2 , $y) 
                );
            } else {
                return array( 
                    array( $x - 1 , $y) 
                );
            }
        }

        if($this->color == "blue") {
            if($x == 2) {
                return array( 
                    array( $x + 1 , $y),
                    array( $x + 2 , $y) 
                );
            } else {
                return array( 
                    array( $x + 1 , $y) 
                );
            }
        }

    }

}