@extends('frontend.layout.master')

@section('app-css')
    <!--引入md编辑器CSS样式-->
    <link rel="stylesheet" href="{{asset('packages/editor.md/css/editormd.preview.css')}}">
    <style>
        .article-detail-container {
            /*background-color: #cccccc;*/
            min-height: calc(100vh - 65px);
        }
        #test-editor {
            min-height: calc(100vh - 81px);
        }
        .CodeMirror-gutters {
            height: 100% !important;
        }
        .article-toc-container {
            margin-top: 70px;
            min-height: calc(100vh - 150px);
        }
    </style>
@endsection

@section('container')
    <div class="layui-fluid">
        <div class="layui-row">
            <div class="article-detail-container layui-col-xs4 layui-col-sm4 layui-col-md6
            layui-col-xs-offset4 layui-col-sm-offset4 layui-col-md-offset3">
                <div id="markdown-view-div">
                    <div id="markdown-article-content">
<label for="editor-md-content"></label>
<!--渲染必须从最左边开始 否则会被当做渲染内容一起渲染-->
<textarea name="" id="editor-md-content" class="source-han-regular" style="display: none">
[TOC]

{{$article['content']}}
</textarea>
                    </div>
                </div>

            </div>
            <div class="article-toc-container
            layui-col-xs4 layui-col-sm4 layui-col-md2"
            id="article-toc-container">
            </div>
        </div>
    </div>
@endsection

@section('hidden-content')

@endsection

@section('app-js')
    <!--引入md编辑器JS-->
    <script src="{{asset('packages/editor.md/editormd.js')}}"></script>
    <script src="{{asset('packages/editor.md/lib/marked.min.js')}}"></script>
    <script src="{{asset('packages/editor.md/lib/prettify.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            var testView = editormd.markdownToHTML("markdown-view-div", {
                // markdown : "[TOC]\n### Hello world!\n## Heading 2", // Also, you can dynamic set Markdown text
                // htmlDecode : true,  // Enable / disable HTML tag encode.
                // htmlDecode : "style,script,iframe",  // Note: If enabled, you should filter some dangerous HTML tags for website security.
            });
        });
        $(function () {
            let selector = $('.editormd-markdown-toc')
            let tocHtml = selector.html()
            selector.hide()
            // 更改字体
            $('.markdown-body ').css({
                "font-family": "'source-han-serif-cn-Regular','MicroSoft Yahei',Georgia,serif",
            })
            // 移动TOC-DOM
            $('#article-toc-container').html(tocHtml).css({
                "border-left":"1px solid #ccc"
            }).addClass("source-han-regular")
            $('#article-toc-container ul li').css({
                "margin-left":"15px",
            })
        })
    </script>
@endsection
