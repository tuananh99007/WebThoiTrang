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
                                <div class="number" class="
                            notification">
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
            <form role="form" method="GET" action="{{ route('admin.category.list') }}">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group form-float">
                            <label for="email_address_2">Tên Danh Mục</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">assignment</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="name" value="{{$name}}" placeholder="Nhập tên danh mục">
                                    @error('name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
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
                Bảng Danh Sách
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
                        <th class="center">
                            <a href="{{ route('admin.category.add') }}"><i class="material-icons">person_add</i>ADD</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoryList as $index => $category)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->alias }}</td>
                            <td>{{ $category->hot_flag }}</td>
                            <td class="center">
                                <a class="btn bg-green waves-effect"
                                    href="{{ route('admin.category.detail', ['id' => $category->id]) }}"><i
                                        class="material-icons">search</i></a>
                                <a class="btn bg-pink waves-effect"
                                    href="{{ route('admin.category.update', ['id' => $category->id]) }}"><i
                                        class="material-icons">unarchive</i></a>
                                <button class="event-delete btn bg-red waves-effect" data-id="{{ $category->id }}">
                                    <i class="material-icons">delete_sweep</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categoryList->links('admin.components.pagination') }}
            <a class="btn bg-red waves-effect" href="{{ route('admin.category.detail_bin') }}"><i
                    class="material-icons">delete_forever</i></a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".event-delete").click(function() {
                if (confirm("Bạn có thật sự muốn xóa ?") == true) {
                    var id = $(this).data('id');
                    $.ajax({
                        url: '/admin/category/delete?id=' + id,
                        type: 'GET',
                        success: function(html) {
                            $("#category-" + id).remove();
                        }
                    });
                } else {
                    alert("Bạn đã hủy ")
                }
            });
            $("#alert").slideUp(3000);
        });
    </script>
@endsection
