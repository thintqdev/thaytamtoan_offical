@extends('admin.layouts.app')
@section('title', 'Danh sách câu hỏi')
<style>
    .text-right{
        display: flex;
        justify-content: space-between;
        text-align: center;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-sm-4 col-12">
        </div>
    </div>
    <div class="content-page">
        <form action="{{ route('admin.asks.index') }}" method="get">
            <div class="row filter-row">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="title" value="{{ old('title') }}">
                        <label class="focus-label">Tiêu đề câu hỏi</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="form-control" name="category_id">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                            <th style="min-width:50px;">Tiêu đề câu hỏi</th>
                            <th style="min-width:50px;">Số lượt xem</th>
                            <th style="min-width:50px;">Danh mục</th>
                            <th style="min-width:80px;">Người hỏi</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($asks as $ask)
                            <tr>
                                <td>{{ $ask->created_at }}</td>
                                <td>
                                    {{ \Str::limit($ask->title, 50) }}
                                </td>
                                <td>{{ $ask->views_count }}</td>
                                <td>{{ $ask->category->name }}</td>
                                <td>
                                    {{ $ask->user->full_name}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.asks.show', ['ask' => $ask]) }}" class="btn btn-primary btn-sm mb-1">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <button type="submit" data-toggle="modal" data-target="#delete_ask_{{ $ask->id }}"
                                            class="btn btn-danger btn-sm mb-1">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <div id="delete_ask_{{ $ask->id }}" class="modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xoá câu hỏi của {{ $ask->user->full_name }}</h4>
                                        </div>
                                        <form method="POST" action="{{ route('admin.asks.destroy', ['ask' => $ask]) }}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <p>Bạn chắc xoá muốn xoá chứ?</p>
                                                <button type="submit" class="btn btn-danger float-right">Xoá</button>
                                                <div>
                                                    <a href="#" class="btn btn-white float-right m-r-10" data-dismiss="modal">Đóng</a>
                                                </div>
                                            </div>
                                        </form>
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


