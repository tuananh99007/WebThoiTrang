@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h4>THÊM DANH MỤC</h4>
        </div>
        <div class="body">
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.product.postadd') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Danh mục sản phẩm</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">assignment</i>
                            </span>
                            <div class="form-line">
                                <select name="category_id" >
                                    <option value="{{ old('category_id') }}">Chọn danh mục . . .</option>
                                    @foreach ($categoryADD as $index => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                    <input type="text"  name="trademark"
                                        value="{{ old('trademark') }}" placeholder="Nhập tên nhãn hàng">
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
                                <input type="text"  name="name" value="{{ old('name') }}"
                                    placeholder="Nhập tên sản phẩm">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Bài Viết</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">chat</i>
                            </span>
                            <div class="form-line">
                                <textarea type="text" name="posts" placeholder="Thêm bài viết"></textarea>
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
                            <b>Giá Gốc</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">search</i>
                            </span>
                            <div class="form-line">
                                <input type="text"  name="original_price"
                                    value="{{ old('original_price') }}" placeholder="Nhập giá gốc">
                                @error('original_price')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Giá Khuyến Mại</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">content_cut</i>
                            </span>
                            <div class="form-line">
                                <input type="text"  name="promotional_price"
                                    value="{{ old('promotional_price') }}" placeholder="Nhập giá khuyến mại">
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
                            <b>Thêm Ảnh</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">print</i>
                            </span>
                            <div class="form-line">
                                <input type="file" name="picture" value="{{ old('picture') }}">
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
                                <input type="text"  name="amount" value="{{ old('amount') }}"
                                    placeholder="Nhập số lượng sản phẩm">
                                @error('amount')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                {{-- </fieldset> --}}
            </form>
        </div>
    </div>
@endsection
