<?
class Ground{


    public $dimensions = array();

    public $posibleMovements = array();

    public $messages = array();

    public function __construct() {
        
    }

    public function insertFigure(ChessFigure $figure,$x,$y) {

        if(isset($this->dimensions[$x]) AND isset($this->dimensions[$x][$y]) AND $this->dimensions[$x][$y] instanceof ChessFigure) {
            $this->messages[] = " Some figure is already standing on this field.";
        } else {
            $this->dimensions[$x][$y] = $figure; 
        }
    }

    public function deleteFigure($x, $y) {
        $this->dimensions[$x][$y] = null;
    }

    
    public function showMovements($figureDimensions) {

        $figureDimensions = self::convertDimensions($figureDimensions);

        if($figureDimensions) {

            if(isset($this->dimensions[$figureDimensions[0]][$figureDimensions[1]]) AND $this->dimensions[$figureDimensions[0]][$figureDimensions[1]] instanceOf ChessFigure) {
                
                $chessFigure = $this->dimensions[$figureDimensions[0]][$figureDimensions[1]];

                return $this->posibleMovements = $chessFigure->posibleMovements( $figureDimensions[0],$figureDimensions[1] );

            } else {
                $this->messages[] = "There is no figure";
                
                return false;
            }
        }

    }

    public function getMovements($figureDimensions) {

        $figureDimensions = self::convertDimensions($figureDimensions);

        if($figureDimensions) {

            if(isset($this->dimensions[$figureDimensions[0]][$figureDimensions[1]]) AND $this->dimensions[$figureDimensions[0]][$figureDimensions[1]] instanceOf ChessFigure) {
                
                $chessFigure = $this->dimensions[$figureDimensions[0]][$figureDimensions[1]];

                return $chessFigure->posibleMovements( $figureDimensions[0],$figureDimensions[1] );

            } else {
                $this->messages[] = "There is no figure";
                
                return false;
            }
        }

    }

    


    public static function convertDimensions($figureDimensions) {

        $letters = array(2 => "A",3 => "B",4 => "C",5 => "D",6 => "E",7 => "F",8 => "G", 9 => "H");

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

        $messages = $this->messages;
        
        include(dirname(__FILE__) . "/Templates/GroundTemplate.php");
    }






}





?>