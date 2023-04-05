<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Product;
use Livewire\Component;

class AddToCart extends Component
{
    public $productId;

    public function render()
    {
        return view('livewire.add-to-cart');
    }

    public function addToCart()
    {
        $product = Product::FindOrFail($this->productId);

        if ($product->is_available)
            Cart::add($product->id, $product->name, $product->price, 1);

        $this->emit('productAdded');
    }
}
