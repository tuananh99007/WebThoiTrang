@extends('users.layout.index')
@section('content_home')
    <h1>Danh sách đơn hàng</h1>
    <table border="1" style="">
        <tr>
            <th>ID</th>
            <th>Tên tài khoản</th>
            <th>Chi tiết đơn hàng</th>
            <th>xác nhận của bạn</th>
            <th>Tình trạng đơn hàng</th>
        </tr>
        @foreach ($carts_list as $index => $cart_list)
            <tr>

                <td>{{ $index + 1 }}</td>
                <td>{{ $cart_list->name }}</td>
                <td><a href="{{ route('users.home.cart_detail', ['id' => $cart_list->id]) }}">Chi tiết</a></td>
                <td>
                    @if ($cart_list->status == 2)
                        <a href="{{ route('users.product.confirm', ['id' => $cart_list->id]) }}">Đã nhận hàng</a>
                    @endif
                </td>
                <td>
                    @if ($cart_list->status == 1)
                        <h1>Chờ xác nhận</h1>
                    @else
                        @if ($cart_list->status == 2)
                            <h1>Admin Đã xác nhận</h1>
                        @else
                            <h1>Bạn đã nhận hàng</h1>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach


    </table>
@endsection
