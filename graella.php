<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc de la vida</title>
    <style>
        .borde{
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            align-items: center;
        }
        td{
            border: 1px solid black;
            width: 25px;
            height: 25px;
            margin: 0px;
        }
    </style>
</head>
<body class="borde">
    <h1 >JOC DE LA VIDA</h1>
    <H2 >EDUARD SELLAS LLEÓ</H2>
    <table style="marin:auto;width:100%;">
    <?php
    $a = $_GET['dimensions'];

    for($i=0;$i<$a;$i++){
        echo "<tr>";
        for($y=0;$y<$a;$y++){
            echo "<td></td>";
        }
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>