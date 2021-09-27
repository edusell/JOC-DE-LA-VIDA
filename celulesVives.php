<?php

if (isset($_POST['cel'])) {
        $viu = $_POST["cel"];
        echo("hola");
            
        }
        else {
            echo('alert("Seleccioneu alguna cel·la")');
            header('Location: configuracio.html');
        }

?>