<div>
    {{-- Do your work, then step back. --}}
    <!--product-single-->
    <div class="product-single">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="product-details-img">
                    <div class="product-thumb">
                        <div id="gallery" class="product-dec-slider-2 product-tab-left">
                            @if ($get_slug->image)
                                <a data-image="{{ asset('storage/' . $get_slug->image) }}"
                                    data-zoom-image="{{ asset('storage/' . $get_slug->image) }}"
                                    class="slick-slide" data-slick-index="0" aria-hidden="false"
                                    tabindex="0">
                                    <img class="blur-up lazyload"
                                        src="{{ asset('storage/' . $get_slug->image) }}"
                                        alt="Main product image" />
                                </a>
                            @endif

                            {{-- Display other images from the product_images table, excluding the first --}}
                            @if ($get_slug->product_images->count() > 1)
                                @foreach ($get_slug->product_images->skip(1) as $image)
                                    <a data-image="{{ asset('storage/' . $image->image_path) }}"
                                        data-zoom-image="{{ asset('storage/' . $image->image_path) }}"
                                        class="slick-slide slick-cloned" data-slick-index="-4"
                                        aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload"
                                            src="{{ asset('storage/' . $image->image_path) }}"
                                            alt="Additional product image" />
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="zoompro-wrap product-zoom-right pl-20">
                        <div class="zoompro-span">
                            <img class="zoompro blur-up lazyload"
                                data-zoom-image="{{ asset('storage/' . $get_slug->image) }}"
                                alt="" src="{{ asset('storage/' . $get_slug->image) }}" />
                        </div>
                        <div class="product-labels">
                            @if (!is_null($get_slug->label))
                                @if ($get_slug->label == 'NEW')
                                    <span class="lbl pr-label1">{{ $get_slug->label }}</span>
                                @endif
                                @if ($get_slug->label == 'HOT')
                                    <span class="lbl pr-label2"
                                        style="background: #e9a400;">{{ $get_slug->label }}</span>
                                @endif
                                @if ($get_slug->label == 'SALE')
                                    <span class="lbl on-sale">{{ $get_slug->label }}</span>
                                @endif
                            @endif
                        </div>
                        <div class="product-buttons">
                            <a href="https://www.youtube.com/watch?v=93A2jOW5Mog"
                                class="btn popup-video" title="View Video"><i
                                    class="icon anm anm-play-r" aria-hidden="true"></i></a>
                            <a href="#" class="btn prlightbox" title="Zoom"><i
                                    class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="lightboximages">
                        <a href="assets/images/product-detail-page/cape-dress-1.jpg"
                            data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/cape-dress-2.jpg"
                            data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/cape-dress-3.jpg"
                            data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/cape-dress-4.jpg"
                            data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/cape-dress-5.jpg"
                            data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/cape-dress-6.jpg"
                            data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/cape-dress-7.jpg"
                            data-size="731x1024"></a>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="product-single__meta">
                    <h1 class="product-single__title">{{ $get_slug->name }}</h1>
                    <div class="product-nav clearfix">
                        <a href="#" class="next" title="Next"><i class="fa fa-angle-right"
                                aria-hidden="true"></i></a>
                    </div>
                    <div class="prInfoRow">
                        <div class="product-stock">
                            @if ($get_slug->stock_status == 'In Stock')
                                <span class="instock "
                                    style="color: #447900">{{ $get_slug->stock_status }}</span>
                            @elseif($get_slug->stock_status == 'Out of Stock')
                                <span class="outstock text-danger">Unavailable</span>
                            @elseif ($get_slug->stock_status == 'Pre Order')
                                <span class="outstock text-warning">Pre Order</span>
                            @endif
                        </div>
                        <div class="product-sku">SKU: <span
                                class="variant-sku">{{ $get_slug->sku }}</span></div>
                        @php
                            $rating = round($get_slug->average_rating ?? 0, 1); // e.g. 4.2
                            $fullStars = floor($rating); // 4
                            $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0;
                            $emptyStars = 5 - ($fullStars + $halfStar);
                        @endphp

                        <div class="product-review">
                            <a class="reviewLink" href="#tab2">
                                {{-- Full stars --}}
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="font-13 fa fa-star"></i>
                                @endfor

                                {{-- Half star --}}
                                @if ($halfStar)
                                    <i class="font-13 fa fa-star-half-o"></i>
                                @endif

                                {{-- Empty stars --}}
                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <i class="font-13 fa fa-star-o"></i>
                                @endfor

                                <span class="spr-badge-caption">
                                    {{ $get_slug->rating_count ?? 0 }} reviews
                                </span>
                            </a>
                        </div>
                    </div>
                    <p class="product-single__price product-single__price-product-template">
                        <span class="visually-hidden">Regular price</span>
                        @if (!empty($get_slug->price) && $get_slug->price > $get_slug->original_price)
                            <s id="ComparePrice-product-template">
                                <span
                                    class="money">{{ Number::currency($get_slug->price, 'NGN') }}</span>
                            </s>
                        @endif
                        <span
                            class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                            <span id="ProductPrice-product-template"><span
                                    class="money">{{ Number::currency($get_slug->original_price, 'NGN') }}</span></span>
                        </span>
                        @php
                            $price = (int) $get_slug->price;
                            $original_price = (int) $get_slug->original_price;

                            $saved = $price - $original_price;
                        @endphp
                        @if ($get_slug->discount_percentage > 0)
                            <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                <span>You Save</span>
                                <span id="SaveAmount-product-template"
                                    class="product-single__save-amount">
                                    <span class="money">{{ Number::currency($saved, 'NGN') }}</span>
                                </span>
                                <span
                                    class="off">(<span>{{ $get_slug->discount_percentage }}</span>%)</span>
                            </span>
                        @endif
                    </p>
                    <div class="orderMsg" data-user="23" data-time="24">
                        <img src="assets/images/order-icon.jpg" alt="" /> <strong
                            class="items">5</strong> sold in last <strong class="time">26</strong>
                        hours
                    </div>
                </div>
                <div class="product-single__description rte">
                    {{-- <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                        <li>Sed ut perspiciatis unde omnis iste natus error sit</li>
                        <li>Neque porro quisquam est qui dolorem ipsum quia dolor</li>
                        <li>Lorem Ipsum is not simply random text.</li>
                    </ul> --}}
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen
                        book.</p>
                </div>
                @if ($get_slug->stock_quantity < 5)
                    <div id="quantity_message">Hurry! Only <span
                            class="items">{{ $get_slug->stock_quantity }}</span> left in
                        stock.
                    </div>
                @endif
                <form wire:submit.prevent='add_to_cart' id="product_form_10508262282" accept-charset="UTF-8"
                    class="product-form product-form-product-template hidedropdown"
                    enctype="multipart/form-data">
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
                                    <option @selected(true) value="default">Default color</option>
                                    @foreach ($get_slug->product_variants as $colors)
                                        <option value="{{ $colors->color_name }}">{{ $colors->color_name }}</option>
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
                                    <option @selected(true) value="default">Default size</option>
                                    @foreach ($get_slug->product_variants as $size)
                                        <option value="{{ $size->size }}">{{ $size->size }}</option>
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

                                    <input type="text" id="Quantity" name="quantity"
                                           class="product-form__input qty" wire:model='product_quantity' readonly>

                                    <a class="qtyBtn plus" href="javascript:void(0);" wire:click="increaseQuantity">
                                        <i class="fa anm anm-plus-r" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-form__item--submit">
                            <button type="submit" @if ($get_slug->stock_status == 'Out of Stock') disabled @endif name="add"
                                class="btn product-form__cart-submit">
                                @if ($get_slug->stock_status == 'In Stock')
                                    <span>Add to cart</span>
                                @endif
                                @if ($get_slug->stock_status == 'Pre Order')
                                    <span>Pre-Order Now!</span>
                                @endif
                                @if ($get_slug->stock_status == 'Out of Stock')
                                    <span>Out of Order</span>
                                @endif
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
                <div class="display-table shareRow">
                    <div class="display-table-cell medium-up--one-third">
                        <div class="wishlist-btn">
                            <a class="wishlist add-to-wishlist" href="#"
                                title="Add to Wishlist"><i class="icon anm anm-heart-l"
                                    aria-hidden="true"></i> <span>Add to
                                    Wishlist</span></a>
                        </div>
                    </div>
                    <div class="display-table-cell text-right">
                        <div class="social-sharing">
                            <a target="_blank" href="#"
                                class="btn btn--small btn--secondary btn--share share-facebook"
                                title="Share on Facebook">
                                <i class="fa fa-facebook-square" aria-hidden="true"></i> <span
                                    class="share-title" aria-hidden="true">Share</span>
                            </a>
                            <a target="_blank" href="#"
                                class="btn btn--small btn--secondary btn--share share-twitter"
                                title="Tweet on Twitter">
                                <i class="fa fa-twitter" aria-hidden="true"></i> <span
                                    class="share-title" aria-hidden="true">Tweet</span>
                            </a>
                            <a href="#" title="Share on google+"
                                class="btn btn--small btn--secondary btn--share">
                                <i class="fa fa-google-plus" aria-hidden="true"></i> <span
                                    class="share-title" aria-hidden="true">Google+</span>
                            </a>
                            <a target="_blank" href="#"
                                class="btn btn--small btn--secondary btn--share share-pinterest"
                                title="Pin on Pinterest">
                                <i class="fa fa-pinterest" aria-hidden="true"></i> <span
                                    class="share-title" aria-hidden="true">Pin it</span>
                            </a>
                            <a href="#"
                                class="btn btn--small btn--secondary btn--share share-pinterest"
                                title="Share by Email" target="_blank">
                                <i class="fa fa-envelope" aria-hidden="true"></i> <span
                                    class="share-title" aria-hidden="true">Email</span>
                            </a>
                        </div>
                    </div>
                </div>

                <p id="freeShipMsg" class="freeShipMsg" data-price="199"><i class="fa fa-truck"
                        aria-hidden="true"></i> GETTING CLOSER! ONLY <b class="freeShip"><span
                            class="money" data-currency-usd="$199.00"
                            data-currency="USD">$199.00</span></b> AWAY FROM
                    <b>FREE SHIPPING!</b>
                </p>
                <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> ESTIMATED
                    DELIVERY BETWEEN <b id="fromDate">Wed. May 1</b> and <b id="toDate">Tue. May
                        7</b>.
                </p>
                <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users"
                        aria-hidden="true"></i> <strong class="uersView">14</strong> PEOPLE ARE
                    LOOKING
                    FOR THIS PRODUCT</div>
            </div>
        </div>
    </div>
    <!--End-product-single-->
</div>
