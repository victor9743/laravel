<?php

describe('Test Expectation modifiers and chaning', function(){

    it('tests the and() modifier', function(){
        // fazendo duas verificações em um unico expect,
        // no caso do and só irá passar se as duas condições forem verdadeiras
        expect('victor')->toBe('victor')
        ->and('costa')->toBe('costa');
    });

    it('tests the not() modifier', function(){
        // checa se o valor é diferente do expect
        expect(20)->not()->toBe(10);
    });

    it('tests the sequence() modifier', function(){
        // verifica se a sequencia está correta
        expect([1,2,3])->sequence(
            fn($value) => $value->toBeInt()->toBe(1),
            fn($value) => $value->toBeInt()->toBe(2),
            fn($value) => $value->toBeInt()->toBe(3)
        );
    });
});