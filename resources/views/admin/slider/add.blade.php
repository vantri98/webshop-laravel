<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Slider', 'key' =>'Add  '])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên Slider</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       value="{{ old('name') }}"
                                       placeholder="Nhập tên Slider"
                                >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                          rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file"
                                       class="form-control-file @error('image_path') is-invalid @enderror"
                                       name="image_path"
                                >
                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

