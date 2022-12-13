@extends('admin.layout.index')
@section('main_content')
    <div class="card profile-card">
        <div class="profile-header">&nbsp;</div>
        <div class="profile-body">
            <div class="image-area">
                <img src="{{ $userLogin->avatar }}" width="200" height="200"  alt="AdminBSB - Profile Image">
            </div>
            <div class="content-area">
                <h1>{{ $userLogin->name }}</h1>
                <a href="{{ route('admin.users.update', ['id' => $userLogin->id]) }}"><i
                        class="material-icons">unarchive</i></a>
                <p>Administrator</p>
            </div>
        </div>
        <div class="profile-footer">
            <ul>
                <li>
                    <span>ID</span>
                    <span>{{ $userLogin->id }}</span>
                </li>
                <li>
                    <span>Email</span>
                    <span>{{ $userLogin->email }}</span>
                </li>
                <li>
                    <span>Role</span>
                    <span>{{ $userLogin->role }}</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
