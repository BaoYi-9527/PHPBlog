<!DOCTYPE html>
<html lang="zh-CN">
    <!--head-->
    @include('layout.partials.header')
    <!--admin-公用css引入-->
    <link rel="stylesheet" href="{{asset('resources/css/admin/common.css')}}">
    <!--页面css加载区域-->
    @yield('app-css')
    <body>
    <!--顶栏-->
    @include('layout.partials.topBar')
    <!--侧边栏-->
    @include('layout.partials.sidebar')
    <!--内容主体-->
    @yield('container')
    <!--隐藏区域(弹窗等)-->
    @yield('hidden-content')
    <!--公共js脚本加载区域-->
    @include('layout.partials.script')
    <!--admin视图公共js脚本加载区域-->
    @include('layout.partials.admin_script')
    <!--页面js脚本加载区域-->
    @yield('app-js')
    </body>
</html>
