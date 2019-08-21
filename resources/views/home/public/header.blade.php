    <header id="header">
    <div class="header">
        <div class="logo">
          <a href="/"> <img src="/home/image/logohen.png" alt=""></a>
        </div>
        <div class="lists">
            <div class="title_list">
                <a href="/journal{{config('myroute.suffix','html')}}">首页</a>
                <a href="/usercenter/collection{{config('myroute.suffix','html')}}" id="shoucang">订阅收藏</a>
                <a href="#" class="tougao" >立即投稿</a>
                <a href="/aboutus{{config('myroute.suffix','html')}}">关于我们</a>
            </div>

        </div>
        <div class="search">
            <div>
                <input type="text" placeholder="请输入搜索的内容" name="key" value="@if(isset($key)) {{$key}} @endif"> <button class="btn" id="headerbtn">搜索</button>
            </div>

        </div>
        @if(Auth::guard('member')->check())
        <div class="welcome huanying">
            <div>
                 <span class="sessname">{{Auth::guard('member')->user()->username}}</span> <a id="zhuxiao" href="/account/logout">注销</a>
            </div>

        </div>
        @else
        <div class="login denglu">
            <div>
                <a href="/account/login.html?redirect_url={{request()->fullUrl()}}">登录</a>
                <a href="/account/register.html">注册</a>
           </div>
        </div>
        @endif
    </div>
    <div class="he_top"> </div>
    <div class="contact_us">
       <img class="us_img" src="/home/image/icon/guanbi.png" alt="">
       <p>电话：{{$site->phone}}</p>

       <p>咨询微信：{{$site->wechat}}</p>
      <!-- <p>投稿邮箱：88888888@qq.com </p> -->


    </div>
</header>