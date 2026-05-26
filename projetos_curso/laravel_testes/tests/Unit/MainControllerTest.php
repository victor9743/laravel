<?php

// instanciando o controller que será realizado o teste
use App\Http\Controllers\MainController;

// criar um teste para o metodo index
test('testando o método index', function(){
    // criando uma nova instancia do main controller
    $main_controller = new MainController();

    // chamando o metodo index
    $result = $main_controller->index();

    // verificar se o resultado obtido é uma string
    expect($result)->toBeString();

    // vamos verificar se o resultado é igual a "Olá Mundo"
    expect($result)->toEqual("Olá Mundo");
});