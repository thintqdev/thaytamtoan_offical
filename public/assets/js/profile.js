$(document).ready(function () {
    $('#imageInput').change(function () {
        const input = this;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#profileImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
});