<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'menus', 'key' =>'Edit  '])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menus.update', ['id'=> $menuFollowIdEdit->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên menu</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ $menuFollowIdEdit->name }}"
                                       placeholder="Nhập tên menu"
                                >
                            </div>

                            <div class="form-group">
                                <label>Chọn menus cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn menus cha</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

