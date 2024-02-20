<?php
class PistaModel {
    private $pistas = [];
    private static $ultimoId = 0;

    public function criarPista($pais, $estado, $cidade, $distancia) {
        self::$ultimoId++;

        $novaPista = array(
            'id' => self::$ultimoId,
            'pais' => $pais,
            'estado' => $estado,
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