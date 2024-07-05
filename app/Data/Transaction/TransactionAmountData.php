<?php

namespace App\Data\Transaction;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class TransactionAmountData extends Data
{
    public function __construct(
        public string $startDate,
        public string $endDate,
        public int $type
    ) {
    }

    public static function rules(ValidationContext $context): array
    {
        return [
            'startDate' => [
                new Required(),
                new StringType(),
            ],
            'endDate' => [
                new Required(),
                new StringType(),
            ],
            'type' => [
                new Required(),
                new IntegerType(),
            ]
        ];
    }
}
