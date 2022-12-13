@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h4>UPDATE SẢN PHẨM</h4>
        </div>
        <div class="body">
            <form role="form" method="POST" enctype="multipart/form-data"
                action="{{ route('admin.product.postupdate', ['id' => $productUpdate->id]) }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Danh mục sản phẩm</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">assignment</i>
                            </span>
                            <div class="form-line">
                                <select name="category_id" id="">
                                    <option value="">Chọn danh mục . . .</option>
                                    @foreach ($categoryUpdate as $index => $category)
                                        <option @selected($productUpdate->category_id == $category->id) value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Tên nhãn hàng</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">weekend</i>
                            </span>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" name="trademark" value="{{ $productUpdate->trademark }}"
                                        placeholder="Nhập tên nhãn hàng ...">
                                    @error('trademark')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <b>Tên sản phẩm</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">layers</i>
                            </span>
                            <div class="form-line">
                                <input type="text" name="name" value="{{ $productUpdate->name }}"
                                    placeholder="Nhập tên sản phẩm ...">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Bài viết</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">chat</i>
                            </span>
                            <div class="form-line">
                                <textarea type="text" name="posts" value="{{ $productUpdate->posts }}" placeholder="Thêm bài viết"></textarea>
                                @error('posts')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <b>Nhập giá gốc</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">search</i>
                            </span>
                            <div class="form-line">
                                <input type="text" name="original_price" value="{{ $productUpdate->original_price }}"
                                    placeholder="Nhập giá gốc ...">
                                @error('original_price')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Giá khuyến mãi</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">content_cut</i>
                            </span>
                            <div class="form-line">
                                <input type="text" name="promotional_price"
                                    value="{{ $productUpdate->promotional_price }}" placeholder="Nhập giá khuyến mãi ...">
                                @error('promotional_price')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <b>Ảnh</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">print</i>
                            </span>
                            <div class="form-line">
                                <img src="{{ asset($productUpdate->picture) }}" alt="" style="height: 100px ">
                                <input type="file" name="picture">
                                @error('picture')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Số Lượng Sản Phẩm</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">whatshot</i>
                            </span>
                            <div class="form-line">
                                <input type="text" name="amount" value="{{ $productUpdate->amount }}"
                                    placeholder="Nhập số lượng sản phẩm ...">
                                @error('amount')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                {{-- </fieldset> --}}
            </form>
        </div>
    </div>
@endsection
