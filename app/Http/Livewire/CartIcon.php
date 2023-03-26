<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;

class CartIcon extends Component
{
    public int $cartCount;
    protected $listeners = ['productAdded', 'productRemoved'];

    public function productAdded()
    {
        $this->cartCount++;
    }

    public function productRemoved()
    {
        $this->cartCount--;
    }

    public function render()
    {
        $this->cartCount = (int) Cart::getContent()->count();

        return view('livewire.cart-icon');
    }
}
