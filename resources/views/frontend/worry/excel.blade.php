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
                        <button type="button" class="layui-btn" id="upload-file-button">
                            <i class="layui-icon">&#xe67c;</i>上传文件
                        </button>
                        <button type="button" class="layui-btn layui-btn-danger" id="delete-files-button">
                            <i class="layui-icon">&#xe640;</i>删除全部文件
                        </button>
                        <button type="button" class="layui-btn layui-btn-normal" id="handle-excel-button">
                            <i class="layui-icon">&#xe609;</i>处理生成Excel
                        </button>
                    </div>
                    <div id="files-list-div">
                        <table class="layui-table">
                            <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>文件名</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $key => $file)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$file}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            // 执行上传实例
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

            layer.close(index)
        })

        // 目录清空
        $('#delete-files-button').click(function () {
            $.post('/clear/files', {path: 'worry/excel'}, function (response) {
                if(response.code === 200) {
                    layer.msg('操作成功!',{icon: 5})
                    location.reload()
                } else {
                    layer.msg(response.message,{icon: 6})
                }
            })
        })

        // 处理excel表格
        $('#handle-excel-button').click(function () {
            let index = layer.load(2)
            $.post('/tools/worry/handleExcel', function (response) {
                layer.close(index)
                if(response.code === 200) {
                   window.location.href = response.data.path
                } else {
                    layer.msg(response.message,{icon: 6})
                }
            })
        })
    </script>
@endsection
