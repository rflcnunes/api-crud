<?php

use App\Models\Tool as Tool;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use function Pest\Faker\faker;

uses(Tests\TestCase::class, RefreshDatabase::class);

test('does not create a tool without a name field', function () {
    $response = $this->postJson('/api/tool', []);
    $response->assertStatus(422);
});

it('can create a tool', function () {
    $attributes = Tool::factory()->raw();
    $response = $this->postJson('/api/tool', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('tools', $attributes);
});
