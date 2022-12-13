@extends('admin.layout.authenticate')
@section('noidung')
    <div class="logo">
        <a href="javascript:void(0);">Admin <b> Đăng nhập</b></a>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" action="{{ route('admin.authenticate.postlogin') }}" method="POST">
                @csrf
                <div class="msg">Sign in to start your session</div>
                <div>
                    @if (!empty($messageNotify))
                        <div id="alert" class="container-fluid">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                    <div style="color: red; text-align: center; font-size: medium" class="content">
                                        <div class="text" class="notification">
                                            {{ $messageNotify }}</div>
                                    </div>
                                </div>
                            </div>
                    @endif
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" value="{{ $email }}"
                            placeholder="Email">
                        @error('email')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @error('password')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="{{ route('admin.register') }}">Register Now!</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#alert").slideUp(5000);
        });
    </script>
@endsection
