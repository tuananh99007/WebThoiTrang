<!DOCTYPE html>

<html lang="vi" class="cookies filereader draganddrop no-touchevents mouseevents">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Dosi-in | Sàn thương mại điện tử thời trang lớn nhất việt nam</title>
    <link rel="stylesheet" href={{ asset('assets/users/css/users.css') }}>
    <link rel="stylesheet" href="{{ asset('assets/users/css/user_detail.css') }}">
    <script src="{{asset('assets/admin/js/demo.js')}}"></script>
    
</head>

<body class="screen--lg screen--uhd">
    <div class="tygh  " id="tygh_container">
        <div class="helper-container no-touch" id="tygh_main_container">
            <div class="tygh-content clearfix">
                <div class="container-fluid  ">
                    <div class="row-fluid ">
                        <div class="span16  hompage-block_new">
                            <div id="app" data-v-app="">
                                <div>
                                    @include('users.layout.header')
                                    <div
                                        class="dosiin_page-min-height dosiin_page-max-width dosiin_padding-header-cat-top">
                                        @include('users.layout.banner')
                                        @yield('content_home')
                                    </div>
                                    @include('users.layout.footer')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
