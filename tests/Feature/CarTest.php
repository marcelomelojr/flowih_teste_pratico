<?php

use App\Models\Car;
use App\Models\User;

test('list cars', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

it('should able to create a car', function () {

    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post('/car/create', [
        'name' => 'Teste criando car',
        'model' => 'F40',
        'color' => 'Red',
        'year' => '1992',
        'price' => '1000000.00',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor, nisl eget ultricies ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet n',
    ]);

    $this->assertDatabaseHas('cars', [
        'name' => 'Teste criando car',
    ]);

    $response->assertStatus(302);
});

it('should able to edit a car', function () {
    $user = User::factory()->create();

    $this->actingAs($user);
    $car = Car::factory()->create([
        'user_id' => $user->id,
    ]);

    $response = $this->put('/car/edit/' . $car->id, [
        'name' => 'Ferrari',
        'model' => 'F40',
        'color' => 'Red',
        'year' => '1992',
        'price' => '1000000.00',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor, nisl eget ultricies ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet n',
    ]);

    $this->assertDatabaseHas('cars', [
        'id' => $car->id,
    ]);

    $response->assertStatus(302);
});

it('should able to delete a car', function () {

    $user = User::factory()->create();

    $this->actingAs($user);
    $car = Car::factory()->create([
        'user_id' => $user->id,
    ]);

    $response = $this->delete('/car/delete/' . $car->id);


    $this->assertDatabaseMissing('cars', [
        'id' => $car->id,
    ]);
    $response->assertStatus(302);

});

