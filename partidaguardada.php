<?php
    //llisto totes les coockies excepte a les que guardo les dimensions i el temps d'execusió
        $i=0;
        if(isset($_COOKIE) && !empty($_COOKIE)){
            foreach($_COOKIE AS $keyName => $valueOfKey){
                if($keyName != 'd_x' && $keyName != 'd_y' && $keyName != 'tmp'){
                $noms[$i]= $keyName;
                //echo $noms[$i]."</br>";
                $i++;
                }
            }
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
<body>
    <nav>
    <ul>
        <li><a href="inici.html">JOC DE LA VIDA</a></li>
        <li><a href="configuracio.html">JUGA</a></li>
        <li class="active"><a  href="partidaguardada.php">PARTIDES GUARDADES</a></li>
      </ul>
    </nav>
    <fieldset class="principal">
        <legend><h1 >PARTIDES GUARDADES</h1></legend>
       
        <form id="myform" action="jocg.php" method="GET">         
                        <?php //comprovo si hi han partides guardades
                        if(!isset($noms)){
                            echo '<h2>NO HI HAN PARTIDES GUARDADES</h2>';
                        } else {// llisto les partides guardades en un formolari que enviara el nom de la partida guardada per get a la pagina jog.php
                            echo '<h2>SELECCIONI LA PARTIDA QUE VOL CARGAR</h2>';
                            for($i=0;$i<@count($noms);$i++){
                                echo '<label><input type="radio" id="partides" name="partides" value="'.$noms[$i].'">'.$noms[$i].'</label><br>';
                            }
                        }
                        
                        ?>
       <br>
        </form>
        <table class="footer">
            <tr>
                <td class="none"><a href="inici.html"><div class="boto">ANTERIOR</div></a> </td>
                <td class="none"></td>
                <td class="none"></td>
                <td class="none"></td>
                <td class="none"><button class="but" form="myform"> <div class="boto">SEGUENT</div></button></td>
            </tr>
    
    </table>
        
    </fieldset>
</body>