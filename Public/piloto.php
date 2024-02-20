<?php
require_once '../App/Controller/PilotoController.php';

$pilotoController = new PilotoController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome']) && 
        isset($_POST['idade']) &&
        isset($_POST['peso']) &&
        isset($_POST['carro']) &&
        isset($_POST['pais_pil'])) 
    {
        $pilotoController->criarPiloto($_POST['nome'], $_POST['idade'], $_POST['peso'], $_POST['carro'], $_POST['pais_pil']);
        header('Location: #');
    }
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '-----';
    $idade = isset($_POST['idade']) ? $_POST['idade'] : '-----';
    $peso = isset($_POST['peso']) ? $_POST['peso'] : '-----';
    $carro = isset($_POST['carro']) ? $_POST['carro'] : '-----';
    $pais_pil = isset($_POST['pais_pil']) ? $_POST['pais_pil'] : '-----';
    $ultimoId = isset($_SESSION['ultimoIdPi']) ? $_SESSION['ultimoIdPi'] : 0;
    $ultimoId++;

    $pilotosCadastrados = isset($_SESSION['pilotosCadastrados']) ? $_SESSION['pilotosCadastrados'] : array();
    $novaPiloto = array(
        'id' => $ultimoId,
        'nome' => $nome,
        'idade' => $idade,
        'peso' => $peso,
        'carro' => $carro,
        'pais_pil' => $pais_pil
    );
    $pilotosCadastrados[] = $novaPiloto;

    $_SESSION['pilotosCadastrados'] = $pilotosCadastrados;
    $_SESSION['ultimoIdPi'] = $ultimoId;
}



$pilotos = $pilotoController->listarPilotos();
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
            <legend><h1>Cadastro de Pilotos</h1></legend>
            <form method="post">
                <input type="text" name="nome" placeholder="Nome">
                <input type="number" name="idade" placeholder="Idade">
                <input type="number" name="peso" placeholder="Peso">
                <select name="carro">
                    <?php 
                    $marcasSelecionadas = array();
                    foreach ($_SESSION['pilotosCadastrados'] as $piloto) {
                        $marcasSelecionadas[] = $piloto['carro'];
                    }
                    
                    foreach ($_SESSION['carrosCadastrados'] as $carro): 
                        if (!in_array($carro['marca'], $marcasSelecionadas)):
                    ?>
                        <option value="<?php echo $carro['marca']; ?>"><?php echo $carro['marca']; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <input type="text" name="pais_pil" placeholder="País">
                <input type="submit" value="Enviar">
            </form>
        </fieldset>
    </section>
    <section>
        <fieldset>
            <legend><h1>Pilotos Cadastradas</h1></legend>
            <ul>
                <?php if (isset($_SESSION['pilotosCadastrados'])): ?>
                    <?php foreach ($_SESSION['pilotosCadastrados'] as $key => $piloto): ?>
                        <li>
                            <?php echo "ID: " . $piloto['id'] . ", Nome: " . $piloto['nome'] . ", Idade: " . $piloto['idade'] . " Anos, Peso: " . $piloto['peso'] . "Kg, Carro: " . $piloto['carro'] . ", País: " . $piloto['pais_pil']; ?>
                            <form action="../App/Resources/deletar2.php" method="post">
                                <input type="hidden" name="piloto_key" value="<?php echo $key; ?>">
                                <button type='submit'>Remover</button>
                            </form>
                            <form action="../App/Resources/editar2.php" method="post">
                                <input type="hidden" name="piloto_key" value="<?php echo $key; ?>">
                                <button type='submit'>Editar</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Nenhum Piloto Cadastrado</li>
                <?php endif; ?>
            </ul>
        </fieldset>
    </section>
</body>
</html>