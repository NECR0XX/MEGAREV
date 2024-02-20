<?php
require_once '../App/Controller/PistaController.php';

$pistaController = new PistaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pais']) && 
        isset($_POST['estado']) &&
        isset($_POST['cidade']) &&
        isset($_POST['distancia'])) 
    {
        $pistaController->criarPista($_POST['pais'], $_POST['estado'], $_POST['cidade'], $_POST['distancia']);
        header('Location: #');
    }
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pais = isset($_POST['pais']) ? $_POST['pais'] : '-----';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '-----';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '-----';
    $distancia = isset($_POST['distancia']) ? $_POST['distancia'] : '-----';

    $pistasCadastradas = isset($_SESSION['pistasCadastradas']) ? $_SESSION['pistasCadastradas'] : array();
    $novaPista = array(
        'pais' => $pais,
        'estado' => $estado,
        'cidade' => $cidade,
        'distancia' => $distancia
    );
    $pistasCadastradas[] = $novaPista;

    $_SESSION['pistasCadastradas'] = $pistasCadastradas;
}



$pistas = $pistaController->listarPistas();
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
            <legend><h1>Cadastro de Corridas</h1></legend>
            <form method="post">
                <input type="text" name="pais" placeholder="País">
                <input type="text" name="estado" placeholder="Estado">
                <input type="text" name="cidade" placeholder="Cidade">
                <input type="text" name="distancia" placeholder="Distância">
                <input type="submit" value="Enviar">
            </form>
        </fieldset>
    </section>

    <section>
        <fieldset>
            <legend><h1>Corridas Cadastradas</h1></legend>
            <ul>
                <?php if (isset($_SESSION['pistasCadastradas'])): ?>
                    <?php foreach ($_SESSION['pistasCadastradas'] as $key => $pista): ?>
                        <li>
                            <?php echo "ID: " . $pista['id'] . ", País: " . $pista['pais'] . ", Estado: " . $pista['estado'] . ", Cidade: " . $pista['cidade'] . ", Distância: " . $pista['distancia']; ?>
                            <form action="../App/Resources/deletar4.php" method="post">
                                <input type="hidden" name="corrida_key" value="<?php echo $key; ?>">
                                <button type='submit'>Remover</button>
                            </form>
                            <form action="../App/Resources/editar4.php" method="post">
                                <input type="hidden" name="corrida_key" value="<?php echo $key; ?>">
                                <button type='submit'>Editar</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Nenhuma corrida cadastrada</li>
                <?php endif; ?>
            </ul>
        </fieldset>
    </section>
</body>
</html>
