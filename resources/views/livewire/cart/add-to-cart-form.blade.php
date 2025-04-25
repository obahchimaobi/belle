<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="variants add">
        <input type="hidden" value="{{ auth()->user()->id }}" wire:model='user_id' readonly>
        <input type="hidden" value="{{ $women->id }}" wire:model='product_id' readonly>
        <input type="hidden" value="{{ $women->name }}" wire:model='product_name' readonly>
        <input type="hidden" readonly value="{{ $women->image }}" wire:model='product_image'>
        <input type="hidden" readonly value="{{ $women->original_price }}" wire:model='product_price'>
        <button class="btn btn-addto-cart" type="button" tabindex="0"
            wire:click="{{ $is_in_cart ? 'removeBtn' : 'addBtn' }}" @if ($women->stock_status === 'Out of Stock') disabled @endif>
            <span>
                @php
                    echo match (true) {
                        $women->stock_status === 'In Stock' => $is_in_cart ? 'Remove' : 'Add to cart',
                        $women->stock_status === 'Pre Order' => 'Pre-Order Now!',
                        $women->stock_status === 'Out of Stock' => 'Out of Order',
                        default => 'Unavailable',
                    };
                @endphp
            </span>
        </button>
    </div>
</div>
