<?php

namespace App\Livewire\Home;

use App\Models\Products;
use Livewire\Component;

class NewArrivalsSection extends Component
{
    public function render()
    {
        $women_arrivals = Products::where('category_type', 'Women')->latest()->paginate(10);
        $men_arrivals = Products::where('category_type', 'Men')->paginate(10);

        return view('livewire.home.new-arrivals-section', compact('women_arrivals', 'men_arrivals'));
    }
}
