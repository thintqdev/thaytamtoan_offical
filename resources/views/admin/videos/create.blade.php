@extends('admin.layouts.app')
@section('title', 'Tạo video bài giảng mới')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"> Thông tin video bài giảng</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('admin.videos.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tiêu đề video</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label> Mô tả video </label>
                                        <input type="text" class="form-control" name="description">
                                    </div>
                                    <div class="form-group">
                                        <label>Link youtube</label>
                                        <input type="text" class="form-control" name="youtube_url">
                                    </div>
                                    <div class="form-group">
                                        <label>Hình đại diện video</label>
                                        <div class="file-upload">
                                            <div class="file-select">
                                                <div class="imagePreview"></div>
                                                <button class="btn btn-secondary">Chọn ảnh</button>
                                                <div class="file-select-name">Không có ảnh được chọn</div>
                                                <input type="file" name="thumbnail_path" class="profileimg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thời hạn video (giờ/phút/giây)</label>
                                        <input type="text" class="form-control" name="duration">
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
