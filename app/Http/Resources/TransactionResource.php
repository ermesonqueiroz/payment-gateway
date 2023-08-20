<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'status' => $this->status,
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id
        ];
    }
}
