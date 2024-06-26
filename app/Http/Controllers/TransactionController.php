<?php

namespace App\Http\Controllers;

use App\Data\Transaction\TransactionCreateData;
use App\Http\Resources\TransactionResource;
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
}
