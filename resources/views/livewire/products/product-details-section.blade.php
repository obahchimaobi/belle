<div>
    {{-- Do your work, then step back. --}}
    <form wire:submit.prevent='' id="product_form_10508262282" accept-charset="UTF-8"
        class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ auth()->user()->id }}" wire:model='user_id' readonly>
        <input type="hidden" value="{{ $get_slug->id }}" wire:model='product_id' readonly>
        <input type="hidden" value="{{ $get_slug->name }}" wire:model='product_name' readonly>
        <input type="hidden" readonly value="{{ $get_slug->image }}" wire:model='product_image'>
        <input type="hidden" readonly value="{{ $get_slug->original_price }}" wire:model='product_price'>
        @if ($get_slug->product_variants->isNotEmpty())
            @if (!is_null($get_slug->product_variants->first()->color_name))
                <div class="selector-wrapper js product-form__item">
                    <label for="SingleOptionSelector-0">Color</label>
                    <select
                        class="single-option-selector single-option-selector-product-template product-form__input selectbox"
                        id="SingleOptionSelector-0" data-index="option1" wire:model='product_color'>
                        <option @selected(true) value="default">Default color
                        </option>
                        @foreach ($get_slug->product_variants as $colors)
                            <option value="{{ $colors->color_name }}">
                                {{ $colors->color_name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!is_null($get_slug->product_variants->first()->size))
                <div class="selector-wrapper js product-form__item">
                    <label for="SingleOptionSelector-1">Size</label>
                    <select
                        class="single-option-selector single-option-selector-product-template product-form__input selectbox"
                        id="SingleOptionSelector-1" data-index="option2" wire:model='product_size'>
                        <option @selected(true) value="default">Default size
                        </option>
                        @foreach ($get_slug->product_variants as $size)
                            <option value="{{ $size->size }}">{{ $size->size }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        @endif
        <!-- Product Action -->
        <div class="product-action clearfix">
            <div class="product-form__item--quantity">
                <div class="wrapQtyBtn">
                    <div class="qtyField">
                        <a class="qtyBtn minus" href="javascript:void(0);" wire:click="decreaseQuantity">
                            <i class="fa anm anm-minus-r" aria-hidden="true"></i>
                        </a>

                        <input type="text" id="Quantity" name="quantity" class="product-form__input qty"
                            wire:model='product_quantity' readonly>

                        <a class="qtyBtn plus" href="javascript:void(0);" wire:click="increaseQuantity">
                            <i class="fa anm anm-plus-r" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="product-form__item--submit">
                <button type="submit" name="add" class="btn product-form__cart-submit"
                    wire:click="{{ $is_in_cart ? 'removeBtn' : 'addBtn' }}" @if ($get_slug->stock_status === 'Out of Stock') disabled @endif>
                    <span>
                        @php
                            echo match (true) {
                                $get_slug->stock_status === 'In Stock' => $is_in_cart ? 'Remove' : 'Add to cart',
                                $get_slug->stock_status === 'Pre Order' => 'Pre-Order Now!',
                                $get_slug->stock_status === 'Out of Stock' => 'Out of Order',
                                default => 'Unavailable',
                            };
                        @endphp
                    </span>
                </button>

            </div>
            <div class="shopify-payment-button" data-shopify="payment-button">
                <button type="button"
                    class="shopify-payment-button__button shopify-payment-button__button--unbranded">Buy
                    it now</button>
            </div>
        </div>
        <!-- End Product Action -->
    </form>
</div>
