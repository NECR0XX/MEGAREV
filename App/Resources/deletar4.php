<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['corrida_key'])) {
        $corrida_key = $_POST['corrida_key'];

        if (isset($_SESSION['corridasCadastradas'][$corrida_key])) {
            unset($_SESSION['corridasCadastradas'][$corrida_key]);
        }
    }
}

header("Location: ../../Public/corrida.php");
exit();
?>
