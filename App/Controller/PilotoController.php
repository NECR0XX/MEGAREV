<?php
require_once '../App/Model/PilotoModel.php';

class PilotoController {
    private $pilotoModel;

    public function __construct() {
        $this->pilotoModel = new PilotoModel();
    }

    public function criarPiloto($nome, $idade, $peso, $carro, $pais_pil) {
        $this->pilotoModel->criarPiloto($nome, $idade, $peso, $carro, $pais_pil);
    }

    public function listarPilotos() {
        return $this->pilotoModel->getPilotos();
    }
}
?>