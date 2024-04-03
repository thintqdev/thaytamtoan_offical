@extends('admin.layouts.app')
@section('title', 'Tạo tài liệu mới')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"> Thông tin tài liệu</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('admin.documents.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tên tài liệu</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label> Link google drive </label>
                                        <input type="text" class="form-control" name="google_drive_url">
                                    </div>
                                    <div class="form-group">
                                        <label>Loại tài liệu</label>
                                        <select class="form-control" name="mime_type">
                                            <option value="pdf">PDF</option>
                                            <option value="docx">DOCX</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Danh mục </label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary mr-2" type="submit">Lưu lại</button>
                                        <button class="btn btn-secondary" type="reset">Nhập lại</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
