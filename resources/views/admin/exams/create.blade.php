@extends('admin.layouts.app')
@section('title', 'Tạo đề thi mới')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thông tin đề thi</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('admin.exams.store') }}" method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label>Tên đề thi</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Loại đề thi</label>
                                        <div class="row">
                                            <label class="radio-button">
                                                <input type="radio" class="form-check-input" name="type" value="0">
                                                Thi tự do
                                            </label>
                                            <label class="radio-button">
                                                <input type="radio" class="form-check-input" name="type" value="1" checked>
                                                Thi thử
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row" id="examTime">
                                        <div class="form-group col-md-6">
                                            <label>Thời gian bắt đầu</label>
                                            <input type="datetime-local" class="form-control" name="started_at">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Thời gian kết thúc</label>
                                            <input type="datetime-local" class="form-control" name="ended_at">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thời lượng (phút)</label>
                                        <input type="number" class="form-control" name="duration">
                                    </div>
                                    <div class="form-group" >
                                        <label>Số lượng câu hỏi</label>
                                        <input type="number" class="form-control" name="total_question" id="total-question">
                                    </div>
                                    <div class="form-group">
                                        <label>Điểm mỗi câu hỏi</label>
                                        <input type="number" class="form-control" name="score_per_question">
                                    </div>
                                    <div id="image-dropzone">

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
    <script type="text/javascript" src="{{ asset("assets/js/exam.controller.js") }}"></script>
@endsection
