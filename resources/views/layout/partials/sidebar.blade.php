<aside>
    <ul class="layui-nav layui-nav-tree" lay-filter="test">
        <!-- 侧边导航: <ul class="layui-nav layui-nav-tree layui-nav-side"> -->
        <li class="layui-nav-item layui-nav-itemed" >
            <a href="#">文章管理</a>
            <dl class="layui-nav-child">
                <dd lay-bar="disabled"><a href="{{route('admin.article.editor')}}">撰写文章</a></dd>
                <dd><a @if(request()->route()->getName() =='admin.article.list') class="layui-nav-a" @endif href="{{route('admin.article.list')}}">文章列表</a></dd>
                <dd><a href="">评论管理</a></dd>
                <dd><a href="">标签管理</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="#">菜单管理</a>
            <dl class="layui-nav-child">
                <dd><a href="">分类菜单</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="">站点管理</a></li>
        <li class="layui-nav-item"><a href="">个人信息</a></li>
    </ul>
</aside>
