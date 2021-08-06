@extends('frontend.layout.index')

@section('app-css')
    <style>
        .body-container {
            background-color: #EDEFF2;
            min-height: calc(100vh);
        }
        #middle-container {
            min-height: calc(100vh);
            background-color: white;
        }
        #middle-container .container-title {
            text-align: center;
            padding: 10px 0 10px 0;
            font-weight: bold;
        }
        #excel-handle-div {
            padding: 20px;
            text-align: center;
        }
        .layui-btn+.layui-btn {
             margin-left: 0;
        }
        #files-list-div {
            padding: 0 10px 0 10px;
        }
        #delete-files-button {
            float: right;
            border: 1px solid #FF5722;;
            color: white;
            line-height: 28px;
        }
    </style>
@endsection

@section('container')
    <div class="body-container layui-fluid">
        <div class="layui-row">
            <div class="layui-col-xs2 layui-col-sm2 layui-col-md2">&nbsp;</div>
            <div class="layui-col-xs8 layui-col-sm8 layui-col-md8" id="middle-container">
                <div class="layui-col-xs12 layui-col-sm12 layui-col-md12">
                    <h1 class="container-title">Worry’s Excel Tools</h1>
                    <div id="excel-handle-div">
                        <button type="button" class="layui-btn layui-btn-warm" id="upload-config-button">
                            <i class="layui-icon">&#xe716;</i>上传配置文件
                        </button>
                        <button type="button" class="layui-btn" id="upload-file-button">
                            <i class="layui-icon">&#xe67c;</i>上传文件
                        </button>
{{--                        <button type="button" class="layui-btn layui-btn-danger" id="delete-files-button">--}}
{{--                            <i class="layui-icon">&#xe640;</i>删除全部文件--}}
{{--                        </button>--}}
                        <button type="button" class="layui-btn layui-btn-normal" id="handle-excel-button">
                            <i class="layui-icon">&#xe609;</i>处理生成Excel
                        </button>
                    </div>
                    <hr>
                    <div id="files-list-div">
                        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                            <ul class="layui-tab-title">
                                <li @if(request('type',1) == 1) class="layui-this" @endif type="1">配置文件</li>
                                <li @if(request('type',1) == 2) class="layui-this" @endif type="2">数据文件</li>
                                <li @if(request('type',1) == 3) class="layui-this" @endif type="3">生成文件</li>
                                <button type="button" class="layui-btn-sm layui-btn-danger" id="delete-files-button">
                                    <i class="layui-icon">&#xe640;</i>删除全部文件
                                </button>
                            </ul>
                            <div class="layui-tab-content">
                                <table class="layui-table">
                                    <thead>
                                    <tr>
                                        <th>序号</th>
                                        <th>文件名</th>
                                        @if(request('type',1) == 3)
                                        <th>下载地址</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($files as $key => $file)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$file}}</td>
                                            @if(request('type',1) == 3)
                                               <td><a href="{{asset($file)}}">下载</a></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-xs2 layui-col-sm2 layui-col-md2">&nbsp;</div>
        </div>
    </div>
@endsection

@section('hidden-content')

@endsection

@section('app-js')
    <script type="text/javascript">
        // 文件上传
        layui.use('upload', function () {
            let index = layer.load(2)
            let upload = layui.upload
            // 数据excel上传
            upload.render({
                elem: '#upload-file-button',
                url: '/upload/file',
                exts: 'xlsx',
                data: {path: 'worry/excel', suffix: '.csv.xlsx'},
                multiple: true,
                done: function (response) {
                    location.reload()
                }
            })

            // 配置excel上传
            upload.render({
                elem: '#upload-config-button',
                url: '/upload/file',
                exts: 'xlsx',
                data: {path: 'worry/config', suffix: '.xlsx'},
                multiple: true,
                done: function (response) {
                    let loadIndex = layer.load(2)
                    if(response.code === 200) {
                        $.post('/tools/worry/loadConfig',function (res) {
                            layer.close(loadIndex)
                           if(res.code === 200) {
                               layer.msg('配置缓存成功，12小时后过期!',{icon: 6, time: 2000}, function () {
                                   location.reload()
                               })
                           } else {
                               layer.msg(res.message, {icon: 6, time: 2000})
                           }
                        })
                    } else {
                        layer.msg(response.message,{icon: 6})
                    }

                }
            })
            layer.close(index)
        })

        // 目录清空
        $('#delete-files-button').click(function () {
            let pathObj = {1: 'worry/config', 2: 'worry/excel', 3: 'worry/export'}
            let type = Number($(this).siblings('.layui-this').attr('type'))
            let path = pathObj[type]
            $.post('/clear/files', {path: path}, function (response) {
                if(response.code === 200) {
                    layer.msg('操作成功!',{icon: 6})
                    location.reload()
                } else {
                    layer.msg(response.message,{icon: 5})
                }
            })
        })

        // 处理excel表格
        $('#handle-excel-button').click(function () {
            let index = layer.load(2)
            $.post('/tools/worry/handleExcel', function (response) {
                layer.close(index)
                if(response.code === 200) {
                    layer.msg('请点击"生成文件"标签下载处理好的文件',{icon: 6})
                } else {
                    layer.msg(response.message,{icon: 5})
                }
            })
        })

        // 标签切换数据
        $('.layui-tab-title li').click(function () {
            let type = $(this).attr('type')
            let isThis = $(this).hasClass('layui-this')
            if(!isThis) {
                window.location.href = location.origin + location.pathname + '?type=' + type
            }
        })
    </script>
@endsection
