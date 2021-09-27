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
    <h1 >JOC DE LA VIDA</h1>
    <H2 >EDUARD SELLAS LLEÓ</H2>
    
    <table id="tauler">

    </table>
    <div class="borde" style="width: 20%;margin: auto;margin-top: 20px;"><button onclick="boto()">PLAY/PAUSE</button></div>
<?php
$d_x = $_COOKIE['d_x'];
$d_y = $_COOKIE['d_y'];
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
const temp =<?=$arr?>;

for(var i=0;i<arr.length;i++){
    var pos=arr[i].split(',');
    pos[0]=x-1-pos[0];
    pos[1]=y-1-pos[1];
    viu[pos[0]][pos[1]]=1;
}
document.write("hola");

//imprimim la taula amb les cel·lules vives pintades
for(var i =0;i<x;i++){
    var table = document.getElementById("tauler");
    var row = table.insertRow(0);
    for(var z=0;z<y;z++){
        if(viu[i][z]){
            pviu();
        } else{
            pmort();
        }
    }
}

//calculem el numero de veins de cada celula
for(var i =1;i<y;i++){
    //document.write("</br>");
    for(var z=1;z<y;z++){
   // document.write(sum(i,z)+" ");
    temp[i][z]=sum(i,z);    
    }
}
document.write("hola");
//creem el nou array
for(var i =1;i<y;i++){
    document.write("</br>");
        for(var z=1;z<y;z++){
            if(viu[i][z]==1){
                if(temp[i][z]<2){
                    viu[i][z]=0;
                } else  if(temp[i][z]<3){
                    viu[i][z]=0;
                } else  if(temp[i][z]==2 || temp[i][z]==3){
                    viu[i][z]=1;
                } else{
                    viu[i][z]=0;
                }
            }else{
                if(temp[i][z]==3){
                    viu[i][z]=1;
                } else {
                    viu[i][z]=0;
                }
            }
    }
}

//imprimim el nou array
for(var i =1;i<y;i++){
    document.write("</br>");
    for(var z=1;z<y;z++){
    document.write(viu[i][z]);   
    }
}

//var table = document.getElementById("tauler");
//table.innerHTML= "";




function pviu(x) {
    var cell1 = row.insertCell(0);
    cell1.style.backgroundColor = "white";
    cell1.innerHTML = " ";
}

function pmort() {

        var cell1 = row.insertCell(0);
        cell1.innerHTML = " ";
}
function borrartaula(){
    var table = document.getElementById("tauler");
    table.removeChild();
}

function sum(vx,vy){
    var sum=0;/*
    if(vx==0 && vy ==0){
        sum= viu[vx+1][vy]+viu[vx][vy+1]+viu[vx+1][vy+1];
    } else if(vx==0){
        sum==viu[vx][vy-1]+viu[vx+1][vy-1]+viu[vx+1][vy]+viu[vx][vy+1]+viu[vx+1][vy+1];
    } else if(vy==0){
        sum= viu[vx-1][vy]+viu[vx+1][vy]+viu[vx-1][vy+1]+viu[vx][vy+1]+viu[vx+1][vy+1];
    } else if(vx==X && vy==Y){
        sum= viu[vx-1][vy]+viu[vx-1][vy-1]+viu[vx][vy];
    }else if(vx==X){
        sum=viu[][]+viu[][]+viu[][]+viu[][]+viu[][];
    } else{ */   
        sum = viu[vx-1][vy-1]+viu[vx][vy-1]+viu[vx+1][vy-1]+viu[vx-1][vy]+viu[vx+1][vy]+viu[vx-1][vy+1]+viu[vx][vy+1]+viu[vx+1][vy+1];
    
        return sum;
}
</script>
</html>