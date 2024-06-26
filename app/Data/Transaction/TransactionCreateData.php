<?php

namespace App\Data\Transaction;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class TransactionCreateData extends Data
{
    public function __construct(
        public string $title,
        public float $amount,
        public int $type
    ) {
    }

    public static function rules(ValidationContext $context): array
    {
        return [
            'title' => [
                new Required(),
                new StringType(),
            ],
            'amount' => [
                new Required(),
                new Numeric(),
            ],
            'type' => [
                new Required(),
                new IntegerType(),
            ],
        ];
    }
}
