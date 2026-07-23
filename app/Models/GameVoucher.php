<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $game_id
 * @property string $reedem_code
 * @property int $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * 
 * @property-read Game|null $game
 * @property-read Collection<Order> $orders
 */

#[Fillable([
    'game_id',
    'reedem_code',
    'value',
])]

class GameVoucher extends Model
{
    use HasUuids, SoftDeletes;

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
