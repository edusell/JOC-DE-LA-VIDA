var X = 10;
var Y = 9;

const viu = [[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,1,1,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0]];

 
for(var i =0;i<X;i++){
    var table = document.getElementById("tauler");
    var row = table.insertRow(0);
    for(var z=0;z<Y;z++){
        if(viu[i][z]){
            pviu();
        } else{
            pmort();
        }
    }
}

document.write("hola");
document.write(sum(1,1) + "hola");

for(var i =1;i<X;i++){
    document.write("</br>");
    for(var z=1;z<Y;z++){
    document.write(sum(i,z)+" ");    
    }
}




function pviu(x) {
    var cell1 = row.insertCell(0);
    cell1.style.backgroundColor = "white";
    cell1.innerHTML = " ";
}

function pmort() {

        var cell1 = row.insertCell(0);
        cell1.innerHTML = " ";
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