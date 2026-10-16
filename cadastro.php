<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['aluno'];
    $curso = $_POST['curso'];

    require("conexao.php");

    $inserir = "INSERT INTO matricula (nome, curso) VALUES ('$nome', '$curso')";

    if (mysqli_query($conexao, $inserir)) {
        echo
            "<script>
            alert('Cadastro realizado com sucesso!');
            window.location.href = 'cadastro.php';
        </script>";
        exit();
    } else {
        echo
            "<script>
            alert('Erro ao cadastrar: " . mysqli_error($conexao) . "');
            window.history.back();
        </script>";
        exit();

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cursos</title>
</head>

<body>
    <h2>Cadastro de Cursos</h2>

    <form method="POST" action="">
        <label for="aluno">Nome do Aluno:</label>
        <input type="text" id="aluno" name="aluno" required><br><br>

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required><br><br>

        <input type="reset" value="Limpar">
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>