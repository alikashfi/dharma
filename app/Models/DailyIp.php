<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyIp extends Model
{
    use HasFactory;

    public $guarded = [];
    public $timestamps = false;

    public static function alreadyVisited(Product $product)
    {
        return DailyIp::whereProductId($product->id)->whereIp(request()->ip())->exists();
    }
}
