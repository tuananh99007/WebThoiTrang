@extends('admin.layout.index')
@section('main_content')
<div class="card">
    <div class="header">
        <h4>UPDATE DANH MỤC</h4>
    </div>
    <div class="body">
    
    <form role="form" method="POST" action="{{ route('admin.category.postupdate', ['id' => $categoryUpdate->id]) }}">
        @csrf
        {{-- <fieldset disabled=""> --}}
        <div class="row">
            <div class="col-md-6">
                <p>
                    <b>Tên Danh Mục</b>
                </p>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon">
                        <i class="material-icons">assignment</i>
                    </span>
                    <div class="form-line">
                        <input type="text"  name="name" value="{{ $categoryUpdate->name }}"
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
                            <input type="text"  name="alias" value="{{ $categoryUpdate->alias }}"
                                placeholder="Nhập Alias">
                            @error('alias')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="col-md-6">
                <p>
                    <b>Hot_flag</b>
                </p>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon">
                        <i class="material-icons">merge_type</i>
                    </span>
                    <div class="form-line">
                        <input type="text"  name="hot_flag" value="{{ $categoryUpdate->hot_flag }}"
                            placeholder="Nhập Hot_flag">
                        @error('hot_flag')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">UPDATE</button>
        {{-- </fieldset> --}}
    </form>
</div>
</div>
@endsection
