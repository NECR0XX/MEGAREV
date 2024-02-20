<?php
class EquipeModel {
    private $equipes = [];
    private static $ultimoId = 0;

    public function criarequipe($nome_equipe, $pais_equipe, $chefe, $patrocinadores, $titulos, $piloto, $piloto2) {
        self::$ultimoId++;

        $novaequipe = array(
            'id' => self::$ultimoId,
            'nome_equipe' => $nome_equipe,
            'pais_equipe' => $pais_equipe,
            'chefe' => $chefe,
            'patrocinadores' => $patrocinadores,
            'titulos' => $titulos,
            'piloto' => $piloto,
            'piloto2' => $piloto2
        );

        $this->equipes[] = $novaequipe;
    }

    public function getEquipes() {
        return $this->equipes;
    }
}
?>