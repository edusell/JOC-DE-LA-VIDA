<?php
//creo un array bidimencional  per js amb les dimensions del joc
$arr = '[';

for ($i=0;$i<$d_x;$i++){
    $arr=$arr.'[';
    for ($e=1;$e<$d_y;$e++){
        $arr=$arr.'0,'; 
    }
    $arr=$arr.'0],';
}
$arr=$arr.']';

?>