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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body style="background-color: #0d6efd;">

    <main class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm w-100" style="max-width: 420px;">
            <div class="card-body p-4"></div>



            <div class="card-body p-4">
                <h2>Cadastro de Cursos</h2>
                <form>
                    <div class="mb-3" method="POST" action="">
                        <label for="exampleInputEmail1" class="form-label container">Nome do Aluno: </label>
                        <input type="text" class="form-control " id="aluno" name="aluno" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1 " class="form-label container">Curso: </label>
                        <input type="text" class="form-control " id="curso" name="curso" required>
                    </div>
                    <button type="reset" class="btn btn-primary">Limpar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>

                    <a href="index.html" class="btn btn-primary align-items-right">Voltar</a>

            </div>
        </div>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>