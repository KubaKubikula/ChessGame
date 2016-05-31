<?php session_start();


spl_autoload_register(function ($class_name) {
    include "Classes/" . $class_name . '.php';
});

if(!isset($_SESSION["actualState"])) {
    $_SESSION["actualState"] = array();
} else {
    
}


$ground = new Ground();
$game = new Game($ground, $_SESSION["actualState"]);


if(isset($_POST["movefigure"]) AND $_POST["movefigure"]) {
    $sentence = explode(":", $_POST["movefigure"] );
    
    if($sentence[0] == "show") {
        $ground->showMovements($sentence[1]);
    }

    if($sentence[0] == "move") {
        $game->moveChessFigure($sentence[1]);   
    }

    if($sentence[0] == "start"){
        $game->start();

    }

    if($sentence[0] == "stop"){
        $game->stop();
    }
} 

$_SESSION["actualState"] = $game->getActualState();



$game->drawGound();



?>