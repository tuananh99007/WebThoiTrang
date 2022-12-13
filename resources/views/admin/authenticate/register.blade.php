@extends('admin.layout.authenticate')
@section('noidung')
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
    <div class="logo">
        <a href="javascript:void(0);">Admin <b> Đăng Kí</b></a>
    </div>
    <div class="card">
        <div class="body">
            <form role="form" id="sign_up" method="POST" action="{{ route('admin.authenticate.postRegister') }}">
                @csrf
                <div class="msg">Register a new membership</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name Surname">
                        @error('name')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email Address">
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
                        <input type="password" class="form-control" name="password"  placeholder="Password">
                        @error('password')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Xác Nhận Password">
                        @error('password')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>
                <div class="m-t-25 m-b--5 align-center">
                    <a href="{{ route('admin.authenticate.login') }}">You already have a membership?</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#alert").slideUp(3000);
        });
    </script>
@endsection
