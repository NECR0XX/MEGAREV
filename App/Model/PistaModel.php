<?php
class PistaModel {
    private $pistas = [];

    public function criarPista($pais, $estado, $cidade, $distancia) {
    }

    public function getPistas() {
        return $this->pistas;
    }

    $pistas = [
        [
            'cidade' => 'Pista 1',
            'comprimento' => 5000, // em metros
            'pais' => 10,
            'superficie' => 'Asfalto'
        ],
        [
            'cidade' => 'Pista 2',
            'comprimento' => 6000, // em metros
            'pais' => 8,
            'superficie' => 'Terra'
        ],
        [
            'cidade' => 'Pista 3',
            'comprimento' => 4500, // em metros
            'pais' => 12,
            'superficie' => 'Asfalto'
        ],
        [
            'cidade' => 'Pista 4',
            'comprimento' => 7000, // em metros
            'pais' => 6,
            'superficie' => 'Asfalto'
        ],
        [
            'cidade' => 'Pista 5',
            'comprimento' => 5500, // em metros
            'pais' => 9,
            'superficie' => 'Terra'
        ],
        [
            'cidade' => 'Pista 6',
            'comprimento' => 8000, // em metros
            'pais' => 5,
            'superficie' => 'Asfalto'
        ]
        ];
    
}
?>