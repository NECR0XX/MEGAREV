<?php
require_once '../App/Model/CorridaModel.php';

class CorridaController {
    private $corridaModel;

    public function __construct() {
        $this->corridaModel = new CorridaModel();
    }

    public function criarCorrida($nome, $pista, $equipe1, $equipe2, $equipe3, $equipe4, $equipe5) {
        $this->corridaModel->criarCorrida($nome, $pista, $equipe1, $equipe2, $equipe3, $equipe4, $equipe5);
    }

    public function listarCorridas() {
        return $this->corridaModel->getCorridas();
    }
}
?>