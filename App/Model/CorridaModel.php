<?php
class CorridaModel {
    private $corridas = [];
    private static $ultimoId = 0;

    public function criarCorrida($nome, $pista, $equipe1, $equipe2, $equipe3, $equipe4, $equipe5) {
        self::$ultimoId++;

        $novaCorrida = array(
            'id' => self::$ultimoId,
            'nome' => $nome,
            'pista' => $pista,
            'equipe1' => $equipe1,
            'equipe2' => $equipe2,
            'equipe3' => $equipe3,
            'equipe4' => $equipe4,
            'equipe5' => $equipe5
        );

        $this->corridas[] = $novaCorrida;
    }

    public function getCorridas() {
        return $this->corridas;
    }
}
?>