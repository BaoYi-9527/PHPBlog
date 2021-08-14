@extends('frontend.layout.master')

@section('app-css')
    <style>
        .article-label-div {
            float: left;
            width: 100%;
            height: 300px;
            position: relative;
            margin: 20px 0 20px;
            border-radius: 10px;
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
            float: left;
            height: 100%;
            overflow: hidden;
        }
        .article-cover  img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
            transition: all .6s;
            border-radius: 0 10px 10px 0;
        }

    </style>
@endsection

@section('container')
    <div class="layui-fluid">
        <div class="layui-row">
            <div class="article-list-container
            layui-col-xs4 layui-col-sm4 layui-col-md6
            layui-col-xs-offset3 layui-col-sm-offset3
            layui-col-md-offset3">
                <div class="article-label-div layui-col-md12">
                    <div class="article-intro layui-col-md6">

                    </div>
                    <div class="article-cover layui-col-md6">
                        <a href="">
                            <img src="{{asset('resources/imgs/covers/python.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="article-label-div layui-col-md12">
                    <div class="article-intro layui-col-md6">

                    </div>
                    <div class="article-cover layui-col-md6">
                        <a href="">
                            <img src="{{asset('resources/imgs/covers/python.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="article-label-div layui-col-md12">
                    <div class="article-intro layui-col-md6">

                    </div>
                    <div class="article-cover layui-col-md6">
                        <a href="">
                            <img src="{{asset('resources/imgs/covers/python.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="article-label-div layui-col-md12">
                    <div class="article-intro layui-col-md6">

                    </div>
                    <div class="article-cover layui-col-md6">
                        <a href="">
                            <img src="{{asset('resources/imgs/covers/python.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('hidden-content')

@endsection

@section('app-js')
    <script type="text/javascript">

    </script>
@endsection
