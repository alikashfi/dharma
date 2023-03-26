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
    protected $listeners = ['productAdded' => 'mount'];

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

    public function removeProduct($productId)
    {
        Cart::remove($productId);
        $this->mount();
        $this->emit('productRemoved');
    }
}
