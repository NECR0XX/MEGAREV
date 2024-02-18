<?php
class PistaModel {
    private $pistas = [];

    public function criarPista($pais, $estado, $cidade, $distancia) {
        $novaPista = array(
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