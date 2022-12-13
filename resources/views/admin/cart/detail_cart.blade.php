@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h2>
                CHI TIẾT ĐƠN HÀNG
            </h2>
        </div>
        <div class="body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Tài Khoản</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Nhãn hàng</th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_cart as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset($detail->picture) }}" alt="" style="height: 100px ">
                            </td>
                            <td>{{ $detail->users_name }}</td>
                            <td>{{ $detail->promotional_price }}</td>
                            <td>{{ $detail->amount }}</td>
                            <td>{{ $detail->trademark }}</td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $detail_cart->links('admin.components.pagination') }}
            <a class=" waves-effect waves-block"
                href="{{ route('admin.cart.listcart', ['name' => $detail_cart[0]->users_name]) }}"><i
                    class="material-icons">fast_rewind</i></a>
        </div>
    </div>
@endsection
