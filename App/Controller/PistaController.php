<?php
require_once '../App/Model/PistaModel.php';

class PistaController {
    private $pistaModel;

    public function __construct() {
        $this->pistaModel = new PistaModel();
    }

    public function criarPista($pais, $estado, $cidade, $distancia) {
        $this->pistaModel->criarPista($pais, $estado, $cidade, $distancia);
    }

    public function listarPistas() {
        return $this->pistaModel->getPistas();
    }

/*
    public function listarPistas() {
        return $this->pistaModel->listarPistas();
    }

    public function exibirListaPistas() {
        $pistas = $this->pistaModel->listarPistas();
        include '../../Resources/View/usuarios/lista.php';
    }

    public function atualizarPista($id, $nome, $email, $senha, $tipo_usuario) {
        $this->pistaModel->atualizarPista($id, $nome, $email, $senha, $tipo_usuario);
    }
    
    public function excluirPista ($id) {
        $this->pistaModel->excluirPista($id);
    }
    */
}
?>