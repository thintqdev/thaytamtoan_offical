@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa tài liệu')
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
                                <form action="{{ route('admin.documents.update', ['document' => $document]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label>Tên tài liệu</label>
                                        <input type="text" class="form-control" name="name" value="{{ $document->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label> Link google drive </label>
                                        <input type="text" class="form-control" name="google_drive_url" value="{{ $document->google_drive_url }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Loại tài liệu</label>
                                        <select class="form-control" name="mime_type">
                                            <option value="pdf" @if ($document->mime_type === 'pdf') selected @endif>PDF</option>
                                            <option value="docx" @if ($document->mime_type === 'docx') selected @endif>DOCX</option>
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
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" value="1" {{$document->status ? 'checked' : ''}} >
                                        <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
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
