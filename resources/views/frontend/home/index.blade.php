@extends('layout.master')

@section('app-css')
    <style>
        .layui-fluid {
            padding: 0;
            margin-right: calc(100% - 100vw);
        }
        #layui-fluid-body {
            min-height: calc(100vh - 180px);
        }
        .article-label-div {
            float: left;
            width: 100%;
            height: 300px;
            position: relative;
            margin: 20px 0 20px;
            border-radius: 10px !important;
            background-color: rgba(255,255,255,0);
            box-shadow: 0 1px 20px -6px rgba(0,0,0,.5);
            transition: box-shadow .3s ease;
        }
        .article-label-div:hover {
            box-shadow: 0 5px 10px 5px rgba(110,110,110,.4);
        }
        .article-label-div:hover .article-cover img {
            transform: scale(1.1,1.1);
        }
        .article-label-div > div {
            height: 100%;
            overflow: hidden;
            transform: rotate(0deg);
            -webkit-transform:rotate(0deg);
        }
        .article-list-container .article-label-div:nth-of-type(odd) > div {
            float: right;
        }
        .article-list-container .article-label-div:nth-of-type(odd)  .article-cover {
            border-radius: 10px 0 0 10px;
        }
        .article-list-container .article-label-div:nth-of-type(even) > div {
            float: left;
        }
        .article-list-container .article-label-div:nth-of-type(even)  .article-cover {
            border-radius: 0 10px 10px 0;
        }
        .article-cover  img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
            transition: all .6s;
            /*transform-origin: 0 0;*/
        }
        .article-list-container .article-label-div:nth-of-type(odd) .article-cover  img {
            border-radius: 10px 0 0 10px !important;
        }
        .article-list-container .article-label-div:nth-of-type(even) .article-cover  img {
            border-radius: 0 10px 10px 0 !important;
        }
        .article-poster-content {
            position: relative;
            padding: 10px 20px;
            width: 80%;
            margin: 20px 10px 0;
        }
        .article-poster-content i {
            margin-right: 5px;
        }
        .article-list-container .article-label-div:nth-of-type(even) .article-poster-content div {
            text-align: left;
        }
        .article-list-container .article-label-div:nth-of-type(odd) .article-poster-content div {
            text-align: right;
        }

        .article-poster-content .article-publish-time {
            color: #888;
            font-size: 12px;
            padding-bottom: 15px;
        }
        .article-poster-content .article-title {
            color: #504e4e;
        }
        .article-poster-content .article-title:hover {
            color: #FFB800;
        }
        .article-poster-content .article-meta {
            padding-top: 15px;
            padding-bottom: 15px;
            color: #888;
            font-size: 12px;
        }
        .article-poster-content .article-meta span:nth-child(3):hover {
            color: #FFB800;
        }
        .article-poster-content .article-meta span:nth-child(1), span:nth-child(2) {
            margin-right: 10px;
        }
        .article-poster-content .article-desc {
            color: rgba(0,0,0,.66);
            width: 100%;
            text-align: justify;
        }
        .article-poster-content .article-desc p {
            height: 80px;
            line-height: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
            display:-webkit-box;
            -webkit-box-orient:vertical;
            -webkit-line-clamp:4;
        }
        .article-poster-bottom {
            margin-top: 20px;
        }
        .article-poster-bottom i {
            font-size: 30px;
            color: #666;
        }
        .article-poster-bottom i:hover {
            color: #FFB800;
        }
        .flow-load-span {
            padding: 10px 20px;
            border-radius: 10px;
            border: 1px solid #d6d6d6;
            color: #adadad;
        }
        .flow-load-span:hover {
            border-color: #FE9600;
            color: #FE9600;
            cursor: pointer;
            box-shadow: 0 0 4px rgba(255,165,0,.85);
        }
        .no-more-span {
            color: #adadad;
        }
    </style>
@endsection

@section('container')
    <div class="layui-fluid" id="layui-fluid-body">
        <div class="layui-row">
            <div class="article-list-container
            layui-col-xs4 layui-col-sm4 layui-col-md6
            layui-col-xs-offset3 layui-col-sm-offset3
            layui-col-md-offset3">
                @foreach($articles  as $article)
                    <div class="article-label-div layui-col-md12">
                        <div class="article-intro layui-col-md6">
                            <div class="article-poster-content">
                                <div class="article-publish-time source-han-regular">
                                    <i class="fa fa-clock-o"></i>发布于 {{\Carbon\Carbon::parse($article['created_at'])->toDateString() }}
                                </div>
                                <div>
                                    <a href="{{route('frontend.article.detail',['id' => $article['id']])}}" class="article-title source-han-bold"><h3>{{$article['title']}}</h3></a>
                                </div>
                                <div class="article-meta">
                                    <span><i class="fa fa-eye"></i>{{$article['views']}} 热度</span>
                                    <span><i class="fa fa-commenting"></i>{{$article['comments_count']}} 条评论</span>
                                    <span><i class="fa fa-folder"></i>待开发</span>
                                </div>
                                <div class="article-desc">
                                    <p class="source-han-regular">{{$article['desc']}}</p>
                                </div>
                                <div class="article-poster-bottom">
                                    <a href="{{route('frontend.article.detail',['id' => $article['id']])}}"><i class="fa fa-ellipsis-h"></i></a>
                                </div>

                            </div>
                        </div>
                        <div class="article-cover layui-col-md6">
                            <a href="{{route('frontend.article.detail',['id' => $article['id']])}}">
                                <img src="{{asset($article['cover'])}}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--流加载-->
        <div class="layui-row" style="margin-top: 50px">
            <div class="layui-col-xs4 layui-col-sm4 layui-col-md6
            layui-col-xs-offset3 layui-col-sm-offset3
            layui-col-md-offset3" style="text-align: center">
                    <span class="flow-load-span source-han-regular" page="{{$articles->currentPage()}}" last-page="{{$articles->lastPage()}}"
                         @if($articles->currentPage() >= $articles->lastPage()) hidden @endif>
                        Previous
                    </span>
                    <span class="no-more-span source-han-regular"
                          @if($articles->currentPage() < $articles->lastPage()) hidden @endif>
                        没有更多了...
                    </span>
            </div>
        </div>
    </div>
@endsection

@section('hidden-content')

@endsection

@section('app-js')
    <script type="text/javascript">
        // 流加载
        $('.flow-load-span').click(function () {
            let nextPage = Number($(this).attr('page')) + 1
            $(this).attr('page', nextPage)
            let lastPage = Number($(this).attr('last-page'))
            if(nextPage >= lastPage) {
                $(this).hide()
                $('.no-more-span').show()
            }
            let searchString = location.search
            if(searchString === '') searchString = '?id=1'
            $.get('/article/list' + searchString + '&page=' + nextPage, function (response) {
                if(response !== '') {
                    $('.article-list-container').append(response)
                }
            })
        })
    </script>
@endsection
