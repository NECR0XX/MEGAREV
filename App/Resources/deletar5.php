<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['carro_key'])) {
        $carro_key = $_POST['carro_key'];

        if (isset($_SESSION['carrosCadastrados'][$carro_key])) {
            unset($_SESSION['carrosCadastrados'][$carro_key]);
        }
    }
}

header("Location: ../../Public/carros.php");
exit();
?>
