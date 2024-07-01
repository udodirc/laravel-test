<?php

namespace App\Http\Controllers;

use App\Data\Transaction\TransactionCreateData;
use App\Data\Transaction\TransactionFilterData;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TransactionController extends Controller
{
    public function __construct(
        private readonly TransactionService $transactionService
    ) {
    }

    public function index(TransactionFilterData $filterData): AnonymousResourceCollection
    {
        return TransactionResource::collection(
            $this->transactionService->fetch($filterData)
        );
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

    public function destroy(Transaction $transaction): bool
    {
        return $this->transactionService->delete($transaction);
    }
}
