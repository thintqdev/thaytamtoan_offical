@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa logo')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Logo cho màn hình admin</h5>
                    </div>
                    <div class="card-body">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label>Tải lên <a href="javascript:void(0)"
                                              class="custom-file-container__image-clear"
                                              title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                       accept="image/*" name="logo_admin" value="">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Logo cho màn hình user</h5>
                    </div>
                    <div class="card-body">
                        <div class="custom-file-container" data-upload-id="mySecondImage">
                            <label>Tải lên <a href="javascript:void(0)"
                                              class="custom-file-container__image-clear"
                                              title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                       accept="image/*" name="logo_front">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary mr-2" type="submit">Lưu lại</button>
                    <button class="btn btn-secondary" type="reset">Nhập lại</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function displayImagePreview(inputName, imagePath) {
                var preview = $(`[name="${inputName}"]`).closest('.custom-file-container').find('.custom-file-container__image-preview');
                preview.html(`<img src="${imagePath}" alt="Preview">`);
            }

            displayImagePreview('logo_admin', '{{$logo_admin->file_path ?? null}}');
            displayImagePreview('logo_front', '{{$logo_front->file_path ?? null}}');
        });
    </script>

@endsection
