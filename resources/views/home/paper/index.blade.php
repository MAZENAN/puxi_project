@extends('home/layout/base_search')
@section('title','普西文学')
@section('headerlink')
<link rel="stylesheet" href="/home/css/reset.css">
<link rel="stylesheet" href="/home/css/header.css"><!--头部样式-->
<link rel="stylesheet" href="/home/css/footer.css"><!--底部样式-->
<link rel="stylesheet" href="/home/css/paperCon.css">
@endsection
@section('style')
@endsection
@section('main')
<div id="app">
    @include('home.public.header')
        <main>
            <h1 class="h_title keyword1">{{$paper->title}}</h1>
            <div class="nav_list">
               <img class="xiazia_gif" src="/home/image/timg.gif" ><div id="xiazai" ><span class="login shouzhi">@if(Auth::guard('member')->check())<a href="/downpaper/{{$paper->id}}">PDF点击下载</a> @else <a href="/account/login.html?redirect_url={{request()->fullUrl()}}">登录下载</a> @endif</span></div>
            </div>
            <ul class="ul_zhaiyao">
                <li> 【作者】 <br> <span> {{$paper->authors}}；</span></li>
                <li>【摘要】 <span> {{$paper->abstract}} </span></li>
               <li>

                        @if($collectionInfo['isLogin'])
                       【收藏】
                            @if($collectionInfo['isCollect'])
                           <a href="javascript:;" onclick="unCollect({{$collectionInfo['colId']}})" id="collect_fun"><span class="sc_box shoucang">
                            <img src="/home/image/icon/sc0.png" alt="已收藏" id="col_img">
                            @else
                           <a href="javascript:;" onclick="collect({{$paper->id}})" id="collect_fun"><span class="sc_box shoucang">
                           <img src="/home/image/icon/sc1.png" alt="未收藏" id="col_img">
                            @endif
                        @else
                       【登录收藏】
                       <a href="/account/login?redirect_url={{request()->fullUrl()}}" ><span class="sc_box shoucang">
                       <img src="/home/image/icon/sc1.png" alt="登录收藏" id="col_img">
                    </span></a>
                        @endif
               </li>
            </ul>
            <div class="nav_list">

                <div> <img src="/home/image/icon/sprite.png" alt="加载失败"><span class="shouzhi">内容预览</span></div>

             </div>
            <div class="img_con">
                @foreach($paperPreviews as $preview)
                <img src="{{config('oss.picsite')}}/paperpreview/{{$preview}}" alt="《{{$paper->title}}》论文预览图"><br>
                @endforeach
            </div>

        </main>
    @include('home.public.footer')
</div>
@endsection
@section('js')
 <script>
    function collect(pid){
    $.ajax({
        url:'/usercenter/collection',
        type:'post',
        data:{id:pid,_token:"{{csrf_token()}}"},
        success:function(result){
            if (result.code==1) {
                $("#col_img").attr('src','/home/image/icon/sc0.png')
                $("#collect_fun").attr('onclick','unCollect('+result.pid+')')
            }
        }
    })
    }
    function unCollect(pid){
        $.ajax({
            url:'/usercenter/unCollection',
            type:'post',
            data:{id:pid,_token:"{{csrf_token()}}"},
            success:function(result){
                if (result.code==1) {
                    $("#col_img").attr('src','/home/image/icon/sc1.png')
                    $("#collect_fun").attr('onclick','collect({{$paper->id}})')
                }
            }
        })
    }
    </script>
@endsection