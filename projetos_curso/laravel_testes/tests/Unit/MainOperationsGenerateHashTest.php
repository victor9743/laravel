<?php

use App\Services\MainOperations;


test('testar se é gerado uma hash com 32 caracteres', function(){

    // verifica o tamanho do hash com strlen e verifica também se é igual a 32 com o toBe
    expect(strlen(MainOperations::generateHash()))->toBe(32);


    // verificar se o tamanho do hash é igual a 10
    expect(strlen(MainOperations::generateHash(10)))->toBe(10);
});