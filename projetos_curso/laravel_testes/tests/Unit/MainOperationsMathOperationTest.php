<?php
use App\Services\MainOperations;


describe('MainOperations - testar o método mathOperation', function() {
    it('check if mathOperation() return sum', function(){
        expect(MainOperations::mathOperation(10, 5, 'add'))
        ->toBe(15);
    });

    it('check if mathOperation() return subtract', function(){
        expect(MainOperations::mathOperation(10, 5, 'subtract'))
        ->toBe(5);
    });

    it('check if mathOperation() return multiply', function(){
        expect(MainOperations::mathOperation(10, 5, 'multiply'))
        ->toBe(50);
    });

    it('check if mathOperation() return divide', function(){
        expect(MainOperations::mathOperation(10, 5, 'divide'))
        ->toBe(2);
    });

    it('check if mathOperation() return null', function(){
        expect(MainOperations::mathOperation(10, 5, null))
        ->toBe(null);
    });
});
