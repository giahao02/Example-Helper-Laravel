<?php
namespace App\Helpers;

use Psy\Readline\Hoa\Console;

class CKEditorHelper
{
    private static CKEditorHelper $instance;

    private function __construct()    {
    }

    public static function getInstance(): CKEditorHelper
    {
        if (!isset(self::$instance)) {
            self::$instance = new CKEditorHelper();
        }
        return self::$instance;
    }
    
    // string $method='basic', string $width='100%' , string $height='100px'
    public function process(array $args=[])
    {   
        // if (method_exists($this, $args['method'])) {
        //     return $this->{$args['method']}($args);
        // }

        // throw new \Exception("Method {$args['method']} does not exist.");

        $args['class'] = $args['class'] ?? 'editor';
        $args['method'] = $args['method'] ?? 'basic';
        $args['width'] = $args['width'] ?? '100%';
        $args['height'] = $args['height'] ?? '300px';
        // if(method_exists($this, $args['method'])){
        //     return $this->{$args['method']}($args);
        // }

        $argsJson = json_encode($args);

        return '
            <script>
                var CKEDITOR_CONFIG = '.$argsJson.';
            </script>
            <script type="module" src="'.asset('js/Ckeditor.js').'"></script>
        ';
    }

    // old ver change to js
    // private function test(array $args): string
    // {
    //     return '
    //     <style>
    //         .ck-editor {
    //             display: inline-block;
    //             min-width: '.$args['width'].';
    //         }
    //         .ck-editor__editable {
    //             min-height: '.$args['height'].';
    //         } 
    //     </style>
    //     <script src="https://cdn.ckeditor.com/ckfinder/3.7.0/ckfinder.js"></script>
    //     <script type="importmap">
    //         {
    //             "imports": {
    //                 "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.js",
    //                 "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.1.1/"
    //             }
    //         }
    //     </script>
    //     <script type="module" src="'.asset('js/Ckeditor'.$args['method'].'.js').'"></script>
    // ';
    // }

    // private function basic(array $args): string
    // {
    //     return '
    //        <style>
    //             .ck-editor {
    //                 display: inline-block;
    //                 min-width: '.$args['width'].';
                    
    //             }
    //             .ck-editor__editable{
    //                 min-height: '.$args['height'].';
    //             } 
    //         </style>
    //         <script src="https://cdn.ckeditor.com/ckfinder/3.7.0/ckfinder.js"></script>
    //         <script type="importmap">
    //             {
    //                 "imports": {
    //                     "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.js",
    //                     "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.1.1/"
    //                 }
    //             }
    //         </script>
    //         <script type="module">
    //         import {
    //             ClassicEditor,
    //             Essentials,
    //             Paragraph,
    //             Heading,
    //             Bold,
    //             Italic,
    //             Underline,
    //             Alignment,
    //             Link,
    //             BlockQuote,
    //             List,
    //             Indent,
    //             TodoList,
    //             Image,
    //             ImageToolbar,
    //             ImageStyle,
    //             ImageResize,
    //             ImageUpload,
    //             MediaEmbed,
    //             Table,
    //             TableToolbar,
    //             TableProperties,
    //             TableCellProperties,
    //             LinkImage,
    //             Base64UploadAdapter,

    //         } from "ckeditor5";
        
    //         document.addEventListener("DOMContentLoaded", function() {
    //             var editors = document.querySelectorAll(".'.$args['class'].'");
    //             editors.forEach(function(editor) {
    //                 ClassicEditor
    //                     .create(editor, {
                            
    //                         plugins: [
    //                             Essentials, Paragraph, Bold, Italic, Underline,
    //                             Alignment, Link, BlockQuote, List, Indent, TodoList,
    //                             Image, ImageToolbar, ImageStyle, ImageResize, ImageUpload, MediaEmbed, 
    //                             Table, TableToolbar, TableProperties, TableCellProperties, 
    //                             Heading, Base64UploadAdapter, LinkImage,
    //                         ],
    //                         toolbar: {
    //                             items: [
    //                                 "undo", "redo",
    //                                 "|",
    //                                 "heading",
    //                                 "|",
    //                                 "bold", "italic", "underline", 
    //                                 "|",
    //                                 "alignment",
    //                                 "|",
    //                                 "link", "blockquote", 
    //                                 "|",
    //                                 "bulletedList", "numberedList", "todoList", 
    //                                 "|",
    //                                 "imageUpload", "mediaEmbed",
    //                                 "|",
    //                                 "indent", "outdent",

    //                             ],
    //                             shouldNotGroupWhenFull: true
    //                         },
                            
    //                         image: {
    //                             toolbar: [
    //                                 "imageTextAlternative", "imageStyle:inline", "imageStyle:block", "imageStyle:side", 
    //                                 "linkImage"
    //                             ],
    //                             styles: [
    //                                 "full", "side", "alignLeft", "alignCenter", "alignRight"
    //                             ],
                                 
