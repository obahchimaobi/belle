<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="site-cart">
        <a href="{{ asset('#;') }}" class="site-header__cart" title="Cart">
            <i class="icon anm anm-bag-l"></i>
            <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count">{{ $count }}</span>
        </a>

        <!--Minicart Popup-->
        <div id="header-cart" class="block block-cart">
            <ul class="mini-products-list">
                @if ($get_cart)
                    @foreach ($get_cart as $cart)
                        <li class="item">
                            <a class="product-image" href="{{ asset('#') }}">
                                <img src="{{ asset('storage/' . $cart->product_image) }}" alt="3/4 Sleeve Kimono Dress"
                                    title="" />
                            </a>
                            <div class="product-details">
                                <a wire:click='remove_item({{ $cart->products_id }})' class="remove"><i class="anm anm-times-l"
                                        aria-hidden="true"></i></a>
                                <a class="pName" href="{{ asset('cart.html') }}">{{ $cart->products->name }}</a>
                                <div class="variant-cart">
                                    @if (!is_null($cart->color))
                                        {{ $cart->color }} /
                                    @endif @if (!is_null($cart->size))
                                        {{ $cart->size }}
                                    @endif</div>
                                <div class="wrapQtyBtn">
                                    <div class="qtyField">
                                        <span class="label">Qty:</span>
                                        <a class="qtyBtn minus" wire:click='decreaseQty'><i class="fa anm anm-minus-r" aria-hidden="true"></i>
                                        </a>
                                        <input type="text" id="Quantity" name="quantity" value="{{ $cart->quantity }}" class="product-form__input qty" wire:model.debounce.500ms="quantity">
                                        <a class="qtyBtn plus" wire:click='decreaseQty'><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="priceRow">
                                    <div class="product-price">
                                        <span class="money">{{ Number::currency($cart->price, 'NGN') }}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="total">
                <div class="total-in">
                    <span class="label">Cart Subtotal:</span><span class="product-price"><span
                            class="money">{{ Number::currency($total_price, 'NGN') }}</span></span>
                </div>
                <div class="buttonSet text-center">
                    <a href="{{ asset('cart.html') }}" class="btn btn-secondary btn--small">View
                        Cart</a>
                    <a href="{{ asset('checkout.html') }}" class="btn btn-secondary btn--small">Checkout</a>
                </div>
            </div>
        </div>
        <!--End Minicart Popup-->
    </div>
</div>
