@extends('layout.master')

@section('app-css')
    <!--引入md编辑器CSS样式-->
    <link rel="stylesheet" href="{{asset('packages/editor.md/css/editormd.preview.css')}}">
    <!--引入代码高亮CSS样式-->
    <link rel="stylesheet" href="{{asset('packages/highlight/styles/monokai-sublime.min.css')}}">
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
            margin-top: 200px;
            min-height: calc(100vh - 270px);
        }
        a:hover {
            color: #FFB800 !important;
        }
        #article-info-div {
            max-height: 200px;
            overflow: hidden;
            position: relative;
        }
        .article-cover img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            pointer-events: none;
        }
        .article-head {
            position: absolute;
            top: 80px;
            color: #fff;
            width: 100%;
        }
        .article-head h2 {
            text-align: center;
            padding-bottom: 10px;
        }
        .article-head p {
            text-align: center;
        }
        /*md编辑器样式调整*/
        .article-detail-container li {
            list-style-type: decimal !important;
        }
        pre {
            background-color: #23241f !important;
        }
        pre li {
            background-color:  #23241f !important;
        }
    </style>
@endsection

@section('container')
    <div class="layui-fluid">
        <div class="layui-row">
            <div class="article-detail-container layui-col-xs4 layui-col-sm4 layui-col-md6
            layui-col-xs-offset4 layui-col-sm-offset4 layui-col-md-offset3">
                <div id="article-info-div">
                    <div class="article-cover">
                        <img src="{{$article['cover']}}" alt="">
                    </div>
                    <div class="article-head source-han-regular">
                        <h2>{{$article['title']}}</h2>
                        <p>
                            <span style="margin-left: 10px">{{\Illuminate\Support\Carbon::parse($article['created_at'])->toDateString()}}</span>
                            <span>· {{$article['views']}} 次阅读</span>
                        </p>

                    </div>
                </div>
                <div id="markdown-view-div">
                    <div id="markdown-article-content">
<label for="editor-md-content"></label>
<!--渲染必须从最左边开始 否则会被当做渲染内容一起渲染-->
<textarea name="" id="editor-md-content" class="source-han-regular" style="display: none">
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
    <!--代码高亮引入JS-->
    <script src="{{asset('packages/highlight/highlight.min.js')}}"></script>
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
            // 代码高亮
            hljs.highlightAll();
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
