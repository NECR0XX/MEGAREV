<?php
class CarroModel {
    private $carros = [];
    private static $ultimoId = 0;

    public function criarCarro($marca, $modelo, $ano, $potencia, $velocidade_max) {
        self::$ultimoId++;

        $novacarro = array(
            'id' => self::$ultimoId,
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