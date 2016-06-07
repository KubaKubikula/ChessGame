<?php 
class Tower extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure(){

        if($this->color == "white") {
            return "<img src='/images/figures2/wtower.png' width='50' height='62' style='cursor:move' >";
        } else {
            return "<img src='/images/figures2/btower.png' width='50' height='62' style='cursor:move' >";
        }
        
    }

    
    public function posibleMovements($x, $y) {

        return array(
            array("all", $y),
            array($x, "all")
        );

    }
    

}