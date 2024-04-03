$(document).ready(function () {

    $('input[name="type"]').change(function () {
        if (this.value === '0') {
            $('#examTime').hide();
        } else {
            $('#examTime').show();
        }
    });
    $('.question-image-input').on('change', function () {
        var previewID = $(this).data('preview');
        var preview = $(previewID + ' img');
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.attr('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });
});

$('#total-question').on('change', function () {
    var totalQuestions = $(this).val();
    var imageDropzone = $('#image-dropzone');

    imageDropzone.empty();

    for (var i = 1; i <= totalQuestions; i++) {
        var imageFormGroup = $('<div class="form-group">');
        var label = $('<label>Câu ' + i + '</label>');
        var imageInput = $('<input type="file" class="form-control" name="question_images[]" accept="image/*">');

        var imagePreview = $('<div class="image-preview" id="image-preview-' + i + '"></div>');



        imageFormGroup.append(label);
        imageFormGroup.append(imageInput);
        imageFormGroup.append(imagePreview);
        imageDropzone.append(imageFormGroup);

        imageInput.change(function(event) {
            var previewId = $(this).data('preview');
            var preview = $("#" + previewId);
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.html('<img src="' + e.target.result + '" alt="Hình ảnh xem trước" style="width: 100%">');
                };
                reader.readAsDataURL(file);
            } else {
                preview.empty();
            }
        });

        imageInput.data('preview', 'image-preview-' + i);
        var labelRadioText = $('<label>Chọn đáp án đúng:</label>');
        imageFormGroup.append(labelRadioText);
        for (var j = 0; j < 4; j++) {
            var labelChars = String.fromCharCode(65 + j);
            var radioInput = $('<input type="radio" class="answer-radio" name="right_answers_' + i  + '" value="' + labelChars + '">');
            var radioLabel = $('<label class="answer-label col-md-2">' + labelChars + '</label>');
            imageFormGroup.append(radioInput);
            imageFormGroup.append(radioLabel);
        }
    }
});
