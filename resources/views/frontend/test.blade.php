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
                font-size: 22px;
            }
            #personal-info-div,#personal-info-img {
                float: left;
                margin-top: 20px;
            }
            #personal-info-div {
                font-family: Serif, SansSerif, serif;
                font-size: 18px;
                font-weight: bold;
            }
            #personal-info-img {
                border: 1px solid #C9C9C9;
                padding: 1px;
            }
            #personal-info-img img {
                width: 100px;
                height: 120px;
            }
            #personal-info-div div{
                padding-bottom: 5px;
            }
            #certificate-desc-div {
                display: inline-block;
            }
            #certificate-desc-div p {
                font-size: 18px;
                margin-top: 10px;
                text-align: justify;
                line-height: 28px;
            }
            #wechat-code-div,#chapter-div {
                float: left;
            }
            #wechat-code-div {
                margin-top: 20px;
                margin-left: 25px;
                width: 100px;
                padding: 10px;
            }
            #wechat-code-div img {
                margin-left: 10px;
                height: 80px;
                width: 80px;
            }
            #wechat-code-div div {
                margin-top: 5px;
                text-align: center;
            }
            #chapter-div {
                padding: 10px;
                margin-left: 45px;
                margin-top: 20px;
            }
            #chapter-div div {
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 5px;
            }
            #chapter-img {
                width: 100px;
                height: 100px;
                position: relative;
                left: 95px;
                bottom: 129px;
            }

        }
        /*移动端样式*/
        @media only screen and (max-width: 500px) {
            #certificate-div {
                background-image: url("{{asset('resources/imgs/certificate_lace.png')}}");
                background-size: 60vh 60vh;
                margin-left: -14vw;
                background-repeat: no-repeat;
                height: calc(100vh);
                width: calc(100vw);
            }
            #certificate-content {
                position: relative;
                top: 15vh;
                left: 37vw;
                width: 57vw;
                height: 28vh;
            }
            #certificate-content p {
                position: relative;
                text-align: center;
                font-weight: bold;
                padding-bottom: 5px;
                font-size: 0.5rem;

            }
            #personal-info-div,#personal-info-img {
                float: left;
                margin-top: 20px;
            }
            #personal-info-div {
                position: relative;
                font-size: 0.625em;
                font-weight: bold;
                transform: scale(0.6);
                left: -40px;
                top: -50px;
            }
            #personal-info-img {
                border: 1px solid #C9C9C9;
                padding: 1px;
                position: relative;
                bottom: 200px;
                left: 150px;
            }
            #personal-info-img img {
                width: 50px;
                height: 60px;
            }
            #personal-info-div div{
                padding-bottom: 5px;
            }
            #certificate-desc-div {
                display: inline-block;
            }
            #certificate-desc-div p {
                font-size: 14px;
                margin-top: 10px;
                text-align: justify;
                line-height: 20px;
                transform: scale(0.6);
                position: relative;
                bottom: 175px;
                left: -68px;
                width: 350px;
            }
            #wechat-code-div,#chapter-div {
                float: left;
            }
            #wechat-code-div {
                margin-top: 10px;
                position: relative;
                padding: 10px;
                bottom: 205px;
                left: -20px;
                transform: scale(0.6);
                width: 82px;
                margin-left: 10px;
            }
            #wechat-code-div img {
                margin-left: 10px;
                height: 60px;
                width: 60px;
            }
            #wechat-code-div div {
                margin-top: 5px;
                text-align: center;
            }
            #chapter-div {
                padding: 10px;
                margin-left: 0;
                margin-top: 20px;
                position: relative;
                bottom: 340px;
                transform: scale(0.5);
                left: 40px;
            }
            #chapter-div div {
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 5px;
            }
            #chapter-img {
                width: 50px;
                height: 50px;
                position: relative;
                left: 10px;
                bottom: 185px;
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
