<?php 
class Queen extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure(){
        return "<img src='/images/figures/queen.png' width='30' height='70' style='cursor:move' >";
    }

    public function posibleMovements($x, $y) {


        $posibles = array();
        $i = 1;
        
        for($i = 1; $i < 9 ; $i ++) {
            $posibles[] = array($x + $i , $y + $i);
            $posibles[] = array($x + $i , $y - $i);
            $posibles[] = array($x - $i , $y + $i);
            $posibles[] = array($x - $i , $y - $i);
        }

        $posibles[] = array("all", $y);
        $posibles[] = array($x, "all");


        return $posibles;

    }

}