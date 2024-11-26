class CKEditorLoader {

    constructor(config) {
        this.class = config.class || 'editor';
        this.method = config.method || 'basic';
        this.width = config.width || '100%';
        this.height = config.height || '300px';
    }

    injectStyles() {
        const style = document.createElement('style');
        style.type = 'text/css';
        style.innerHTML = `
            .ck-editor {
                display: inline-block;
                min-width: ${this.width};
            }
            .ck-editor__editable {
                min-height: ${this.height};
            }
        `;
        document.head.appendChild(style);
    }

    loadEditor() {
        this.injectStyles();
        // Tìm tất cả các phần tử có class đã được truyền vào
        const editors = document.querySelectorAll(`.${this.class}`);

        editors.forEach(editor => {
            // Import CKEditor module
            import("https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.js").then(module => {
                const {
                    ClassicEditor,
                    Essentials,
                    Paragraph,
                    Heading,
                    Bold,
                    Italic,
                    Underline,
                    Strikethrough,
                    Subscript,
                    Superscript,
                    Alignment,
                    Link,
                    BlockQuote,
                    List,
                    Indent,
                    TodoList,
                    Image,
                    ImageToolbar,
                    ImageStyle,
                    ImageResize,
                    ImageUpload,
                    MediaEmbed,
                    Table,
                    TableToolbar,
                    TableProperties,
                    TableCellProperties,
                    Font,
                    FontSize,
                    FontFamily,
                    FontColor,
                    FontBackgroundColor,
                    CodeBlock,
                    HorizontalLine,
                    Highlight,
                    HtmlEmbed,
                    PageBreak,
                    SpecialCharacters,
                    Base64UploadAdapter,
                    LinkImage,
                } = module;

                if(this.method === 'advance'){
                    ClassicEditor
                    .create(editor, {
                        plugins: [
                            Essentials, Paragraph, Bold, Italic, Underline, Strikethrough, Subscript, Superscript,
                            Alignment, Link, BlockQuote, List, Indent, TodoList,
                            Image, ImageToolbar, ImageStyle, ImageResize, ImageUpload, MediaEmbed, 
                            Table, TableToolbar, TableProperties, TableCellProperties, 
                            Font, FontSize, FontFamily, FontColor, FontBackgroundColor,
                            CodeBlock, HorizontalLine, Highlight, HtmlEmbed, 
                            PageBreak, SpecialCharacters, Heading, Base64UploadAdapter,  LinkImage,
                        ],
                        toolbar: {
                            items: [
                                "undo", "redo",
                                "|",
                                "heading",
                                "|",
                                "fontFamily", "fontSize", "fontColor", "fontBackgroundColor",
                                "|",
                                "bold", "italic", "underline", "strikethrough", "subscript", "superscript",
                                "|",
                                "alignment",
                                "|",
                                "link", "blockquote", "codeBlock", "horizontalLine", "highlight",
                                "|",
                                "bulletedList", "numberedList", "todoList", 
                                "|",
                                "imageUpload", "mediaEmbed", "insertTable", "htmlEmbed",
                                "|",
                                "indent", "outdent",
                                "|",
                                "pageBreak", "specialCharacters"
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
                        console.error('Error initializing CKEditor:', error);
                    });
                }else{
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
                }
                
            }).catch(error => {
                console.error('Error loading CKEditor:', error);
            });
        });
    }
}

// Tự động khởi tạo và gọi loadEditor nếu tìm thấy config từ PHP
if (typeof CKEDITOR_CONFIG !== 'undefined') {
    const editorLoader = new CKEditorLoader(CKEDITOR_CONFIG);
    editorLoader.loadEditor();
}

// Export class để có thể import từ các file khác
export default CKEditorLoader;
