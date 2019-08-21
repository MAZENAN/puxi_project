@extends('home/layout/base_search')
@section('title','搜索结果')
@section('headerlink')
<link rel="stylesheet" href="/home/css/reset.css">
<link rel="stylesheet" href="/home/css/header.css"><!--头部样式-->
<link rel="stylesheet" href="/home/css/footer.css"><!--底部样式-->
<link rel="stylesheet" href="/home/css/search.css">
<link rel="stylesheet" href="/public/page.css">
@endsection
@section('style')
@endsection
@section('main')
    @include('home/public/header')
<main>
    <div class="time-first">
                <ul class="year_ul">
                    <li>
                        <a href="#">

                        </a>
                        <span class="span-title">时间</span>

                    </li>
                    <li>
                       <a href="#">
                            2018以来
                        <span class="span-Second">(1.2万)</span>
                        </a>
                    </li>
                   <li>
                       <a href="#">
                       2017以来
                        <span class="span-Second">(9.3万)</span>
                       </a>
                    </li>
                    <li>
                        <a href="#">
                        2016以来
                        <span class="span-Second">(19.3万)</span>
                    </a>
                    </li>
                    <li>
                        <input type="text" placeholder="年">-
                        <input type="text" placeholder="年">
                        <button type="button" class="btn btn-default">确认</button>
                    </li>
                </ul>
    </div>

<div class="leibiao">

    <!-- 期刊类表 -->
    @if($periodical)
    <div class="qikan_box">
            <a href="/journal/{{$periodical->id}}{{config('myroute.suffix','html')}}"> <img class="qikan_img" src="{{$periodical->imageUrl()}}" alt=""></a>
            <ul class="title_box">
                <li><a href="/journal/{{$periodical->id}}{{config('myroute.suffix','html')}}"><h1>《{{$periodical->title}}》</h1> </a> </li>
                <li>出版日期 : {{$periodical->establish_at}}年</li>
                <li>出版周期：{{$periodical->getCycle()}} </li>
                <li>主办单位:{{$periodical->sponsor_unit}}</li>
            </ul>
        </div>
    @endif
        <!-- 论文列表-->
    <span class="tiaoshu">论文找到约{{$papers->total()}}条相关结果</span>
        @foreach($papers as $paper)
        <div class="lunwen_box">
              <div class="right-text">
                        <h3 class="h3_title">
                            <a href="/paper/{{$paper->code}}{{config('myroute.suffix','html')}}" target="_blank">{!!str_replace($key,'<font color="#f00">'.$key .'</font>',$paper->title)!!}</a>
                        </h3>
                        <p class="p_title">
                            {!!str_replace($key,'<font color="#f00">'.$key .'</font>',$paper->abstract)!!}
                        </p>
                        <p>
                                {{$paper->authors}}  -  《{{$paper->periodical->title}}》
                        </p>
             </div>
        </div>
    @endforeach
        <!-- 论文列表end-->
</div>

</main>
<!-- 分页 -->
<div class="page-bar">
{{$papers->appends($_GET)->links()}}
</div>
    @include('home/public/footer')

@endsection
@section('js')
<script>
$(document).ready(function (){
        $(".keyword1").text("搜索的内容");

  })
//日期加颜色
$('.year_ul li').each(function(index){
     $(this).click(function(){
        $(".year_ul li a").removeClass("title_red");//删除当前元素的样式
        $(".year_ul li a").eq(index).addClass("title_red");//添加当前元素的样式
     })
    })
</script>
@endsection