<?php
require_once '../App/Controller/CorridaController.php';

$corridaController = new CorridaController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome']) && 
        isset($_POST['pista']) &&
        isset($_POST['equipe1']) &&
        isset($_POST['equipe2']) && 
        isset($_POST['equipe3']) && 
        isset($_POST['equipe4']) && 
        isset($_POST['equipe5'])) 
    {
        $corridaController->criarCorrida($_POST['nome'], $_POST['pista'], $_POST['equipe1'], $_POST['equipe2'], $_POST['equipe3'], $_POST['equipe4'], $_POST['equipe5']);
        header('Location: #');
    }
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '-----';
    $pista = isset($_POST['pista']) ? $_POST['pista'] : '-----';
    $equipe1 = isset($_POST['equipe1']) ? $_POST['equipe1'] : '-----';
    $equipe2 = isset($_POST['equipe2']) ? $_POST['equipe2'] : '-----';
    $equipe3 = isset($_POST['equipe3']) ? $_POST['equipe3'] : '-----';
    $equipe4 = isset($_POST['equipe4']) ? $_POST['equipe4'] : '-----';
    $equipe5 = isset($_POST['equipe5']) ? $_POST['equipe5'] : '-----';
    $ultimoId = isset($_SESSION['ultimoIdC']) ? $_SESSION['ultimoIdC'] : 0;
    $ultimoId++;
    
    $corridasCadastradas = isset($_SESSION['corridasCadastradas']) ? $_SESSION['corridasCadastradas'] : array();
    $novaCorrida = array(
        'id' => $ultimoId,
        'nome' => $nome,
        'pista' => $pista,
        'equipes' => [
            'equipe1' => $_SESSION['equipesCadastradas'][$_POST['equipe1']],
            'equipe2' => $_SESSION['equipesCadastradas'][$_POST['equipe2']],
            'equipe3' => $_SESSION['equipesCadastradas'][$_POST['equipe3']],
            'equipe4' => $_SESSION['equipesCadastradas'][$_POST['equipe4']],
            'equipe5' => $_SESSION['equipesCadastradas'][$_POST['equipe5']]
        ]
    );    
    $corridasCadastradas[] = $novaCorrida;
    
    $_SESSION['corridasCadastradas'] = $corridasCadastradas;
    $_SESSION['ultimoIdC'] = $ultimoId;
    
}



