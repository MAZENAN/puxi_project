@extends('home/layout/base')
@section('title','忘记密码')
@section('headerlink')
<link rel="stylesheet" href="/home/css/zhaohui1.css">
<link rel="stylesheet" href="/home/css/reset.css">
@endsection
@section('style')
@endsection
@section('main')
<header id="header"></header>
<div class="content">
<div class="web-width">
<div class="for-liucheng">
<div class="liulist for-cur"></div>
<div class="liulist"></div>
<div class="liulist"></div>
<div class="liulist"></div>
<div class="liutextbox">
<div class="liutext for-cur"><em>1</em><br /><strong>验证身份</strong></div>
<div class="liutext"><em>2</em><br /><strong>设置新密码</strong></div>
<div class="liutext"><em>3</em><br /><strong>完成</strong></div>
</div>
</div><!--for-liucheng/-->
<div class="yz_ul forget-pwd">
<ul class="ul_1">
<li> 验证方式：</li>
<li> 验证码 : </li>
<li>已验证手机：</li>
<li>手机校验码：</li>
</ul>
<ul class="ul_2">
<li>
手机号码
<strong id="tishi"></strong>
</li>
<li>
<input type="text" id="pscode">
<!-- <input type = "button" id="code"/>-->
<img src="/home/image/yzm.jpg" id="code" alt="加载失败刷新页面">
</li>
<li>
<input type="phone" id="phone" placeholder="请输入手机号"  oninput="if(value.length>11)value=value.slice(0,11)"/><!--readonly -->
<button class="duanxin" id="duanxin">获取短信验证码</button>
</li>
<li>
<input type="text" id="yzcode" name="yzcode"  />
</li>
</ul>
</div>
<div class="subtijiao"><button id="tijiao">提交</button></div>
</div><!--web-width/-->
</div><!--content/-->
<footer id="footer"></footer>
@endsection
@section('js')
<script>
    var phone=false
    var yanzheng=false
    var timer=null;
    $(function(){
        $("#header").load('../header.html');
        $("#footer").load('../footer.html');
        createCode();//生成验证码
    })
    /*验证手机号*/
    $("#phone").blur(function (){
       isPhone($("#phone").val())
    })
    function isPhone (pone) {
    var myreg = /^[1][3,4,5,7,8][0-9]{9}$/;
    if (!myreg.test(pone)) {
      $("#tishi").text('手机号格式不正确');
      phone=false
    } else {
      phone=true
      return;
    }
  }
  function createCode(){
    code = "";
    var codeLength = 4;//验证码的长度
    var random = new Array(2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R',
    'S','T','U','V','W','X','Y','Z');//随机数
    for(var i = 0; i < codeLength; i++) {//循环操作
       var index = Math.floor(Math.random()*32);//取得随机数的索引（0~35）
       code += random[index];//根据索引取得随机数加到code上
   }
   $("#code").val(code);
}
function validate(){

   var inputCode = $("#pscode").val().toUpperCase();
  //console.log(inputCode)
  //取得输入的验证码并转化为大写
     if(inputCode!="" && inputCode != code ) { //若输入的验证码与产生的验证码不一致时
    $("#tishi").text("验证码输入错误");
   //清空文本框 $("#pscode").val("");
    yanzheng=false;
    }else { //输入正确时
        yanzheng=true;
          $("#tishi").text("");
     }

  }
 /*获取短信验证码*/
  $("#duanxin").click(function(){
      clearInterval(timer);
        var time = 60;
        var that=this;

    if( phone && yanzheng){
    timer=setInterval(function(){
            if(time<1){
                that.innerText="";
                that.innerText="点击重新发送";
                that.disabled=false;
            }else{
                that.disabled=true;
                that.innerText="";
                that.innerText="剩余时间"+(time)+"秒";
                time--;
            }

          // console.log(time)
        },1000)
         /*短信码*/
          alert("已发送")
      }else{
          alert("手机号或验证码格式有误")
      }
  })

$("#tijiao").click(function(){
    if( phone && yanzheng){

          alert("已发送")
          $(location).prop('href', 'forgetPwd3.html');
      }else{
          alert("手机号或验证码格式有误")
      }
})
  $("#pscode").blur(function(){
   validate();
  });
  $("#code").click(function(){
  createCode();
  });
</script>
@endsection