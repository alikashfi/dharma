<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Cart;
use Illuminate\Support\Collection;
use Livewire\Component;

class CartPage extends Component
{
    public Collection $products;

    protected $listeners = ['removeFromCart'];

    public function render()
    {
        $this->products = Cart::getContent() ?? [];
        if (count($this->products)) {
            $ids = $this->products->pluck('id')->toArray();
            $sortedIds = implode(',', $ids);

            $this->products = Product::whereIn('id', $ids)->orderByRaw("FIELD(id, $sortedIds)")->get();
        }

        return view('livewire.cart-page');
    }

    public function removeFromCart($productId)
    {
        Cart::remove($productId);
        $this->emit('productRemoved', $productId);
    }
}
