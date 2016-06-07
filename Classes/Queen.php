<?php 
class Queen extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure(){
        if($this->color == "white") {
            return "<img src='/images/figures2/wqueen.png' width='50' height='62' style='cursor:move' >";
        } else {
            return "<img src='/images/figures2/bqueen.png' width='50' height='62' style='cursor:move' >";
        }
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