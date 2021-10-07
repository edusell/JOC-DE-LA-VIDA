<?PHP 

//comprovem si les cookies on enmagatzemo les dimensions estan definides.
if(isset($_GET['d_Y'],$_GET['d_X'],$_GET['temps'])){
    $y = $_GET['d_Y'];
    $x = $_GET['d_X'];
    $tmp= $_GET['temps'];
    
    setcookie("d_x",$y, time()+86400, "/", "", false, true);
    setcookie("d_y",$x, time()+86400, "/", "", false, true);
    setcookie("tmp",$tmp, time()+86400, "/", "", false, true); 
} else{//si no ho estan agafo els valors del formolari.
   $x = $_COOKIE["d_x"];
  $y = $_COOKIE["d_y"];
@$tmp = $_COOKIE["tmp"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <LINK REL=StyleSheet HREF="estil.css" TYPE="text/css" MEDIA=screen>
    <title>JOC DE LA VIDA</title>
</head>
<body class="borde">
<nav>
<nav>
        <ul>
            <li><a href="inici.html">JOC DE LA VIDA</a></li>
            <li class="active"><a href="configuracio.html">JUGA</a></li>
            <li class="submenu">DIMENSIONS</li>
            <li class="submenu subactivat">CÉL·LULES</li>
            <li class="submenu ">JOC</li>
            <li><a href="partidaguardada.php">PARTIDES GUARDADES</a></li>
          </ul>
        </nav>
        </nav>

    <form id="myform" class="sep-top" action="joc.php" method="post">
        <table>
            <?php
            //imprimeixo una taula de checkbox on seleccionare les cel·les vives.
            for($i=0;$i<$y;$i++){
                echo "<tr>";
                for($z=0;$z<$x;$z++){
                    echo '<td class="graella"><input type="checkbox" name="cel[]" value="'.$i.','.$z.'"></td>';
                }
                echo "</tr>";
            }
            ?>
        </table>
    <br>
    
    </form>
    <table class="footer">
            <tr>
                <td class="none"><a href="configuracio.html"><div class="boto">ANTERIOR</div></a></td>
                <td class="none"></td>
                <td class="none"></td>
                <td class="none"></td>
                <td class="none"><button class="but" form="myform"><div class="boto">SEGUENT</div></button></td>
            </tr>
    
    </table>
    
</body>
</html>