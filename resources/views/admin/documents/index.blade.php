@extends('admin.layouts.app')
@section('title', 'Danh sách tài liệu')
@section('content')
    <div class="row">
        <div class="col-sm-4 col-12">
        </div>
        <div class="col-sm-8 col-12 text-right add-btn-col">
            <a href="{{ route('admin.documents.create') }}" class="btn btn-primary btn-rounded float-right"><i
                    class="fas fa-plus"></i> Thêm tài liệu </a>
        </div>
    </div>
    <div class="content-page">
        <form action="{{ route('admin.documents.index') }}" method="get">
            <div class="row filter-row">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="name" value="{{ old('name') }}">
                        <label class="focus-label">Tên tài liệu</label>
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
                            <th style="min-width:50px;">Tên tài liệu</th>
                            <th style="min-width:50px;">Loại tài liệu</th>
                            <th style="min-width:50px;">Danh mục</th>
                            <th style="min-width:80px;">Trạng thái</th>
                            <th class="text-right" style="width:15%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($documents as $document)
                            <tr>
                                <td>{{ $document->created_at }}</td>
                                <td>
                                    <a href="{{ $document->google_drive_url }}">{{ $document->name }}</a>
                                </td>
                                <td>{{ $document->mime_type }}</td>
                                <td>{{ $document->category->name }}</td>
                                <td>
                                    @if($document->status)
                                        <span class="badge badge-success">Mở</span>
                                    @elseif($document->status == 0)
                                        <span class="badge badge-danger">Khoá</span>
                                    @endif</td>
                                <td class="text-right">
                                    <a href="{{ route('admin.documents.edit', ['document' => $document]) }}" class="btn btn-primary btn-sm mb-1">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button type="submit" data-toggle="modal" data-target="#delete_document_{{ $document->id }}"
                                            class="btn btn-danger btn-sm mb-1">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <div id="delete_document_{{ $document->id }}" class="modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xoá tài liệu</h4>
                                        </div>
                                        <form method="POST" action="{{ route('admin.documents.destroy', ['document' => $document]) }}">
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


