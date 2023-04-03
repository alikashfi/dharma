<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Shipping;
use Cart;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CartPage extends Component
{
    public Collection $products;
    public Collection $shippings;
    public int $shippingId;
    public Shipping $selectedShipping;

    protected $listeners = ['removeFromCart'];

    public function mount()
    {
        $this->shippings = Shipping::get();

        if (Cookie::get('selectedShippingId'))
            $this->shippingId = Cookie::get('selectedShippingId');
        else
            $this->shippingId = $this->shippings->first()->id;

        $this->updatedshippingId();
    }

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


    public function updatedshippingId()
    {
        $this->selectedShipping = $this->shippings->where('id', $this->shippingId)->first();
        Cookie::queue('selectedShippingId', $this->selectedShipping->id, 60);
    }
}
