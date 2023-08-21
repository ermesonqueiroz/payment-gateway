<?php

namespace App\Services;

use App\Enums\UserTypeEnum;
use App\Exceptions\CannotFindUserException;
use App\Exceptions\InsufficientBalanceException;
use App\Exceptions\InvalidTransactionSenderTypeException;
use App\Exceptions\TransactionReceiverCannotBeEqualToReceiverException;
use App\Models\Transaction;
use App\Models\User;

class CreateTransactionService
{
    public function run($data)
    {
        $sender = User::find($data['sender_id']);
        $receiver = User::find($data['receiver_id']);

        if (!$sender) throw new CannotFindUserException($sender->id);
        if (!$receiver) throw new CannotFindUserException($sender->id);
        if ($sender->id == $receiver->id) throw new TransactionReceiverCannotBeEqualToReceiverException();
        if ($sender->type == UserTypeEnum::MERCHANT) throw new InvalidTransactionSenderTypeException();
        if ($sender->balance < $data['value']) throw new InsufficientBalanceException($sender->id);

        $transaction = new Transaction($data);
        $transaction->save();

        return $transaction;
    }
}
