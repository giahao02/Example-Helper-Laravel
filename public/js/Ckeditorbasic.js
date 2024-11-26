document.addEventListener("DOMContentLoaded", function() {

    import("https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.js").then(module => {
        const { ClassicEditor, Essentials, Paragraph, Heading, 
                Bold, Italic, Underline, Alignment, Link, BlockQuote, 
                List, Indent, TodoList, Image, ImageToolbar, ImageStyle, 
                ImageResize, ImageUpload, MediaEmbed, Table, TableToolbar, 
                TableProperties, TableCellProperties, SimpleUploadAdapter, Base64UploadAdapter, LinkImage, } = module;


        const editors = document.querySelectorAll('.' + editorClass);
        
        editors.forEach(editor => {
            ClassicEditor
                .create(editor, {
                    plugins: [
                        Essentials, Paragraph, Bold, Italic, Underline,
                        Alignment, Link, BlockQuote, List, Indent, TodoList,
                        Image, ImageToolbar, ImageStyle, ImageResize, ImageUpload, MediaEmbed, 
                        Table, TableToolbar, TableProperties, TableCellProperties, 
                        Base64UploadAdapter, Heading, LinkImage,
                    ],
                    toolbar: {
                        items: [
                            "undo", "redo",
                            "|",
                            "heading",
                            "|",
                            "bold", "italic", "underline", 
                            "|",
                            "alignment",
                            "|",
                            "link", "blockquote", 
                            "|",
                            "bulletedList", "numberedList", "todoList", 
                            "|",
                            "imageUpload", "mediaEmbed",
                            "|",
                            "indent", "outdent",
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    image: {
                        toolbar: [
                            "imageTextAlternative", "imageStyle:inline", "imageStyle:block", "imageStyle:side", 
                            "linkImage"
                        ],
                        styles: [
                            "full", "side", "alignLeft", "alignCenter", "alignRight"
                        ]
                    },
                    // simpleUpload: {
                    //     uploadUrl: "http://example.com", // Đổi URL này theo yêu cầu của bạn
                    //     withCredentials: true,
                    //     headers: {
                    //         "X-CSRF-TOKEN": "CSRF-Token",
                    //         Authorization: "Bearer <JSON Web Token>" // Cập nhật nếu cần
                    //     }
                    // },
                    table: {
                        contentToolbar: [
                            "tableColumn", "tableRow", "mergeTableCells",
                            "tableProperties", "tableCellProperties"
                        ]
                    }
                })
                .then(editorInstance => {
                    window.editor = editorInstance;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    }).catch(error => {
        console.error("Error loading CKEditor:", error);
    });
});
