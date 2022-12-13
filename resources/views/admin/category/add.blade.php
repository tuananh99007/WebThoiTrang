@extends('admin.layout.index')
@section('main_content')
    <div class="card">
        <div class="header">
            <h4>THÊM DANH MỤC</h4>
        </div>
        <div class="body">
            <form role="form" method="POST" action="{{ route('admin.category.postadd') }}">
                @csrf
                {{-- <fieldset disabled=""> --}}
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <b>Tên danh mục</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">assignment</i>
                            </span>
                            <div class="form-line">
                                <input type="text"  name="name" value="{{ old('name') }}"
                                    placeholder="Nhập tên danh mục">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Alias</b>

                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">access_alarm</i>
                            </span>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text"  name="alias" value="{{ old('alias') }}"
                                        placeholder="Nhập Alias">
                                    @error('alias')
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
                            <b>Hot_flag</b>
                        </p>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons">merge_type</i>
                            </span>
                            <div class="form-line">
                                <input type="text"  name="hot_flag" value="{{ old('hot_flag') }}"
                                    placeholder="Nhập Hot_flag">
                                @error('hot_flag')
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
