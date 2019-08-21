@extends('home/layout/base_search')
@section('title','普西文学')
@section('headerlink')
<link rel="stylesheet" href="/home/css/reset.css"><!--reset通用样式-->
<link rel="stylesheet" href="/home/css/header.css"><!--头部样式-->
<link rel="stylesheet" href="/home/css/footer.css"><!--底部样式-->
<link rel="stylesheet" href="/home/css/newly.css">
<link rel="stylesheet" href="/public/page.css">
@endsection
@section('style')
@endsection
@section('main')
<div id="app">
    @include('home.public.header')
    <main>
        <span class="t_h3">期刊频道 </span> <span class="dangqian">当前位置</span><span class="weizhi">{{$pos}}</span>

        <div class="title_classif">
            <div class="tiao_div"></div>
               <a href="/journal{{config('myroute.suffix','html')}}" class="quan_a">全部</a>

            <div class="title_ul">
                @foreach($menus as $menu)
                <div class="index-nav-frame-line" tabindex="-1">
                        <span class="index_nav_title"> {{$menu['parent']->name}}</span>
                            <div class="index-nav-frame-line-center">
                                <div class="index-nav-frame-line-li">
                                    <a href="/journal/category/{{$menu['parent']->id}}{{config('myroute.suffix','html')}}">全部</a>
                                </div>
                                @foreach($menu['childs'] as $child)
                                <div class="index-nav-frame-line-li">
                                    <a href="/journal/category/{{$child->id}}{{config('myroute.suffix','html')}}">{{$child->name}}</a>
                                </div>
                                @endforeach
                            </div>
                            <div class="index-nav-frame-line-focus" tabindex="-1"></div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--所有期刊-->
        <div class="all_journal">
            <div class="one_pieces">
                <div class="search_box">
                    <form action="/journal{{config('myroute.suffix','html')}}" method="get" id="journal_form">
                    <input type="text" class="inputs" placeholder="期刊名、ISSN、CN" name="journal_key" value="@if(request()->has('journal_key')) {{request()->get('journal_key')}}@endif">
                  <a href="javascript:;" onclick="journal_search()">  <img src="/home/image/icon/sou.png" alt=""></a>
                    </form>
                </div>
                <h5>数据库</h5>
                <ul class="database">
                   @if($pkuCounts>0) <li><a href="/{{request()->path()}}?db=1" @if(request('db',-1)==1) class="title_red" @endif>北大核心刊 <span>({{$pkuCounts}})</span></a></li> @endif
                   @if($cstpcdCounts>0)<li><a href="/{{request()->path()}}?db=2" @if(request('db',-1)==2) class="title_red" @endif>中国科技核心期刊 <span>({{$cstpcdCounts}})</span></a></li> @endif
                   @if($cssciCounts>0)<li><a href="/{{request()->path()}}?db=3" @if(request('db',-1)==3) class="title_red" @endif>CSSCI <span>({{$cssciCounts}})</span></a></li> @endif
                   @if($cscdCounts>0)<li><a href="/{{request()->path()}}?db=4" @if(request('db',-1)==4) class="title_red" @endif>CSCCD <span>({{$cscdCounts}})</span></a></li> @endif
                </ul>
            </div>
        <!-- 所有期刊 -->
            <div class="tow_pieces">
                <!-- f1-1 -->
                @foreach($periodicals as $periodical)
                    <div class="journal_pieces">
                            <div class="journal_box">
                                <a href="/journal/{{$periodical->id}}{{config('myroute.suffix','html')}}">
                                    <img class="journal_img" src="{{$periodical->imageUrl()}}" alt="加载失败">
                                </a>
                                <!--details详情-->
                                <div class="details">
                                    <ul>
                                        <li>
                                            <a href="/journal/{{$periodical->id}}{{config('myroute.suffix','html')}}"> <h3 class="${l.title}">{{$periodical->title}}</h3> </a>
                                        </li>
                                        <!--参数-->
                                        <li class="parameter">
                                            <p>发表周期： {{$periodical->getCycle()}} <span></span></p>
                                        </li>
                                        <li class="parameter">
                                            <p>产品形式：	WEB版（网上包库）、镜像站版</p>
                                        </li>
                                        <li class="label_block">
                                            @foreach($periodical->dbs as $db)

                                            <span>{{$db->alias}}</span>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    @endforeach
                <!-- end -->
               </div>
            </div>
      </main>

    <!--分页-->
    <div class="page-bar">
        {{$periodicals->appends($_GET)->links()}}
        </div>

@include('home.public.footer')
    <!--app结束-->
   </div>
@endsection
@section('js')
<script>
$(document).ready(function(){
    $('.title_ul li').mouseenter(function (e){
                e.preventDefault();
                $(this).find(".xiaoguo").css('height',"4rem")
            }).mouseleave(function (){
                $(this).find(".xiaoguo").css('height',"0")
            })
});

function journal_search(){
    var key = $("input[name='journal_key']").val()
    key = key.replace(/^\s+|\s+$/gm,'')
    if (key ==''){
        alert('检索词不能为空')
        return;
    }
    $("#journal_form").submit()
}
</script>
@endsection