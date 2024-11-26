document.addEventListener("DOMContentLoaded", function() {

    import("ckeditor5").then(module => {
        const { ClassicEditor,
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
            LinkImage, } = module;


        // const className = 'editor'; 
        // const editors = document.querySelectorAll(`.${className}`); 
        // const editors = document.querySelectorAll(`.${editorClass}`);
        const editors = document.querySelectorAll('.' + editorClass);
        
        editors.forEach(editor => {
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
                    console.error(error);
                });
        });
    }).catch(error => {
        console.error("Error loading CKEditor:", error);
    });
});