$corridas = $corridaController->listarCorridas();
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
                <input type="text" name="nome" placeholder="Nome da corrida">
                <select name="pista">
                    <?php 
                    $pistasSelecionadas = array();
                    foreach ($_SESSION['corridasCadastradas'] as $corrida) {
                        $pistasSelecionadas[] = $corrida['tipo'];
                    }
                    
                    foreach ($_SESSION['pistasCadastradas'] as $pista): 
                        if (!in_array($pista['tipo'], $pistasSelecionadas)):
                    ?>
                        <option value="<?php echo $pista['tipo']; ?>"><?php echo $pista['tipo']; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select><br>
                <select name="equipe1">
                    <?php 
                    $equipesSelecionadas = array();
                    foreach ($_SESSION['corridasCadastradas'] as $corrida) {
                        $equipesSelecionadas[] = $corrida['carro'];
                    }

                    foreach ($_SESSION['equipesCadastradas'] as $equipe): 
                        if (!in_array($equipe['nome'], $equipesSelecionadas)):
                    ?>
                        <option value="<?php echo $equipe['id']; ?>">
                            <?php 
                            echo "Nome da Equipe: " . $equipe['nome_equipe'] . ", País da Equipe: " . $equipe['pais_equipe'] . ", Líder: " . $equipe['chefe']
                             . ", Patrocinadores: " . $equipe['patrocinadores'] . ", Títulos: " . $equipe['titulos'] . ", 1º Piloto: " . $equipe['piloto'] . ", 2º Piloto: " . $equipe['piloto2']; 
                            ?>
                        </option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select name="equipe2">
                    <?php 
                    $equipesSelecionadas = array();
                    foreach ($_SESSION['corridasCadastradas'] as $corrida) {
                        $equipesSelecionadas[] = $corrida['carro'];
                    }

                    foreach ($_SESSION['equipesCadastradas'] as $equipe): 
                        if (!in_array($equipe['nome'], $equipesSelecionadas)):
                    ?>
                        <option value="<?php echo $equipe['id']; ?>">
                            <?php 
                            echo "Nome da Equipe: " . $equipe['nome_equipe'] . ", País da Equipe: " . $equipe['pais_equipe'] . ", Líder: " . $equipe['chefe']
                             . ", Patrocinadores: " . $equipe['patrocinadores'] . ", Títulos: " . $equipe['titulos'] . ", 1º Piloto: " . $equipe['piloto'] . ", 2º Piloto: " . $equipe['piloto2']; 
                            ?>
                        </option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select name="equipe3">
                    <?php 
                    $equipesSelecionadas = array();
                    foreach ($_SESSION['corridasCadastradas'] as $corrida) {
                        $equipesSelecionadas[] = $corrida['carro'];
                    }

                    foreach ($_SESSION['equipesCadastradas'] as $equipe): 
                        if (!in_array($equipe['nome'], $equipesSelecionadas)):
                    ?>
                        <option value="<?php echo $equipe['id']; ?>">
                            <?php 
                            echo "Nome da Equipe: " . $equipe['nome_equipe'] . ", País da Equipe: " . $equipe['pais_equipe'] . ", Líder: " . $equipe['chefe']
                             . ", Patrocinadores: " . $equipe['patrocinadores'] . ", Títulos: " . $equipe['titulos'] . ", 1º Piloto: " . $equipe['piloto'] . ", 2º Piloto: " . $equipe['piloto2']; 
                            ?>
                        </option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select name="equipe4">
                    <?php 
                    $equipesSelecionadas = array();
                    foreach ($_SESSION['corridasCadastradas'] as $corrida) {
                        $equipesSelecionadas[] = $corrida['carro'];
                    }

                    foreach ($_SESSION['equipesCadastradas'] as $equipe): 
                        if (!in_array($equipe['nome'], $equipesSelecionadas)):
                    ?>
                        <option value="<?php echo $equipe['id']; ?>">
                            <?php 
                            echo "Nome da Equipe: " . $equipe['nome_equipe'] . ", País da Equipe: " . $equipe['pais_equipe'] . ", Líder: " . $equipe['chefe']
                             . ", Patrocinadores: " . $equipe['patrocinadores'] . ", Títulos: " . $equipe['titulos'] . ", 1º Piloto: " . $equipe['piloto'] . ", 2º Piloto: " . $equipe['piloto2']; 
                            ?>
                        </option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select name="equipe5">
                    <?php 
                    $equipesSelecionadas = array();
                    foreach ($_SESSION['corridasCadastradas'] as $corrida) {
                        $equipesSelecionadas[] = $corrida['carro'];
                    }

                    foreach ($_SESSION['equipesCadastradas'] as $equipe): 
                        if (!in_array($equipe['nome'], $equipesSelecionadas)):
                    ?>
                        <option value="<?php echo $equipe['id']; ?>">
                            <?php 
                            echo "Nome da Equipe: " . $equipe['nome_equipe'] . ", País da Equipe: " . $equipe['pais_equipe'] . ", Líder: " . $equipe['chefe']
                             . ", Patrocinadores: " . $equipe['patrocinadores'] . ", Títulos: " . $equipe['titulos'] . ", 1º Piloto: " . $equipe['piloto'] . ", 2º Piloto: " . $equipe['piloto2']; 
                            ?>
                        </option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Enviar">
            </form>
        </fieldset>
    </section>

    <section>
        <fieldset>
            <legend><h1>Corridas Cadastradas</h1></legend>
            <ul>
                <?php if (isset($_SESSION['corridasCadastradas'])): ?>
                    <?php foreach ($_SESSION['corridasCadastradas'] as $key => $corrida): ?>
                        <li>
                            <?php echo "<strong>ID:</strong> " . $corrida['id'] . ", Nome: " . $corrida['nome'] . ", <strong>Tipo de Pista:</strong> " . $corrida['pista'] . "<br>";
                            echo "<strong>1ª Equipe:</strong> " . $corrida['equipes']['equipe1']['nome_equipe'] . ", <strong>País:</strong> " . $corrida['equipes']['equipe1']['pais_equipe'] . ", <strong>Líder:</strong> " . $corrida['equipes']['equipe1']['chefe'] . ", <strong>Patrocinadores:</strong> " . $corrida['equipes']['equipe1']['patrocinadores'] . ", <strong>Títulos:</strong> " . $corrida['equipes']['equipe1']['titulos'] . ", <strong>1º Piloto:</strong> " . $corrida['equipes']['equipe1']['piloto'] . ", <strong>2º Piloto:</strong> " . $corrida['equipes']['equipe1']['piloto2'] . "<br>";
                            echo "<strong>2ª Equipe:</strong> " . $corrida['equipes']['equipe2']['nome_equipe'] . ", <strong>País:</strong> " . $corrida['equipes']['equipe2']['pais_equipe'] . ", <strong>Líder:</strong> " . $corrida['equipes']['equipe2']['chefe'] . ", <strong>Patrocinadores:</strong> " . $corrida['equipes']['equipe2']['patrocinadores'] . ", <strong>Títulos:</strong> " . $corrida['equipes']['equipe2']['titulos'] . ", <strong>1º Piloto:</strong> " . $corrida['equipes']['equipe2']['piloto'] . ", <strong>2º Piloto:</strong> " . $corrida['equipes']['equipe2']['piloto2'] . "<br>";
                            echo "<strong>3ª Equipe:</strong> " . $corrida['equipes']['equipe3']['nome_equipe'] . ", <strong>País:</strong> " . $corrida['equipes']['equipe3']['pais_equipe'] . ", <strong>Líder:</strong> " . $corrida['equipes']['equipe3']['chefe'] . ", <strong>Patrocinadores:</strong> " . $corrida['equipes']['equipe3']['patrocinadores'] . ", <strong>Títulos:</strong> " . $corrida['equipes']['equipe3']['titulos'] . ", <strong>1º Piloto:</strong> " . $corrida['equipes']['equipe3']['piloto'] . ", <strong>2º Piloto:</strong> " . $corrida['equipes']['equipe3']['piloto2'] . "<br>";
                            echo "<strong>4ª Equipe:</strong> " . $corrida['equipes']['equipe4']['nome_equipe'] . ", <strong>País:</strong> " . $corrida['equipes']['equipe4']['pais_equipe'] . ", <strong>Líder:</strong> " . $corrida['equipes']['equipe4']['chefe'] . ", <strong>Patrocinadores:</strong> " . $corrida['equipes']['equipe4']['patrocinadores'] . ", <strong>Títulos:</strong> " . $corrida['equipes']['equipe4']['titulos'] . ", <strong>1º Piloto:</strong> " . $corrida['equipes']['equipe4']['piloto'] . ", <strong>2º Piloto:</strong> " . $corrida['equipes']['equipe4']['piloto2'] . "<br>";
                            if(isset($corrida['equipes']['equipe5'])) {
                                echo "<strong>5ª Equipe:</strong> " . $corrida['equipes']['equipe5']['nome_equipe'] . ", <strong>País:</strong> " . $corrida['equipes']['equipe5']['pais_equipe'] . ", <strong>Líder:</strong> " . $corrida['equipes']['equipe5']['chefe'] . ", <strong>Patrocinadores:</strong> " . $corrida['equipes']['equipe5']['patrocinadores'] . ", <strong>Títulos:</strong> " . $corrida['equipes']['equipe5']['titulos'] . ", <strong>1º Piloto:</strong> " . $corrida['equipes']['equipe5']['piloto'] . ", <strong>2º Piloto:</strong> " . $corrida['equipes']['equipe5']['piloto2'] . "<br>";
                            } else {
                                echo "<strong>5ª Equipe:</strong> Não definida <br>";
                            } ?>
                            <form action="../App/Resources/deletar4.php" method="post">
                                <input type="hidden" name="corrida_key" value="<?php echo $key; ?>">
                                <button type='submit'>Remover</button>
                            </form>
                            <form action="../App/Resources/editar4.php" method="post">
                                <input type="hidden" name="corrida_key" value="<?php echo $key; ?>">
                                <button type='submit'>Editar</button>
                            </form>
                            <form action="../App/Resources/iniciar_corrida.php" method="post">
                                <button type="submit" name="iniciar_corrida">Iniciar Corrida</button>
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