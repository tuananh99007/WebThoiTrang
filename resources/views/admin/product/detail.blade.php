@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h2>
                CHI TIẾT SẢN PHẨM
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
                        <th>View</th>

                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $productDetail ->id }}</td>
                            <td>{{ $productDetail->trademark }}</td>
                            <td>
                                <img src="{{ asset($productDetail->picture) }}" alt="" style="height: 100px ">
                            </td>
                            <td>{{ $productDetail->name }}</td>
                            <td>{{ $productDetail->category_name }}</td>
                            <td>{{ $productDetail->original_price }}</td>
                            <td>{{ $productDetail->promotional_price }}</td>
                            <td>{{ $productDetail->rating }}</td>
                            <td>{{ $productDetail->view }}</td>

                        </tr>
                </tbody>
            </table>
            <a class=" waves-effect waves-block" href="{{ route('admin.product.list') }}"><i
                class="material-icons">fast_rewind</i></a>
        </div>
    </div>
@endsection
