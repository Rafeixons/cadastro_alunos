<?php

require("conexao.php");

if (isset($_POST['atualizar'])) {
    $idMatricula = $_POST['id_matricula'];
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];

    $atualizar = "UPDATE matricula SET nome = '$nome', curso = '$curso' WHERE id_matricula = '$id_matricula'";

    if (mysqli_query($conexao, $atualizar)) {
        echo "
        <script>
            alert('Dados atualizado com sucesso');
            window.location='atualizar.php';
        </script>";
        exit();
    } else {
        echo "Erro ao atualizar" . mysqli_error($conexao);
    }
}

$editaAluno = null;

if (isset($_GET['editar'])) {

    $idEditar = $_GET['editar'];

    $resultado = mysqli_query(
        $conexao,
        "SELECT * FROM matricula WHERE id_matricula = $idEditar"
    );

    $editaAluno = mysqli_fetch_assoc($resultado);
}

$alunos = mysqli_query(
    $conexao,
    "SELECT * FROM matricula"
);


if (isset($_GET['apagar'])) {
    $idMatricula = $_GET['apagar'];

    $deletar = "DELETE FROM matricula WHERE id_matricula = $idMatricula";

    if (mysqli_query($conexao, $deletar)) {
        echo "
        <script>
            alert('Dado excluido com sucesso!');
            window.location='atualizar.php';
        </script>";
        exit();
    } else {
        echo "Erro ao deletar." . mysqli_error($conexao);
    }
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color: #0d6efd;">

    <main class="container min-vh-100 d-flex justify-content-center align-items-center p-8">
        <div class="card shadow-sm w-100" style="max-width: 948px; padding: 25px;">
            <div class="card-body p-50"></div>
            <h1 class="text-center text-primary">Consulta de Alunos</h1>


            <h2>Lista de Alunos</h2>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Curso</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require("conexao.php");

                    $consulta = "SELECT * FROM matricula";
                    $matricula = mysqli_query($conexao, $consulta);

                    while ($array = mysqli_fetch_assoc($matricula)) {
                        ?>

                        <tr>
                            <td>
                                <?= $array['id_matricula'] ?>
                            </td>
                            <td>
                                <?= $array['nome'] ?>
                            </td>
                            <td>
                                <?= $array['curso'] ?>
                            </td>

                            <td>
                                <a href="?edita=<?= $array['id_matricula'] ?>">Editar</a>
                            </td>
                        </tr>

                        <td>
                                <a href="?editaAluno=<?= $array['id_matricula'] ?>" class="btn btn-warning">Editar</a>
                                <a href="?deletar=<?= $array['id_matricula'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Apagar</a>
                            </td>



                    <?php } ?>

                </tbody>


                <?php if ($editaAluno): ?>
                    <h3>Editar Aluno</h3>

                    <form method="POST">
                        <input type="hidden" name="id_matricula" value="<?= $editaAluno['id_matricula'] ?>">

                        <label for="">Nome: </label>
                        <input type="text" name="nome" value="<?= $editaAluno['nome'] ?>">

                        <label for="">Curso: </label>
                        <input type="text" name="curso" value="<?= $editaAluno['curso'] ?>">

                        <button type="submit" name="atualizar">Atualizar</button>
                        <a href="atualizar.php">Cancelar</a>
                    </form>
                <?php endif; ?>

            </table>

            <div class="container justify-content-left align-items-left">

                <a href="index.html" class="btn btn-primary">Voltar</a>

            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    </body>

</html>