<!doctype html>
<html lang="en">
<head>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
 


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

    width:300px;
    height:100px;
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

</style>

<script type="text/javascript">
 
$( init );
 
function init() {
  $('img').draggable();
  $('td').droppable( {
    drop: handleDropEvent
    
  } );
}
 
function handleDropEvent( event, ui ) {
  var draggable = ui.draggable;
  alert( 'The square with ID "' + draggable.attr('id') + '" was dropped onto me!' );
}
 
</script>

</head>
<body style="margin:0;padding:0;">

<? $i = 1;$j = 1; ?>

<div class="ground" style="margin:0 auto;width:100%;">

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
            <td class="<? if($j == 1){ echo "first" ;} ?>" <? echo $color; ?> >
                <? echo  ($j == 1 ? $i : "" ) ;?>
                <? if(isset($figures[$i]) AND isset($figures[$i][$j])) { echo "<span style='color:".$figures[$i][$j]->color."' >" . $figures[$i][$j]->drawFigure() . "</span>";} ?>
            </td>
            <? } ?>
        </tr>
        <? } ?>
    </table>
</div>

Messages:
<div class="messagebox">
</div>
<div style="padding-top:10px;">
    <form method="POST" action="/" >    
        Move figure: <input type="text" name="movefigure" /> <input type="submit" name="moveaction" value="Move" />
    </form>
</div>


</div>

</body>
</html>