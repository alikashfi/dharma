<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    public $guarded = [];
    protected $appends = ['image'];
    protected $with = ['media'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }

    public function scopeAvailable($q)
    {
        return $q->where('is_available', 1);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->media->first()?->getUrl() ?? '/images/default-product.jpg'
        );
    }

    protected function thumbImage(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->media->first()?->getUrl('thumb') ?? '/images/default-product.jpg'
        );
    }

    protected function priceFormatted(): Attribute
    {
        return new Attribute(
            get: fn($price) => number_format($this->price)
        );
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CONTAIN, 200, 200)
            ->nonQueued();
    }
}