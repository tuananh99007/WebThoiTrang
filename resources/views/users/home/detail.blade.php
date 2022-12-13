@extends('users.layout.index')
@section('content_home')

    <body class="screen--lg">
        <div class="tygh" id="tygh_container">
            <div class="helper-container no-touch" id="tygh_main_container">
                <div class="tygh-content clearfix">
                    <div class="container-fluid  ">
                        <div class="row-fluid ">
                            <div class="span16  hompage-block_new">
                                <div id="app" data-v-app="">
                                    <div class="dosiin_page-min-height dosiin_page-max-width dosiin_padding-header-cat-top">
                                        <div>
                                            <div class="product_detail-main-page-inner">
                                                <div class="product_detail-slider">

                                                    <div class="swiper-container-detail gallery-top">
                                                        <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events"
                                                            id="product_51680" style="height: 100%;">

                                                            <div class="swiper-wrapper"
                                                                style="transform: translate3d(-501px, 0px, 0px); transition-duration: 0ms;">
                                                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev"
                                                                    data-swiper-slide-index="6"
                                                                    style="width: 491px; margin-right: 10px;">
                                                                    <img alt="Áo thun ngắn tay cổ tròn nam nữ ADLV Baby Face Red Heart Glasses đen"
                                                                        lazy="loading"
                                                                        src="./detail_files/default-dosiin-product.png">
                                                                </div>
                                                                <div class="swiper-slide swiper-slide-active"
                                                                    data-swiper-slide-index="0"
                                                                    style="width: 491px; margin-right: 10px;">
                                                                    <img alt="Áo thun ngắn tay cổ tròn nam nữ ADLV Baby Face Red Heart Glasses đen"
                                                                        lazy="loaded"
                                                                        src="{{ asset($products_Detail->picture) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_detail-body">
                                                    <section class="product-detail-description-section">
                                                        <dl class="product-description">
                                                            <dt class="text-dark-md name details_name"></dt>
                                                            <div class="top-product-name">
                                                                <dt class="text-dark-md name details_name">
                                                                    <p>
                                                                        {{ $products_Detail->name }}
                                                                    </p>
                                                                </dt>
                                                            </div>
                                                            <div class="line"></div>
                                                            <dd class="price-group product_price-details"><data
                                                                    class="inline-bl price">{{ $products_Detail->original_price }}&nbsp;₫</data><data
                                                                    class="inline-bl origin-price">{{ $products_Detail->promotional_price }}&nbsp;₫</data><data
                                                                    class="inline-bl sale-discount">-
                                                                    {{ percent($products_Detail->original_price, $products_Detail->promotional_price) }}
                                                                    %</data></dd>
                                                            <div class="line"></div>

                                                            <div class="line"></div>
                                                            <div class="product_details-properties">
                                                                <div class="qty_ttl">
                                                                    <p>{{ $products_Detail->amount }} sản phẩm có sẵn </p>
                                                                </div>
                                                                <div
                                                                    class="number-input-group dosiin_number-input-group qty_number-inner dosiin_mt-2">
                                                                    <button class="decrement-btn dosiin_decrement"><i
                                                                            class="dsi dsi-minus-2"></i></button>
                                                                    <input value="1" class="bs-quantity-input"
                                                                        type="number" name="productData[51680][amount]"
                                                                        max="10" min="0"><button
                                                                        class="increment-btn dosiin_increment"><i
                                                                            class="dsi dsi-plus-2"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="line"></div>
                                                            <div class="product_details-properties">
                                                                <div class="go_store btn-rounded dossin_btn-whitebg">
                                                                    <div class="btn-rounded_child">
                                                                        <div class="info_product-details primary-button">
                                                                            @if ($products_Detail->amount <= 0)
                                                                                <span class="text-pink-gradient"> Hết hàng
                                                                                </span>
                                                                            @else
                                                                                @if (empty(($userLogin = Auth::guard('users')->user())))
                                                                                    <td>
                                                                                        <a
                                                                                            href=" {{ route('users.authenticate.login') }}"><span
                                                                                                class="text-pink-gradient">
                                                                                                Đăng nhập để mua hàng
                                                                                            </span></a>
                                                                                    </td>
                                                                                @else
                                                                                    <td>
                                                                                        <a
                                                                                            href="{{ route('users.home.add', ['product_id' => $products_Detail->product_id]) }}"><span
                                                                                                class="text-pink-gradient">
                                                                                                Thêm vào giỏ hàng
                                                                                            </span></a>
                                                                                    </td>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </dl>
                                                    </section>
                                                </div>
                                            </div>
                                            <div class="product_page-details-wrapper dosiin_mt-16">
                                                <div class="product_page-details-left">

                                                    <section class="info_details dosiin_mt-16">
                                                        <div class="info_details_inner">
                                                            <div class="info_ttl">
                                                                <h3>Thông tin sản phẩm</h3>
                                                            </div>
                                                            <div class="info_details-table">
                                                                <div class="info_details-item">
                                                                    <div class="info-item-wrapper">
                                                                        <h4>Danh mục</h4>
                                                                    </div>
                                                                    <div class="info-item-desc">
                                                                        <p>{{ $products_Detail->category_name }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="info_details-item">
                                                                    <div class="info-item-wrapper">
                                                                        <h4>Thương hiệu</h4>
                                                                    </div>
                                                                    <div class="info-item-desc">
                                                                        <p>{{ $products_Detail->trademark }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <!---->
                                                                <!---->
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <div
                                                        class="page-section product-detail-product-description-section dosiin_mt-16 p_details-inner">
                                                        <h2>Mô tả sản phẩm</h2>
                                                        <div class="dosiin_description-truncate description-content">
                                                            {{ $products_Detail->name }}<p></p>
                                                            <p>
                                                                {{ $products_Detail->posts }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_details_slider product_details_slider-width">
                                                <div class="header-section">
                                                    <h2
                                                        class="header-section-left-side section-title d-flex align-items-center">
                                                        Sản phẩm tương tự </h2>
                                                </div>
                                                <div hidepagination="true">
                                                    <div class="grid grid-20">
                                                        @foreach ($producsHotDeal as $index => $product)
                                                            <div class="grid-item">
                                                                <div class="product-item overflow"><a href=""
                                                                        class="product-item_img"
                                                                        title="ÁO THUN HELLO MA CÀ RỒNG"><img
                                                                            alt="ÁO THUN HELLO MA CÀ RỒNG" width="165"
                                                                            height="165" lazy="loaded"
                                                                            src="{{ asset($product->picture) }}"></a>
                                                                    <dl class="product-item_summary"><a
                                                                            href="https://dosi-in.com/macaron-t-shirt-b.285"
                                                                            class="" title="MACARON T-SHIRT">
                                                                            <dt class="product-item_brand truncate">
                                                                                MACARON T-SHIRT</dt>
                                                                        </a><a
                                                                            href="https://dosi-in.com/ao-thun-hello-ma-ca-rong-p.12918/"
                                                                            class=""
                                                                            title="ÁO THUN HELLO MA CÀ RỒNG">
                                                                            <dd class="product-item_name truncate">ÁO
                                                                                THUN HELLO MA CÀ RỒNG</dd>
                                                                        </a>
                                                                        <div class="product-item_sale">
                                                                            <dd
                                                                                class="inline-bl _sale_origin product-item_sale_origin">
                                                                                340.000&nbsp;₫</dd>
                                                                            <dd
                                                                                class="inline-bl _sale_origin product-item_sale_discount">
                                                                                -21% </dd>
                                                                        </div>
                                                                        <dd class="product-item_price">270.000&nbsp;₫
                                                                        </dd>
                                                                    </dl>
                                                                </div>
                                                            </div>
                                                        @endforeach


                                                    </div>
                                                    <div class="p_sticky-wrapper d-none">
                                                        <div class="p_ticky-inner item-product-checkout">
                                                            <a class="d-flex align-items-center"
                                                                title="Áo thun ngắn tay cổ tròn nam nữ ADLV Baby Face Red Heart Glasses đen"><img
                                                                    class="dosiin_mr-2"
                                                                    alt="Áo thun ngắn tay cổ tròn nam nữ ADLV Baby Face Red Heart Glasses đen"
                                                                    width="44" height="44" lazy="loaded"
                                                                    src="./detail_files/dosiin-acme-de-la-vieadlv-ao-thun-ngan-tay-co-tron-nam-nu-adlv-baby-face-red-heart-glasses-den-4456342(1).jpg"><span>Áo
                                                                    thun ngắn tay cổ tròn nam nữ ADLV
                                                                    Baby Face Red Heart Glasses đen</span></a>

                                                            <div class="price">1.199.000&nbsp;₫</div>
                                                            <div
                                                                class="number-input-group dosiin_number-input-group qty_number-inner">
                                                                <button class="decrement-btn dosiin_decrement"><i
                                                                        class="dsi dsi-minus-2 dsi-s24"></i></button><input
                                                                    class="bs-quantity-input" type="number"
                                                                    min="0" max="10"
                                                                    name="productData[51680][amount]"><button
                                                                    class="increment-btn dosiin_increment"><i
                                                                        class="dsi dsi-plus-2 dsi-s24"></i></button>
                                                            </div>
                                                            <div class="price">1.199.000&nbsp;₫</div>
                                                            <div class="bs-submit-wrapper bt_submit bt_submit-unset">
                                                                <div class="product_details-properties">
                                                                    <div class="info_product-details primary-button">
                                                                        <div
                                                                            class="go_store btn-rounded dossin_btn-whitebg">
                                                                            <div class="btn-rounded_child"><a
                                                                                    class="primary-link_text d-flex align-items-center"
                                                                                    href="https://go.isclix.com/deep_link/5937340308247890220?utm_source=dosiin&amp;utm_medium=product&amp;utm_campaign=aff&amp;url=https://shopee.vn/%C3%81o-thun-ng%E1%BA%AFn-tay-c%E1%BB%95-tr%C3%B2n-nam-n%E1%BB%AF-ADLV-Baby-Face-Red-Heart-Glasses-%C4%91en-i.313487854.13374054037"
                                                                                    target="_blank" rel="nofollow"
                                                                                    style="margin: 0px !important;">
                                                                                    <div class="text-pink-gradient">Đến
                                                                                        trang mua
                                                                                        hàng</div><i
                                                                                        class="dosiin_ml-2 dsi dsi-act-arrow-forward"></i>
                                                                                </a></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


    </body>
    <table border="1">
        <tr>
            <th>id</th>
            <th>sản phẩm</th>
            <th>ten san pham</th>
            <th>gia goc</th>
            <th>gia khuyen mai</th>
            <th>sản phẩm có sẵn</th>
            <th>phan tram khuyen mai</th>
            <th>số lượng mua</th>
        </tr>
        <tr>
            <td>{{ $products_Detail->product_id }}</td>
            <td><img src="{{ asset($products_Detail->picture) }}" alt="" width="400" height="400"></td>
            <td>{{ $products_Detail->name }}</td>
            <td>{{ $products_Detail->original_price }}</td>
            <td>{{ $products_Detail->promotional_price }}</td>
            <td>{{ $products_Detail->amount }}</td>
            <td>- {{ percent($products_Detail->original_price, $products_Detail->promotional_price) }} %</td>
            <td>
                <a href="{{ route('users.product.add_product', ['id' => $products_Detail->product_id]) }}">Thêm</a>
            </td>
            <td>
                <a href="{{ route('users.product.reduce', ['id' => $products_Detail->product_id]) }}">Giảm</a>
            </td>
            @if ($products_Detail->amount <= 0)
                <td> hết hàng </td>
            @else
                @if (empty(($userLogin = Auth::guard('users')->user())))
                    <td>
                        <a href=" {{ route('users.authenticate.login') }}">đăng nhập ngay để mua hàng</a>
                    </td>
                @else
                    <td>
                        <a href="{{ route('users.home.add', ['product_id' => $products_Detail->product_id]) }}">thêm vào
                            giỏ
                            hàng</a>
                    </td>
                @endif
            @endif


        </tr>
    </table>
@endsection
