<?php
require_once '../App/Model/CarroModel.php';

class CarroController {
    private $carroModel;

    public function __construct() {
        $this->carroModel = new CarroModel();
    }

    public function criarCarro($marca, $modelo, $ano, $potencia, $velocidade_max) {
        $this->carroModel->criarCarro($marca, $modelo, $ano, $potencia, $velocidade_max);
    }

    public function listarCarros() {
        return $this->carroModel->getCarros();
    }
}
?>