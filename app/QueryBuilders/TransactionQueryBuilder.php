<?php

namespace App\QueryBuilders;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class TransactionQueryBuilder extends Builder
{
    public function byType(int $type): TransactionQueryBuilder
    {
        return $this->where('type', '=', $type);
    }

    public function byAmount(float $amount): TransactionQueryBuilder
    {
        return $this->where('amount', '=', $amount);
    }

    public function createdDate(string $date): TransactionQueryBuilder
    {
        return $this->whereBetween('created_at', [
        (new Carbon)->parse($date),
        (new Carbon)->parse($date)->addDays(1)]);
    }
}
