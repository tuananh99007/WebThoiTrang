@extends('admin.layout.index')
@section('main_content')
    <div>
        @if (!empty($messageNotify))
            <div id="alert" class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="info-box-2 bg-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">notifications</i>
                            </div>
                            <div class="content">
                                <div class="text">THÔNG BÁO</div>
                                <div class="number" class="notification">
                                    {{ $messageNotify }}</div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    </div>
    <div class="card">
        <div class="header">
            <h2>
                Tìm Kiếm
            </h2>
        </div>
        <div class="body">
            <form role="form" method="GET" action="{{ route('admin.users.list_admin') }}">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group form-float">
                            <label for="email_address_2">Tên tài khoản</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="name" placeholder="Nhập tên tài khoản ..."
                                        value="{{ $name }}"
                                        @error('name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group form-float">
                            <label for="email_address_2">Email</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="email" placeholder="Nhập Email ..."
                                            value="{{ $email }}">
                                        @error('email')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group form-float">
                            <label for="email_address_2">Role</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">help</i>
                                </span>
                                <div class="input-group">
                                    <div class="form-line">
                                        <select id="" name="role">
                                            <option value="">Chọn Danh Mục . . .</option>
                                            <option value="9">Manager</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <button type="submit" class="btn bg-purple waves-effect">
                            <i class="material-icons">search</i>
                            <span>Tìm Kiếm</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h2>
                DANH SÁCH TÀI KHOẢN
            </h2>
        </div>
        <div class="body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Role</th>
                        @if ($userLogin->role == 9)
                            <th class="center">
                                <a href="{{ route('admin.users.add') }}"> <i class="material-icons">person_add</i>ADD</a>
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersList_admin as $index => $user)
                        @if ($user->role != 0)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <img src="{{ asset($user->avatar) }}" alt="" style="height: 60px ">
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                @if ($userLogin->role == 9)
                                    <td class="center">
                                        <a class="btn bg-green waves-effect"
                                            href="{{ route('admin.users.detail', ['id' => $user->id]) }}"><i
                                                class="material-icons">search</i></a>
                                        <a class="btn bg-pink waves-effect"
                                            href="{{ route('admin.users.update', ['id' => $user->id]) }}"><i
                                                class="material-icons">unarchive</i></a>
                                        <button class="event-delete btn bg-red waves-effect" data-id="{{ $user->id }}">
                                            <i class="material-icons">delete_sweep</i>
                                        </button>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            {{ $usersList_admin->links('admin.components.pagination') }}
            @if ($userLogin->role == 9)
                <a class=" btn bg-red waves-effect" href="{{ route('admin.users.detail_bin') }}"><i
                        class="material-icons">delete_forever</i></a>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".event-delete").click(function() {
                if (confirm("Bạn có thật sự muốn xóa ?") == true) {
                    var id = $(this).data('id');
                    window.location.href = '/admin/users/delete?id=' + id;
                }
            });
            $("#alert").slideUp(5000);1
        });
    </script>
@endsection
