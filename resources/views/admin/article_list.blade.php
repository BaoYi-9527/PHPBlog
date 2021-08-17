@extends('layout.admin')

@section('app-css')
    <style>
        .article-edit-button a:hover {
            color: #FE9600;
            cursor: pointer;
        }
        .article-delete-button a:hover {
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
                                <th>标题</th>
                                <th>状态</th>
                                <th>置顶</th>
                                <th>标签</th>
                                <th>分类菜单</th>
                                <th>浏览量</th>
                                <th>评论数</th>
                                <th>发布时间</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody class="source-han-regular">
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article['title']}}</td>
                                    <td>{{$article['status']}}</td>
                                    <td>{{$article['is_top'] ? "是" : "否"}}</td>
                                    <td>{{$article['label_id']}}</td>
                                    <td>{{$article['cate_id']}}</td>
                                    <td>{{$article['views']}}</td>
                                    <td>{{$article['comments_count']}}</td>
                                    <td>{{$article['created_at']}}</td>
                                    <td>{{$article['updated_at']}}</td>
                                    <td>
                                        <span class="article-edit-button">
                                            <a href="{{route('admin.article.update',['id' => $article['id']])}}">编辑</a>
                                        </span>
                                        <span class="article-delete-button" article-id="{{$article['id']}}">
                                            <a href="">删除</a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$articles->links('vendor.pagination.bootstrap-4')}}
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
