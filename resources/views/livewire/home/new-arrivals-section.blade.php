<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="tab_container">
        <div id="tab1" class="tab_content grid-products">
            <div class="productSlider">
                @if ($women_arrivals)
                    @foreach ($women_arrivals as $women)
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="{{ route('product.details', ['slug' => $women->slug]) }}">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload"
                                        data-src="{{ asset('storage/' . $women->image) }}"
                                        src="{{ asset('storage/' . $women->image) }}" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    @if ($women->product_images->isNotEmpty())
                                        <img class="hover blur-up lazyload"
                                            data-src="{{ asset('storage/' . $women->product_images->first()->image_path) }}"
                                            src="{{ asset('storage/' . $women->product_images->first()->image_path) }}"
                                            alt="image" title="product">
                                    @endif
                                    <!-- End hover image -->
                                    <!-- product label -->
                                    <div class="product-labels rectangular">
                                        @if (!is_null($women->discount_percentage) && $women->discount_percentage > 0)
                                            <span class="lbl on-sale">-{{ $women->discount_percentage }}%</span>
                                        @endif
                                        @if (!is_null($women->label))
                                            @if ($women->label == 'NEW')
                                                <span class="lbl pr-label1">{{ $women->label }}</span>
                                            @endif
                                            @if ($women->label == 'HOT')
                                                <span class="lbl pr-label2" style="background: #e9a400;">{{ $women->label }}</span>
                                            @endif
                                            @if ($women->label == 'SALE')
                                                <span class="lbl on-sale">{{ $women->label }}</span>
                                            @endif
                                        @endif
                                    </div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->

                                <!-- Start product button -->
                                <livewire:cart.add-to-cart-form :women="$women" />
                                <div class="button-set">
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="{{ asset('wishlist.html') }}">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="{{ asset('compare.html') }}"
                                            title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a
                                        href="{{ route('product.details', ['slug' => $women->slug]) }}">{{ $women->name }}</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    @if (!empty($women->price) && $women->price > $women->original_price)
                                        <span class="old-price">{{ Number::currency($women->price, 'NGN') }}</span>
                                    @endif
                                    <span class="price"
                                        style="color: #e95144;">{{ Number::currency($women->original_price, 'NGN') }}</span>
                                </div>
                                <!-- End product price -->

                                <div class="product-review">
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star-o"></i>
                                    <i class="font-13 fa fa-star-o"></i>
                                </div>
                                <!-- Variant -->
                                <ul class="swatches">
                                    @foreach ($women->product_images as $image)
                                        @if (!$loop->first)
                                            <li class="swatch medium rounded">
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                    alt="image" />
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <!-- End Variant -->
                            </div>
                            <!-- End product details -->
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div id="tab2" class="tab_content grid-products">
            <div class="productSlider">
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="{{ asset('short-description.html') }}">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('assets/images/product-images/product-image6.jpg') }}"
                                src="{{ asset('assets/images/product-images/product-image6.jpg') }}" alt="image"
                                title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('assets/images/product-images/product-image6-1.jpg') }}"
                                src="{{ asset('assets/images/product-images/product-image6-1.jpg') }}" alt="image"
                                title="product">
                            <!-- End hover image -->
                            <!-- product label -->
                            <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span
                                    class="lbl pr-label1">new</span></div>
                            <!-- End product label -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                            onclick="window.location.href="{{ asset('cart.html') }}""method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add
                                To Cart</button>
                        </form>
                        <div class="button-set">
                            <a href="{{ asset('javascript:void(0)') }}" title="Quick View"
                                class="quick-view-popup quick-view" data-toggle="modal"
                                data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="{{ asset('wishlist.html') }}">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="{{ asset('compare.html') }}"
                                    title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="{{ asset('short-description.html') }}">Zipper
                                Jacket</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$788.00</span>
                        </div>
                        <!-- End product price -->

                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star-o"></i>
                            <i class="font-13 fa fa-star-o"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
            </div>
        </div>
    </div>
</div>
