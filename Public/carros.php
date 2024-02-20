<?php
require_once '../App/Controller/CarroController.php';

$carroController = new CarroController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['marca']) && 
        isset($_POST['modelo']) &&
        isset($_POST['ano']) &&
        isset($_POST['potencia']) &&
        isset($_POST['velocidade_max'])) 
    {
        $carroController->criarCarro($_POST['marca'], $_POST['modelo'], $_POST['ano'], $_POST['potencia'], $_POST['velocidade_max']);
        header('Location: #');
    }
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = isset($_POST['marca']) ? $_POST['marca'] : '-----';
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '-----';
    $ano = isset($_POST['ano']) ? $_POST['ano'] : '-----';
    $potencia = isset($_POST['potencia']) ? $_POST['potencia'] : '-----';
    $velocidade_max = isset($_POST['velocidade_max']) ? $_POST['velocidade_max'] : '-----';
    $ultimoId = isset($_SESSION['ultimoIdCa']) ? $_SESSION['ultimoIdCa'] : 0;
    $ultimoId++;

    $carrosCadastrados = isset($_SESSION['carrosCadastrados']) ? $_SESSION['carrosCadastrados'] : array();
    $novaCarro = array(
        'id' => $ultimoId,
        'marca' => $marca,
        'modelo' => $modelo,
        'ano' => $ano,
        'potencia' => $potencia,
        'velocidade_max' => $velocidade_max
    );
    $carrosCadastrados[] = $novaCarro;

    $_SESSION['carrosCadastrados'] = $carrosCadastrados;
    $_SESSION['ultimoIdCa'] = $ultimoId;
}



$carros = $carroController->listarCarros();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Voltar</a>
    <section>
        <fieldset>
            <legend><h1>Cadastro de Carros</h1></legend>
            <form method="post">
                <input type="text" name="marca" placeholder="Marca">
                <input type="text" name="modelo" placeholder="Modelo">
                <input type="number" name="ano" placeholder="Ano">
                <input type="number" name="potencia" placeholder="Potência">
                <input type="number" name="velocidade_max" placeholder="Velocidade Máxima">
                <input type="submit" value="Enviar">
            </form>
        </fieldset>
    </section>

    <section>
        <fieldset>
            <legend><h1>Carros Cadastradas</h1></legend>
            <ul>
                <?php if(isset($_SESSION['carrosCadastrados'])): ?>
                    <?php foreach ($_SESSION['carrosCadastrados'] as $key => $carro): ?>
                        <li>
                            <?php echo "ID:" . $carro['id'] . ", Marca: " . $carro['marca'] . ", Modelo: " . $carro['modelo'] . ", Ano: " . $carro['ano'] . ", Potência: " . $carro['potencia'] . " cv, Velocidade Máxima: " . $carro['velocidade_max'] . "km/h"; ?>
                            <form action="../App/Resources/deletar5.php" method="post">
                                <input type="hidden" name="carro_key" value="<?php echo $key; ?>">
                                <button type='submit'>Remover</button>
                            </form>
                            <form action="../App/Resources/editar5.php" method="post">
                                <input type="hidden" name="carro_key" value="<?php echo $key; ?>">
                                <button type='submit'>Editar</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Nenhum carro cadastrado</li>
                <?php endif; ?>
            </ul>
        </fieldset>
    </section>
</body>
</html>