@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa đề thi')
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
                                <form action="{{ route('exams.update', ['exam' => $exam]) }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label>Tên đề thi</label>
                                        <input type="text" class="form-control" name="title" value="{{ $exam->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Loại đề thi</label>
                                        <div class="row">
                                            <label class="radio-button">
                                                <input type="radio" class="form-check-input" name="type" value="0"
                                                       @if($exam->type == 0) checked @endif>
                                                Thi tự do
                                            </label>
                                            <label class="radio-button">
                                                <input type="radio" class="form-check-input" name="type" value="1"
                                                       @if($exam->type == 1) checked @endif>
                                                Thi thử
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row" id="examTime" @if($exam->type == 0) style="display: none" @endif>
                                        <div class="form-group col-md-6">
                                            <label>Thời gian bắt đầu</label>
                                            <input type="datetime-local" class="form-control" name="started_at"
                                                   value="{{ $exam->started_at }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Thời gian kết thúc</label>
                                            <input type="datetime-local" class="form-control" name="ended_at"
                                                   value="{{ $exam->ended_at }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thời lượng (phút)</label>
                                        <input type="number" class="form-control" name="duration"
                                               value="{{ $exam->duration }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng câu hỏi</label>
                                        <input type="number" class="form-control" name="total_question"
                                               id="total-question" value="{{ $exam->total_question }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Điểm mỗi câu hỏi</label>
                                        <input type="number" class="form-control" name="score_per_question"
                                               value="{{ $exam->score_per_question }}">
                                    </div>
                                    <div id="image-dropzone">
                                        @foreach($questions as $key => $question)
                                            <div class="form-group">
                                                <label> Câu {{$key + 1}}</label>
                                                <input type="file" class="form-control question-image-input" name="question_images[]" accept="image/*" data-preview="#image-preview-{{$key + 1}}">
                                                <div class="image-preview" id="image-preview-{{$key + 1}}">
                                                    @if($question->question_image_path)
                                                        <img src="{{ $question->question_image_path }}" alt="image preview">
                                                    @else
                                                        <img src="" alt="image preview">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Đáp án đúng:</label>
                                                <div class="radio-buttons">
                                                    @foreach(['A', 'B', 'C', 'D'] as $option)
                                                        <label>
                                                            <input type="radio" name="right_answer[{{$key}}]" value="{{ $option }}" {{ $question->right_answer == $option ? 'checked' : '' }}>
                                                            {{ $option }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
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
