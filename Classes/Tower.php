<?php 
class Tower extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure(){
        return "<img src='/images/figures/tower.png' width='30' height='62' style='cursor:move' >";
    }

    
    public function posibleMovements($x, $y) {

        return array(
            array("all", $y),
            array($x, "all")
        );

    }
    

}