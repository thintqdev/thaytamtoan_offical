@extends('admin.layouts.app')
@section('title', 'Danh sách video bài giảng')
@section('content')
    <div class="row">
        <div class="col-sm-4 col-12">
        </div>
        <div class="col-sm-8 col-12 text-right add-btn-col">
            <a href="{{ route('admin.videos.create') }}" class="btn btn-primary btn-rounded float-right"><i
                    class="fas fa-plus"></i> Thêm video bài giảng </a>
        </div>
    </div>
    <div class="content-page">
        <form action="{{ route('admin.videos.index') }}" method="get">
            <div class="row filter-row">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="title" value="{{ old('title') }}">
                        <label class="focus-label">Tiêu đề video</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="form-control" name="category_id">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Danh mục</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button class="btn btn-search rounded btn-block mb-3"> Tìm kiếm</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="table-responsive">
                    <table class="table custom-table datatable">
                        <thead class="thead-light">
                        <tr>
                            <th style="min-width:50px;">Ngày tạo</th>
                            <th style="min-width:50px;">Tiêu đề</th>
                            <th style="min-width:50px;">Thời hạn</th>
                            <th style="min-width:50px;">Danh mục</th>
                            <th class="text-right" style="width:15%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <td>{{ $video->created_at }}</td>
                                <td>
                                    <img src="{{ $video->thumbnail_path }}" class="avatar text-white"/>
                                    <a href="{{ $video->youtube_url }}">{{ $video->title }}</a>
                                </td>
                                <td>{{ $video->duration }}</td>
                                <td>{{ $video->category->name }}</td>
                                <td class="text-right">
                                    <button type="submit" data-toggle="modal"
                                            data-target="#preview_video_{{ $video->id }}"
                                            class="btn btn-info btn-sm mb-1">
                                        <i class="far fa-eye"></i>
                                    </button>
                                    <a href="{{ route('admin.videos.edit', ['video' => $video]) }}"
                                       class="btn btn-primary btn-sm mb-1">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button type="submit" data-toggle="modal"
                                            data-target="#delete_video_{{ $video->id }}"
                                            class="btn btn-danger btn-sm mb-1">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <div id="delete_video_{{ $video->id }}" class="modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xoá video này</h4>
                                        </div>
                                        <form method="POST" action="{{ route('admin.videos.destroy', ['video' => $video]) }}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <p>Bạn chắc xoá muốn xoá chứ?</p>
                                                <button type="submit" class="btn btn-danger float-right">Xoá</button>
                                                <div>
                                                    <a href="#" class="btn btn-white float-right m-r-10"
                                                       data-dismiss="modal">Đóng</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="preview_video_{{ $video->id }}" class="modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xem trước video</h4>
                                        </div>
                                        <div class="modal-body">
                                            <iframe width="560" height="315" src="{{ changeYoutubeUrl($video->youtube_url) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
