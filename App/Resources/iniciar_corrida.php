<?php
session_start();

$equipesCadastradas = $_SESSION['equipesCadastradas'];
shuffle($equipesCadastradas);
sleep(3);
$equipesSorteadas = array_slice($equipesCadastradas, 0, 3);

$colocacoes = array("1º Colocado", "2º Colocado", "3º Colocado");
foreach ($colocacoes as $posicao => $colocacao) {
    echo $colocacao . ": " . $equipesSorteadas[$posicao]['nome_equipe'] . "<br>";
}
echo "<br>
<form action='../../Public/corrida.php'>
    <button>Finalizar Corrida</button>
</form>"
?>