<!doctype html>
<html lang="en">
<head>


<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>
 
<style>

*{
    margin:0;padding:0;
}

table{
    border-spacing: none;
     border-collapse: collapse;
}

table td {
    border: 1px black dotted;
    width:60px;
    height:60px;
    text-align: center;


}

table td:hover{
    background-color: white;
}

.messagebox {
    border: 1px black dotted;
    padding:5px;
    width:400px;
    height:200px;
    overflow: scroll;
}

.ground {
    background-image: url( "/images/board.png");
    background-repeat: no-repeat;
    width:720px; height: 720px;
}

.first{
    width:34px;
    height:79px;
}

.topfirst{
    height:38px;
    width:80px;
}

.rightbox{

    margin-left:20px;

    padding-top:40px;
    float:left;
}

</style>

<script type="text/javascript">
 
$( init );
 
function init() {
  $('img').draggable({
      cursor: 'move',
      revert: true
  });
  $('td').droppable( {
    drop: handleDropEvent
    
  });
}
 
function handleDropEvent( event, ui ) {
  var draggable = ui.draggable;

  alert( 'The square with ID "' + $(this).attr('id') + '" was dropped onto me!' );

  /*$.ajax("",

  );*/

  // if correct save position redraw

  // if not do nothing
}
 
</script>

</head>
<body style="margin:0;padding:0;">

<? $i = 1;$j = 1; ?>

<div class="ground" style="float:left;">

    <table>
        <tr>
            <td style="width:34px;height:38px"></td><td class="topfirst">A</td><td class="topfirst">B</td><td class="topfirst">C</td><td class="topfirst">D</td><td class="topfirst">E</td><td class="topfirst">F</td><td class="topfirst">G</td><td class="topfirst">H</td>
        </tr>
        <? for($i = 1 ; $i < 9 ; $i ++) { ?>
        <tr>
            <? for($j = 1 ; $j <= 9 ; $j ++) { ?>

            <?
            
            $color = "";
            if( ( $j + $i ) % 2 == 0  AND $j !== 1) { /*$color = 'style="background-color:#DDDDDD;"'; */ }
            if($posibleMovements) {
                foreach($posibleMovements as $movement) {

                    if( ($movement[0] == $i OR $movement[0] === "all") AND ( ($movement[1] == $j) OR ($movement[1] === "all")) AND !isset($figures[$i][$j]) ) {
                        $color = 'style="background-color: yellow;"';
                    }

                }
            }

             ?>   
            <td id="<? echo $i . "" . $j; ?>" class="<? if($j == 1){ echo "first" ;} ?>" <? echo $color; ?> >
                <? echo  ($j == 1 ? $i : "" ) ;?>
                <? if(isset($figures[$i]) AND isset($figures[$i][$j])) { echo "<span style='color:".$figures[$i][$j]->color."' >" . $figures[$i][$j]->drawFigure() . "</span>";} ?>
            </td>
            <? } ?>
        </tr>
        <? } ?>
    </table>
</div>
<div class="rightbox">
Messages:
<div class="messagebox">
    <? foreach( $messages as $message ) { ?>
         <div class="message"><? echo $message; ?></div>
    <? } ?>

</div>
<div style="padding-top:10px;">
    <form method="POST" action="/" >    
        Move figure: <input type="text" name="movefigure" value="<? if(isset($_POST["movefigure"])) { echo $_POST["movefigure"];} ?>" /> <input type="submit" name="moveaction" value="Move" />
    </form>
</div>
</div>
<div style="clear:both">


</div>

</body>
</html>