<?php

require("conexao.php");

if (isset($_POST['atualizar'])) {

    $idMatricula = $_POST['id_matricula'];
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];


    $atualiza = "UPDATE matricula SET nome = '$nome', curso = '$curso' WHERE id_matricula = '$idMatricula'";

    if (mysqli_query($conexao, $atualiza)) {

        echo "
        <script>
            alert('Atualização realizada com sucesso!');
            window.location.href = 'atualizar.php';
        </script>     
        ";
        exit();
    } else {
        echo "
        <script>
            alert('Erro ao atualizar: " . mysqli_error($conexao) . "');
            window.history.back();
        </script>     
        ";
        exit();
    }
}

$edita_aluno = null;

if (isset($_GET['edita'])) {

    $id_editar = $_GET['edita'];

    $resultado = mysqli_query($conexao, "SELECT * FROM matricula WHERE id_matricula = '$id_editar'");

    $edita_aluno = mysqli_fetch_assoc($resultado);

}

$alunos = mysqli_query($conexao, 'SELECT * FROM matricula');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Acadêmico</title>
</head>
<body>
    <h2>Lista Alunos</h2>

    <table class="border">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Curso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($aluno = mysqli_fetch_assoc($alunos)): ?>
                    <tr>
                        <td><?= $aluno['id_matricula'] ?></td>
                        <td><?= $aluno['nome'] ?></td>
                        <td><?= $aluno['curso'] ?></td>
                        <td>
                            <a href="?edita=<?= $aluno['id_matricula'] ?>">Editar</a>
                        </td>
                    </tr>
            <?php endwhile; ?>

        </tbody>
    </table>

</body>
</html>