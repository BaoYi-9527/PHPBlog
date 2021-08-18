@extends('layout.index')

@section('app-css')
    <style>
        html,body, div, p {
            margin: 0;
            padding: 0;
        }
        .body-container {
            font-size: 0.16rem;
            height: 9.1rem;
            width: 9.1rem;
            background-image: url("{{asset('resources/imgs/certificate_lace.png')}}");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            margin: 0 auto;
        }
        #certificate-content {
            padding: 2rem 2rem .2rem;
            overflow: hidden;
        }
        #certificate-content p {
            font-family: Serif, SansSerif, serif;
            text-align: center;
            font-weight: bold;
            font-size: 0.22rem;
            margin: 0.12rem 0;
        }
        #personal-info-div {
            float: left;
            width: 2.8rem;
            font-size: 0.12rem;
            padding-left: 0.50rem;
            margin-top: 0.10rem;
            font-family: Serif, SansSerif, serif;
        }
        #personal-info-div > div {
            padding-bottom: 10px;
            font-weight: bold;
        }
        #personal-info-img {
            width: 1.1rem;
            height: 1.4rem;
            float: left;
            margin-left: -0.1rem;
            margin-top: 0.3rem;
        }
        #personal-info-img img {
            width: 100%;
            height: 100%;
        }
        #certificate-desc-div {
            text-align: center;
            margin-top: .1rem;
        }
        #certificate-desc-div p {
            font-family: Serif, SansSerif, serif;
            font-size: 0.12rem;
        }
        .bottom {
            display: flex;
            margin-top: .5rem;
        }
        #wechat-code-div {
            width: 1.5rem;
            padding-left: 0.7rem;
        }
        #wechat-code-div img {
            width: .6rem;
            height: .6rem;
        }
        #wechat-code-div div {
            font-family: Serif, SansSerif, serif;
            font-size: 0.12rem;
            padding-left: .05rem;
        }
        #chapter-div {
            flex: 1;
            padding-left: .5rem;
            position: relative;
        }
        #chapter-div P {
            margin: 0;
            font-family: Serif, SansSerif, serif;
            font-size: 0.12rem;
            font-weight: bold;
            margin-bottom: 0.05rem;
            text-align: left;
        }
        #chapter-div p:nth-of-type(1) {
            margin-bottom: 0.15rem;
        }
        #chapter-img {
            position: absolute;
            left: 0.85rem;
            top: -0.2rem;
            width: 1rem;
            height: 1rem;
        }
        #chapter-img  img{
            width: 100%;
            height: 100%;
        }

    </style>
@endsection

@section('container')
    <div class="body-container" id="certificate-div">
        <div id="certificate-content">
            <p>住房和城乡建设领域</p>
            <p>岗位培训证书</p>
            <div style="overflow: hidden;">
                <div id="personal-info-div">
                    <div><span>姓&nbsp;&nbsp;名：</span>张三</div>
                    <div><span>性&nbsp;&nbsp;别：</span>男</div>
                    <div><span>身份证号：</span>44820019900312399X</div>
                    <div><span>证书编号：</span>2021080945</div>
                    <div><span>岗位名称：</span>前端工程师</div>
                    <div><span>级&nbsp;&nbsp;别：</span>高级</div>
                    <div><span>发证日期：</span>2021年08月09日</div>
                    <div><span>有效期：</span>2021年08月09日至2026年08月09日</div>
                </div>
                <div id="personal-info-img">
                    <img src="{{asset('resources/imgs/head_test.jpg')}}" alt="">
                </div>
            </div>
            <div id="certificate-desc-div">
                <p>本证书表明持证人已通过相关技能的培训和考核，成绩合格。</p>
            </div>
            <div class="bottom">
                <div id="wechat-code-div">
                    <img src="{{asset('resources/imgs/code_test.png')}}" alt="">
                    <div>欢迎关注</div>
                </div>
                <div id="chapter-div">
                    <p >发证单位：安徽省机建服务中心</p>
                    <p>发证日期：2021年08月09日</p>
                    <p>查询网址：www.baidu.com</p>
                    <div id="chapter-img">
                        <img src="{{asset('resources/imgs/chapter_test.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('hidden-content')

@endsection

@section('app-js')
    <script>
        (function (doc, win) {
            var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function () {
                    var clientWidth = docEl.clientWidth;
                    if (!clientWidth) return;
                    if(clientWidth>=640){
                        docEl.style.fontSize = '100px';
                    }else{
                        docEl.style.fontSize = 100 * (clientWidth / 640) + 'px';
                    }
                };

            if (!doc.addEventListener) return;
            win.addEventListener(resizeEvt, recalc, false);
            doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);
    </script>
@endsection
