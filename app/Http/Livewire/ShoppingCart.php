<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;
use Cart;

class ShoppingCart extends Component
{
    public Collection $products;
    public int $productId;
    protected $listeners = ['productRemoved' => 'mount', 'productAdded' => 'mount', 'addToCart', 'removeFromCart'];

    public function mount()
    {
        $this->products = Cart::getContent() ?? [];
        if (count($this->products)) {
            $ids = $this->products->pluck('id')->toArray();
            $sortedIds = implode(',', $ids);

            $this->products = Product::whereIn('id', $ids)->orderByRaw("FIELD(id, $sortedIds)")->get();
        }
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }

    public function removeFromCart($productId)
    {
        Cart::remove($productId);
        $this->mount();
        $this->emit('productRemoved', $productId);
    }

    public function addToCart($productId)
    {
        $product = Product::FindOrFail($productId);

        if ( ! $product->is_available)
            return;

        Cart::add($product->id, $product->name, $product->price, 1);

        $this->emit('productAdded');
    }
}
