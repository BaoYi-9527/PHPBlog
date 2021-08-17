@extends('layout.admin')

@section('app-css')
    <!--引入md编辑器CSS样式-->
    <link rel="stylesheet" href="{{asset('packages/editor.md/css/editormd.css')}}">
    <style>
        .article-detail-container {
            min-height: calc(100vh - 65px);
        }
        #article-form-div {
            min-height: 200px;
            padding:20px;
            border-left: 1px solid #eee;
            border-right: 1px solid #eee;
        }
        .layui-form-label {
            width: 100px;
        }
        #article-title-div,#article-desc-div {
            width: 600px;
        }
        #article-title,#article-desc {
            width: 500px;
            border-radius: 5px;
        }
        #article-desc {
            resize: none;
            padding: 10px;
            height: 80px;
            max-height: 80px;
        }
        #article-desc::-webkit-scrollbar-thumb {
            background-color: #888 !important;
        }

        #markdown-editor {
            min-height: calc(100vh - 81px);
        }
        .CodeMirror-gutters {
            height: 100% !important;
        }
        #upload-img-button {
            display: inline;
            margin-right: 10px;
        }
        #publish-article-button {
            display: inline;
        }
    </style>
@endsection

@section('container')
    <main>
        <div class="layui-fluid">
            <div class="layui-row">
                <div class="article-detail-container layui-col-xs12 layui-col-sm12 layui-col-md12">
                    <div id="article-form-div">
                        <form action="" class="layui-form source-han-regular">
                            <div class="layui-form-item">
                                <div class="layui-inline" id="article-title-div">
                                    <label for="article-title" class="layui-form-label">文章标题：</label>
                                    <div class="layui-input-inline">
                                        <input class="layui-input" value="{{$article['title']}}" type="text" id="article-title" name="title" placeholder="请输入文章标题...">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label for="article-status" class="layui-form-label">文章状态：</label>
                                    <div class="layui-input-inline">
                                        <select name="status" id="article-status" class="layui-input">
                                            @foreach(\App\Constant\Article::STATUS_LIST as $key => $value)
                                                <option @if($article['status'] == $key) selected @endif value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label for="article-is-top" class="layui-form-label">是否置顶：</label>
                                    <div class="layui-input-inline">
                                        <select name="is_top" id="article-is-top" class="layui-input">
                                            <option @if($article['is_top'] == 0) selected @endif value="0">否</option>
                                            <option @if($article['is_top'] == 1) selected @endif value="1">是</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline">
                                        <button type="button" class="layui-btn layui-btn-primary" id="upload-img-button" img-url="">
                                            <i class="layui-icon">&#xe67c;</i>上传封面图
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-inline" id="article-desc-div">
                                    <label for="article-desc" class="layui-form-label">文章描述：</label>
                                    <div class="layui-input-inline">
                                        <textarea name="desc" id="article-desc" class="layui-input" placeholder="请输入文章描述...">{{$article['desc']}}</textarea>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label for="article-label" class="layui-form-label">所属标签：</label>
                                    <div class="layui-input-inline">
                                        <select name="label_id" id="article-label" class="layui-input">
                                            <option @if($article['label_id'] == 0) selected @endif value="">待开发</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label for="article-cate" class="layui-form-label">菜单分类：</label>
                                    <div class="layui-input-inline">
                                        <select name="cate_id" id="article-cate" class="layui-input">
                                            <option @if($article['cate_id'] == 0) selected @endif value="">待开发</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline">
                                        <button type="button" class="layui-btn layui-btn-warm" article-id="{{$article['id']}}" id="publish-article-button">发布文章</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="markdown-editor">
                        <label for="editor-md-content"></label>
<textarea name="" id="editor-md-content" style="display: none">
{{$article['content']}}
</textarea>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection

@section('hidden-content')

@endsection

@section('app-js')
    <!--引入md编辑器JS-->
    <script src="{{asset('packages/editor.md/editormd.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            var editor = editormd("markdown-editor", {
                width  : "100%",
                height : "100%",
                path   : "/packages/editor.md/lib/",
                saveHTMLToTextarea: true
            });

            // 发布文章
            $('#publish-article-button').click(function () {
                let articleId = $(this).attr('article-id')
                let imgURL =  $('#upload-img-button').attr('img-url')
                let formString = $('#article-form-div>form').serialize()
                let markdownCode = editor.getMarkdown()
                let data = formString + '&markdown_code=' + markdownCode + '&cover=' + imgURL + '&id=' + articleId
                request('publish','POST',data)
            })
        });

        // 文件上传
        layui.use('upload', function () {
            let index = layer.load(2)
            let upload = layui.upload
            // 数据excel上传
            upload.render({
                elem: '#upload-img-button',
                url: '/upload/file',
                exts: 'jpg|png|gif|bmp|jpeg',
                data: {path: 'images/cover'},
                multiple: true,
                done: function (response) {
                    if(response.code === 200) {
                        let imgUrl = location.origin + '/' + response.data.path
                        $('#upload-img-button').attr('img-url',imgUrl)
                        layer.msg('上传成功',{icon:6})
                    } else {
                        layer.msg('上传失败',{icon:5})
                    }
                }
            })

            layer.close(index)
        })

    </script>
@endsection
