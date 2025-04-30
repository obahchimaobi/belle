<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class AddToCartForm extends Component
{
    public $women;

    public $user_id;

    public $product_id;

    public $product_name;

    public $product_image;

    public $product_price;

    public $is_in_cart;

    public function mount()
    {
        $this->user_id = auth()->user()->id;
        $this->product_id = $this->women->id;
        $this->product_name = $this->women->name;
        $this->product_image = $this->women->image;
        $this->product_price = $this->women->original_price;

        $this->is_in_cart = Cart::where('users_id', auth()->user()->id)
            ->where('products_id', $this->product_id)->exists();

    }

    public function addBtn()
    {
        Cart::create([
            'users_id' => $this->user_id,
            'email' => auth()->user()->email,
            'name' => auth()->user()->name,
            'products_id' => $this->product_id,
            'product_image' => $this->product_image,
            'quantity' => 1, // default for example
            'price' => $this->product_price,
            'total' => $this->product_price,
            'status' => 'active'
        ]);

        $this->is_in_cart = true;

        session(['cart_count' => Cart::where('users_id', $this->user_id)->count()]);
        $this->dispatch('cart-updated');
    }

    #[On('item-removed')]
    public function removeBtn($id)
    {
        if ($this->product_id == $id) { // Only update if this component relates to the removed product
            $this->is_in_cart = false;
        }

        session(['cart_count' => Cart::where('users_id', $this->user_id)->count()]);
        $this->dispatch('cart-updated');
    }

    public function remove($id)
    {
        Cart::where('users_id', auth()->user()->id)
            ->where('products_id', $id)
            ->delete();
        $this->is_in_cart = false;

        session(['cart_count' => Cart::where('users_id', $this->user_id)->count()]);
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.cart.add-to-cart-form');
    }
}
