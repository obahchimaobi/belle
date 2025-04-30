<?php

namespace App\Livewire\Header;

use App\Models\Cart;
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
        $this->count = session('cart_count', Cart::where('users_id', auth()->user()->id)->count());
    }

    public function remove_item($id)
    {
        Cart::where('users_id', auth()->user()->id)->where('products_id', $id)->delete();

        session(['cart_count' => Cart::where('users_id', auth()->user()->id)->count()]);
        $this->dispatch('cart-updated');
        $this->dispatch('item-removed', $id);
    }

    public function render()
    {
        $get_cart = Cart::where('users_id', auth()->user()->id)->limit(2)->get();
        return view('livewire.header.cart-logo', compact('get_cart'));
    }
}
