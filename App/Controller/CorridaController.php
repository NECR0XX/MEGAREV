<?php
require_once '../App/Model/PilotoModel.php';

class PilotoController {
    private $pilotoModel;

    public function __construct() {
        $this->pilotoModel = new PilotoModel();
    }

    public function criarPiloto($nome, $idade, $peso, $carro, $equipe) {
        $this->pilotoModel->criarPiloto($nome, $idade, $peso, $carro, $equipe);
    }

    public function listarPilotos() {
        return $this->pilotoModel->getPilotos();
    }
}
?>