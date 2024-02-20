<?php
class PilotoModel {
    private $pilotos = [];
    private static $ultimoId = 0;

    public function criarPiloto($nome, $idade, $peso, $carro, $equipe) {
        self::$ultimoId++;

        $novaPiloto = array(
            'id' => self::$ultimoId,
            'nome' => $nome,
            'idade' => $idade,
            'peso' => $peso,
            'carro' => $carro,
            'equipe' => $equipe
        );

        $this->pilotos[] = $novaPiloto;
    }

    public function getPilotos() {
        return $this->pilotos;
    }
}
?>