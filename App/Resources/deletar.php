<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pista_key'])) {
        $pista_key = $_POST['pista_key'];

        if (isset($_SESSION['pistasCadastradas'][$pista_key])) {
            unset($_SESSION['pistasCadastradas'][$pista_key]);
        }
    }
}

header("Location: ../../Public/pista.php");
exit();
?>
