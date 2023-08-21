<?php

namespace Tests\Feature;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTransactionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_new_transaction(): void
    {
        $sender = User::factory()->create(['balance' => 9.99]);
        $receiver = User::factory()->create();

        $response = $this->actingAs($sender)->post('/api/transactions', [
            'receiver_id' => $receiver->id,
            'value' => 9.99
        ]);

        $response->assertCreated();
    }

    /** @test */
    public function it_creates_a_new_transaction_between_a_normal_user_and_a_merchant_user(): void
    {
        $sender = User::factory()->create(['balance' => 9.99]);
        $receiver = User::factory()->create(['type' => UserTypeEnum::NORMAL]);

        $response = $this->actingAs($sender)->post('/api/transactions', [
            'receiver_id' => $receiver->id,
            'value' => 9.99
        ]);

        $response->assertCreated();
    }

    /** @test */
    public function it_fails_with_insufficient_balance_exception(): void
    {
        $sender = User::factory()->create(['balance' => 0]);
        $receiver = User::factory()->create();

        $response = $this->actingAs($sender)->post('/api/transactions', [
            'receiver_id' => $receiver->id,
            'value' => 9.99
        ]);

        $response->assertBadRequest();
    }

    /** @test */
    public function it_fails_with_cannot_find_user_exception(): void
    {
        $sender = User::factory()->create(['balance' => 9.99]);

        $response = $this->actingAs($sender)->post('/api/transactions', [
            'receiver_id' => 'anything',
            'value' => 9.99
        ]);

        $response->assertBadRequest();
    }

    /** @test */
    public function it_fails_with_invalid_transaction_sender_type_exception(): void
    {
        $sender = User::factory()->create(['balance' => 9.99, 'type' => UserTypeEnum::MERCHANT]);
        $receiver = User::factory()->create();

        $response = $this->actingAs($sender)->post('/api/transactions', [
            'receiver_id' => $receiver->id,
            'value' => 9.99
        ]);

        $response->assertBadRequest();
    }
}
