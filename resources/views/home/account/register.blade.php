@extends('home/layout/base_search')
@section('title','注册')
@section('headerlink')
<link rel="stylesheet" href="/home/css/reset.css">
<link rel="stylesheet" href="/home/css/zhuce.css">
<link rel="stylesheet" href="/home/css/header.css"><!--头部样式-->
<link rel="stylesheet" href="/home/css/footer.css"><!--底部样式-->




@endsection
@section('style')
@endsection
@section('main')
@include('home/public/header')
    <div class="bg-zhuce">
        <div class="left-title">
            <p>管理更深入&nbsp;了解更全面</p>
            <p>教授更广泛&nbsp;学习更便捷</p>
        </div>
        <div class="zc-card">
            <div class="zc-card-text">
                <div class="zc-card-text-1">
                    <p class="in-title">注册新会员</p>
                </div>
                <div class="inner-text">
                    <ul class="inner-text-title">
                        <li>用户名</li>
                        <li>手机号码</li>
                        <li><br/></li>
                        <li>密码</li>
                        <li>密码强度</li>
                        <li>确认密码</li>
                    </ul>
                    <ul class="inner-text-input">
                        <li>
                            <input maxlength="20" type="text" name="uname" value="" id="uname">
                        </li>
                        <li>
                            <input id="tl" type="text" name="phone">
                        </li>
                        <li>
                            <input  type="text" name="yzm">
                        </li>
                        <li>
                            <input maxlength="24" id="pass" type="password" name="upwd">
                        </li>
                        <li>
                            <div class="qiangdu-1">
                                <p id="low">弱</p>
                                <p id="medium">中</p>
                                <p id="strong">强</p>
                            </div>
                        </li>
                        <li>
                            <input id="pass2" type="password" name="upwd2">
                        </li>
                    </ul>
                    <ul class="inner-text-span">
                        <li>
                            <span id="uname-text">账户名是您以后登录所用的账号，可以由字母或数字组成。</span>
                        </li>
                        <li>
                            <span id="pdtl">您将使用此号码登陆，请输入正确的常用号码</span>
                        </li>
                        <li>
                            <button class="btn">获取验证码</button>
                        </li>
                        <li>
                            <span id="pdpass1">6-20位字符。密码由字母a-z及数字组成。</span>
                        </li>
                        <li><br/></li>
                        <li>
                            <span id="pass3">请再次输入密码</span>
                        </li>
                    </ul>
                    <button class="zcbtn" id="zcbtn" name="zcbtn">立即注册</button>
                </div>
            </div>
        </div>
    </div>
@include('home/public/footer')
@endsection
@section('js')
<script src="/home/js/zhuce.js"></script>
@endsection