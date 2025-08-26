<?php

namespace App\Livewire\Header;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class CartLogo extends Component
{
    public $count;
    public $total_price;

    public function mount()
    {
        $this->updateCount();
    }

    #[On('cart-updated')]
    public function updateCount()
    {
        $this->count = session('cart_count', Cart::where('users_id', auth()->user()->id)->count());
        $this->total_price = DB::table('carts')
            ->where('users_id', auth()->id())
            ->select(DB::raw('SUM(price * quantity) as total'))
            ->value('total');
    }

    public function remove_item($id)
    {
        Cart::where('users_id', auth()->user()->id)->where('products_id', $id)->forceDelete();

        session(['cart_count' => Cart::where('users_id', auth()->user()->id)->count()]);
        $this->dispatch('cart-updated');
        $this->dispatch('item-removed', $id);
    }

    public function increaseQty($id)
    {
        dd('Increased Quantity for ' . $id);
    }

    public function render()
    {
        $get_cart = Cart::where('users_id', auth()->user()->id)->limit(2)->get();
        return view('livewire.header.cart-logo', compact('get_cart'));
    }
}
