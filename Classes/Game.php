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

    public function moveChessFigure($move) {
        /*$moveData = explode(":",$move);

        if($posibleMovements = $this->ground->showMovements($moveData[0]))) {
            $canIGoHere = false;

            foreach($posibleMovements as $movement) {
                if($moveData[1][0] == $movement[0] AND $moveData[1][1] == $movement[1]){
                    $canIGoHere = true;
                }
            }

            if($canIGoHere) {
                   
            }
        } */
    }

    public function start() {

        $this->actualState[2][2] = array("Peon","blue");
        $this->actualState[2][3] = array("Peon","blue");
        $this->actualState[2][4] = array("Peon","blue");
        $this->actualState[2][5] = array("Peon","blue");
        $this->actualState[2][6] = array("Peon","blue");
        $this->actualState[2][7] = array("Peon","blue");
        $this->actualState[2][8] = array("Peon","blue");
        $this->actualState[2][9] = array("Peon","blue");
        $this->actualState[1][2] = array("Tower","blue");
        $this->actualState[1][3] = array("Tower","blue");
        $this->actualState[1][4] = array("Bishop","blue");
        $this->actualState[1][5] = array("Bishop","blue");
        $this->actualState[1][6] = array("Knight","blue");
        $this->actualState[1][7] = array("Knight","blue");
        $this->actualState[1][8] = array("Queen","blue");
        $this->actualState[2][9] = array("King","blue");

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