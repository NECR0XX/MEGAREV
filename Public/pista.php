<?php
session_start(); // Inicia a sessão

require_once '../App/Controller/PistaController.php';

$pistaController = new PistaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formulario_enviado = $_POST["formulario_enviado"];

    if ($formulario_enviado == "pista") {
        if (isset($_POST['pais']) && 
            isset($_POST['estado']) &&
            isset($_POST['cidade']) &&
            isset($_POST['distancia'])) {
            $pistaController->criarPista($_POST['pais'], $_POST['estado'], $_POST['cidade'], $_POST['distancia']);
        }
    }
}

$pistas = $pistaController->listarPistas();

// Armazena as pistas na sessão
$_SESSION['pistas'] = $pistas;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <fieldset>
            <legend><h1>Cadastro de Pistas</h1></legend>
            <form method="post">
                <input type="hidden" name="formulario_enviado" value="pista">
                <input type="text" name="pais" placeholder="País">
                <input type="text" name="estado" placeholder="Estado">
                <input type="text" name="cidade" placeholder="Cidade">
                <input type="text" name="distancia" placeholder="Distância">
                <input type="submit" value="Enviar">
            </form>
        </fieldset>
    </section>
    
    <section>
        <h2>Pistas Cadastradas</h2>
        <ul>
            <?php foreach ($pistas as $pista): ?>
                <li><?php echo $pista['pais'] . ', ' . $pista['estado'] . ', ' . $pista['cidade'] . ', ' . $pista['distancia']; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</body>
</html>
