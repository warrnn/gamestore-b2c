<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $user_id
 * @property string $game_voucher_id
 * @property string $status
 * @property Carbon|null $paid_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * 
 * @property-read User|null $user
 * @property-read GameVoucher|null $gameVoucher
 */

#[Fillable([
    'user_id',
    'game_voucher_id',
    'status',
    'paid_at',
])]

class Order extends Model
{
    use HasUuids, SoftDeletes;

    protected function casts(): array
    {
        return [
            'paid_at' => 'datetime',
            'status' => OrderStatus::class
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function gameVoucher(): BelongsTo
    {
        return $this->belongsTo(GameVoucher::class);
    }
}
