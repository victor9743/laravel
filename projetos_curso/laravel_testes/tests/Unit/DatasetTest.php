<?php

describe('Testes com datasets', function(){

    // coleção de dados
    $clients = [
        ['João', 18],
        ['Carlos', 21],
        ['Ana', 22],
    ];

    // teste
    it('verifies if all clients have name', function($name, $age) {
        // checa se todos os clientes possui nome
        expect($name)->toBeString();
    })->with($clients);

    it('verifies if all clients are adults', function($name, $age){
        // checar se todos os clientes possue idade maior que 18 anos
        expect($age)->toBeGreaterThanOrEqual(18);
    })->with($clients);
});
