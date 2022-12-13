@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h2>
                Tìm Kiếm
            </h2>
        </div>
        <div class="body">
            <form role="form" method="GET" action="{{ route('admin.cart.purchase_account') }}">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group form-float">
                            <label for="email_address_2">Tên tài khoản</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="name" value="{{ $name }}"
                                        placeholder="Nhập tên tài khoản ...">
                                    @error('name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn bg-purple waves-effect">
                        <i class="material-icons">search</i>
                        <span>Tìm Kiếm</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h2>
                DANH SÁCH TÀI KHOẢN MUA HÀNG
            </h2>
        </div>
        <div class="body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên tài khoản</th>
                        <th>Email</th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartPurchase_account as $index => $cart)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cart->name }}</td>
                            <td>{{ $cart->email }}</td>
                            <td>
                                <a href="{{ route('admin.cart.listcart', ['name' => $cart->name]) }}"><i
                                        class="material-icons">shopping_cart</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $cartPurchase_account->links('admin.components.pagination') }}
        </div>
    </div>
@endsection
