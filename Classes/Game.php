<?php
class Game{

    public $ground = null;

    public $actualState = array();
    

    public function __construct(Ground $ground, $actualState ) {
        $this->ground = $ground;
        $this->actualState = $actualState;
        
        if(count($this->actualState)) {
            $this->reconstructStates();
        }
    }


    public function reconstructStates() {

        
        foreach($this->actualState as $x => $item) {
            foreach($item as  $y => $figure)
       
            $this->ground->insertFigure(new $figure[0]($figure[1]), $x, $y );
        }
    }


    /**
    *
    *       Am I on move ?
    */
    public function moveChessFigure($move) {
        $moveData = explode("-",$move);

        if($posibleMovements = $this->ground->getMovements($moveData[0])) {
            $canIGoHere = false;

            $moveData[0] = Ground::convertDimensions($moveData[0]);
            $moveData[1] = Ground::convertDimensions($moveData[1]);

            foreach($posibleMovements as $movement) {
                if($moveData[1][0] == $movement[0] AND $moveData[1][1] == $movement[1]){
                    $canIGoHere = true;
                }
            }

            if($canIGoHere) {
                   if($this->ground->dimensions[$moveData[0][0]][$moveData[0][1]] instanceof ChessFigure) {
                        $chessFigure = $this->ground->dimensions[$moveData[0][0]][$moveData[0][1]];
                        
                        $this->ground->insertFigure($chessFigure, $moveData[1][0], $moveData[1][1]);
                        $this->ground->deleteFigure($moveData[0][0], $moveData[0][1]);

                        $this->actualState[$moveData[1][0]][$moveData[1][1]] = array($chessFigure->name(), $chessFigure->color);
                        unset($this->actualState[$moveData[0][0]][$moveData[0][1]]);
                   }
            } else {
               $this->ground->messages[] = "You can not go here"; 
            }


        } 
    }

    public function start() {

        $this->actualState[2][2] = array("Peon","white");
        $this->actualState[2][3] = array("Peon","white");
        $this->actualState[2][4] = array("Peon","white");
        $this->actualState[2][5] = array("Peon","white");
        $this->actualState[2][6] = array("Peon","white");
        $this->actualState[2][7] = array("Peon","white");
        $this->actualState[2][8] = array("Peon","white");
        $this->actualState[2][9] = array("Peon","white");
        $this->actualState[1][2] = array("Tower","white");
        $this->actualState[1][3] = array("Tower","white");
        $this->actualState[1][4] = array("Bishop","white");
        $this->actualState[1][5] = array("Bishop","white");
        $this->actualState[1][6] = array("Knight","white");
        $this->actualState[1][7] = array("Knight","white");
        $this->actualState[1][8] = array("Queen","white");
        $this->actualState[2][9] = array("King","white");

        $this->actualState[7][2] = array("Peon","black");
        $this->actualState[7][3] = array("Peon","black");
        $this->actualState[7][4] = array("Peon","black");
        $this->actualState[7][5] = array("Peon","black");
        $this->actualState[7][6] = array("Peon","black");
        $this->actualState[7][7] = array("Peon","black");
        $this->actualState[7][8] = array("Peon","black");
        $this->actualState[7][9] = array("Peon","black");
        $this->actualState[8][2] = array("Tower","black");
        $this->actualState[8][3] = array("Tower","black");
        $this->actualState[8][4] = array("Bishop","black");
        $this->actualState[8][5] = array("Bishop","black");
        $this->actualState[6][6] = array("Knight","black");
        $this->actualState[8][7] = array("Knight","black");
        $this->actualState[8][8] = array("Queen","black");
        $this->actualState[8][9] = array("King","black");
        
    
        foreach($this->actualState as $x => $item) {
            foreach($item as  $y => $figure) {
                $this->ground->insertFigure(new $figure[0]($figure[1]), $x, $y );
            }
        }

    }

    public function getActualState() {
        return $this->actualState;
    }

    public function stop() {
         $_SESSION["dimensions"] = array();
    }

    public function drawGound() {
        $this->ground->draw();
    }

    
}