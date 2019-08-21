@extends('/home/layout/base_search')
@section('title','登录')
@section('headerlink')
<link rel="stylesheet" href="/home/css/reset.css">
<link rel="stylesheet" href="/home/css/login.css">
<link rel="stylesheet" href="/home/css/header.css"><!--头部样式-->
<link rel="stylesheet" href="/home/css/footer.css"><!--底部样式-->
@endsection
@section('main')
@include('home/public/header')
<div class="loginbox">
    <div class="head">
        <img src="/home/image/toux.png" alt="">
    </div>
    <div class="cue">
      欢迎登录
      <span class="tishi"></span>
    </div>
        <div class="case">
            <input type="text" name="username" id="account" placeholder="用户名" autocomplete="off"><br>
            <input type="password" name="password" id="password" placeholder="密码"><br>
            <div class="codes" style="display: inline-block;">
                <input class="code" type="text" placeholder="输入验证码" style="width: 106px" name="captcha" autocomplete="off" id="captcha">
                <img src="{{captcha_src()}}" alt="验证码" id="code">
                <a href="javascript:void(0)" onclick="change()">换一个</a>
               <!-- <span class="numcode"></span> -->
          </div>
            {{csrf_field()}}
             <button class="login_btn">登录</button>
       </div>
      <a href="/account/findpwd/vertify{{config('myroute.suffix','html')}}">忘记密码?</a><a href="/account/register{{config('myroute.suffix','html')}}">立即注册</a>
      <div class="party">
          <img src="/home/image/logohen.png" alt="">
      </div>
</div>
@include('home/public/footer')
@endsection
@section('js')
<script type="text/javascript">
        var accountIsOK = false;
        var passwdIsOK = false;
        var yanzheng = false;
        $(function(){
             //账号验证
             $("#account").blur(function(){
                blur_accountIs();
             })
             $("#password").blur(function(){
                blur_passwdIsOK();
             })
             $("#captcha").blur(function () {
                 blur_captchaIsOK();
             })
             $(".login_btn").click(function(){
                get_ajax();
             })
        })
        function blur_accountIs(){
            var account = $("#account").val();
            if (account.length>=2) {
			// 判断account是否验证过
            $(".tishi").html("");
			accountIsOK = true;
		} else {
            accountIsOK = false;
            $(".tishi").html("用户名不能为空");
		}
        }
        function blur_passwdIsOK(){
            var account = $("#password").val();
            if (account .length>=6) {
			// 判断password是否验证过
			passwdIsOK = true;
            $(".tishi").html("");
		} else {
            passwdIsOK = false;
            var message=""
            if ($("#password").val().length==0){
                message = "密码不能为空"
            } else if($("#password").val().length<6){
                message = "密码最短6位"
            }
            $(".tishi").html(message);
		}
        }
        function blur_captchaIsOK(){
            var captcha = $("#captcha").val();
            if (captcha != "" && captcha.length ==5) {
                // 判断password是否验证过
                yanzheng = true;
                $(".tishi").html("");
            } else {
                yanzheng = false;
                $(".tishi").html("验证码格式错误");
            }
        }
        function change(){
            $("#code").attr("src","{{captcha_src()}}"+"?r="+Math.random())
        }
    //点击提交
    function get_ajax(){

        /*执行获取session*/

        if (!accountIsOK || !passwdIsOK || !yanzheng) {
            $(".tishi").html("请填写正确的登陆信息");
            return
        }

         var username = $("input[name='username']").val()
         var password = $("input[name='password']").val()
        var captchaval = $("input[name='captcha']").val()
        var token = $("input[name='_token']").val()
            $.ajax({
                type:"post",    // 请求类型
                url:"/account/doLogin?redirect_url={{request()->get('redirect_url','/')}}",    // 请求URL
                data:{username:username,password:password,_token: token,code:captchaval},
                dataType:"json",    // 数据返回类型
                cache:false, // 是否缓存
                success:function(result){    // 成功返回的结果(响应)
                    if (result.code==1){
                        window.location.href=result.redirect_url
                    } else if (result.code==0){
                        $(".tishi").html(result.message);
                        change()
                    }

                }
            });


    }

</script>
@endsection