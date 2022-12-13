@extends('users.layout.index_authenticate')
@section('content_home_authenticate')
    <div>
        @if (!empty($messageNotify))
            <div id="alert" class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">notifications</i>
                            </div>
                            <div class="content">
                                <div class="text">THÔNG BÁO</div>
                                <div class="text" class="notification">
                                    {{ $messageNotify }}</div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    </div>
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
                                            <h3>Đăng Ký mua sắm và dễ dàng hơn</h3>
                                        </div>
                                    </div>
                                    <div class="sign_right">
                                        <div class="sign_right-box dosiin_pd-16">
                                            <form class="dosiin_w-100" id="sign_in"
                                                action="{{ route('users.authenticate.postRegister') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Name Surname">
                                                    @error('name')
                                                        <div style="color: red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email Address">
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
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password_confirmation"
                                                        placeholder="Xác Nhận Password">
                                                    @error('remember_token')
                                                        <div style="color: red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="group-check"><a href="/reset-password" class="forget-pass">Quên
                                                        mật khẩu?</a></div><button class="primary-button button btn-login"
                                                    type="submit"><span class="primary-link_text">Đăng ký</span></button>
                                            </form>
                                            <div class="register-link dosiin_text-center"> Bạn đã có tài khoản ? <a
                                                    href="{{ route('users.authenticate.login') }}"
                                                    class="primary-link_text">Đăng nhập</a></div>
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
