@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h4>THÊM TÀI KHOẢN </h4>
        </div>
        <div class="body">
            <form role="form" method="POST" action="{{ route('admin.users.postadd') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <b>Tên tài Khoản</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" value="{{ old('name') }}" name="name"
                                    placeholder="Nhập tên tài khoản ...">
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
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        placeholder="Nhập Email ...">
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
                                <input type="password" name="password" value="" placeholder="Nhập Password ...">
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
                                <input type="password" name="password_confirmation" placeholder="Xác Nhận Password ...">
                                @error('password')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <b>Role</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">help</i>
                            </span>
                            <div class="form-line">
                                <select name="role">
                                    @if ($userLogin->role == 9)
                                        <option value="">Chọn danh mục . . .</option>
                                        <option value="9">Manager</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Users</option>
                                    @else
                                        <option value="0">Users</option>
                                    @endif
                                </select>
                                @error('role')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="material-icons">person_add</i>ADD</button>

        </div>
    </div>
    {{-- </fieldset> --}}
    </form>
    </div>
@endsection

