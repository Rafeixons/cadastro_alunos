<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #0d6efd;">

    <main class="container min-vh-100 d-flex justify-content-center align-items-center p-8">
        <div class="card shadow-sm w-100" style="max-width: 948px; padding: 25px;">
            <div class="card-body p-50"></div>
            <h1 class="text-center text-primary">Consulta de Alunos</h1>


            <?php
            require("conexao.php");
            ?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>CURSO</th>
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
                            <td><?= $array['id_matricula'] ?></td>
                            <td><?= $array['nome'] ?></td>
                            <td><?= $array['curso'] ?></td>
                        </tr>

                    <?php } ?>

                </tbody>
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