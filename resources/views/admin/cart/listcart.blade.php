@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h2>
                ĐƠN HÀNG ĐÃ ĐẶT MUA
            </h2>
        </div>
        <div class="body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên tài khoản</th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listcart as $index => $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->name }}</td>
                            <td>
                                <a class="btn bg-green waves-effect"
                                    href="{{ route('admin.cart.detail_cart', ['id' => $list->id]) }}"><i
                                        class="material-icons">search</i></a>
                                @if ($list->status == 1)
                                    <a class="btn bg-purple waves-effect"
                                        href="{{ route('admin.cart.confirm', ['id' => $list->id]) }}"><i
                                            class="material-icons">done</i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $listcart->links('admin.components.pagination') }}
            <a class=" waves-effect waves-block" href="{{ route('admin.cart.purchase_account') }}"><i
                class="material-icons">fast_rewind</i></a>
        </div>
    </div>
@endsection