    //                         },

    //                         table: {
    //                             contentToolbar: [
    //                                 "tableColumn", "tableRow", "mergeTableCells",
    //                                 "tableProperties", "tableCellProperties"
    //                             ]
    //                         }
    //                     })
    //                     .then(editorInstance => {
    //                         window.editor = editorInstance;
    //                     })
    //                     .catch(error => {
    //                         console.error(error);
    //                     });
    //             });
    //         });
    //     </script>
    //     ';
    // }

//     private function advance(array $args): string
//     {
//         return '
//            <style>
//                 .ck-editor {
//                     display: inline-block;
//                     min-width: '.$args['width'].';
                    
//                 }
//                 .ck-editor__editable{
//                     min-height: '.$args['height'].';
//                 } 
//             </style>
//             <script type="importmap">
//                 {
//                     "imports": {
//                         "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.js",
//                         "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.1.1/"
//                     }
//                 }
//             </script>
//             <script type="module">
//             import {
//                 ClassicEditor,
//                 Essentials,
//                 Paragraph,
//                 Heading,
//                 Bold,
//                 Italic,
//                 Underline,
//                 Strikethrough,
//                 Subscript,
//                 Superscript,
//                 Alignment,
//                 Link,
//                 BlockQuote,
//                 List,
//                 Indent,
//                 TodoList,
//                 Image,
//                 ImageToolbar,
//                 ImageStyle,
//                 ImageResize,
//                 ImageUpload,
//                 MediaEmbed,
//                 Table,
//                 TableToolbar,
//                 TableProperties,
//                 TableCellProperties,
//                 Font,
//                 FontSize,
//                 FontFamily,
//                 FontColor,
//                 FontBackgroundColor,
//                 CodeBlock,
//                 HorizontalLine,
//                 Highlight,
//                 HtmlEmbed,
//                 PageBreak,
//                 SpecialCharacters,
//                 Base64UploadAdapter,
//                 LinkImage,
//             } from "ckeditor5";
        
//             document.addEventListener("DOMContentLoaded", function() {
//                 var editors = document.querySelectorAll(".'.$args['class'].'");
//                 editors.forEach(function(editor) {
//                     ClassicEditor
//                         .create(editor, {
//                             plugins: [
//                                 Essentials, Paragraph, Bold, Italic, Underline, Strikethrough, Subscript, Superscript,
//                                 Alignment, Link, BlockQuote, List, Indent, TodoList,
//                                 Image, ImageToolbar, ImageStyle, ImageResize, ImageUpload, MediaEmbed, 
//                                 Table, TableToolbar, TableProperties, TableCellProperties, 
//                                 Font, FontSize, FontFamily, FontColor, FontBackgroundColor,
//                                 CodeBlock, HorizontalLine, Highlight, HtmlEmbed, 
//                                 PageBreak, SpecialCharacters, Heading, Base64UploadAdapter, LinkImage,
//                             ],
//                             toolbar: {
//                                 items: [
//                                     "undo", "redo",
//                                     "|",
//                                     "heading",
//                                     "|",
//                                     "fontFamily", "fontSize", "fontColor", "fontBackgroundColor",
//                                     "|",
//                                     "bold", "italic", "underline", "strikethrough", "subscript", "superscript",
//                                     "|",
//                                     "alignment",
//                                     "|",
//                                     "link", "blockquote", "codeBlock", "horizontalLine", "highlight",
//                                     "|",
//                                     "bulletedList", "numberedList", "todoList", 
//                                     "|",
//                                     "imageUpload", "mediaEmbed", "insertTable", "htmlEmbed",
//                                     "|",
//                                     "indent", "outdent",
//                                     "|",
//                                     "pageBreak", "specialCharacters"
//                                 ],
//                                 shouldNotGroupWhenFull: true
//                             },
//                             image: {
//                                 toolbar: [
//                                     "imageTextAlternative", "imageStyle:inline", "imageStyle:block", "imageStyle:side", 
//                                     "linkImage"
//                                 ],
//                                 styles: [
//                                     "full", "side", "alignLeft", "alignCenter", "alignRight"
//                                 ]
//                             },
//                             table: {
//                                 contentToolbar: [
//                                     "tableColumn", "tableRow", "mergeTableCells",
//                                     "tableProperties", "tableCellProperties"
//                                 ]
//                             }
//                         })
//                         .then(editorInstance => {
//                             window.editor = editorInstance;
//                         })
//                         .catch(error => {
//                             console.error(error);
//                         });
//                 });
//             });
//         </script>
//         ';
//     }
}
// class CkeditorHelper1{

//     public static function classicEditor($name){
        
        
//         return "hello ". $name . " goodday!";
//     }

// }

// hlpCkeditor->process('advance',['editor','70%', '100px']);
