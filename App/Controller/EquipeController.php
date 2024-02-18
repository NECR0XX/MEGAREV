<?php
require_once '../App/Model/EquipeModel.php';

class EquipeController {
    private $equipeModel;

    public function __construct() {
        $this->equipeModel = new EquipeModel();
    }

    public function criarEquipe($nome_equipe, $pais_equipe, $chefe, $patrocinadores, $titulos, $piloto, $piloto2) {
        $this->equipeModel->criarEquipe($nome_equipe, $pais_equipe, $chefe, $patrocinadores, $titulos, $piloto, $piloto2);
    }

    public function listarEquipes() {
        return $this->equipeModel->getEquipes();
    }
}
?>