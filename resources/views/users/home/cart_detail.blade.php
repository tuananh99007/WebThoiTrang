@extends('users.layout.index')
@section('content_home')
    <table border="1">
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
        @foreach ($cart_detail as $index => $cart)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img src="{{ asset($cart->picture) }}" alt="" style="height: 100px ">
                </td>
                <td>{{ $cart->users_name }}</td>
                <td>{{ $cart->promotional_price }}</td>
                <td>{{ $cart->amount }}</td>
                <td>{{ $cart->trademark }}</td>
                <td>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
