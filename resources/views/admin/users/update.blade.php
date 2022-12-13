@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h4>Update Tài Khoản</h4>
        </div>
        <div class="body">
            <form role="form" method="POST" enctype="multipart/form-data"
                action="{{ route('admin.users.postupdate', ['id' => $usersUpdate->id]) }}">
                @csrf
                {{-- <fieldset disabled=""> --}}
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <b>Tên tài khoản</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" name="name" value="{{ $usersUpdate->name }}"
                                    placeholder="Nhập tên tài khoản...">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Email</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" name="email" disabled value="{{ $usersUpdate->email }}"
                                        placeholder="Nhập email">
                                    @error('email')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <b>Password</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">verified_user</i>
                            </span>
                            <div class="form-line">
                                <input type="password" name="password" placeholder="Nhập Password">
                                @error('password')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Xác Nhận Password</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">verified_user</i>
                            </span>
                            <div class="form-line">
                                <input type="password" name="password_confirmation" placeholder="Nhập Password">
                                @error('password')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if ($userLogin->role == 9)
                        <div class="col-md-6">
                            <p>
                                <b>Role</b>
                            </p>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">help</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="role" value="{{ $usersUpdate->role }}"
                                        placeholder="Nhập Role">
                                    @error('role')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6">
                            <p>
                                <b>Role</b>
                            </p>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">help</i>
                                </span>
                                <div class="form-line">
                                    <select name="role" id="">
                                        <option>{{ $usersUpdate->role }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <p>
                            <b>Avatar</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">face</i>
                            </span>
                            <div class="form-line">
                                <img src="{{ asset($usersUpdate->avatar) }}" alt="" style="height: 100px ">
                                <input type="file" name="avatar">
                                @error('avatar')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn bg-pink waves-effect">Update</button>
                {{-- </fieldset> --}}
            </form>
        </div>
    </div>
@endsection
