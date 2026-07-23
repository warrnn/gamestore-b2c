<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $developer
 * @property string $publisher
 * @property Carbon|null $release_date
 * @property array $in_game_value_unit
 * @property string|null $potrait_image_attachment
 * @property string|null $landscape_image_attachment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * 
 * @property-read Collection<GameVoucher> $gameVouchers
 */

#[Fillable([
    'name',
    'description',
    'developer',
    'publisher',
    'release_date',
    'in_game_value_unit',
    'potrait_image_attachment',
    'landscape_image_attachment'
])]

class Game extends Model
{
    use HasUuids, SoftDeletes;

    protected function casts(): array
    {
        return [
            'in_game_value_unit' => 'array',
            'release_date' => 'date'
        ];
    }

    public function gameVouchers(): HasMany
    {
        return $this->hasMany(GameVoucher::class);
    }
}
