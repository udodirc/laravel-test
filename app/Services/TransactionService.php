<?php

namespace App\Services;

use App\Data\Transaction\TransactionCreateData;
use App\Models\Transaction;

class TransactionService
{
    const TYPE_INCOME = 1;
    const TYPE_LESS = 2;

    public function create(TransactionCreateData $data): Transaction
    {
        $transaction = new Transaction();
        $transaction->user_id = 1;
        $transaction->title = $data->title;
        $transaction->amount = $data->amount;
        $transaction->type = $data->type;

        $transaction->save();

        return $transaction;
    }

    public function delete(Transaction $transaction): bool
    {
        return (bool) $transaction->delete();
    }
}
