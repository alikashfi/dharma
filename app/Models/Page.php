<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    public $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function title(): Attribute
    {
        return Attribute::make(get: fn() => $this->title ?? $this->name);
    }
}
