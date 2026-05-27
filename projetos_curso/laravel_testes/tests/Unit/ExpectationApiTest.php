<?php

describe('Test Expectation function (API)', function (){
    it('tests the toBe() function', function(){
        expect('hello wolrd')->toBe('hello wolrd');

        // verifica se o número é inteiro e igual a 10
        expect(10)
            ->toBeInt()
            ->toBe(10);
    });

    it('tests the toBeTrue() and toBeFalse() functions', function(){
        // valida se o valor é true
        expect(true)->toBeTrue();

        // verificar se o valor é falso
        expect(false)->toBeFalse();
    });

    it('tests the toBeNull() functions', function (){
        // checa se o valor é nulo
        expect(null)->toBeNull();
    });

    it('test the toBeEmpty() functions', function() {
        // checa se o valor pode ser vazio
        expect('')->toBeEmpty();
    });

    it('test the toBeArray() functions', function() {
        // checa se o valor é um array
        expect([])->toBeArray();
    });

    it('test the toBeIn() functions', function(){
        // checa se o valor existe dentro de uma coleção
        expect(3)->toBeIn([1,2,3]);
    });

    it('test the toBeJson() functions', function(){
        // checa se o valor é um json
        expect('{"name": "josé", "idade": 29}')->toBeJson();
    });

    it('test the toMatch() functions', function(){
        // checa se existe determinada expressão dentro de uma string
        expect('hello wolrd')->toMatch('/hello/');
    });

    it('test the toBeUppercase() function', function(){
        // checa se uma palavra estar em maiusculo
        expect('WORLD')->toBeUppercase();
    });
});