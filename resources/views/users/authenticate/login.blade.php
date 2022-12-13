@extends('users.layout.index_authenticate')
@section('content_home_authenticate')
    <div class="tygh  " id="tygh_container">
        <div class="helper-container no-touch" id="tygh_main_container">
            <div class="tygh-content clearfix">
                <div class="container-fluid  ">
                    <div class="row-fluid ">
                        <div class="span16 hompage-block_new">
                            <div id="app">
                                <div class="sign_inner dosiin_page-min-height dosiin_d-flex dosiin_padding-header-top">
                                    <div class="sign_left">
                                        <div class="sign_txt">
                                            <h3>Đăng nhập để thoả thích mua sắm và dễ dàng hơn</h3>
                                        </div>
                                    </div>
                                    <div class="sign_right">
                                        <div class="sign_right-box dosiin_pd-16">
                                            <div>
                                                @if (!empty($messageNotify))
                                                    <div id="alert" class="container-fluid">
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                                <div style="color: red; text-align: center; font-size: medium"
                                                                    class="content">
                                                                    <div class="text" class="notification">
                                                                        {{ $messageNotify }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                @endif
                                            </div>
                                            <form class="dosiin_w-100" id="sign_in"
                                                action="{{ route('users.authenticate.postlogin') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ $email }}" placeholder="Email">
                                                    @error('email')
                                                        <div style="color: red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Password">
                                                    @error('password')
                                                        <div style="color: red">{{ $message }}</div>
                                                    @enderror
                                                    <i class="delete">
                                                        <svg width="20" height="21" viewBox="0 0 20 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1.66667 10.5003C1.66667 5.90553 5.40521 2.16699 10 2.16699C14.5948 2.16699 18.3333 5.90553 18.3333 10.5003C18.3333 15.0951 14.5948 18.8337 10 18.8337C5.40521 18.8337 1.66667 15.0951 1.66667 10.5003ZM10 2.79922C5.75331 2.79922 2.29889 6.25363 2.29889 10.5003C2.29889 14.747 5.75331 18.2014 10 18.2014C14.2467 18.2014 17.7011 14.747 17.7011 10.5003C17.7011 6.25363 14.2467 2.79922 10 2.79922ZM7.84099 8.34131C7.96499 8.21731 8.16321 8.21731 8.28721 8.34131L10 10.0541L11.7128 8.34131C11.8368 8.21731 12.035 8.21731 12.159 8.34131C12.283 8.46531 12.283 8.66353 12.159 8.78753L10.4461 10.5005L12.166 12.2133C12.2899 12.3373 12.2899 12.5354 12.1659 12.6593C12.1038 12.7215 12.0242 12.7523 11.9411 12.7523C11.8579 12.7523 11.7784 12.7215 11.7162 12.6593L10.0034 10.9465L8.29065 12.6593C8.22852 12.7215 8.14895 12.7523 8.06582 12.7523C7.98269 12.7523 7.90313 12.7215 7.84099 12.6593C7.71699 12.5353 7.71699 12.3371 7.84099 12.2131L9.55379 10.5003L7.84099 8.78753C7.71699 8.66353 7.71699 8.46531 7.84099 8.34131Z"
                                                                fill="#222222"></path>
                                                        </svg>
                                                    </i>
                                                    <span class="show-pass">
                                                        <span class="text-pink-gradient">Hiện</span>
                                                    </span>
                                                </div>
                                                <div class="group-check"><a href="{{route('users.users.forgotPassword')}}" class="forget-pass">Quên
                                                        mật khẩu?</a></div><button class="primary-button button btn-login"
                                                    type="submit"><span class="primary-link_text">Đăng nhập</span></button>
                                            </form>
                                            <div class="register-link dosiin_text-center"> Bạn chưa có tài khoản? <a
                                                    href="{{ route('users.authenticate.register') }}"
                                                    class="primary-link_text">Đăng ký</a></div>

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
@endsection

<script>
    $(document).ready(function() {
        $("#alert").slideUp(5000);
    });
</script>
