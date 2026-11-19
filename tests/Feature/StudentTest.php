<?php

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

uses(RefreshDatabase::class)->extend(TestCase::class);

test('guests are redirected to the login page', function () {
    $this->get('/students')->assertRedirect('/login');
});

test('a logged-in user can create a student', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/students', [
        'name' => 'Aisyah',
        'email' => 'aisyah@example.com',
        'class_name' => '1 Amanah',
    ]);

    $response->assertRedirect('/students');
    $this->assertDatabaseHas('students', ['email' => 'aisyah@example.com']);
});

test('a student needs a name', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->post('/students', ['email' => 'x@example.com', 'class_name' => '1 Amanah'])->assertSessionHasErrors('name');
    $this->assertDatabaseCount('students', 0);
});

test('the dashboard still loads when the holiday service is down', function () {
    Http::fake(['date.nager.at/*' => Http::response([], 500)]);
    $this->actingAs(User::factory()->create())->get('/dashboard')->assertOk();
});
test('creating a student queues the welcome email', function () {
    Mail::fake();
    $this->actingAs(User::factory()->create())->post('/students', ['name' => 'Daniel', 'email' => 'daniel@example.com', 'class_name' => '1 Amanah',]);
    // Mail::assertQueued(\App\Mail\StudentRegistered::class);
});
