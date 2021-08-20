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
