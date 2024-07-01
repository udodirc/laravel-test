<?php

namespace App\Data\Transaction;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\DateFormat;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class TransactionFilterData extends Data
{
    public function __construct(
        public int|Optional $type,
        public float|Optional $amount,
        public string|Optional $createdDate,
    ) {}

    public static function rules(ValidationContext $context): array
    {
        return [
            'title' => [
                new IntegerType(),
            ],
            'amount' => [
                new Numeric(),
            ],
            'createdDate' => [
                new Filled(),
                new Date(),
                new DateFormat('Y-m-d'),
            ],
        ];
    }
}
