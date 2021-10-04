<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc de la vida</title>
    <LINK REL=StyleSheet HREF="estil.css" TYPE="text/css" MEDIA=screen>
    <style>

    </style>
</head>
<body>
<nav>
        <ul>
            <li><a href="inici.html">JOC DE LA VIDA</a></li>
            <li><a class="active" href="configuracio.html">JUGA</a></li>
            <li><a href="partidaguardada.php">PARTIDES GUARDADES</a></li>
          </ul>
        </nav>

    
    <table id="tauler">

    </table>
    <table class="footer">
            <tr>
                <td class="none"><div class="boto"><a href="graella.php">ANTERIOR</a></div> </td>
                <td class="none"><div class="boto"> <button class="but" onclick="play()">PLAY</button></div></td>
                <td class="none"><div class="boto"><button class="but" onclick="pause()">PAUSE</button></div></td>
                <td class="none"><div class="boto"><button class="but" onclick="guardar()">GUARDAR</button></div></td>
            </tr>
            
    </table>
  
<?php
if(!isset($_POST['cel'])){
    header('Location: graella.php');}
$d_x = $_COOKIE['d_x'];
$d_y = $_COOKIE['d_y'];
@$tmp = $_COOKIE['tmp'] * 1000;

$arr = '[';

for ($i=0;$i<$d_x;$i++){
    $arr=$arr.'[';
    for ($e=1;$e<$d_y;$e++){
        $arr=$arr.'0,'; 
    }
    $arr=$arr.'0],';
}
$arr=$arr.']';

$check= $_POST['cel'];
//print_r($check);
//echo json_encode($check);
?>
    
</body>
<script>
var x = <?=$d_x?>;
var y = <?=$d_y?>;
const arr= <?php echo json_encode($check);?>;
const viu = <?=$arr?>;
const viu1 = <?=$arr?>;
const temp =<?=$arr?>;
var idVar=0;
    idvar=0;

for(var i=0;i<arr.length;i++){
    var pos=arr[i].split(',');
    pos[0]=x-1-pos[0];
    pos[1]=y-1-pos[1];
    viu[pos[0]][pos[1]]=1;
}
for(var i =0;i<x;i++){
        var table = document.getElementById("tauler");
    var row = table.insertRow(0);
    for(var z=0;z<y;z++){
        if(viu[i][z]){
            var cell1 = row.insertCell(0);
    cell1.style.backgroundColor = "white";
    cell1.innerHTML = "";
        } else{
            var cell1 = row.insertCell(0);
        cell1.innerHTML = "";
        }
    }
    }


function imptaula(){

    //borrem el contingut de la taula
    var table = document.getElementById("tauler");
    table.innerHTML= "";

    //creem la taula a partir de l'array bidimencional
    for(var i =0;i<x;i++){
        var table = document.getElementById("tauler");
    var row = table.insertRow(0);
    for(var z=0;z<y;z++){
        if(viu[i][z]){
            var cell1 = row.insertCell(0);
    cell1.style.backgroundColor = "white";
    cell1.innerHTML = "";
        } else{
            var cell1 = row.insertCell(0);
        cell1.innerHTML = "";
        }
    }
    }

    //calculem el nombre de veins viu de cada cel·la
    for(var i =0;i<x;i++){
        //document.write("</br>");
        for(var z=0;z<=y;z++){
            temp[i][z]= sum(i,z);
            //document.write(temp[i][z]);    
        }
    }

    //creem el nou array
    for(var i =0;i<x;i++){
        for(var z=1;z<y;z++){
            if(viu[i][z]==1){
                if(temp[i][z]<2){
                    viu1[i][z]=0;
                }
                if(temp[i][z]<3){
                    viu1[i][z]=0;
                }
                if(temp[i][z]==2 || temp[i][z]==3){
                    viu1[i][z]=1;
                }
            }else{
                if(temp[i][z]==3){
                    viu1[i][z]=1;
                } else {
                    viu1[i][z]=0;
                }
            }
        }
    }

    copiararr();
    array0();
    array1();
}
function imparr(){
    for(var i =0;i<x;i++){
        document.write("</br>");
        for(var z=0;z<y;z++){
            document.write(viu[i][z]);    
        }
    }
}
function copiararr(){
    for(var i =0;i<x;i++){
        for(var z=0;z<y;z++){
            viu[i][z] = viu1[i][z];   
        }
    }
}
function array0(){
    for(var i =0;i<x;i++){
        for(var z=0;z<y;z++){
            viu1[i][z] =0;   
        }
    }
}
function array1(){
    for(var i =0;i<x;i++){
        for(var z=0;z<y;z++){
            temp[i][z] =0;   
        }
    }
}
function borrartaula(){
    var table = document.getElementById("tauler");
    table.removeChild();
}

function sum(row, col) {
    let count = 0;
    let nrow=Number(row);
    let ncol=Number(col);
    
        if (nrow - 1 >= 0) {
        if (viu[nrow - 1][ncol] == 1) 
            count++;
    }
        if (nrow - 1 >= 0 && ncol - 1 >= 0) {
        if (viu[nrow - 1][ncol - 1] == 1) 
            count++;
    }
        if (nrow - 1 >= 0 && ncol + 1 < y) {
            if (viu[nrow - 1][ncol + 1] == 1) 
                count++;
        }
    if (ncol - 1 >= 0) {
        if (viu[nrow][ncol - 1] == 1) 
            count++;
    }
    if (ncol + 1 < y) {
        if (viu[nrow][ncol+1] == 1) 
            count++;
    }
    if (nrow + 1 < x && ncol - 1 >= 0) {
        if (viu[nrow + 1][ncol - 1] == 1) 
            count++;
    }
    if (nrow + 1 < x && ncol + 1 < y) {
        if (viu[nrow + 1][ncol + 1] == 1) 
            count++;
    }
    
    if (nrow + 1 < x) {
        if (viu[nrow + 1][ncol] == 1) 
            count++;
    }
    
    
    return count;
}

function play(){
    if(idVar==0){
    idVar = setInterval(function(){imptaula();}, <?=$tmp?>);
    }
}
function pause(){
    clearInterval(idVar);
    idVar=0;
}
function guardar(){
    var guardar=[x,y,<?=$tmp?>];
    for(var i =0;i<x;i++){
        for(var z=0;z<y;z++){
            if(viu[i][z]==1){
                guardar.push(i+'-'+z);               
            }   
        }
    }
    var cookie= prompt("INTRODUEIX EL NOM DE LA PARTIDA")+"="+JSON.stringify(guardar)+";max-age=86400;path=/";
    alert('GUARDAT CORRECTAMENT');
    document.cookie= cookie;
}
</script>
</html>