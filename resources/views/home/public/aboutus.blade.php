@extends('home/layout/base_search')
@section('title','关于我们')
@section('headerlink')
<link rel="stylesheet" href="/home/css/reset.css"><!-- 通用重置/reset.css -->
<link rel="stylesheet" href="/home/css/header.css"><!-- 通用重置/reset.css -->
<link rel="stylesheet" href="/home/css/footer.css"><!-- 通用重置/reset.css -->
<link rel="stylesheet" href="/home/css/guanyu.css">
@endsection
@section('main')
@include('home/public/header')
<div class="table">
<img src="/home/image/aboutus/8.png" alt="">
</div>

<div id="loadingdiv" class="zzsc6">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
</div>
<div class="top_box">
        <p>
             我们是谁
        </p>
        <p>
             普西学术，凭借负责任的工作态度和优质的服务理念，深受广大作者欢迎，逐渐成为了国内重要的期刊采编平台。在行业内享有盛誉。普西学术网拥有丰富的国内期刊采编行业经验。独自开发的正规期刊检索系统，培训部门经理给我们中心员工系统培训后，使得我们更提高了工作效率，也懂得了把网络营销的一些知识运用到实际工作的宣传中，让更多的作者成为了我们的忠实客户。
        </p>
        <p>
             Puxi Academy, with its responsible working attitude and high-quality service concept, is welcomed by the majority of authors, and has gradually become an important platform for periodical editing in China. It enjoys a high reputation in the industry. Puxi Academic Network has rich experience in domestic journal editing industry. The regular periodical retrieval system developed by ourselves and trained by the manager of training department to the staff of our center make us more efficient, and also know how to apply some knowledge of network marketing to the propaganda of actual work, so that more authors become our loyal customers.
        </p>
</div>
<!-- 公司简介 -->
<div class="gongsi">
公司简介
</div>

<div class="jianjie_box">
  <img src="/home/image/aboutus/1.png" alt="加载失败">
  <div>
        公司致力于数字模拟体验系统在消防安全与安全科普教育中的应用，努力将计算机、多媒体、人机互动、虚拟现实等系统有机结合到多维视觉艺术中进行展现，与体验者进行实时互动。 智猴在中国消防协会科普教育安全委员会专家的指导下研发出了一系列当前走在科技前沿的虚拟现实消防系列互动产品，通过虚拟场景让体验者置身于真实灾害环中，达到提高体验者对灾害预防与自救能力的目的。 智猴以“促进全民消防，普及安全文化”为公司经营理念，旨在为客户提供从空间视觉、创意设计、文案策划、多媒体展示，创意设计到场馆整体设计布局与系统集成的一站式综合服务。帮助政府、企业、学校、大型综合体等主体单位进行消防安全科普知识广泛传播与有效普及。
  </div>
</div>
<div class="puxi">
  <img src="/home/image/aboutus/9.png" alt="加载失败">
</div>
<!-- 三个框 -->
<div class="sangekuang">
  <div><img src="/home/image/aboutus/5.png" alt="加载失败"></div>
  <div class="wenxian">
    <h1>中文文献</h1>
    <p>包含学术期刊、会议论文、学位论文，学科分类齐全，资源丰富。原文下载，随时浏览。</p>
  </div>
  <div><img src="/home/image/aboutus/0.png" alt="加载失败"></div>
</div>
<!-- 三个框 -->
<div class="sangekuang">

    <div class="wenxian">
      <h1>中文期刊</h1>
      <p>中国学术会议资源，收录中文会议论文共计251万多篇，收集38900多个重要学术会议，重点收录1999年以来中国科协、社科联系统及省级以上的学会、协会、高校、科研机构、政府机关等举办的重要会议上发表的文献。其中，全国性会议文献超过总量的80%。</p>
    </div>
    <div><img src="/home/image/aboutus/4.png" alt="加载失败"></div>
    <div class="wenxian">
            <h1>中文会议</h1>
            <p>中文学术期刊,涵盖了工业技术、基础科学、自然科学、工程技术、医药卫生、农业科学、哲学政法、社会科学、科教文艺等各个领域，囊括了基础研究、工程技术、科学普及等各种层次的期刊。读者可以直接浏览期刊基本信息，按期查找期刊文章。</p>
   </div>
</div>
@include('home/public/footer')
@endsection
@section('js')
<script>
 $(function(){
    $("#header").load('./header.html');
    $("#footer").load('./footer.html');
 });
 window.onload=function(){

$("#loadingdiv").hide();

}
   </script>
@endsection