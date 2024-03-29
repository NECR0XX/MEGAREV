<?php
require_once '../App/Controller/PistaController.php';

$pistaController = new PistaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pais']) && 
        isset($_POST['tipo']) &&
        isset($_POST['cidade']) &&
        isset($_POST['distancia'])) 
    {
        $pistaController->criarPista($_POST['pais'], $_POST['tipo'], $_POST['cidade'], $_POST['distancia']);
        header('Location: #');
    }
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pais = isset($_POST['pais']) ? $_POST['pais'] : '-----';
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '-----';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '-----';
    $distancia = isset($_POST['distancia']) ? $_POST['distancia'] : '-----';
    $ultimoId = isset($_SESSION['ultimoId']) ? $_SESSION['ultimoId'] : 0;
    $ultimoId++;

    $pistasCadastradas = isset($_SESSION['pistasCadastradas']) ? $_SESSION['pistasCadastradas'] : array();
    $novaPista = array(
        'id' => $ultimoId,
        'pais' => $pais,
        'tipo' => $tipo,
        'cidade' => $cidade,
        'distancia' => $distancia
    );
    $pistasCadastradas[] = $novaPista;

    $_SESSION['pistasCadastradas'] = $pistasCadastradas;
    $_SESSION['ultimoId'] = $ultimoId;
}

$pistas = $pistaController->listarPistas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/Css/pista.css">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Voltar</a>
    <section>
        <fieldset>
            <legend><h1>Cadastro de Pistas</h1></legend>
            <form method="post">
                <input type="text" name="pais" placeholder="País">
                <select name="tipo">
                    <option value="Asfalto">Asfalto</option>
                    <option value="Terra">Terra</option>
                    <option value="Grama">Grama</option>
                </select>
                <input type="text" name="cidade" placeholder="Cidade">
                <input type="number" name="distancia" placeholder="Distância" min="0">
                <input type="submit" value="Enviar">
            </form>
        </fieldset>
    </section>
    <section>
        <fieldset>
            <legend><h1>Pistas Cadastradas</h1></legend>
            <ul>
                <?php if(isset($_SESSION['pistasCadastradas'])): ?>
                    <?php foreach ($_SESSION['pistasCadastradas'] as $key => $pista): ?>
                        <li>
                            <?php echo "<strong>ID:</strong> " . $pista['id'] . ", <strong>País:</strong> " . $pista['pais'] . ", <strong>tipo:</strong> " . $pista['tipo'] . ", <strong>Cidade:</strong> " . $pista['cidade'] . ", <strong>Distância:</strong> " . $pista['distancia'] . "Km"; ?>
                            <form action="../App/Resources/deletar.php" method="post">
                                <input type="hidden" name="pista_key" value="<?php echo $key; ?>">
                                <button type='submit'>Remover</button>
                            </form>
                            <form action="../App/Resources/editar.php" method="post">
                                <input type="hidden" name="pista_key" value="<?php echo $key; ?>">
                                <button type='submit'>Editar</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Nenhuma pista cadastrada.</li>
                <?php endif; ?>
            </ul>
        </fieldset>
    </section>

</body>
</html>