<?php
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_carro'])) {
        $carro_key = $_POST['carro_key'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $potencia = $_POST['potencia'];
        $velocidade_max = $_POST['velocidade_max'];

    if (isset($_SESSION['carrosCadastrados'][$carro_key])) {
        $_SESSION['carrosCadastrados'][$carro_key]['marca'] = $marca;
        $_SESSION['carrosCadastrados'][$carro_key]['modelo'] = $modelo;
        $_SESSION['carrosCadastrados'][$carro_key]['ano'] = $ano;
        $_SESSION['carrosCadastrados'][$carro_key]['potencia'] = $potencia;
        $_SESSION['carrosCadastrados'][$carro_key]['velocidade_max'] = $velocidade_max;
    }

    header('Location: ../../Public/carros.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
</head>
<body>
    <section>
        <?php if(isset($_SESSION['carrosCadastrados'])): ?>
            <?php $carro_key = $_POST['carro_key']; ?>
            <fieldset>
                <legend><h1>Editar Carro</h1></legend>
                <form method="post">
                    <input type="text" name="marca" placeholder="Marca" value="<?php echo $_SESSION['carrosCadastrados'][$carro_key]['marca']; ?>">
                    <input type="text" name="modelo" placeholder="Modelo" value="<?php echo $_SESSION['carrosCadastrados'][$carro_key]['modelo']; ?>">
                    <input type="text" name="ano" placeholder="Ano" value="<?php echo $_SESSION['carrosCadastrados'][$carro_key]['ano']; ?>">
                    <input type="number" name="potencia" placeholder="Potência" value="<?php echo $_SESSION['carrosCadastrados'][$carro_key]['potencia']; ?>">
                    <input type="number" name="velocidade_max" placeholder="Velocidade Máxima" value="<?php echo $_SESSION['carrosCadastrados'][$carro_key]['velocidade_max']; ?>">
                    <input type="hidden" name="carro_key" value="<?php echo $carro_key; ?>">
                    <input type="submit" name="editar_carro" value="Atualizar">
                </form>
            </fieldset>
        <?php endif; ?>
    </section>
</body>
</html>