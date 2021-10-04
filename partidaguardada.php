<?php
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
    <LINK REL=StyleSheet HREF="estil.css" TYPE="text/css" MEDIA=screen>
    <title>Document</title>
</head>
<body>
    <nav>
    <ul>
        <li><a href="#home">JOC DE LA VIDA</a></li>
        <li><a href="configuracio.html">JUGA</a></li>
        <li><a class="active"  href="partidaguardada.php">PARTIDES GUARDADES</a></li>
      </ul>
    </nav>
    <fieldset class="principal">
        <legend><h1 >PARTIDES GUARDADES</h1></legend>
       
        <form id="myform" action="jocg.php" method="GET">         
                        <?php 
                        if(count($noms)<4){
                            echo '<h2>NO HI HAN PARTIDES GUARDADES</h2>';
                        } else {
                            echo '<h2>NO HI HAN PARTIDES GUARDADES</h2>';
                            for($i=0;$i<@count($noms);$i++){
                                echo '<label><input type="radio" id="html" name="fav_language" value="'.$noms[$i].'">'.$noms[$i].'</label>';
                                //echo '<option value="'.$noms[$i].'">';
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
                <td class="none"> <div class="boto"><button class="but" form="myform">SEGUENT</button></div></td>
            </tr>
    
    </table>
        
    </fieldset>
</body>