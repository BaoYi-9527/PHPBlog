<!DOCTYPE html>
<html lang="zh-CN">
    <!--head-->
    @include('frontend.layout.partials.header')
    <!--页面css加载区域-->
    @yield('app-css')
    <body>
    <!--顶栏-->
    @include('frontend.layout.partials.topBar')
    <!--内容主体-->
    @yield('container')
    <!--隐藏区域(弹窗等)-->
    @yield('hidden-content')
    <!--公共js脚本加载区域-->
    @include('frontend.layout.partials.script')
    <!--页面js脚本加载区域-->
    @yield('app-js')
    </body>
</html>
