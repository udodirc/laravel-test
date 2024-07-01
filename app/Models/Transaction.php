<?php

namespace App\Models;

use App\QueryBuilders\TransactionQueryBuilder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int    $id
 * @property int    $user_id
 * @property string $title
 * @property float  $amount
 * @property int $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Transaction extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d',
        ];
    }

    public function newEloquentBuilder($query): TransactionQueryBuilder
    {
        return new TransactionQueryBuilder($query);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
