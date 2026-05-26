<?php

test('verificar se a homepage está disponível', function () {
    $response = $this->get('/');

    // $response->assertStatus(200);
    expect($response->status())->toBe(200);
});
