<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="{{asset('admin/lib/html5shiv.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/respond.min.js')}}"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/style.css')}}" />
<!--[if IE 6]>
<script type="text/javascript" src="{{asset('admin/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加权限 - 权限管理 </title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$curAuth->auth_name}}" placeholder="" id="auth_name" name="auth_name">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">控制器名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$curAuth->controller}}" placeholder="" id="controller" name="controller">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">方法名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="action" id="action" value="{{$curAuth->action}}">
                </div>
            </div>
                        <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>父级权限：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="pid" size="1">
				<option value="0">作为顶级权限</option>
				@foreach($auths as $auth)
					<option value="{{$auth->id}}" @if($curAuth->pid==$auth->id)selected @endif   >{{$auth->auth_name}}</option>
				@endforeach
			</select>
			</span> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>作为导航：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="is_nav" type="radio" value="1" id="is_nav-1" @if($curAuth->is_nav==1)checked @endif >
                        <label for="is_nav-1">是</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="is_nav-2" value="2" name="is_nav" @if($curAuth->is_nav==2)checked @endif>
                        <label for="is_nav-2">否</label>
                    </div>
                </div>
            </div>

	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			{{csrf_field()}}
            <input type="hidden" @if($curAuth->pid==0) value="1" @else value="" @endif id="p_auth">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交修改&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
<script type="text/javascript">
$(function(){
    var is_p = $('#p_auth').val();
    if (is_p == 1){
        $('#action,#controller').parents('.row').hide()
    }
	$('select').change(function(){
	var pid = $(this).val()
	if(pid>0){
		$('#action,#controller').parents('.row').slideDown(500)
	}else{
		$('#action,#controller').val("")
		$('#action,#controller').parents('.row').slideUp(500)
	}
	})
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-admin-add").validate({
		rules:{
			auth_name:{
				required:true,
				minlength:4,
				maxlength:20
			},
			is_nav:{
				required:true,
			},
			pid:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "" ,
				success: function(data){
					if (data==1) {
						layer.msg('添加权限成功',{icon:1,time:1000},function(){
							var index = parent.layer.getFrameIndex(window.name);
							parent.window.location = parent.window.location;
						})
					}else{
						layer.msg('添加权限失败!',{icon:2,time:2000});
					}
				},
                error: function(XmlHttpRequest, textis_nav, errorThrown){
					layer.msg('请重新尝试!',{icon:2,time:2000});
				}
			});

		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>