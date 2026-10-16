<?php

require("conexao.php");

$consulta = "SELECT * FROM matricula";

$matricula = mysqli_query($conexao, $consulta);

while ($array = mysqli_fetch_array($matricula)) {
    echo
        $array ['id_matricula'] .  " - " . "Aluno: " . $array ['nome'] . " - " . "Curso: " . $array ['curso'] . "<br>";


}


?>