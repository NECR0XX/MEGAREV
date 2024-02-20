<?php
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_pista'])) {
        $pista_key = $_POST['pista_key'];
        $pais = $_POST['pais'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $distancia = $_POST['distancia'];

    if (isset($_SESSION['pistasCadastradas'][$pista_key])) {
        $_SESSION['pistasCadastradas'][$pista_key]['pais'] = $pais;
        $_SESSION['pistasCadastradas'][$pista_key]['estado'] = $estado;
        $_SESSION['pistasCadastradas'][$pista_key]['cidade'] = $cidade;
        $_SESSION['pistasCadastradas'][$pista_key]['distancia'] = $distancia;
    }

    header('Location: ../../Public/pista.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pista</title>
</head>
<body>
    <section>
        <?php if(isset($_SESSION['pistasCadastradas'])): ?>
            <?php $pista_key = $_POST['pista_key']; ?>
            <fieldset>
                <legend><h1>Editar Pista</h1></legend>
                <form method="post">
                    <input type="text" name="pais" placeholder="País" value="<?php echo $_SESSION['pistasCadastradas'][$pista_key]['pais']; ?>">
                    <input type="text" name="estado" placeholder="Estado" value="<?php echo $_SESSION['pistasCadastradas'][$pista_key]['estado']; ?>">
                    <input type="text" name="cidade" placeholder="Cidade" value="<?php echo $_SESSION['pistasCadastradas'][$pista_key]['cidade']; ?>">
                    <input type="number" name="distancia" placeholder="Distância" value="<?php echo $_SESSION['pistasCadastradas'][$pista_key]['distancia']; ?>">
                    <input type="hidden" name="pista_key" value="<?php echo $pista_key; ?>">
                    <input type="submit" name="editar_pista" value="Atualizar">
                </form>
            </fieldset>
        <?php endif; ?>
    </section>
</body>
</html>