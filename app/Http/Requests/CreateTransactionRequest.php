<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'receiver_id' => ['required'],
            'value' => ['required']
        ];
    }
}
