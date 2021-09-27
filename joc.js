var x = 10;
var y = 9;

const viu = [[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,1,0,0,0,0,0,0,0],[0,0,1,1,0,0,0,0,0,0],[0,0,0,0,1,1,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0]];
const temp =[[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,,,0,0,0,0,0,0],[0,0,0,0,1,1,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0]];


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
    var sum;/*
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
    }*/
    sum = viu[vx-1][vy-1]+viu[vx][vy-1]+viu[vx+1][vy-1]+viu[vx-1][vy]+viu[vx+1][vy]+viu[vx-1][vy+1]+viu[vx][vy+1]+viu[vx+1][vy+1];
    return sum;
}