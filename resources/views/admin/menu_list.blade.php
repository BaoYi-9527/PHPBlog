@extends('layout.admin')

@section('app-css')
    <style>
        .menu-edit-button a:hover {
            color: #FE9600;
            cursor: pointer;
        }
        .menu-delete-button a:hover {
            color: #FF5722;
            cursor: pointer;
        }
        .layui-table {
            text-align: left;
        }
    </style>
@endsection

@section('container')
    <main>
        <div class="layui-fluid">
            <div class="layui-row">
                <div class="article-list-container layui-col-xs12 layui-col-sm12 layui-col-md12">
                    <table class="layui-table" lay-even lay-skin="line" lay-size="lg">
                        <thead class="source-han-bold">
                        <tr>
                            <th>菜单名称</th>
                            <th>状态</th>
                            <th>类型</th>
                            <th>图标</th>
                            <th>路由</th>
                            <th>url</th>
                            <th>发布时间</th>
                            <th>更新时间</th>
                            <th>删除时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody class="source-han-regular">
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{$menu['name']}}</td>
                                <td>{{\App\Constant\Menu::STATUS_LIST[$menu['status']] ?? '-'}}</td>
                                <td>{{\App\Constant\Menu::LEVEL_LIST[$menu['level']] ?? '-'}}</td>
                                <td><i class="{{$menu['icon_class']}}"></i></td>
                                <td>{{$menu['route']}}</td>
                                <td>{{$menu['url']}}</td>
                                <td>{{$menu['created_at']}}</td>
                                <td>{{$menu['updated_at']}}</td>
                                <td>{{$menu['deleted_at']}}</td>
                                <td>操作</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$menus->links('vendor.pagination.bootstrap-4')}}
                </div>
            </div>
        </div>
    </main>
@endsection

@section('hidden-content')

@endsection

@section('app-js')
    <script type="text/javascript">

    </script>
@endsection
