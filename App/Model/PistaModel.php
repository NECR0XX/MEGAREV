<?php
class PistaModel {
    private $pistas = [];
    private static $ultimoId = 0;

    public function criarPista($pais, $tipo, $cidade, $distancia) {
        self::$ultimoId++;

        $novaPista = array(
            'id' => self::$ultimoId,
            'pais' => $pais,
            'tipo' => $tipo,
            'cidade' => $cidade,
            'distancia' => $distancia
        );

        $this->pistas[] = $novaPista;
    }

    public function getPistas() {
        return $this->pistas;
    }
}

?>