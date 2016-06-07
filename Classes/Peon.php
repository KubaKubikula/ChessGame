<?php 
class Peon extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure(){
        
        if($this->color == "white") {
            return "<img src='/images/figures2/wpeon.png' width='30' height='62' style='cursor:move' >";
        } else {
            return "<img src='/images/figures2/bpeon.png' width='30' height='62' style='cursor:move' >";
        }
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