<?php
class PilotoModel {
    private $pilotos = [];
    private static $ultimoId = 0;

    public function criarPiloto($nome, $idade, $peso, $carro, $pais_pil) {
        self::$ultimoId++;

        $novaPiloto = array(
            'id' => self::$ultimoId,
            'nome' => $nome,
            'idade' => $idade,
            'peso' => $peso,
            'carro' => $carro,
            'pais_pil' => $pais_pil
        );

        $this->pilotos[] = $novaPiloto;
    }

    public function getPilotos() {
        return $this->pilotos;
    }
}
?>