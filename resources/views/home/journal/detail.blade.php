@extends('home/layout/base_search')
@section('title','普西文学')
@section('headerlink')
<link rel="stylesheet" href="/home/css/reset.css">
<link rel="stylesheet" href="/home/css/header.css"><!--头部样式-->
<link rel="stylesheet" href="/home/css/footer.css"><!--底部样式-->
<link rel="stylesheet" href="/home/css/style.css">
<link rel="stylesheet" href="/home/css/preview.css">
@endsection
@section('main')
<!-- 期刊详情 -->
<div id="app">
    @include('home.public.header')
   <main>
       <div class="img_cover">
           <div class="p_img">
                <img src="{{$periodical->imageUrl()}}" alt="">
           </div>
           <div class="p_title">
                <p class="keyword1">{{$periodical->title}}</p>
               <ul>
                    <li>{{$periodical->foreign_title}}</li>
                    <li>ISSN : {{$periodical->issn}}<span> CN :   {{$periodical->cn}}</span> </li>
                    <li>出版周期 :  {{$periodical->getCycle()}}</li>

               </ul>
           </div>
           <div class="zaiyao">
             <p>[期刊信息]</p>
               <p><span>主管 : {{$periodical->competent_unit}}</span> <span>主办单位 : {{$periodical->sponsor_unit}}</span></p>
              <p>[联系方式]</p>
               <p><span>电话 : {{$periodical->mobile}}</span> <span>邮箱 :  {{$periodical->email}}</span></p>
           </div>
       </div>
    <h3 class="lunwen">论文浏览</h3>
       <div class="cut"></div>
       <!--分割线-->

       <div class="option"> <!--论文和期刊-->
            <span class="shouzhi lunqi ">经典论文</span>
            <span class="shouzhi lunqi">期刊预览 </span>
       </div>
       <!---论文-->
     <!--经典论文-->
     <div class="back test pot_box">
        <h2 class="change_h2">经典论文</h2>
        <!-- f1 -->
         @foreach($papers as $paper)
         <ul class="sutra_paper">
            <li> <a href="/paper/{{$paper->code}}{{config('myroute.suffix','html')}}" > {{$paper->title}}</a></li>

            <li>{{$paper->authors}} 《{{$periodical->title}}》</li>
        </ul>
         @endforeach
     </div>

        <!--期刊-->
    <div>
        <div class="year pot_box">
            <!--左侧年份 -->
            <div class="sfq_box">
                @foreach($yearAndPhases as $year=>$yearAndPhase)
                <div class="vtitle" ><em class="v v02"></em>{{$year}}</div>
                <div class="vcon" @if(!$loop->first) style="display: none;" @endif>
                    <ul class="vconlist clearfix">
                        @foreach($yearAndPhase as $val)
                        <li class="select">
                            <a class="ul_li_a" href="javascript:;" onclick="catalog({{$periodical->id}},{{$year}},{{$val['phase']}})">No{{$val['phase']}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
            <!--左侧年份end -->
            <!-- 右边列表 -->

            <ul class="title_vcon" id="title_vcon">
            </ul>
            <!-- 右边列表end -->
        </div>
    </div>
</main>
    @include('home.public.footer')
</div>
@endsection
@section('js')
<script>
var navLists=["经典论文","期刊预览"];
$(document).ready(function (){
  $(".back").addClass("disp");
  $(".lunqi").eq(0).addClass("red")
  $('.lunqi').each(function(index){
     $(this).click(function(){
        // console.log(index)
        $(".lunqi").removeClass("red");//删除当前元素的样式
        $(".lunqi").eq(index).addClass("red");//添加当前元素的样式

        $(".pot_box").removeClass("disp");
        $(".pot_box").eq(index).addClass("disp");
     })
    })


    /*手风琴*/
//菜单隐藏展开
    var tabs_i=0
    $('.vtitle').click(function(){
        var _self = $(this);
        var j = $('.vtitle').index(_self);
        if( tabs_i == j ) return false; tabs_i = j;
        $('.vtitle em').each(function(e){
            if(e==tabs_i){
                $('em',_self).removeClass('v01').addClass('v02');
            }else{
                $(this).removeClass('v02').addClass('v01');
            }
        });
        $('.vcon').slideUp().eq(tabs_i).slideDown();
    });

// end
})
    function catalog(id,year,phase) {
        $.ajax(
            {
                url:'/catalog',
                type:'get',
                data:'id='+id+'&year='+year+'&phase='+phase,
                success:function(data){
                    if (data.message=='ok'){
                        $("#title_vcon").empty()
                        var catalog = JSON.parse(data.data)
                        catalog.forEach(function(e,i){
                          var obj =  "<li><a href='/paper/"+e.code+"{{config('myroute.suffix','html')}}"+"' target='_blank'> "+e.title+" </a> <p> "+e.authors+"- 《{{$periodical->title}}》 </p> </li> ";
                            $("#title_vcon").append(obj)
                        })
                    }
                }
            }
        )
    }
</script>
@endsection