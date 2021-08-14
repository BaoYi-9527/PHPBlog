<div class="top-bar-div layui-fluid">
    <div class="layui-row">
        <!--site name-->
        <div class="layui-col-xs4 layui-col-sm4 layui-col-md2" style="">
            <div class="nav-site-name source-han-bold"><a href="">{{config('app.name')}}</a></div>
        </div>
        <!--nav menu-->
        <div class="layui-col-xs4 layui-col-sm4 layui-col-md8" style="">
            <ul class="layui-nav" lay-filter="">
                <li class="layui-nav-item"><a href=""><i class="fa fa-flag"></i>首页</a></li>
                <li class="layui-nav-item"><a href=""><i class="fa fa-cube"></i>大前端</a></li>
                <li class="layui-nav-item">
                    <a href=""><i class="fa fa-code"></i>编程语言</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">PHP</a></dd>
                        <dd><a href="">Golang</a></dd>
                        <dd><a href="">Python</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href=""><i class="fa fa-database"></i>数据库技术</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">MySQL</a></dd>
                        <dd><a href="">Redis</a></dd>
                        <dd><a href="">ElasticSearch</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href=""><i class="fa fa-tasks"></i>计算机基础</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">网络协议</a></dd>
                        <dd><a href="">操作系统</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href=""><i class="fa fa-coffee"></i>闲言碎语</a>
                </li>
            </ul>
        </div>
        <!--login or search -->
        <div class="layui-col-xs4 layui-col-sm4 layui-col-md2" style="">
            <div class="login-search-div">
{{--                <i class="fa fa-search"></i>--}}
                <i class="fa fa-user-circle"></i>
            </div>
        </div>
    </div>
</div>
