@extends('admin.layouts.app')
@section('title', 'Danh sách đề thi')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-12">
        </div>
        <div class="col-sm-8 col-12 text-right add-btn-col">
            <a href="{{ route('exams.create') }}" class="btn btn-primary btn-rounded float-right"><i
                    class="fas fa-plus"></i> Thêm đề thi </a>
        </div>
    </div>
    <div class="content-page">
        <form action="{{ route('exams.index') }}" method="get">
            <div class="row filter-row">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="title" value="{{ old('title') }}">
                        <label class="focus-label">Tiêu đề đề thi</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <select class="form-control" name="type">
                            <option value="" selected></option>
                            <option value="1">Thi trực tuyến</option>
                            <option value="0">Thi tự do</option>
                        </select>
                        <label class="focus-label">Loại đề thi</label>
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
                            <th style="min-width:50px;">Thời hạn (phút)</th>
                            <th style="min-width:50px;">Loại</th>
                            <th style="min-width:50px;">Số lượng câu hỏi</th>
                            <th style="max-width: 200px">Thời gian thi</th>
                            <th class="text-right" style="width:15%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($exams as $exam)
                            <tr>
                                <td>{{ $exam->created_at }}</td>
                                <td>
                                    {{ $exam->title }}
                                </td>
                                <td>{{ $exam->duration}}</td>
                                <td>{{ $exam->type ? 'Thi thử' : 'Thi tự do'}}</td>
                                <td>{{ $exam->total_question }}</td>
                                <td>
                                    @if($exam->started_at && $exam->ended_at)
                                        {{ $exam->started_at . ' ~ ' . $exam->ended_at }}
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('exams.edit', ['exam' => $exam]) }}"
                                       class="btn btn-primary btn-sm mb-1">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button type="submit" data-toggle="modal"
                                            data-target="#delete_exam_{{ $exam->id }}"
                                            class="btn btn-danger btn-sm mb-1">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <div id="delete_exam_{{ $exam->id }}" class="modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xoá đề thi này</h4>
                                        </div>
                                        <form method="POST" action="{{ route('exams.destroy', ['exam' => $exam]) }}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <p>Bạn chắc chắn muốn xoá chứ?</p>
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
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
