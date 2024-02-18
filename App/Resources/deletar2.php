<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['piloto_key'])) {
        $piloto_key = $_POST['piloto_key'];

        if (isset($_SESSION['pilotosCadastrados'][$piloto_key])) {
            unset($_SESSION['pilotosCadastrados'][$piloto_key]);
        }
    }
}

header("Location: ../../Public/piloto.php");
exit();
?>
