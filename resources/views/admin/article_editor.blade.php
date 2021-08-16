@extends('frontend.layout.master')

@section('app-css')
    <!--引入md编辑器CSS样式-->
    <link rel="stylesheet" href="{{asset('packages/editor.md/css/editormd.css')}}">
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
    </style>
@endsection

@section('container')
    <div class="layui-fluid">
        <div class="layui-row">
            <div class="article-detail-container
            layui-col-xs12 layui-col-sm12 layui-col-md10
            layui-col-xs-offset0 layui-col-sm-offset0
            layui-col-md-offset1">
                <div id="test-editor">
                    <label for="editor-md-content"></label>
                    <textarea name="" id="editor-md-content" style="display: none"></textarea>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('hidden-content')

@endsection

@section('app-js')
    <!--引入md编辑器JS-->
    <script src="{{asset('packages/editor.md/editormd.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            var editor = editormd("test-editor", {
                width  : "100%",
                height : "100%",
                // autoHeight: true,
                path   : "/packages/editor.md/lib/"
            });
        });
    </script>
@endsection
