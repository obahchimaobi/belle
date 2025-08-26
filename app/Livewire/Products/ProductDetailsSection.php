<?php

namespace App\Livewire\Products;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductDetailsSection extends Component
{
    public $get_slug;

    public $user_id;

    public $product_id;

    public $product_name;

    public $product_image;

    public $product_price;

    public $product_color;

    public $product_size;

    public $product_quantity = 1;

    public $is_in_cart;

    public function increaseQuantity()
    {
        $get_cart_id = Cart::where('products_id', $this->product_id)->first();

        if ($get_cart_id) {
            $this->product_quantity++;
            $get_cart_id->quantity = $this->product_quantity;
            $get_cart_id->save();

            session(['cart_count' => Cart::where('users_id', $this->user_id)->count()]);
            $this->dispatch('cart-updated');
        } else {
            $this->product_quantity++;
        }
    }

    public function decreaseQuantity()
    {
        $get_cart_id = Cart::where('products_id', $this->product_id)->first();

        if ($this->product_quantity > 1) {
            if ($get_cart_id) {
                # code...
                $this->product_quantity--;
                $get_cart_id->quantity = $this->product_quantity;
                $get_cart_id->save();

                session(['cart_count' => Cart::where('users_id', $this->user_id)->count()]);
                $this->dispatch('cart-updated');
            } else {

                $this->product_quantity--;
            }
        }
    }

    public function mount()
    {
        $this->user_id = auth()->user()->id;
        $this->product_id = $this->get_slug->id;
        $this->product_name = $this->get_slug->name;
        $this->product_image = $this->get_slug->image;
        $this->product_price = $this->get_slug->original_price;

        $cartItem = Cart::where('users_id', auth()->user()->id)
            ->where('products_id', $this->product_id)
            ->first();

        $this->is_in_cart = $cartItem !== null;

        $this->product_quantity = $cartItem->quantity ?? 1; // Default to 1 if not in cart

    }

    public function addBtn()
    {
        $validate = $this->validate([
            'product_color' => '',
            'product_size' => '',
            'product_quantity' => '',
        ]);

        Cart::updateOrCreate([
            'users_id' => $this->user_id,
            'email' => auth()->user()->email,
            'name' => auth()->user()->name,
            'products_id' => $this->product_id,
            'product_image' => $this->product_image,
            'color' => $validate['product_color'],
            'size' => $validate['product_size'],
            'quantity' => $validate['product_quantity'],
            'price' => $this->product_price
        ]);

        $this->is_in_cart = true;

        session(['cart_count' => Cart::where('users_id', $this->user_id)->count()]);
        $this->dispatch('cart-updated');

        $this->reset(['product_color', 'product_size']);
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
            ->forceDelete();
        $this->is_in_cart = false;

        session(['cart_count' => Cart::where('users_id', $this->user_id)->count()]);
        $this->dispatch('cart-updated');

        $this->reset(['product_color', 'product_size', 'product_quantity']);
    }

    public function render()
    {
        return view('livewire.products.product-details-section');
    }
}
