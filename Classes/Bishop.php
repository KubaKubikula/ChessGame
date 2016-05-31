<?php 
class Bishop extends ChessFigure{

    public function __construct($color ) {
        
        $this->color = $color;
    }


    public function drawFigure(){
        return "<img src='/images/figures/bishop.png' width='30' height='65' style='cursor:move' >";
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

            

            return $posibles;
            

    }

}