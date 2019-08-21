@extends('home/layout/base')
@section('title','找回密码')
@section('headerlink')
<link type="text/css" href="/home/css/zhaohui2.css" rel="stylesheet" />
@endsection
@section('style')
@endsection
@section('main')
  <header id="header"></header>

  <div class="content">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liutextbox">

       <div class="liutext for-cur"><em>1</em><br /><strong>验证身份</strong></div>
       <div class="liutext for-cur"><em>2</em><br /><strong>设置新密码</strong></div>
       <div class="liutext for-cur"><em>3</em><br /><strong>完成</strong></div>
      </div>
     </div><!--for-liucheng/-->
      <div class="successs">
       <h3>恭喜您，修改成功！</h3>
       <a href="/account/login"><h3>点击登录</h3></a>
      </div>
   </div><!--web-width/-->
  </div><!--content/-->
  <footer id="footer"></footer>
@endsection
@section('js')
<script>
  $(function(){
        $("#header").load('./header.html');
        $("#footer").load('./footer.html');
        createCode();//生成验证码
    })

</script>
@endsection