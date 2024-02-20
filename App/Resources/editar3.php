<?php
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_equipe'])) {
        $equipe_key = $_POST['equipe_key'];
        $nome_equipe = $_POST['nome_equipe'];
        $pais_equipe = $_POST['pais_equipe'];
        $chefe = $_POST['chefe'];
        $patrocinadores = $_POST['patrocinadores'];
        $titulos = $_POST['titulos'];
        $piloto = $_POST['piloto'];
        $piloto2 = $_POST['piloto2'];

    if (isset($_SESSION['equipesCadastradas'][$equipe_key])) {
        $_SESSION['equipesCadastradas'][$equipe_key]['nome_equipe'] = $nome_equipe;
        $_SESSION['equipesCadastradas'][$equipe_key]['pais_equipe'] = $pais_equipe;
        $_SESSION['equipesCadastradas'][$equipe_key]['chefe'] = $chefe;
        $_SESSION['equipesCadastradas'][$equipe_key]['patrocinadores'] = $patrocinadores;
        $_SESSION['equipesCadastradas'][$equipe_key]['patrocinadores'] = $titulos;
        $_SESSION['equipesCadastradas'][$equipe_key]['patrocinadores'] = $piloto;
        $_SESSION['equipesCadastradas'][$equipe_key]['patrocinadores'] = $piloto2;
    }

    header('Location: ../../Public/equipe.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipe</title>
</head>
<body>
    <section>
        <?php if(isset($_SESSION['equipesCadastradas'])): ?>
            <?php $equipe_key = $_POST['equipe_key']; ?>
            <fieldset>
                <legend><h1>Editar Equipe</h1></legend>
                <form method="post">
                    <input type="text" name="nome_equipe" placeholder="Nome da equipe" value="<?php echo $_SESSION['equipesCadastradas'][$equipe_key]['nome_equipe']; ?>">
                    <input type="text" name="pais_equipe" placeholder="País da equipe" value="<?php echo $_SESSION['equipesCadastradas'][$equipe_key]['pais_equipe']; ?>">
                    <input type="text" name="chefe" placeholder="Chefe" value="<?php echo $_SESSION['equipesCadastradas'][$equipe_key]['chefe']; ?>">
                    <input type="text" name="patrocinadores" placeholder="Patrocinadores" value="<?php echo $_SESSION['equipesCadastradas'][$equipe_key]['patrocinadores']; ?>">
                    <input type="number" name="titulos" placeholder="Títulos" value="<?php echo $_SESSION['equipesCadastradas'][$equipe_key]['titulos']; ?>">
                    <input type="text" name="piloto" placeholder="1º Piloto" value="<?php echo $_SESSION['equipesCadastradas'][$equipe_key]['piloto']; ?>">
                    <input type="text" name="piloto2" placeholder="2º Piloto" value="<?php echo $_SESSION['equipesCadastradas'][$equipe_key]['piloto2']; ?>">
                    <input type="hidden" name="equipe_key" value="<?php echo $equipe_key; ?>">
                    <input type="submit" name="editar_equipe" value="Atualizar">
                </form>
            </fieldset>
        <?php endif; ?>
    </section>
</body>
</html>