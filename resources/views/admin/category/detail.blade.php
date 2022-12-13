@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h2>
                CHI TIẾT DANH MỤC
            </h2>
        </div>
        <div class="body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>Alias</th>
                        <th>Hot_flag</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{ $categoryDetail->id }}</th>
                        <td>{{ $categoryDetail->name }}</td>
                        <td>{{ $categoryDetail->alias }}</td>
                        <td>{{ $categoryDetail->hot_flag }}</td>
                    </tr>
                </tbody>
            </table>
            <a class=" waves-effect waves-block" href="{{ route('admin.category.list') }}"><i
                class="material-icons">fast_rewind</i></a>
        </div>
    </div>
@endsection
