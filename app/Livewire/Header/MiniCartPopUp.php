<?php

namespace App\Livewire\Header;

use Livewire\Component;

class MiniCartPopUp extends Component
{
    public $get_cart;

    public $quantity;

    public function mount()
    {
        
    }
    public function render()
    {
        return view('livewire.header.mini-cart-pop-up');
    }
}
