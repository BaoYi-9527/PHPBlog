<div class="top-bar-div layui-fluid">
    <div class="layui-row">
        <!--site name-->
        <div class="layui-col-xs4 layui-col-sm4 layui-col-md2" style="">
            <div class="nav-site-name source-han-bold"><a href="{{route('frontend.home')}}">{{config('app.name')}}</a></div>
        </div>
        <!--nav menu-->
        <div class="layui-col-xs4 layui-col-sm4 layui-col-md8" style="">
            <ul class="layui-nav" lay-filter="">
                @foreach($menus as $menu)
                    <li class="layui-nav-item">
                        <a href="@if(!empty($menu['route'])) {{route($menu['route'],['id' => $menu['id']])}} @endif"><i class="{{$menu['icon_class']}}"></i>{{$menu['name']}}</a>
                        @if(!empty($menu['children']))
                            <dl class="layui-nav-child layui-nav-child-c">
                                @foreach($menu['children'] as $subMenu)
                                    <dd><a href="{{route($subMenu['route'],['id' => $subMenu['id']])}}">{{$subMenu['name']}}</a></dd>
                                @endforeach
                            </dl>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <!--login or search -->
        <div class="layui-col-xs4 layui-col-sm4 layui-col-md2" style="">
            <div class="login-search-div">
{{--                <i class="fa fa-search"></i>--}}
                <span><i class="fa fa-user-circle"></i></span>
            </div>
        </div>
    </div>
</div>
