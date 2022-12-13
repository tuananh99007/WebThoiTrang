@extends('users.layout.index')
@section('content_home')
    <div class="hotdeal-section dosiin_mb-16">
        <div class="hotdeal-section-inner">
            <div class="hotdeal-brand-wrapper">
                <div class="hotdeal_ttl-left d-flex align-items-center">
                    <h2 class="hotdeal_title"><i class="dsi dsi-s24 dsi-color-thunder"></i><span
                            class="text-pink-gradient">Sale độc quyền</span></h2>

                    <div class="qtl_brand">295<span>thương hiệu</span></div>
                </div>
                <div class="bg_product-blur">
                    <div class="bg_product-blur-item blur-item-left"></div><a
                        href="https://dosi-in.com/exclusive?event_id=44" class="" title="Hot Deal">
                        <h3>Hot Deal</h3>
                    </a>
                    <div class="bg_product-blur-item blur-item-right"></div>
                </div>
                <div class="hotdeal_ttl-right d-flex align-items-center"><span>
                </div>
            </div>
            <div class="home_product-inner">
                <div class="home_product-list">
                    <div class="home_product-box dosiin_position-relative">
                        <div>
                            <div class="grid grid-20">
                                <!-- Danh sach san pham -->
                                @foreach ($producsHotDeal as $index => $product)
                                    <div class="grid-item">
                                        <div class="product-item overflow">
                                            <a href="{{ route('users.home.detail', ['id' => $product->id]) }}"
                                                class="product-item_img"
                                                title="Áo Thun Unisex Nam Nữ Form Rộng SDVN Freedom Brave"><img
                                                    alt="Áo Thun Unisex Nam Nữ Form Rộng SDVN Freedom Brave"
                                                    width="165" height="165" lazy="loaded"
                                                    src="{{ asset($product->picture) }}"></a>
                                            <dl class="product-item_summary"><a href="/aothunsdvn-b.262" class=""
                                                    title="aothunsdvn">
                                                    <dt class="product-item_brand truncate">
                                                        {{ $product->name }}</dt>
                                                </a>
                                                <div class="product-item_sale">
                                                    <dd class="inline-bl _sale_origin product-item_sale_origin">
                                                        {{ $product->original_price }}</dd>
                                                    <dd class="inline-bl _sale_origin product-item_sale_discount">
                                                        -
                                                        {{ percent($product->original_price, $product->promotional_price) }}
                                                        %</dd>
                                                </div>
                                                <dd class="product-item_price">
                                                    {{ $product->promotional_price }}</dd>
                                                <dl class="product-item_social">
                                                    <div class="vue-star-rating" data-v-03449088="">
                                                        <div class="vue-star-rating" data-v-03449088=""><span
                                                                class="vue-star-rating-star" data-v-03449088=""
                                                                style="margin-right: 0px;"><svg class="vue-star-rating-star"
                                                                    height="16" width="16" viewBox="0 0 16 16"
                                                                    step="100" data-v-6b2d6caa="" data-v-03449088="">
                                                                    <linearGradient id="p1mjmq" x1="0"
                                                                        x2="100%" y1="0" y2="0"
                                                                        data-v-6b2d6caa="">
                                                                        <stop offset="0%" stop-color="#FFCC07"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                        <stop offset="0%" stop-color="#B3B3B3"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                    </linearGradient>
                                                                    <filter id="jhfi5k" height="130%" width="130%"
                                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                                        <feGaussianBlur stdDeviation="0"
                                                                            result="coloredBlur" data-v-6b2d6caa="">
                                                                        </feGaussianBlur>
                                                                        <feMerge data-v-6b2d6caa="">
                                                                            <feMergeNode in="coloredBlur"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                            <feMergeNode in="SourceGraphic"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                        </feMerge>
                                                                    </filter>
                                                                    <!---->
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#p1mjmq)" stroke="#999"
                                                                        stroke-width="0" stroke-linejoin="miter"
                                                                        data-v-6b2d6caa="">
                                                                    </polygon>
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#p1mjmq)" data-v-6b2d6caa="">
                                                                    </polygon>
                                                                </svg></span><span class="vue-star-rating-star"
                                                                data-v-03449088="" style="margin-right: 0px;"><svg
                                                                    class="vue-star-rating-star" height="16"
                                                                    width="16" viewBox="0 0 16 16" step="100"
                                                                    data-v-6b2d6caa="" data-v-03449088="">
                                                                    <linearGradient id="ue1tk" x1="0"
                                                                        x2="100%" y1="0" y2="0"
                                                                        data-v-6b2d6caa="">
                                                                        <stop offset="0%" stop-color="#FFCC07"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                        <stop offset="0%" stop-color="#B3B3B3"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                    </linearGradient>
                                                                    <filter id="snkppzu" height="130%" width="130%"
                                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                                        <feGaussianBlur stdDeviation="0"
                                                                            result="coloredBlur" data-v-6b2d6caa="">
                                                                        </feGaussianBlur>
                                                                        <feMerge data-v-6b2d6caa="">
                                                                            <feMergeNode in="coloredBlur"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                            <feMergeNode in="SourceGraphic"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                        </feMerge>
                                                                    </filter>
                                                                    <!---->
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#ue1tk)" stroke="#999"
                                                                        stroke-width="0" stroke-linejoin="miter"
                                                                        data-v-6b2d6caa="">
                                                                    </polygon>
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#ue1tk)" data-v-6b2d6caa="">
                                                                    </polygon>
                                                                </svg></span><span class="vue-star-rating-star"
                                                                data-v-03449088="" style="margin-right: 0px;"><svg
                                                                    class="vue-star-rating-star" height="16"
                                                                    width="16" viewBox="0 0 16 16" step="100"
                                                                    data-v-6b2d6caa="" data-v-03449088="">
                                                                    <linearGradient id="x8s7x6" x1="0"
                                                                        x2="100%" y1="0" y2="0"
                                                                        data-v-6b2d6caa="">
                                                                        <stop offset="0%" stop-color="#FFCC07"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                        <stop offset="0%" stop-color="#B3B3B3"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                    </linearGradient>
                                                                    <filter id="4c38fc" height="130%" width="130%"
                                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                                        <feGaussianBlur stdDeviation="0"
                                                                            result="coloredBlur" data-v-6b2d6caa="">
                                                                        </feGaussianBlur>
                                                                        <feMerge data-v-6b2d6caa="">
                                                                            <feMergeNode in="coloredBlur"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                            <feMergeNode in="SourceGraphic"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                        </feMerge>
                                                                    </filter>
                                                                    <!---->
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#x8s7x6)" stroke="#999"
                                                                        stroke-width="0" stroke-linejoin="miter"
                                                                        data-v-6b2d6caa="">
                                                                    </polygon>
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#x8s7x6)" data-v-6b2d6caa="">
                                                                    </polygon>
                                                                </svg></span><span class="vue-star-rating-star"
                                                                data-v-03449088="" style="margin-right: 0px;"><svg
                                                                    class="vue-star-rating-star" height="16"
                                                                    width="16" viewBox="0 0 16 16" step="100"
                                                                    data-v-6b2d6caa="" data-v-03449088="">
                                                                    <linearGradient id="9rl6pf" x1="0"
                                                                        x2="100%" y1="0" y2="0"
                                                                        data-v-6b2d6caa="">
                                                                        <stop offset="0%" stop-color="#FFCC07"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                        <stop offset="0%" stop-color="#B3B3B3"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                    </linearGradient>
                                                                    <filter id="rfv4or" height="130%" width="130%"
                                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                                        <feGaussianBlur stdDeviation="0"
                                                                            result="coloredBlur" data-v-6b2d6caa="">
                                                                        </feGaussianBlur>
                                                                        <feMerge data-v-6b2d6caa="">
                                                                            <feMergeNode in="coloredBlur"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                            <feMergeNode in="SourceGraphic"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                        </feMerge>
                                                                    </filter>
                                                                    <!---->
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#9rl6pf)" stroke="#999"
                                                                        stroke-width="0" stroke-linejoin="miter"
                                                                        data-v-6b2d6caa="">
                                                                    </polygon>
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#9rl6pf)" data-v-6b2d6caa="">
                                                                    </polygon>
                                                                </svg></span><span class="vue-star-rating-star"
                                                                data-v-03449088="" style="margin-right: 0px;"><svg
                                                                    class="vue-star-rating-star" height="16"
                                                                    width="16" viewBox="0 0 16 16" step="100"
                                                                    data-v-6b2d6caa="" data-v-03449088="">
                                                                    <linearGradient id="e4ci0s" x1="0"
                                                                        x2="100%" y1="0" y2="0"
                                                                        data-v-6b2d6caa="">
                                                                        <stop offset="0%" stop-color="#FFCC07"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                        <stop offset="0%" stop-color="#B3B3B3"
                                                                            stop-opacity="1" data-v-6b2d6caa="">
                                                                        </stop>
                                                                    </linearGradient>
                                                                    <filter id="lq173o" height="130%" width="130%"
                                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                                        <feGaussianBlur stdDeviation="0"
                                                                            result="coloredBlur" data-v-6b2d6caa="">
                                                                        </feGaussianBlur>
                                                                        <feMerge data-v-6b2d6caa="">
                                                                            <feMergeNode in="coloredBlur"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                            <feMergeNode in="SourceGraphic"
                                                                                data-v-6b2d6caa="">
                                                                            </feMergeNode>
                                                                        </feMerge>
                                                                    </filter>
                                                                    <!---->
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#e4ci0s)" stroke="#999"
                                                                        stroke-width="0" stroke-linejoin="miter"
                                                                        data-v-6b2d6caa="">
                                                                    </polygon>
                                                                    <polygon
                                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                                        fill="url(#e4ci0s)" data-v-6b2d6caa="">
                                                                    </polygon>
                                                                </svg></span>
                                                            <!---->
                                                        </div>
                                                    </div>
                                                    <dd class="product-item_n-comments"><i
                                                            class="dsi dsi-s16 dsi-fill-chat" style=""></i><span
                                                            class="product-tem_social-text">0</span>
                                                    </dd>
                                                </dl>
                                            </dl>
                                        </div>
                                    </div>
                                    <!-- Danh sach san pham -->
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="page-section">
        <div class="section-title-wrapper">
            <h2 class="section-title section-title-product">Danh sách sản phẩm</h2>
        </div>
        <div>
            <div class="grid grid-20">
                <!-- Danh sach san pham -->
                @foreach ($producsHome as $index => $product)
                    <div class="grid-item">
                        <div class="product-item overflow">
                            <a href="{{ route('users.home.detail', ['id' => $product->id]) }}" class="product-item_img"
                                title="Áo Thun Unisex Nam Nữ Form Rộng SDVN Freedom Brave"><img
                                    alt="Áo Thun Unisex Nam Nữ Form Rộng SDVN Freedom Brave" width="165"
                                    height="165" lazy="loaded" src="{{ asset($product->picture) }}"></a>
                            <dl class="product-item_summary"><a href="/aothunsdvn-b.262" class=""
                                    title="aothunsdvn">
                                    <dt class="product-item_brand truncate">
                                        {{ $product->name }}</dt>
                                </a>
                                <div class="product-item_sale">
                                    <dd class="inline-bl _sale_origin product-item_sale_origin">
                                        {{ $product->original_price }}</dd>
                                    <dd class="inline-bl _sale_origin product-item_sale_discount">
                                        - {{ percent($product->original_price, $product->promotional_price) }} %</dd>
                                </div>
                                <dd class="product-item_price">
                                    {{ $product->promotional_price }}</dd>
                                <dl class="product-item_social">
                                    <div class="vue-star-rating" data-v-03449088="">
                                        <div class="vue-star-rating" data-v-03449088=""><span
                                                class="vue-star-rating-star" data-v-03449088=""
                                                style="margin-right: 0px;"><svg class="vue-star-rating-star"
                                                    height="16" width="16" viewBox="0 0 16 16" step="100"
                                                    data-v-6b2d6caa="" data-v-03449088="">
                                                    <linearGradient id="p1mjmq" x1="0" x2="100%"
                                                        y1="0" y2="0" data-v-6b2d6caa="">
                                                        <stop offset="0%" stop-color="#FFCC07" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                        <stop offset="0%" stop-color="#B3B3B3" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                    </linearGradient>
                                                    <filter id="jhfi5k" height="130%" width="130%"
                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                        <feGaussianBlur stdDeviation="0" result="coloredBlur"
                                                            data-v-6b2d6caa="">
                                                        </feGaussianBlur>
                                                        <feMerge data-v-6b2d6caa="">
                                                            <feMergeNode in="coloredBlur" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                            <feMergeNode in="SourceGraphic" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                        </feMerge>
                                                    </filter>
                                                    <!---->
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#p1mjmq)" stroke="#999" stroke-width="0"
                                                        stroke-linejoin="miter" data-v-6b2d6caa="">
                                                    </polygon>
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#p1mjmq)" data-v-6b2d6caa="">
                                                    </polygon>
                                                </svg></span><span class="vue-star-rating-star" data-v-03449088=""
                                                style="margin-right: 0px;"><svg class="vue-star-rating-star"
                                                    height="16" width="16" viewBox="0 0 16 16" step="100"
                                                    data-v-6b2d6caa="" data-v-03449088="">
                                                    <linearGradient id="ue1tk" x1="0" x2="100%"
                                                        y1="0" y2="0" data-v-6b2d6caa="">
                                                        <stop offset="0%" stop-color="#FFCC07" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                        <stop offset="0%" stop-color="#B3B3B3" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                    </linearGradient>
                                                    <filter id="snkppzu" height="130%" width="130%"
                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                        <feGaussianBlur stdDeviation="0" result="coloredBlur"
                                                            data-v-6b2d6caa="">
                                                        </feGaussianBlur>
                                                        <feMerge data-v-6b2d6caa="">
                                                            <feMergeNode in="coloredBlur" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                            <feMergeNode in="SourceGraphic" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                        </feMerge>
                                                    </filter>
                                                    <!---->
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#ue1tk)" stroke="#999" stroke-width="0"
                                                        stroke-linejoin="miter" data-v-6b2d6caa="">
                                                    </polygon>
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#ue1tk)" data-v-6b2d6caa="">
                                                    </polygon>
                                                </svg></span><span class="vue-star-rating-star" data-v-03449088=""
                                                style="margin-right: 0px;"><svg class="vue-star-rating-star"
                                                    height="16" width="16" viewBox="0 0 16 16" step="100"
                                                    data-v-6b2d6caa="" data-v-03449088="">
                                                    <linearGradient id="x8s7x6" x1="0" x2="100%"
                                                        y1="0" y2="0" data-v-6b2d6caa="">
                                                        <stop offset="0%" stop-color="#FFCC07" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                        <stop offset="0%" stop-color="#B3B3B3" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                    </linearGradient>
                                                    <filter id="4c38fc" height="130%" width="130%"
                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                        <feGaussianBlur stdDeviation="0" result="coloredBlur"
                                                            data-v-6b2d6caa="">
                                                        </feGaussianBlur>
                                                        <feMerge data-v-6b2d6caa="">
                                                            <feMergeNode in="coloredBlur" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                            <feMergeNode in="SourceGraphic" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                        </feMerge>
                                                    </filter>
                                                    <!---->
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#x8s7x6)" stroke="#999" stroke-width="0"
                                                        stroke-linejoin="miter" data-v-6b2d6caa="">
                                                    </polygon>
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#x8s7x6)" data-v-6b2d6caa="">
                                                    </polygon>
                                                </svg></span><span class="vue-star-rating-star" data-v-03449088=""
                                                style="margin-right: 0px;"><svg class="vue-star-rating-star"
                                                    height="16" width="16" viewBox="0 0 16 16" step="100"
                                                    data-v-6b2d6caa="" data-v-03449088="">
                                                    <linearGradient id="9rl6pf" x1="0" x2="100%"
                                                        y1="0" y2="0" data-v-6b2d6caa="">
                                                        <stop offset="0%" stop-color="#FFCC07" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                        <stop offset="0%" stop-color="#B3B3B3" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                    </linearGradient>
                                                    <filter id="rfv4or" height="130%" width="130%"
                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                        <feGaussianBlur stdDeviation="0" result="coloredBlur"
                                                            data-v-6b2d6caa="">
                                                        </feGaussianBlur>
                                                        <feMerge data-v-6b2d6caa="">
                                                            <feMergeNode in="coloredBlur" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                            <feMergeNode in="SourceGraphic" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                        </feMerge>
                                                    </filter>
                                                    <!---->
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#9rl6pf)" stroke="#999" stroke-width="0"
                                                        stroke-linejoin="miter" data-v-6b2d6caa="">
                                                    </polygon>
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#9rl6pf)" data-v-6b2d6caa="">
                                                    </polygon>
                                                </svg></span><span class="vue-star-rating-star" data-v-03449088=""
                                                style="margin-right: 0px;"><svg class="vue-star-rating-star"
                                                    height="16" width="16" viewBox="0 0 16 16" step="100"
                                                    data-v-6b2d6caa="" data-v-03449088="">
                                                    <linearGradient id="e4ci0s" x1="0" x2="100%"
                                                        y1="0" y2="0" data-v-6b2d6caa="">
                                                        <stop offset="0%" stop-color="#FFCC07" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                        <stop offset="0%" stop-color="#B3B3B3" stop-opacity="1"
                                                            data-v-6b2d6caa="">
                                                        </stop>
                                                    </linearGradient>
                                                    <filter id="lq173o" height="130%" width="130%"
                                                        filterUnits="userSpaceOnUse" data-v-6b2d6caa="">
                                                        <feGaussianBlur stdDeviation="0" result="coloredBlur"
                                                            data-v-6b2d6caa="">
                                                        </feGaussianBlur>
                                                        <feMerge data-v-6b2d6caa="">
                                                            <feMergeNode in="coloredBlur" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                            <feMergeNode in="SourceGraphic" data-v-6b2d6caa="">
                                                            </feMergeNode>
                                                        </feMerge>
                                                    </filter>
                                                    <!---->
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#e4ci0s)" stroke="#999" stroke-width="0"
                                                        stroke-linejoin="miter" data-v-6b2d6caa="">
                                                    </polygon>
                                                    <polygon
                                                        points="7.36,0.64,4.48,5.44,0,6.08,3.2,10.88,2.24,16,7.36,13.76,12.16,16,11.52,10.88,14.72,6.08,9.92,5.44"
                                                        fill="url(#e4ci0s)" data-v-6b2d6caa="">
                                                    </polygon>
                                                </svg></span>
                                            <!---->
                                        </div>
                                    </div>
                                    <dd class="product-item_n-comments"><i class="dsi dsi-s16 dsi-fill-chat"
                                            style=""></i><span class="product-tem_social-text">0</span>
                                    </dd>
                                </dl>
                            </dl>
                        </div>
                    </div>
                    <!-- Danh sach san pham -->
                @endforeach
            </div>
        </div>
    </section>
@endsection
