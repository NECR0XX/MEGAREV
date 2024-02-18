<?php
class CarroModel {
    private $carros = [];

    public function criarCarro($marca, $modelo, $ano, $potencia, $velocidade_max) {
        $novacarro = array(
            'marca' => $marca,
            'modelo' => $modelo,
            'ano' => $ano,
            'potencia' => $potencia,
            'velocidade_max' => $velocidade_max
        );

        $this->carros[] = $novacarro;
    }

    public function getCarros() {
        return $this->carros;
    }
}
?>