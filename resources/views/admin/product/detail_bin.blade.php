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
            <form role="form" method="GET" action="{{ route('admin.product.detail_bin') }}">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group form-float">
                            <label for="email_address_2">Tên sản phẩm</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">layers</i>
                                </span>
                                <div class="form-line">
                                    <input type="text"  name="name" placeholder="Nhập tên sản phẩm">
                                    @error('name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group form-float">
                            <label for="email_address_2">Trademark</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">weekend</i>
                                </span>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text"  name="trademark" placeholder="Nhập tên nhãn hàng">
                                        @error('trademark')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
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
                DANH SÁCH SẢN PHẨM ĐÃ XÓA
            </h2>
        </div>
        <div class="body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Trademark</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Category_name</th>
                        <th>Original_price</th>
                        <th>Promotional_price</th>
                        <th>Rating</th>
                        <th>
                            <a class="btn bg-blue waves-effect"
                                href="{{ route('admin.product.restore_all') }}">RESTORE_ALL</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productDetail_bin as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->trademark }}</td>
                            <td>
                                <img src="{{ asset($product->picture) }}" alt="" style="height: 80px ">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->original_price }}</td>
                            <td>{{ $product->promotional_price }}</td>
                            <td>{{ $product->rating }}</td>
                            <td>
                                <a class="btn bg-green waves-effect"
                                    href="{{ route('admin.product.detail', ['id' => $product->id]) }}"><i class="material-icons">search</i></a>

                                <a class="btn bg-pink waves-effect"
                                    href="{{ route('admin.product.restore', ['id' => $product->id]) }}"><i class="material-icons">unarchive</i></a>
                                <button class="event-delete btn bg-red waves-effect" data-id="{{ $product->id }}">
                                    <i class="material-icons">delete_sweep</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $productDetail_bin->links('admin.components.pagination') }}
            <a class="event-delete btn bg-red waves-effect" href="{{ route('admin.product.delete_all') }}">DELETE_ALL</a>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".event-delete").click(function() {
                if (confirm("Bạn có thật sự muốn xóa ?") == true) {
                    var id = $(this).data('id');
                    window.location.href = '/admin/product/delete_trash?id=' + id;
                }
            });
            $("#alert").slideUp(3000);
        });
    </script>
@endsection
