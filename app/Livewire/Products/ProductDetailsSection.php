<?php

namespace App\Livewire\Products;

use App\Models\Cart;
use Livewire\Component;

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
        $this->product_quantity++;
    }

    public function decreaseQuantity()
    {
        if ($this->product_quantity > 1) {
            $this->product_quantity--;
        }
    }

    public function mount()
    {
        $this->user_id = auth()->user()->id;
        $this->product_id = $this->get_slug->id;
        $this->product_name = $this->get_slug->name;
        $this->product_image = $this->get_slug->image;
        $this->product_price = $this->get_slug->original_price;

        $this->is_in_cart = Cart::where('users_id', auth()->user()->id)
            ->where('products_id', $this->product_id)->exists();
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
    }

    public function removeBtn()
    {
        Cart::where('users_id', auth()->user()->id)
            ->where('products_id', $this->product_id)
            ->delete();
        $this->is_in_cart = false;
    }

    public function render()
    {
        return view('livewire.products.product-details-section');
    }
}
