<?PHP 
if(isset($_GET['d_Y'],$_GET['d_X'],$_GET['temps'])){
    $y = $_GET['d_Y'];
    $x = $_GET['d_X'];
    $tmp= $_GET['temps'];
    
    setcookie("d_x",$y, time()+86400, "/", "localhost", false, true);
    setcookie("d_y",$x, time()+86400, "/", "localhost", false, true);
    setcookie("tmp",$tmp, time()+86400, "/", "localhost", false, true); 
} else{
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
    <title>Joc de la vida</title>
    <LINK REL=StyleSheet HREF="estil.css" TYPE="text/css" MEDIA=screen>
</head>
<body class="borde">
<nav>
        <ul>
            <li><a class="active" href="inici.html">JOC DE LA VIDA</a></li>
            <li><a href="inici.html">INICI</a></li>
            <li><a href="configuracio.html">JUGA</a></li>
            <li><a href="partidaguardada.php">PARTIDES GUARDADES</a></li>
          </ul>
        </nav>

    <form id="myform" class="sep-top" action="joc.php" method="post">
        <table>
            <?php

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
                <td class="none"><div class="boto"><a href="configuracio.html">ANTERIOR</a></div></td>
                <td class="none"></td>
                <td class="none"></td>
                <td class="none"><div class="boto"><button class="but" form="myform">SEGUENT</button></div></td>
            </tr>
    
    </table>
    
</body>
</html>