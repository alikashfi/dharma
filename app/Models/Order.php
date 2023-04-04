<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }

    private function foo()
    {
        static $bar;

        if ($bar == null) { // first time come inside this
            $bar = Status::firstWhere('is_default', true);
        }
        return $bar;
    }
}
