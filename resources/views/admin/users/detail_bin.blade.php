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
            <form role="form" method="GET" action="{{ route('admin.users.detail_bin') }}">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group form-float">
                            <label for="email_address_2">Tên tài khoản</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text"  name="name" placeholder="Nhập tên tài khoản ...">
                                    @error('name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
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
                                        <input type="text" name="email" placeholder="Nhập Email ...">
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
                                        <select id="" name="role" >
                                            <option value="9">Manager</option>
                                            <option value="1">Admin</option>
                                            <option value="0">Users</option>
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
                DANH SACH TÀI KHOẢN ĐÃ XÓA
            </h2>
        </div>
        <div class="body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên tài Khoản</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>
                            <a class="btn bg-blue waves-effect" href="{{ route('admin.users.restore_all') }}">RESTORE_ALL</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersDetail_bin as $index => $detail_bin)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail_bin->name }}</td>
                            <td>{{ $detail_bin->email }}</td>
                            <td>{{ $detail_bin->role }}</td>
                            <td>
                                <a class="btn bg-green waves-effect"
                                    href="{{ route('admin.users.detail', ['id' => $detail_bin->id]) }}"><i class="material-icons">search</i></a>
                                <a class="btn bg-pink waves-effect"
                                    href="{{ route('admin.users.restore', ['id' => $detail_bin->id]) }}">
                                    <i class="material-icons">unarchive</i></a>
                                <button class="event-delete btn bg-red waves-effect" data-id="{{ $detail_bin->id }}">
                                    <i class="material-icons">delete_sweep</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $usersDetail_bin->links('admin.components.pagination') }}
            <a class="event-delete btn bg-red waves-effect" href="{{ route('admin.users.delete_all') }}">DELETE_ALL</a>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".event-delete").click(function() {
                if (confirm("Bạn có thật sự muốn xóa ?") == true) {
                    var id = $(this).data('id');
                    window.location.href = '/admin/users/delete_trash?id=' + id;
                }
            });
            $("#alert").slideUp(3000);
        }, 1000);
    </script>
@endsection
