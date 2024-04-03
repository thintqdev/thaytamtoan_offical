@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa video')
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
                                <form action="{{ route('admin.videos.update', ['video' => $video]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label>Tiêu đề video</label>
                                        <input type="text" class="form-control" name="title" value="{{ $video->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label> Mô tả video </label>
                                        <input type="text" class="form-control" name="description" value="{{ $video->description }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Link youtube</label>
                                        <input type="text" class="form-control" name="youtube_url" value="{{ $video->youtube_url }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Hình đại diện video</label>
                                        <div class="file-upload">
                                            <div class="file-select">
                                                <div class="imagePreview" style="background-image: url({{ $video->thumbnail_path }})"></div>
                                                <button class="btn btn-secondary">Chọn ảnh</button>
                                                <div class="file-select-name">{{ $video->thumbnail_path }}</div>
                                                <input type="file" name="thumbnail_path" class="profileimg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thời hạn video (giờ/phút/giây)</label>
                                        <input type="text" class="form-control" name="duration" value="{{ $video->duration }}">
                                    </div>
                                    <div class="form-group">
                                        <label> Danh mục </label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($category->id == $video->categories_id) selected @endif>{{ $category->name }}</option>
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
