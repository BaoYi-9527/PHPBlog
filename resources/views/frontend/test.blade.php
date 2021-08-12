@extends('frontend.layout.index')

@section('app-css')
    <style>
        /*PC端样式*/
        @media screen {
            .body-container {
                min-height: calc(100vh);
            }

            #certificate-div {
                background-image: url("{{asset('resources/imgs/certificate_lace.png')}}");
                background-size: 50vw 95vh;
                margin-left: 25vw;
                background-repeat: no-repeat;
            }

            #certificate-content {
                position: relative;
                top: 22vh;
                left: 13vw;
                width: 49vh;
                height: 48vh;
            }

            #certificate-content p {
                font-family: Serif, SansSerif, serif;
                text-align: center;
                font-weight: bold;
                padding-bottom: 5px;
                font-size: 1.3em;
            }

            #personal-info-div, #personal-info-img {
                float: left;
                margin-top: 1.2em;
            }

            #personal-info-div {
                font-family: Serif, SansSerif, serif;
                font-size: 0.8em;
                font-weight: bold;
                margin-left: 1.5em;
                line-height: 1.5em;
            }

            #personal-info-img {
                border: 1px solid #C9C9C9;
                padding: 1px;
            }

            #personal-info-img img {
                width: 5em;
                height: 6em;
            }

            #personal-info-div div {
                padding-bottom: 0.2em;
            }

            #certificate-desc-div {
                display: inline-block;
            }

            #certificate-desc-div p {
                font-size: 0.8em;
                margin-top: 1.6em;
                text-align: justify;
                line-height: 1.5em;
                margin-left: 1.5em;
                margin-right: 1.2em;
            }

            #wechat-code-div, #chapter-div {
                float: left;
            }

            #wechat-code-div {
                margin-top: 1.2em;
                margin-left: 1.2em;
                position: absolute;
                padding: 0.8em;
                left: 10%;
                bottom: 2%;
            }

            #wechat-code-div img {
                margin-left: 0.8em;
                height: 5em;
                width: 5em;
            }

            #wechat-code-div div {
                margin-top: 0.2em;
                text-align: center;
                margin-left: 0.8em;
            }

            #chapter-div {
                position: absolute;
                padding: 0.6em;
                left: 50%;
                bottom: 5%;
            }

            #chapter-div div {
                font-size: 0.8em;
                font-weight: bold;
                margin-bottom: 5px;
            }

            #chapter-img {
                width: 20%;
                height: 20%;
                position: absolute;
                left: 60%;
                bottom: 10%;

            }
        }

        @media (max-height: 900px) and (max-width: 1550px) {
            .body-container {
                min-height: calc(100vh);
            }

            #certificate-div {
                background-image: url("{{asset('resources/imgs/certificate_lace.png')}}");
                background-size: 50vw 95vh;
                margin-left: 25vw;
                background-repeat: no-repeat;
            }

            #certificate-content {
                position: relative;
                top: 22vh;
                left: 13vw;
                width: 49vh;
                height: 58vh;
            }

            #certificate-content p {
                font-family: Serif, SansSerif, serif;
                text-align: center;
                font-weight: bold;
                padding-bottom: 5px;
                font-size: 1.3em;
            }

            #personal-info-div, #personal-info-img {
                float: left;
                margin-top: 1.2em;
            }

            #personal-info-div {
                font-family: Serif, SansSerif, serif;
                font-size: 0.8em;
                font-weight: bold;
                margin-left: 1.5em;
                line-height: 1.5em;
            }

            #personal-info-img {
                border: 1px solid #C9C9C9;
                padding: 1px;
            }

            #personal-info-img img {
                width: 5em;
                height: 6em;
            }

            #personal-info-div div {
                padding-bottom: 0.2em;
            }

            #certificate-desc-div {
                display: inline-block;
            }

            #certificate-desc-div p {
                font-size: 0.8em;
                margin-top: 1.6em;
                text-align: justify;
                line-height: 1.5em;
                margin-left: 1.5em;
                margin-right: 1.2em;
            }

            #wechat-code-div, #chapter-div {
                float: left;
            }

            #wechat-code-div {
                margin-top: 1.2em;
                margin-left: 1.2em;
                position: absolute;
                padding: 0.8em;
                left: 10%;
                bottom: 2%;
            }

            #wechat-code-div img {
                margin-left: 0.8em;
                height: 5em;
                width: 5em;
            }

            #wechat-code-div div {
                margin-top: 0.2em;
                text-align: center;
                margin-left: 0.8em;
            }

            #chapter-div {
                position: absolute;
                padding: 0.6em;
                left: 50%;
                bottom: 5%;
            }

            #chapter-div div {
                font-size: 0.8em;
                font-weight: bold;
                margin-bottom: 5px;
            }

            #chapter-img {
                width: 20%;
                height: 20%;
                position: absolute;
                left: 60%;
                bottom: 10%;

            }
        }
        /*移动端样式*/
        @media (max-width: 500px) and (max-height: 700px) {
            #certificate-div {
                background-image: url("{{asset('resources/imgs/certificate_lace.png')}}");
                background-position: center;
                background-size: 120vw 70vh;
                margin-left: 0;
                background-repeat: no-repeat;
                height: calc(100vh);
                width: calc(100vw);
            }

            #certificate-content {
                position: relative;
                top: 32vh;
                left: 22vw;
                width: 57vw;
                height: 40vh;
            }

            #certificate-content p {
                position: relative;
                text-align: center;
                font-weight: bold;
                padding-bottom: 0.3em;
                font-size: 0.5rem;

            }

            #personal-info-div, #personal-info-img {
                float: left;
                margin-top: 2.5em;
            }

            #personal-info-div {
                position: relative;
                font-size: 0.625em;
                font-weight: bold;
                transform: scale(0.6);
                left: -5em;
                top: -4em;
                line-height: 1.8em;
            }

            #personal-info-img {
                border: 1px solid #C9C9C9;
                padding: 1px;
                position: relative;
                bottom: 13em;
                left: 10em;
            }

            #personal-info-img img {
                width: 4em;
                height: 5em;
            }

            #personal-info-div div {
                padding-bottom: 0.2em;
            }

            #certificate-desc-div {
                display: inline-block;
            }

            #certificate-desc-div p {
                font-size: 0.8em;
                margin-top: -2.4em;
                text-align: justify;
                line-height: 2em;
                transform: scale(0.6);
                position: relative;
                bottom: 14em;
                left: -6em;
                width: 26em;
                padding: 0.8em;
            }

            #wechat-code-div, #chapter-div {
                float: left;
            }

            #wechat-code-div {
                margin-top: 0.8em;
                position: absolute;
                padding: 0.8em;
                bottom: -11%;
                left: -8%;
                transform: scale(0.6);
                width: 5em;
                margin-left: 0.8em;
            }

            #wechat-code-div img {
                margin-left: 0.8em;
                height: 4.5em;
                width: 4.5em;
            }

            #wechat-code-div div {
                margin-top: 0.2em;
                text-align: center;
            }

            #chapter-div {
                position: absolute;
                padding: 0.8em;
                margin-left: 0;
                margin-top: 0.2em;
                bottom: -10%;
                transform: scale(0.5);
                left: 23%;
                width: 80%;
            }

            #chapter-div div {
                font-size: 0.8em;
                font-weight: bold;
                margin-bottom: 0.2em;
            }

            #chapter-img {
                width: 2.5em;
                height: 2.5em;
                position: absolute;
                left: 60%;
                bottom: 10%;
            }
        }

    </style>
@endsection

@section('container')
    <div class="body-container" id="certificate-div">
        <div id="certificate-content">
            <p>住房和城乡建设领域</p>
            <p>岗位培训证书</p>
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
            <div id="certificate-desc-div">
                <p>&nbsp;&nbsp;本证书表明持证人已通过相关技能的培训和考核，成绩合格。</p>
            </div>
            <div id="wechat-code-div">
                <img src="{{asset('resources/imgs/code_test.png')}}" alt="">
                <div>欢迎关注</div>
            </div>
            <div id="chapter-div">
                <div style="margin-bottom: 20px">发证单位：安徽省机建服务中心</div>
                <div>发证日期：2021年08月09日</div>
                <div>查询网址：www.baidu.com</div>
            </div>
            <img id="chapter-img" src="{{asset('resources/imgs/chapter_test.png')}}" alt="">
        </div>
    </div>
@endsection

@section('hidden-content')

@endsection

@section('app-js')

@endsection
