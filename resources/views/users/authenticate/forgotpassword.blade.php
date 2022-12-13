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
                                            <h3>Quên Mật Khẩu</h3>
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
                                                action="{{ route('users.authenticate.postforgotPassword') }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ old('email') }}" placeholder="Email">
                                                    @error('email')
                                                        <div style="color: red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="group-check"></div><button
                                                    class="primary-button button btn-login" type="submit"><span
                                                        class="primary-link_text">Gửi đi</span></button>
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
