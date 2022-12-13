@extends('users.layout.index')
@section('content_home')

    <body class="ui-toolkit transitional-wide is-responsive no-touch en-US VND VN">
        <main role="main" id="content">
            <div id="checkout"
                class="wt-horizontal-center wt-bg-white wt-width-full wt-body-max-width wt-pl-xs-2 wt-pr-xs-2 wt-pl-lg-6 wt-pr-lg-6 wt-pt-xs-4 min-width-desktop-view">
                <div>
                    <div data-selector="cart-header-loading" class="wt-pb-xs-4">
                        <div class="" data-checkout-header="">
                            <div
                                class="wt-display-flex-xs wt-justify-content-space-between wt-align-items-center wt-mt-xs-2">
                                <div>
                                    <h1 class="wt-text-heading-01">Danh sách đơn hàng</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wt-position-relative">
                        <div id="multi-shop-cart-list" class="wt-align-items-center">
                            <div class="cart-panel">
                                <div class="wt-mt-xs-1 wt-mt-lg-0 wt-mb-xs-5 wt-position-relative">

                                    <div class="wt-grid wt-position-relative wt-pl-xs-0 wt-pr-xs-0">
                                        <ul
                                            class="cart-list-items wt-grid__item-xs-12 wt-grid__item-sm-12 wt-grid__item-md-7 wt-grid__item-lg-8 wt-p-xs-0 wt-pr-md-3 wt-height-full wt-list-unstyled wt-pt-xs-2 wt-bt-xs">
                                            <li class="multi-shop-cart-single wt-bt-xs wt-mt-xs-3 wt-mt-md-5 wt-pt-xs-3">

                                                <ul class="wt-list-unstyled">
                                                    @foreach ($carts as $index => $cart)
                                                        <li class="wt-pb-lg-2 wt-mb-xs-2">
                                                            <div class="wt-display-flex-xs wt-pt-xs-1 wt-pt-lg-0">
                                                                <div class="wt-display-flex-xs wt-pt-xs-1 wt-pt-lg-0">
                                                                    <a href="">
                                                                        <img src="{{ asset($cart->picture) }}"
                                                                            alt="" style="height: 300px "
                                                                            class="wt-width-full wt-rounded-01">
                                                                    </a>
                                                                </div>
                                                                <div class="wt-flex-xs-3 wt-pl-xs-2 wt-pl-lg-3">
                                                                    <div class="wt-grid">
                                                                        <div class="wt-grid__item-xs-12 wt-grid__item-lg-7">
                                                                            <p class="wt-display-block wt-pb-xs-1">
                                                                                <a class="wt-text-link-no-underline wt-text-body-01 wt-line-height-tight wt-break-word"
                                                                                    href="">
                                                                                    {{ $cart->product_name }}
                                                                                </a>
                                                                            </p>
                                                                            <div class="item-numbers-full-width">
                                                                                <div class="wt-pb-xs-1">
                                                                                    <ul class="wt-list-unstyled"
                                                                                        data-cart-list-variations="">
                                                                                        <li
                                                                                            class="wt-text-black wt-text-caption wt-pb-xs-1">
                                                                                            <input type="hidden"
                                                                                                data-customization-property-id-variation-id=""
                                                                                                data-property-id="100"
                                                                                                value="2308317151">
                                                                                            <span class="">
                                                                                                Giá tiền:
                                                                                                <span
                                                                                                    data-property-list-variation-name=""
                                                                                                    data-property-id="100">
                                                                                                    {{ $cart->promotional_price }}
                                                                                                </span>
                                                                                                <span
                                                                                                    class="currency-symbol">₫</span>
                                                                                            </span>

                                                                                        </li>
                                                                                        <li
                                                                                            class="wt-text-black wt-text-caption wt-pb-xs-1">

                                                                                            <div
                                                                                                class="product_details-properties">
                                                                                                <div class="qty_ttl ">
                                                                                                    <p>{{ $cart->product_amount }}
                                                                                                        sản phẩm có sẵn </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="wt-hide-lg">
                                                                                <div class="wt-grid">
                                                                                    <div
                                                                                        class="wt-grid__item-xs-5 wt-pb-xs-1 wt-pr-xs-0">
                                                                                        <div>
                                                                                            <div class="wt-display-none">
                                                                                                <input type="hidden"
                                                                                                    value="1"
                                                                                                    aria-label="Vietnamese Gift Oil painting, Vietnamese Woman In Ao Dai, Vietnamese Handmade Oil Painting, Living Room Wall Art, Large Wall Art"
                                                                                                    data-quantity-value="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wt-grid__item-xs-7">
                                                                                        <div class="wt-text-right-xs">
                                                                                            <p class="wt-text-title-01">
                                                                                                <span class="money"><span
                                                                                                        class="currency-value">{{ total_product_cost($cart->promotional_price, $cart->cart_details_amount) }}</span><span
                                                                                                        class="currency-symbol">₫</span></span>
                                                                                            </p>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <ul
                                                                                    class="wt-list-inline wt-pt-xs-1 wt-pt-sm-0">
                                                                                    <li
                                                                                        class="wt-list-inline__item wt-pb-xs-2 wt-mr-xs-0">
                                                                                        <a href="{{ route('users.product.reduce', ['product_id' => $cart->product_id]) }}"
                                                                                            role="button"
                                                                                            rel="save-for-later-guest"
                                                                                            class="inline-overlay-trigger save-for-later-action"
                                                                                            data-listing-key="6976503597|1121649214|8438087799|1082685796126">
                                                                                            <span
                                                                                                class="wt-btn wt-btn--transparent wt-btn--small wt-btn--transparent-flush-left">
                                                                                                Giảm
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <span>{{ $cart->cart_details_amount }}</span>
                                                                                    <li
                                                                                        class="wt-list-inline__item wt-pb-xs-2 wt-pr-xs-1">
                                                                                        @if ($cart->product_amount > $cart->cart_details_amount)
                                                                                            <a href="{{ route('users.product.add_product', ['product_id' => $cart->product_id]) }}"
                                                                                                rel="remove"
                                                                                                role="button"
                                                                                                aria-label="Remove listing">
                                                                                                <span
                                                                                                    class="wt-btn wt-btn--transparent wt-btn--small ">
                                                                                                    Thêm
                                                                                                </span>
                                                                                            </a>
                                                                                        @endif
                                                                                    </li>
                                                                                    <li
                                                                                        class="wt-list-inline__item wt-pb-xs-2 wt-pr-xs-1">
                                                                                        
                                                                                            <a href="{{ route('users.product.delete', ['product_id' => $cart->product_id]) }}"
                                                                                                rel="remove"
                                                                                                role="button"
                                                                                                aria-label="Remove listing">
                                                                                                <span
                                                                                                    class="wt-btn wt-btn--transparent wt-btn--small ">
                                                                                                    Xóa
                                                                                                </span>
                                                                                            </a>
                                                                                        
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="wt-grid__item-xs-5 wt-hide-xs wt-show-lg wt-pl-xs-3">
                                                                            <div class="wt-grid">

                                                                                <div class="wt-grid__item-xs-7">
                                                                                    <div class="wt-text-right-xs">
                                                                                        <p class="wt-text-title-01"><span
                                                                                                class="money"><span
                                                                                                    class="currency-value">{{ total_product_cost($cart->promotional_price, $cart->cart_details_amount) }}</span><span
                                                                                                    class="currency-symbol">₫</span></span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="wt-text-right-xs wt-text-strikethrough wt-text-caption wt-text-gray">
                                                                                        <div class="wt-text-right-xs">
                                                                                            <p class="wt-text-title-01">
                                                                                                <span class="money"><span
                                                                                                        class="currency-value"></span><span
                                                                                                        class="currency-symbol"></span></span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="wt-grid__item-xs-12">
                                                                                    <div class="wt-mb-xs-2 wt-mt-xs-2">
                                                                                        <section
                                                                                            class="wt-text-body-01 wt-line-height-tight ">
                                                                                            <div
                                                                                                class="wt-display-flex-xs wt-justify-content-flex-end">

                                                                                                <div
                                                                                                    class="wt-display-flex-xs wt-flex-nowrap wt-align-self-center">
                                                                                                </div>
                                                                                            </div>
                                                                                        </section>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="wt-hide-lg">
                                                                <div class="wt-grid">
                                                                    <div class="wt-grid__item-xs-5 wt-pb-xs-1 wt-pr-xs-0">
                                                                        <div>
                                                                            <div class="wt-display-none">
                                                                                <input type="hidden" value="1"
                                                                                    aria-label="Vietnamese Gift Oil painting, Vietnamese Woman In Ao Dai, Vietnamese Handmade Oil Painting, Living Room Wall Art, Large Wall Art"
                                                                                    data-quantity-value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="wt-grid__item-xs-7">
                                                                        <div class="wt-text-right-xs">
                                                                            <p class="wt-text-title-01">
                                                                                <span class="money"><span
                                                                                        class="currency-value">{{ total_product_cost($cart->promotional_price, $cart->cart_details_amount) }}</span><span
                                                                                        class="currency-symbol">₫</span></span>
                                                                            </p>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                    </div>
                                    </li>
                                    @endforeach
                                    </ul>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <h1 class="wt-text-heading-01">Tổng tiền :{{ $total_money }}</h1>
                            </div>
                            <a class="wt-btn  wt-width-full" href="{{ route('users.product.order') }}">
                                Đặt hàng</a>
                            <a class="wt-btn  wt-width-full" href="{{ route('users.home.cart_list') }}">
                                Danh sách đơn hàng đã đặt mua</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </main>

    </body>


    <table border="1">
        <tr>
            <th>id san pham</th>
            <th>hinh anh</th>
            <th>ten san pham</th>
            <th>so luong san pham</th>
            <th>gia tien san pham</th>
            <th>gia tong san pham</th>
            <th>sản phẩm có sẵn</th>
            <th>them san pham </th>
            <th>giam san pham </th>
            <th>xoa san pham</th>
        </tr>
        @foreach ($carts as $index => $cart)
            <tr>
                <td>{{ $cart->product_id }}</td>
                <td><img src="{{ asset($cart->picture) }}" alt="" style="height: 80px "></td>
                <td>{{ $cart->product_name }}</td>
                <td>{{ $cart->cart_details_amount }}</td>
                <td>{{ $cart->promotional_price }}</td>
                <td>{{ total_product_cost($cart->promotional_price, $cart->cart_details_amount) }}</td>
                <td>{{ $cart->product_amount }}</td>
                <td>
                    @if ($cart->product_amount > $cart->cart_details_amount)
                        <a href="{{ route('users.product.add_product', ['product_id' => $cart->product_id]) }}">Thêm</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('users.product.reduce', ['product_id' => $cart->product_id]) }}">Giảm</a>
                </td>
                <td>
                    <a href="{{ route('users.product.delete', ['product_id' => $cart->product_id]) }}">xóa</a>
                </td>
            </tr>
        @endforeach
    </table>
    <table border="2">
        <tr>
            <th>tổng tiền</th>
        </tr>
        <tr>
            <th>{{ $total_money }}</th>
        </tr>
        <tr>
            <th>
                <a href="{{ route('users.product.order') }}">đặt hàng</a>
            </th>
        </tr>
        <tr>
            <th>
                <a href="{{ route('users.home.cart_list') }}">danh sach don hang da mua</a>
            </th>
        </tr>
    </table>
@endsection
