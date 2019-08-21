@extends('home/layout/base')
@section('title','普西学术')
@section('headerlink')
<link rel="stylesheet" href="/home/css/reset.css">
<link rel="stylesheet" href="/home/css/index.css">
@endsection
@section('main')
<header>
    @if(Auth::guard('member')->check())
    <div class="welcome">
         <span class="sessname">{{Auth::guard('member')->user()->username}}</span>
        <a  href="/account/logout" id="zhuxiao"> 注销</a>
    </div>
    @else
    <div class="login">
       <a href="account/login{{config('myroute.suffix','html')}}?redirect_url={{request()->fullUrl()}}">登录</a> <a href="account/register">注册</a>
    </div>
    @endif
</header>
<main>
    <div class="logo">
        <img src="/home/image/logo.png" alt="">
    </div>
    <div class="search">
        <input type="text" name="inp" placeholder="请输入搜索的内容" autofocus>
        <button class="btn">点击搜索</button>
    </div>
</main>
<!--联系我们-->
<div class="contact_us">
        <img class="us_img" src="/home/image/icon/guanbi.png" alt="">
         <p>普西学术网</p>
         <p>电话：{{$site->phone}}</p>

         <p>咨询微信：{{$site->wechat}}</p>
        <!-- <p>投稿邮箱：88888888@qq.com </p> -->

</div>
<footer>

     <a id="dingyue" class="bot_nav" href="usercenter/collection{{config('myroute.suffix','html')}}">
        <img src="/home/image/shoucang.png" alt="">
        <p>订阅收藏</p>
    </a>
    <a  id="qikan" href="journal{{config('myroute.suffix','html')}}" target="_blank" class="bot_nav">
        <img src="/home/image/qikan.png" alt="">
        <p>期刊频道</p>
     </a>
    <a  id="guanyu" class="bot_nav" href="#">
         <img src="/home/image/guanyu.png" alt="">
         <p>联系我们</p>
    </a>
     <a href="/aboutus{{config('myroute.suffix','html')}}" id="lianxi" class="bot_nav">
        <img src="/home/image/lianxi.png" alt="">
        <p>关于我们</p>
    </a>
    <!-- <a href="javascript:void(0)" id="lianxi" onclick="window.open('http://www.baidu.com','_self');" target="_blank" class="bot_nav">
        <img src="/home/image/lianxi.png" alt="">
        <p>联系我们</p>
    </a>-->
</footer>
@endsection
@section('js')
<script type="text/javascript">

        /*搜索*/
       function search(){
            var searchText=$("input[name='inp']").val()
            searchText = searchText.replace(/[\/]+/g, "")
            if(searchText.length==0){
                alert("输入的内容不能为空");
                return;
            }
            /*跳转传值*/
            var searchUrl = 'search/' //使用encodeURI编码
            location.href = searchUrl+encodeURIComponent(searchText);
        }
        /*鼠标点击*/
        $(".btn").click(function(){
            search()
        }

        )
        /*键盘事件*/
        $(document).keyup(function(event){
        if(event.keyCode ==13){
            search()
        }
        /*判断session是否存在 切换登录和欢迎*/

        });
        function jianceuname(html){
            if(sessionStorage.getItem('uname')){
                $(location).prop('href', html)
                console.log(123)
            }else{
                $(location).prop('href', 'login.html');
                return;
            }
        }
        /*控制联系我们隐藏显示*/
        $("#guanyu").click(function(){
            $(".contact_us").css("display","block")
        })

        $(".us_img").click(function (){
         $(".contact_us").css("display","none")

     })
</script>
@endsection