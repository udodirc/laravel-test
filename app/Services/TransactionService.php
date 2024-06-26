<?php

namespace App\Services;

use App\Data\Transaction\TransactionCreateData;
use App\Models\Transaction;

class TransactionService
{
    public function create(TransactionCreateData $data): Transaction
    {
        $transaction = new Transaction();
        $transaction->user_id = 1;
        $transaction->title = $data->title;
        $transaction->amount = $data->amount;

        $transaction->save();

        return $transaction;
    }
}
