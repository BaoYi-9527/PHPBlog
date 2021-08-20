@extends('layout.index')

@section('app-css')
    <style>
        html,body, div, p {
            margin: 0;
            padding: 0;
        }
        #body-container {
            text-align: center;
        }
        li {
            height: 100px;
        }
    </style>
@endsection

@section('container')
    <div id="body-container">
        <ul id="demo">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>
    </div>
@endsection

@section('hidden-content')

@endsection

@section('app-js')
    <script>
        // 列表流加载
        layui.use('flow', function () {
            let flow = layui.flow
            flow.load({
                elem: '#demo' //流加载容器
                ,isAuto: false
                ,done: function(page, next){ //加载下一页
                    // 模拟插入
                    let list = []
                    let searchString = location.search
                    if(searchString === '') searchString = '?id=1&is_flow=1'
                    $.get('/article/list' + searchString + '&page=' + page, function (response) {
                        console.log(page)
                        console.log(response)
                        if(response !== '') {
                            list.push(response)
                        } else {
                            next(list.join(''),false)
                        }

                    })
                }
            });
        })
    </script>
@endsection
