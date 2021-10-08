<!--PAGINA DE JOC AL PROCEDIR DE UNA PARTIDA GUARDADA-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <LINK REL=StyleSheet HREF="estil.css" TYPE="text/css" MEDIA=screen>
    <title>JOC DE LA VIDA</title>
    <style>

    </style>
</head>
<body>
<nav>
<ul>
            <li><a href="inici.html">JOC DE LA VIDA</a></li>
            <li class="active"><a href="configuracio.html">JUGA</a></li>
            <li class="submenu">DIMENSIONS</li>
            <li class="submenu ">CÉL·LULES</li>
            <li class="submenu subactivat">JOC</li>
            <li><a href="partidaguardada.php">PARTIDES GUARDADES</a></li>
          </ul>
        </nav>

    
    <table id="tauler">

    </table>
    <table id="info" class="info">

    </table>
    <table class="footer">
            <tr>
                <td class="none"><div class="boto"><a href="graella.php">ANTERIOR</a></div> </td>
                <td class="none"><div class="boto"> <button class="but" onclick="play()">PLAY</button></div></td>
                <td class="none"><input type="range" id="temps" name="temps" value="0.2" step="0.01" min="0.1" max="1" onchange="temps()"></td>
                <td class="none"><div class="boto"><button class="but" onclick="pause()">PAUSE</button></div></td>
                <td class="none"><div class="boto"><button class="but" onclick="guardar()">GUARDAR</button></div></td>
            </tr>
            
    </table>
  
<?php
//Si no rep els paramatres del formulari et reenvia a partides guardades
if(!isset($_GET['partides']) || !isset($_COOKIE[$_GET['partides']])){
    header('Location: partidaguardada.php');} 

//creo variables amb els valors de les variables de js    
$guarda = $_COOKIE[$_GET['partides']];
$guarda = ltrim($guarda,'[');
$guarda = rtrim($guarda,']');
$arrg = explode(',',$guarda);


$arr = '[';

for ($i=0;$i<$arrg[0];$i++){
    $arr=$arr.'[';
    for ($e=1;$e<$arrg[1];$e++){
        $arr=$arr.'0,'; 
    }
    $arr=$arr.'0],';
}
$arr=$arr.']';

?>
    
</body>
<script>
    //inicialitzo les variables amb els valors definits en php
const viu = <?=$arr?>;
const viu1= <?=$arr?>;
const temp= <?=$arr?>;
var x = <?=$arrg[0]?>;
var y = <?=$arrg[1]?>;
var valor=<?=$arrg[2]?>;

const arr= <?php echo json_encode($arrg);?>;

var idVar=0;

var cicles=0;
var vives=arr.length-3;
var mortes=x*(y-2)-vives;

    //marcot les posicions amb cel·lules vives
    for(var i=3;i<arr.length;i++){
        arr[i] = arr[i].slice(1,-1);
        var pos=arr[i].split('-');
        viu[pos[0]][pos[1]]=1;
    }

//imprimeixo la taula inicial
for(var i =0;i<x;i++){
        var table = document.getElementById("tauler");
    var row = table.insertRow(0);
    for(var z=1;z<y-1;z++){
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

 //creo i modifico els valord de l'informacio
 var info = document.getElementById("info");
    var linia= info.insertRow(0);
    //cicles
    var info1 = linia.insertCell(0);
    info1.innerHTML = "cicle<br> "+cicles;
    //cel·lules vives
    var info2 = linia.insertCell(0);
    info2.innerHTML = "viu<br> "+vives;
    //cel·lules mortes
    var info3 = linia.insertCell(0);
    info3.innerHTML = "mort<br> "+mortes;

    //els hi assigno la classe "none"
    info1.className += "none";
    info2.className += "none";
    info3.className += "none";


//creo la funcio principal del joc
function imptaula(){
    //renicialitzo les variables
    vives=0;
    mortes=0;

    //borrem el contingut de la taula
    var table = document.getElementById("tauler");
    table.innerHTML= "";

    //creem la taula a partir de l'array bidimencional
    for(var i =0;i<x;i++){
        var table = document.getElementById("tauler");
        var row = table.insertRow(0);
        for(var z=1;z<y-1;z++){
            if(viu[i][z]){
                var cell1 = row.insertCell(0);
                cell1.style.backgroundColor = "white";
                cell1.innerHTML = "";
                vives++;
            } else{
                var cell1 = row.insertCell(0);
                cell1.innerHTML = "";
                mortes++;
            }
        }
    }

    //calculem el nombre de veins viu de cada cel·la
    for(var i =0;i<x;i++){
        for(var z=0;z<=y;z++){
            temp[i][z]= sum(i,z);  
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
    
    //actualitzo la informació
    cicles++;
    info1.innerHTML = "cicle<br> "+cicles;
    info2.innerHTML = "viu<br> "+vives;
    info3.innerHTML = "mort<br> "+mortes;

    //renicialitzo els arrays
    copiararr();
    array0();
    array1();
}

//funcio que utilitzo per copiar un arry a un altre
function copiararr(){
    for(var i =0;i<x;i++){
        for(var z=0;z<y;z++){
            viu[i][z] = viu1[i][z];   
        }
    }
}

//funcions per reinicialitzar arrays
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

//funcio que suma els veins de la cel·lula introduida
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

//funcio que crido al modificar el temps de execució
function temps(){
    valor = document.getElementById("temps").value;
    pause();
    play();
    //document.write(valor);
}

//funcio per començar el joc
function play(){
    if(idVar==0){
    idVar = setInterval(function(){imptaula();},valor*1000);
    }
}

//funcio per parar el joc
function pause(){
    clearInterval(idVar);
    idVar=0;
}

//funcio per guardar la partida
function guardar(){

    //guardo les posicions amb cel·les vives
    var guardar=[x,y,valor];

    for(var i =0;i<x;i++){
        for(var z=0;z<y;z++){
            if(viu[i][z]==1){
                guardar.push(i+'-'+z);               
            }   
        }
    }
    //demano el nom de la partida i ho guardo amb forma de cookie
    var cookie= prompt("INTRODUEIX EL NOM DE LA PARTIDA")+"="+JSON.stringify(guardar)+";max-age=86400;path=/";
    alert('GUARDAT CORRECTAMENT');
    document.cookie= cookie;
}
</script>
</html>