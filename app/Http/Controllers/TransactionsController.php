<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Services\CreateTransactionService;

class TransactionsController extends Controller
{
    public function create(
        CreateTransactionRequest $createTransactionRequest,
        CreateTransactionService $createTransactionService
    ): TransactionResource
    {
        $data = $createTransactionRequest->validated();
        $transaction = $createTransactionService->run($data);
        return new TransactionResource($transaction);
    }
}
