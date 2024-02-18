<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['equipe_key'])) {
        $equipe_key = $_POST['equipe_key'];

        if (isset($_SESSION['equipesCadastradas'][$equipe_key])) {
            unset($_SESSION['equipesCadastradas'][$equipe_key]);
        }
    }
}

header("Location: ../../Public/equipe.php");
exit();
?>
