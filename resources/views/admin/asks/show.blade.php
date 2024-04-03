@extends('admin.layouts.app')
@section('title', 'Xem câu hỏi')
<link rel="stylesheet" href="{{ asset('assets/css/ask-style.css') }}">
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"> Thông tin câu hỏi</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tên câu hỏi:</label>
                                    <p class="font-weight-normal">{{ $ask->title }}</p>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Số lượt xem:</label>
                                    <p class="font-weight-normal">{{ $ask->views_count }}</p>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Danh mục:</label>
                                    <p class="font-weight-normal">{{ $ask->category->name }}</p>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Người đặt câu hỏi:</label>
                                    <p class="font-weight-normal">{{ $ask->user->full_name }}</p>
                                </div>

                                <div class="form-group">
                                    <label style="display: block;" class="font-weight-bold">Nội dung câu hỏi:</label>
                                    <div class="ask-picture">
                                        <img class="ask-img modal-trigger" src="https://picsum.photos/id/0/5000/3333" alt="">
                                    </div>
                                    {{-- <p>{!! html_entity_decode($ask->body) !!}</p> --}}
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-primary mr-2">Trả lời</button>
                                </div>
                                <a class="btn-back" href="{{ route('admin.asks.index') }}"><i class="fas fa-arrow-circle-left"
                                        id="back-icon"></i>Trở về</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalAskImage" src="">
    </div>
@endsection
