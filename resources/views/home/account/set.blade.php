@extends('home/layout/base')
@section('title','忘记密码')
@section('headerlink')
<link type="text/css" href="/home/css/zhaohui2.css" rel="stylesheet" />
@endsection
@section('main')
<header id="header"></header>
<div class="content">
	<div class="web-width">
		<div class="for-liucheng">
			<div class="liulist for-cur"></div>
			<div class="liulist for-cur"></div>
			<div class="liulist"></div>
			<div class="liulist"></div>
			<div class="liutextbox">
			<div class="liutext for-cur"><em>1</em><br /><strong>验证身份</strong></div>
			<div class="liutext"><em>2</em><br /><strong>设置新密码</strong></div>
			<div class="liutext"><em>3</em><br /><strong>完成</strong></div>
			</div>
		</div><!--for-liucheng/-->
		<div class="forget-pwd">
			<dl>
			<dt>新密码：</dt>
			<dd><input type="password" id="password" name="password"/><strong id="tishi2"></strong></dd>
			<div class="clears"></div>
			</dl>
			<dl>
			<dt>确认密码：</dt>
			<dd><input type="password"  id="password2" name="password2"/><strong id="tishi"></strong></dd>

			<div class="clears"></div>
			</dl>

			<div class="subtijiao"><input type="submit" id="tijiao" value="提交" /></div>
		</div>

	</div><!--web-width/-->
</div><!--content/-->
<footer id="footer"></footer>
@endsection
@section('js')
<script>
   var passwdIsOK=false;
   var tow_pwd=false;
   $(function(){
    $("#header").load('./header.html');
    $("#footer").load('./footer.html');
     /*验证密码*/
   $("#password").blur(function(){
    var pass1 = $("#password").val();
    var pass1pd = /^[\w@!~$%&]{6,24}$/;
    if(pass1 == ""){
        $("#tishi2").text("密码不能为空");
        $("#tishi2").css("color","red");
        return;
    }else if(!pass1pd.test(pass1)){
        $("#tishi2").text("密码不能出现特殊字符");
        $("#tishi2").css("color","red");
         passwdIsOK=false;
        return;
    }else{
        $("#tishi2").text("密码格式正确");
        $("#tishi2").css("color","#000");
        passwdIsOK=true;
        return true;
    }
});
/*两次密码*/
$("#password2").blur(function (){
       if($("#password2").val()!=$("#password").val()){
         $("#password2").val("");
         $("#tishi").text("密码不一致");
         tow_pwd=false;
        }else{
          tow_pwd=true;
          $("#tishi").text("");
        }
     })

})
$("#tijiao").click(function(){
  if(passwdIsOK&&tow_pwd){
    $(location).prop('href', 'forgetPwd4.html');
  }else{
    $("#tishi").text("信息有误");
  }

})
 </script>
@endsection