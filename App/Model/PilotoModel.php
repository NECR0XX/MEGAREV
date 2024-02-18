<?php
class PilotoModel {
    private $pilotos = [];

    public function criarPiloto($nome, $idade, $peso, $carro, $pais_pil) {
        $novaPiloto = array(
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