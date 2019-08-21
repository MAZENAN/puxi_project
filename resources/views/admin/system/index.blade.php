<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="lib/html5shiv.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>基本设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    系统管理
    <span class="c-gray en">&gt;</span>
    基本设置
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <form class="form form-horizontal" id="form-set-add" method="post">
        <div id="tab-system" class="HuiTab">
            <div class="tabBar cl">
                <span>基本设置</span>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        网站名称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="site_name" name="site_name" placeholder="控制在25个字、50个字节以内" value="@if($site) {{$site->site_name}} @endif" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        关键词：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="site_keywords" name="site_keywords" placeholder="5个左右,8汉字以内,用英文,隔开" value="@if($site) {{$site->site_keywords}} @endif" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        描述：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="site_desc" name="site_desc" placeholder="空制在80个汉字，160个字符以内" value="@if($site) {{$site->site_desc}} @endif" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        底部版权信息：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="copyright" name="copyright" placeholder="如&copy; 2016 H-ui.net" value="@if($site) {{$site->copyright}} @endif" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">备案号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="record_number" name="record_number" placeholder="如京ICP备00000000号" value="@if($site) {{$site->record_number}} @endif" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">手机号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="phone" name="phone" value="@if($site) {{$site->phone}} @endif" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">qq号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="qq"  name="qq" value="@if($site) {{$site->qq}} @endif" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">微信号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="wechat"  name="wechat" value="@if($site) {{$site->wechat}} @endif" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">邮箱号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="email"  name="email" value="@if($site) {{$site->email}} @endif" class="input-text">
                    </div>
                </div>
            </div>

            <div class="tabCon">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                {{csrf_field()}}
                <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="reset">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
        $("#tab-system").Huitab({
            index:0
        });
    });
    function article_save_submit(){
        $("#form-set-add").validate({
            rules:{
                site_name:{
                    required:true,
                    minlength:2,
                    maxlength:50
                },
                site_desc:{
                    required:true,
                    maxlength:255
                },
                site_keywords:{
                    required:true,
                    maxlength:255
                },
                copyright:{
                    required:true,
                    maxlength:255
                },
                record_number:{
                    maxlength:255
                },
                phone:{
                    maxlength:20
                },
                wechat:{
                    maxlength:20
                },
                email:{
                    maxlength:100
                },
                qq:{
                    maxlength: 20
                }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "/admin/system/add" ,
                    success: function(data){
                        if (data==1) {
                            layer.msg('信息更新成功',{icon:1,time:1000},function(){

                                window.location = window.location;
                            })
                        }else{
                            layer.msg('信息更新失败!',{icon:2,time:2000});
                        }
                    },
                    error: function(XmlHttpRequest, textis_nav, errorThrown){
                        layer.msg('请重新尝试!',{icon:2,time:2000});
                    }
                });
            }
        });
    }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
