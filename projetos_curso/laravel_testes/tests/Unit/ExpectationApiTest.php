<?php

describe('Test Expectation function (API)', function (){
    it('tests the toBe() function', function(){
        expect('hello wolrd')->toBe('hello wolrd');

        // verifica se o número é inteiro e igual a 10
        expect(10)
            ->toBeInt()
            ->toBe(10);
    });
});