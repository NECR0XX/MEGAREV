<?php
require_once '../App/Model/PistaModel.php';

class PistaController {
    private $pistaModel;

    public function __construct() {
        $this->pistaModel = new PistaModel();
    }

    public function criarPista($pais, $tipo, $cidade, $distancia) {
        $this->pistaModel->criarPista($pais, $tipo, $cidade, $distancia);
    }

    public function listarPistas() {
        return $this->pistaModel->getPistas();
    }
}
?>