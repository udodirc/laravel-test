<?php

namespace App\Http\Controllers;

use App\Data\Transaction\TransactionCreateData;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    public function __construct(
        private readonly TransactionService $transactionService
    ) {
    }

    public function store(TransactionCreateData $data): TransactionResource
    {
        return new TransactionResource(
            $this->transactionService->create($data)
        );
    }

    public function show(Transaction $transaction): TransactionResource
    {
        return new TransactionResource($transaction);
    }
}
