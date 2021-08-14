<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--网页宽度自适应手机屏幕-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no, email=no"/>
    <title>{{config('app.name')}}</title>
    <meta name="format-detection" content="telephone=no">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--引入font-awesome.css-->
    <link rel="stylesheet" href="{{asset('packages/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--引入layui.css-->
    <link rel="stylesheet" href="{{asset('packages/layui/css/layui.css')}}">
    <!--引入公共的css文件-->
    <link rel="stylesheet" href="{{asset('resources/css/frontend/common.css')}}">
    <!--引入layui.js-->
    <script src="{{asset('packages/layui/layui.js')}}"></script>


</head>
