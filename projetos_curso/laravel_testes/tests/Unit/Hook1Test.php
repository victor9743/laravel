<?php

// antes de cada teste ele irá executar esta função
beforeEach(function(){
    $this->number1 = 10;
});

describe('testes com hooks', function(){
    it("test 1", function() {
        expect($this->number1)->toBe(10);

    });
});

// executado após cada teste
afterEach(function(){
    unset($this->number1);
});