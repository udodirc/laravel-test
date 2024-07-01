<?php

namespace App\Services;

use App\Data\Transaction\TransactionCreateData;
use App\Data\Transaction\TransactionFilterData;
use App\Models\Transaction;
use App\QueryBuilders\TransactionQueryBuilder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\Optional;

class TransactionService
{
    const TYPE_INCOME = 1;
    const TYPE_LESS = 2;

    public function fetch(TransactionFilterData $filter): Collection
    {
        return Transaction::query()
            ->when(
                ! $filter->amount instanceof Optional,
                fn (TransactionQueryBuilder $q) => $q->byAmount($filter->amount)
            )
            ->when(
                ! $filter->type instanceof Optional,
                fn (TransactionQueryBuilder $q) => $q->byType($filter->type)
            )
            ->when(
                ! $filter->createdDate instanceof Optional,
                fn (TransactionQueryBuilder $q) => $q->createdDate($filter->createdDate)
            )
            ->get();
    }

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
