@extends('admin.layouts.app')
@section('title', 'Danh sách danh mục')
@section('content')
    <div class="row">
        <div class="col-sm-4 col-12">
        </div>
        <div class="col-sm-8 col-12 text-right add-btn-col">
            <button type="button" class="btn btn-primary btn-rounded float-right" data-toggle="modal"
                    data-target="#addCategoryModal">
                <i class="fas fa-plus"></i> Thêm danh mục
            </button>
        </div>
    </div>
    <div class="content-page">
        <form action="{{ route('admin.categories.index') }}" method="get">
            <div class="row filter-row">
                <div class="col-md-8">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="name" value="{{ old('name') }}">
                        <label class="focus-label">Tên danh mục</label>
                    </div>
                </div>
                <div class="col-md-4">
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
                            <th style="min-width:50px;">Tên danh mục</th>
                            <th style="min-width:50px;">Đường dẫn</th>
                            <th style="min-width:50px;">Danh mục cha</th>
                            <th class="text-right" style="width:15%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d-m-Y') }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->parent_name }}</td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal"
                                            data-target="#editCategoryModal{{ $category->id }}">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button type="submit" data-toggle="modal"
                                            data-target="#delete_category_{{ $category->id }}"
                                            class="btn btn-danger btn-sm mb-1">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa danh mục</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST"
                                                  action="{{ route('admin.categories.update', ['category' => $category]) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="category_title">Tiêu đề danh mục</label>
                                                    <input type="text" class="form-control" id="category_title"
                                                           name="name" value="{{ $category->name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="parent_category">Danh mục cha</label>
                                                    <select class="form-control" id="parent_category" name="parent_id">
                                                        <option value="">Danh mục gốc</option>
                                                        @foreach($categories as $newCategory)
                                                            <option value="{{ $newCategory->id }}" @if($category->parent_id == $newCategory->id) selected @endif>{{ $newCategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="delete_category_{{ $category->id }}" class="modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xoá danh mục</h4>
                                        </div>
                                        <form method="POST"
                                              action="{{ route('admin.categories.destroy', ['category' => $category]) }}">
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
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createCategory" action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_title">Tiêu đề danh mục</label>
                        <input type="text" class="form-control" id="category_title" name="name">
                    </div>

                    <div class="form-group">
                        <label for="parent_category">Danh mục cha</label>
                        <select class="form-control" id="parent_category" name="parent_id">
                            <option value="">Danh mục gốc</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                </form>
            </div>
        </div>
    </div>
</div>
