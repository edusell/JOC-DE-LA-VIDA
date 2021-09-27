<?PHP 
  $y = $_GET['d_Y'];
  $x = $_GET['d_X'];
setcookie("d_x",$y);
setcookie("d_y",$x);
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
    <h1 >JOC DE LA VIDA</h1>
    <form action="joc.php" method="post">
    <?php
    $y = $_GET['d_Y'];
    $x = $_GET['d_X'];

    for($i=0;$i<$y;$i++){
        echo "<br>";
        for($z=0;$z<$x;$z++){
            echo '<label><input type="checkbox" name="cel[]" value="'.$i.','.$z.'"/><span></span></label>';
        }
    }
    ?>
    <br><br>
    <button style="seguent">JUGA</button>
    </form>
</body>
</html>