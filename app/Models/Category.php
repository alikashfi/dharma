<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $guarded = [];
    // protected $appends = ['image'];
    protected $with = ['media'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(get: fn() => $this->media->first()?->getUrl() ?? '/images/default-category.jpg');
    }

    protected function title(): Attribute
    {
        return Attribute::make(get: fn() => $this->title ?? $this->name);
    }

    protected function metaDescription(): Attribute
    {
        return Attribute::make(get: fn() => $this->meta_description ?? $this->description);
    }
}
