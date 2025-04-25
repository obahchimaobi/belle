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
    }

    public function add_to_cart()
    {
        $validate = $this->validate([
            'product_color' => '',
            'product_size' => '',
            'product_quantity' => '',
        ]);

        Cart::updateOrCreate([
            'users_id' => $this->user_id,
            'products_id' => $this->product_id,
            'product_image' => $this->product_image,
            'color' => $validate['product_color'],
            'size' => $validate['product_size'],
            'quantity' => $validate['product_quantity'],
            'price' => $this->product_price
        ]);
    }

    public function render()
    {
        return view('livewire.products.product-details-section');
    }
}
