@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h2>
                CHI TIẾT TÀI KHOẢN
            </h2>
        </div>
        <div class="body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $usersDetail->id }}</td>
                        <td>{{ $usersDetail->name }}</td>
                        <td>{{ $usersDetail->email }}</td>
                        <td>{{ $usersDetail->role }}</td>
                    </tr>
                </tbody>
            </table>
            @if ($usersDetail->role == 1 || $usersDetail->role == 9)
                <a class=" waves-effect waves-block" href="{{ route('admin.users.list_admin') }}"><i
                        class="material-icons">fast_rewind</i></a>
            @else
                <a class=" waves-effect waves-block" href="{{ route('admin.users.list_users') }}"><i
                        class="material-icons">fast_rewind</i></a>
            @endif
        </div>
    </div>
@endsection
