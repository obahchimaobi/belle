<?php

namespace App\Livewire\Header;

use Livewire\Component;
use Livewire\Attributes\On;

class CartLogo extends Component
{
    public $count;

    public function mount()
    {
        $this->updateCount();
    }

    #[On('cart-updated')]
    public function updateCount()
    {
        $this->count = session('cart_count', 0);
    }

    public function render()
    {
        return view('livewire.header.cart-logo');
    }
}
