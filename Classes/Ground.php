<?
class Ground{


    public $dimensions = array();

    public $posibleMovements = array();

    public function __construct() {
        
    }

    public function insertFigure(ChessFigure $figure,$x,$y) {

        if(isset($this->dimensions[$x]) AND isset($this->dimensions[$x][$y]) AND $this->dimensions[$x][$y] instanceof ChessFigure) {
            var_dump(" Some figure is already standing on this field.");
        } else {
            $this->dimensions[$x][$y] = $figure; 
        }
    }

    public function deleteFigure($x, $y) {
        $this->dimensions[$x][$y] = null;
    }

    
    public function showMovements($figureDimensions) {

        $this->convertDimensions($figureDimensions);

        if($figureDimensions) {

            if(isset($this->dimensions[$figureDimensions[0]][$figureDimensions[1]]) AND $this->dimensions[$figureDimensions[0]][$figureDimensions[1]] instanceOf ChessFigure) {
                
                $chessFigure = $this->dimensions[$figureDimensions[0]][$figureDimensions[1]];

                return $this->posibleMovements = $chessFigure->posibleMovements( $figureDimensions[0],$figureDimensions[1] );

            } else {
                var_dump("There is no figure.");
                
                return false;
            }
        }

    }

    public function moveChessFigure($figureDimensionsToDimensions) {

    }


    public function convertDimensions($figureDimensions) {

        $letters = array("A","B","C","D","E","F","G","H");

        foreach($letters as $key => $value) {
            if($figureDimensions[1] == $value) {
               $figureDimensions[1] = $key;
               break; 
            }
        }

        return $figureDimensions;
    }

    public function draw() {

        $figures = $this->dimensions;

        $posibleMovements = $this->posibleMovements;
        
        include(dirname(__FILE__) . "/Templates/GroundTemplate.php");
    }






}





?>