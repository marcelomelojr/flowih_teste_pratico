<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\get;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'color',
        'year',
        'price',
        'description',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function firstImage(): MorphOne
    {
        return $this->images()->one()->ofMany('created_at', 'min');
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => number_format($value, 2, ',', '.'),
            set: fn($value) => $value,
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(

            get: fn($value) => $this->firstImage ? Storage::disk('public')->url($this->firstImage?->url) : 'https://via.placeholder.com/150x100',
        );
    }

}
