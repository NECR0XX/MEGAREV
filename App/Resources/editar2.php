<?php
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_piloto'])) {
        $piloto_key = $_POST['piloto_key'];
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $peso = $_POST['peso'];
        $carro = $_POST['carro'];
        $pais_pil = $_POST['pais_pil'];

    if (isset($_SESSION['pilotosCadastrados'][$piloto_key])) {
        $_SESSION['pilotosCadastrados'][$piloto_key]['nome'] = $nome;
        $_SESSION['pilotosCadastrados'][$piloto_key]['idade'] = $idade;
        $_SESSION['pilotosCadastrados'][$piloto_key]['peso'] = $peso;
        $_SESSION['pilotosCadastrados'][$piloto_key]['carro'] = $carro;
        $_SESSION['pilotosCadastrados'][$piloto_key]['pais_pil'] = $pais_pil;
    }

    header('Location: ../../Public/piloto.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Piloto</title>
</head>
<body>
    <section>
        <?php if(isset($_SESSION['pilotosCadastrados'])): ?>
            <?php $piloto_key = $_POST['piloto_key']; ?>
            <fieldset>
                <legend><h1>Editar Piloto</h1></legend>
                <form method="post">
                    <input type="text" name="nome" placeholder="Nome" value="<?php echo $_SESSION['pilotosCadastrados'][$piloto_key]['nome']; ?>">
                    <input type="number" name="idade" placeholder="Idade" value="<?php echo $_SESSION['pilotosCadastrados'][$piloto_key]['idade']; ?>">
                    <input type="number" name="peso" placeholder="Peso" value="<?php echo $_SESSION['pilotosCadastrados'][$piloto_key]['peso']; ?>">
                    <input type="text" name="carro" placeholder="Carro" value="<?php echo $_SESSION['pilotosCadastrados'][$piloto_key]['carro']; ?>">
                    <input type="text" name="pais_pil" placeholder="País" value="<?php echo $_SESSION['pilotosCadastrados'][$piloto_key]['pais_pil']; ?>">
                    <input type="hidden" name="piloto_key" value="<?php echo $piloto_key; ?>">
                    <input type="submit" name="editar_piloto" value="Atualizar">
                </form>
            </fieldset>
        <?php endif; ?>
    </section>
</body>
</html>