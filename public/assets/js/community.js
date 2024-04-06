$(document).ready(function () {
//   Khởi tạo ckeditor 5 bằng jquery và cài đặt một số thuộc tính
    ClassicEditor.create(document.querySelector('#question_content'), {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'outdent',
                'indent',
                '|',
                'blockQuote',
                'insertTable',
                'imageUpload',
                'undo',
                'redo'
            ]
        },
        language: 'vi',
        image: {
            toolbar: [
                'imageTextAlternative',
                'imageStyle:full',
                'imageStyle:side'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
        
    }).then(editor => {
        window.editor = editor;
    }).catch(error => {
        console.error('There was a problem initializing the editor.', error);
    });
});
