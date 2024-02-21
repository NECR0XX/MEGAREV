<?php
require_once '../App/Controller/EquipeController.php';

$equipeController = new EquipeController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome_equipe']) && 
        isset($_POST['pais_equipe']) &&
        isset($_POST['chefe']) &&
        isset($_POST['patrocinadores']) &&
        isset($_POST['titulos']) &&
        isset($_POST['piloto']) &&
        isset($_POST['piloto2'])) 
    {
        $equipeController->criarEquipe($_POST['nome_equipe'], $_POST['pais_equipe'], $_POST['chefe'], $_POST['patrocinadores'], $_POST['titulos'], $_POST['piloto'], $_POST['piloto2']);
        header('Location: #');
    }
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_equipe = isset($_POST['nome_equipe']) ? $_POST['nome_equipe'] : '-----';
    $pais_equipe = isset($_POST['pais_equipe']) ? $_POST['pais_equipe'] : '-----';
    $chefe = isset($_POST['chefe']) ? $_POST['chefe'] : '-----';
    $patrocinadores = isset($_POST['patrocinadores']) ? $_POST['patrocinadores'] : '-----';
    $titulos = isset($_POST['titulos']) ? $_POST['titulos'] : '-----';
    $piloto = isset($_POST['piloto']) ? $_POST['piloto'] : '-----';
    $piloto2 = isset($_POST['piloto2']) ? $_POST['piloto2'] : '-----';
    $ultimoId = isset($_SESSION['ultimoIdE']) ? $_SESSION['ultimoIdE'] : 0;
    $ultimoId++;

    $equipesCadastradas = isset($_SESSION['equipesCadastradas']) ? $_SESSION['equipesCadastradas'] : array();
    $novaEquipe = array(
        'id' => $ultimoId,
        'nome_equipe' => $nome_equipe,
        'pais_equipe' => $pais_equipe,
        'chefe' => $chefe,
        'patrocinadores' => $patrocinadores,
        'titulos' => $titulos,
        'piloto' => $piloto,
        'piloto2' => $piloto2
    );
    $equipesCadastradas[] = $novaEquipe;

    $_SESSION['equipesCadastradas'] = $equipesCadastradas;
    $_SESSION['ultimoIdE'] = $ultimoId;
}



$equipes = $equipeController->listarEquipes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/Css/pista.css">
    <title>Dotitulosment</title>
</head>
<body>
    <a href="index.php">Voltar</a>
    <section>
        <fieldset>
            <legend><h1>Cadastro de Equipes</h1></legend>
            <form method="post">
                <input type="text" name="nome_equipe" placeholder="Nome da Equipe">
                <input type="text" name="pais_equipe" placeholder="País da Equipe">
                <input type="text" name="chefe" placeholder="Líder">
                <input type="text" name="patrocinadores" placeholder="Patrocinadores">
                <input type="number" name="titulos" placeholder="Títulos" min="0">
                <select name="piloto">
                    <?php 
                    $pilotosSelecionados = array();
                    foreach ($_SESSION['equipesCadastradas'] as $equipe) {
                        $pilotosSelecionados[] = $equipe['piloto'];
                        $pilotosSelecionados[] = $equipe['piloto2'];
                    }
                
                    foreach ($_SESSION['pilotosCadastrados'] as $piloto): 
                        if (!in_array($piloto['nome'], $pilotosSelecionados)):
                    ?>
                        <option value="<?php echo $piloto['nome']; ?>"><?php echo $piloto['nome']; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select name="piloto2">
                    <?php 
                    $pilotosSelecionados = array();
                    foreach ($_SESSION['equipesCadastradas'] as $equipe) {
                        $pilotosSelecionados[] = $equipe['piloto'];
                        $pilotosSelecionados[] = $equipe['piloto2'];
                    }
                
                    foreach ($_SESSION['pilotosCadastrados'] as $piloto): 
                        if (!in_array($piloto['nome'], $pilotosSelecionados)):
                    ?>
                        <option value="<?php echo $piloto['nome']; ?>"><?php echo $piloto['nome']; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>

                <input type="submit" value="Enviar">
            </form>
        </fieldset>
    </section>

    <section>
        <fieldset>
            <legend><h1>Equipes Cadastradas</h1></legend>
            <ul>
                <?php if (isset($_SESSION['equipesCadastradas'])): ?>
                    <?php foreach ($_SESSION['equipesCadastradas'] as $key => $equipe): ?>
                        <li>
                            <?php echo "<strong>ID:</strong>" . $equipe['id'] . ", <strong>Nome da Equipe:</strong> " . $equipe['nome_equipe'] . ", <strong>País da Equipe:</strong> " . 
                            $equipe['pais_equipe'] . ", <strong>Líder:</strong> " . $equipe['chefe'] . ", <strong>Patrocinadores:</strong> " . 
                            $equipe['patrocinadores'] . ", <strong>Títulos:</strong> " . $equipe['titulos'] . " Exemplares, <strong>1º Piloto:</strong> " . 
                            $equipe['piloto'] . ", <strong>2º Piloto:</strong> " . $equipe['piloto2']; ?>
                            <form action="../App/Resources/deletar3.php" method="post">
                                <input type="hidden" name="equipe_key" value="<?php echo $key; ?>">
                                <button type='submit'>Remover</button>
                            </form>
                            <form action="../App/Resources/editar3.php" method="post">
                                <input type="hidden" name="equipe_key" value="<?php echo $key; ?>">
                                <button type='submit'>Editar</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Nenhuma equipe cadastrada</li>
                <?php endif; ?>
            </ul>
        </fieldset>
    </section>
</body>
</html>
