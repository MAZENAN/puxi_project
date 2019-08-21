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
<script type="text/javascript" src="{{asset('admin/lib/html5shiv.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/respond.min.js')}}"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/alilib/alistyle.css')}}"/>
<!--[if IE 6]>
<script type="text/javascript" src="{{asset('admin/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>新增论文</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>论文标题：<a href="javascript:void(0);" onClick="help(1)"><i class="Hui-iconfont" id="help1">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  id="title" name="title">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">关键词：<a href="javascript:void(0);" onClick="help(2)"><i class="Hui-iconfont" id="help2">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="keywords" name="keywords">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">论文摘要：<a href="javascript:void(0);" onClick="help(3)"><i class="Hui-iconfont" id="help3">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="abstract" cols="" rows="" class="textarea"   datatype="*0-500" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,500)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/500</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">论文作者：<a href="javascript:void(0);" onClick="help(4)"><i class="Hui-iconfont" id="help4">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="authors" name="authors">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">doi：<a href="javascript:void(0);" onClick="help(5)"><i class="Hui-iconfont" id="help5">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="doi" name="doi">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">来源：<a href="javascript:void(0);" onClick="help(6)"><i class="Hui-iconfont" id="help6">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="source" name="source">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">模块名称：<a href="javascript:void(0);" onClick="help(7)"><i class="Hui-iconfont" id="help7">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="platename" name="platename">
			</div>
		</div>
<!-- 上传表单 -->

        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文档上传：<a href="javascript:void(0);" onClick="help(8)"><i class="Hui-iconfont" id="help8">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="panel panel-default">
					<div class="panel-header">您所选择的文件列表：</div>
					<div class="panel-body">
						<div id="ossfile">你的浏览器不支持flash,Silverlight或者HTML5！</div>
						<div id="container">
							<button id="selectfiles"  class='btn btn-primary-outline radius'><i class="Hui-iconfont">&#xe645;</i>选择文件</button>
							<a id="postfiles" href="javascript:void(0);" class='btn btn-secondary-outline radius'><i class="Hui-iconfont">&#xe642;</i>开始上传</a>
						</div>
						<div class="Huialert Huialert-error"  style="margin-top: 10px;display: none;" id="completeinfo">
							<i class="Hui-iconfont">&#xe6a6;</i>
							<span>上传信息：</span><br>
							<span id="console"></span>
						</div>
						<!--  <pre id="console"></pre> -->
					</div>
				</div>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>预览图上传：<a href="javascript:void(0);" onClick="help(15)"><i class="Hui-iconfont" id="help15">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="panel panel-default">
					<div class="panel-header">您所选择的文件列表：</div>
					<div class="panel-body">
						<div id="ossfile-img">你的浏览器不支持flash,Silverlight或者HTML5！</div>
						<div id="container-img">
							<button id="selectfiles-img"  class='btn btn-primary-outline radius'><i class="Hui-iconfont">&#xe645;</i>选择文件</button>
							<a id="postfiles-img" href="javascript:void(0);" class='btn btn-secondary-outline radius'><i class="Hui-iconfont">&#xe642;</i>开始上传</a>
						</div>
						<div class="Huialert Huialert-error"  style="margin-top: 10px;display: none;" id="completeinfo-img">
							<i class="Hui-iconfont">&#xe6a6;</i>
							<span>上传信息：</span><br>
							<span id="console-img"></span>
						</div>
						<!--  <pre id="console"></pre> -->
					</div>
				</div>
			</div>
		</div>

		<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>期刊日期：<a href="javascript:void(0);" onClick="help(9)"><i class="Hui-iconfont" id="help9">&#xe633;</i></a></label>
		<div class="formControls col-xs-8 col-sm-9">
		<input type="text" onfocus="WdatePicker({dateFmt:'yyyy', maxDate:'#F{\'%y\'}' })" id="establish_at" class="input-text Wdate"  autocomplete="off" name="year" >
		</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>出版周期：<a href="javascript:void(0);" onClick="help(10)"><i class="Hui-iconfont" id="help10">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select class="select" id="cycle">
					<option selected="" disabled="">请选择</option>
					<option value="1" >旬刊</option>
					<option value="2">半月刊</option>
					<option value="3">月刊</option>
					<option value="4">双月刊</option>
					<option value="5">季刊</option>
					<option value="6">半年刊</option>
					<option value="7">年刊</option>
				</select>
				</span>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择期数：<a href="javascript:void(0);" onClick="help(11)"><i class="Hui-iconfont" id="help11">&#xe633;</i></a></label>
			<div class="formControls col-xs-4 col-sm-3">
				<span class="select-box">
				<select class="select" id="quick">
					<option value="" selected="" disabled="">快速选择</option>
				</select>
				</span>
			</div>
			<div class="formControls col-xs-4 col-sm-3">手动选择:<a href="javascript:void(0);" onClick="help(12)"><i class="Hui-iconfont" id="help12">&#xe633;</i></a>&nbsp;&nbsp;第<input type="text" class="input-text" style="width: 40px;" id="manual">期
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>排序值：<a href="javascript:void(0);" onClick="help(13)"><i class="Hui-iconfont" id="help13">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="0" placeholder="" id="articlesort" name="sortid">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">论文内容：<a href="javascript:void(0);" onClick="help(14)"><i class="Hui-iconfont" id="help14">&#xe633;</i></a></label>
			<div class="formControls col-xs-8 col-sm-9">
				<div id="editor" type="text/plain" style="width:100%;height:400px;" name="content"></div>
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				{{csrf_field()}}
				<input type="hidden" name="periodical_id" value="{{$id}}">
				<input type="hidden" name="name">
				<input type="hidden" name="phase" value="">
				<div id="imgs"></div>
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button class="btn btn-default radius" type="reset">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/ueditor/1.4.3/ueditor.config.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/ueditor/1.4.3/ueditor.all.min.js')}}"> </script>
<script type="text/javascript" src="{{asset('admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/alilib/lib/crypto1/crypto/crypto.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/alilib/lib/crypto1/hmac/hmac.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/alilib/lib/crypto1/sha1/sha1.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/alilib/lib/base64.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/alilib/lib/plupload-2.1.2/js/plupload.full.min.js')}}"></script>

<script type="text/javascript">
//我的目的是我自己生成文件名，设置目录名，我只需要拿到服务器成败的结果。失败再重传。
accessid= 'LTAIxiSvIxoKdf88';
accesskey= 'PKXiag49w6oCvQMxzIxiB1PunjDzsb';
host = 'http://puxipublic.oss-cn-beijing.aliyuncs.com';

g_dirname = 'PaperDoc/'//目录
g_object_name = ''
docname=''
g_object_name_type = ''//生成文件名类型
now = timestamp = Date.parse(new Date()) / 1000;

var policyText = {
    "expiration": "2020-01-01T12:00:00.000Z", //设置该Policy的失效时间，超过这个失效时间之后，就没有办法通过这个policy上传文件了
    "conditions": [
    ["content-length-range", 0, 1048576000] // 设置上传文件的大小限制
    ]
};

var policyBase64 = Base64.encode(JSON.stringify(policyText))
message = policyBase64
var bytes = Crypto.HMAC(Crypto.SHA1, message, accesskey, { asBytes: true }) ;
var signature = Crypto.util.bytesToBase64(bytes);

//设置上传目录名,为空时则为根目录
function get_dirname()
{
    dir = document.getElementById("dirname").value;
    //目录名不为空且不为/
    if (dir != '' && dir.indexOf('/') != dir.length - 1)
    {
        dir = dir + '/'
    }
    //alert(dir)
    g_dirname = dir
}
//生成指定长度的随机文件名
function random_string(len) {
　　len = len || 32;
　　var chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';
　　var maxPos = chars.length;
　　var pwd = '';
　　for (i = 0; i < len; i++) {
    　　pwd += chars.charAt(Math.floor(Math.random() * maxPos));
    }
    return pwd;
}
//获取文件扩展名
function get_suffix(filename) {
    pos = filename.lastIndexOf('.')
    suffix = ''
    if (pos != -1) {
        suffix = filename.substring(pos)
    }
    return suffix;
}

//设置上传的文件名 g_object_name=路径+名字
function set_upload_param(up, filename, ret)
{
    docname='doc'+random_string(10)+new Date().getTime()+get_suffix(filename)
    g_object_name = g_dirname+docname//1.**指定文件名的代码

    new_multipart_params = {
        'key' : g_object_name,
        'policy': policyBase64,
        'OSSAccessKeyId': accessid,
        'success_action_status' : '200', //让服务端返回200,不然，默认会返回204
        'signature': signature,
    };

    up.setOption({
        'url': host,
        'multipart_params': new_multipart_params
    });

    up.start();
}

var uploader = new plupload.Uploader({
    runtimes : 'html5,flash,silverlight,html4',
    browse_button : 'selectfiles',
    multi_selection: false,
    container: document.getElementById('container'),
    flash_swf_url : '{{asset('admin/aililib/lib/plupload-2.1.2/js/Moxie.swf')}}',
    silverlight_xap_url : '{{asset('lib/plupload-2.1.2/js/Moxie.xap')}}',
    url : 'http://oss.aliyuncs.com',
    filters: {
        mime_types : [ //只允许上传图片和zip文件
        { title : "docs", extensions : "pdf,doc,docx" },
        ],
        max_file_size : '400MB', //最大只能上传400KB的文件
        prevent_duplicates : true //不允许选取重复文件
    },
    init: {//uploader对象调用init时调用
        PostInit: function() {
            $('#ossfile').html('')
            $('#postfiles').click(function() {
            set_upload_param(uploader, '', false);
            return false;
            })
        },

        FilesAdded: function(up, files) {
            plupload.each(files, function(file) {
                $('#ossfile').append($('<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ')<b></b>'
                +'<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'
                +'</div>'))
                $("input[name='original']").val(file.name)
            });
            $("#selectfiles").attr('disabled','')

        },

        BeforeUpload: function(up, file) {
            //check_object_radio();
            //get_dirname();
            set_upload_param(up, file.name, true);
        },

        UploadProgress: function(up, file) {
            var d = document.getElementById(file.id);
            d.getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            var prog = d.getElementsByTagName('div')[0];
            var progBar = prog.getElementsByTagName('div')[0]
            progBar.style.width= 2*file.percent+'px';
            progBar.setAttribute('aria-valuenow', file.percent);
        },

        FileUploaded: function(up, file, info) {
            if (info.status == 200)
            {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '上传成功';
                //成功时的回调
                //设置隐藏域的值
                $("#completeinfo").show("fast")
                $('#completeinfo').attr('class','Huialert Huialert-success')
                $('#console').append('['+file.name+']'+'：上传成功')
                $("input[name='name']").val(docname)

            }
            else
            {
                $("#completeinfo").show("fast")
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '上传失败';
                $('#completeinfo').attr('class','Huialert Huialert-error')
                $('#console').append(file.name+'上传失败')
                $("input[name='name']").val('')
            }
        },

        Error: function(up, err) {
            $("#completeinfo").show("fast")
            $('#completeinfo').attr('class','Huialert Huialert-danger')
                $('#console').append('上传错误')

        }
    }
});

uploader.init();




$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	//表单验证
	$("#form-article-add").validate({
		rules:{
			title:{
				required:true,
				maxlength:255
			},
			keywords:{
				maxlength:255
			},
			abstract:{
				maxlength:500
			},
			authors:{
				maxlength:255
			},
			platename:{
				maxlength:20
			},
			doi:{
				maxlength:255
			},
			source:{
				maxlength:255
			},
			content:{
				maxlength:30000
			},
			year:{
				required:true
			},
			sortid:{
				digits:true
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
if ($("input[name='phase']").val()=="") {
    layer.msg('期数不能为空',{icon:2})
    return;
}
if ($("input[name='name']").val()=="") {
    layer.msg('请上传文档',{icon:2})
    return;
}

$(form).ajaxSubmit({
type: 'post',
url: "{{url('admin/periodicalPaper/doAdd')}}" ,
success: function(data){
	if (data==1) {
		layer.msg('添加论文成功',{icon:1,time:1000},function(){
			var index = parent.layer.getFrameIndex(window.name);
            parent.window.location = parent.window.location;
		})
	}else{
		layer.msg('添加论文失败!',{icon:2,time:2000});
	}
},
error: function(XmlHttpRequest, textis_nav, errorThrown){
	layer.msg('请重新尝试!',{icon:2,time:2000});
}
});

}
	});

	var ue = UE.getEditor('editor',{
    toolbars: [
    ['fullscreen', 'source', 'undo', 'redo'],
    ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
],
    autoHeightEnabled: true,
    autoFloatEnabled: true
});

			$("#cycle").change(function(){
			$("#quick").empty()
			$("#quick").append('<option selected="" disabled="">快速选择</option>')
			var arr = new Array(36,24,12,6,4,2,1)
			changePhase($("#quick"),arr[parseInt($(this).val())-1])

		})

		$("#manual").blur(function(){
            var value = $(this).val();
            var patt = /[1-9][0-9]*/;
            var b = patt.test($(this).val());
            if (b) {
                $("input[name='phase']").val(value)
            }else{
                $(this).val($("input[name='phase']").val())
            }
		})

		$("#quick").change(function(){
			var value = $("#quick").val()
			$("input[name='phase']").val(value)
		})

});


function help(i){
			switch (i) {
				case 1:
					layer.tips('不能为空,最长255个字符', "#help"+i);
					break;
				case 2:
					layer.tips('可选项,不超过255个字符', "#help"+i);
					break;
				case 3:
					layer.tips('可选项,不超过500个字符', "#help"+i);
					break;
				case 4:
					layer.tips('可选项,不超过255个字符', "#help"+i);
					break;
				case 5:
					layer.tips('可选项,不超过255个字符', "#help"+i);
					break;
				case 6:
					layer.tips('可选项,不超过255个字符', "#help"+i);
					break;
				case 7:
					layer.tips('可选项,不超过20个字符', "#help"+i);
					break;
				case 8:
					layer.tips('文档格式为pdf,doc,docx,大小不超过400MB',"#help"+i);
					break;
				case 9:
					layer.tips('格式为xxxx四位数', "#help"+i);
					break;
				case 10:
					layer.tips('选择出版周期后才能快速选择期数', "#help"+i);
					break;
				case 11:
					layer.tips('使用快速选择请先选择期数', "#help"+i);
					break;
				case 12:
					layer.tips('手动输入期数后快速选择将会失效',"#help"+i);
                    break;
                case 13:
                    layer.tips('用于指定在目录中的顺序',"#help"+i)
                    break;
                case 14:
                    layer.tips('可选项,最长65535个字',"#help"+i)
                    break;
				case 15:
					layer.tips('图片格式为jpg,png,顺序为选择的顺序',"#help"+i);
					break;
			}

		}

		function changePhase(selector,len){
			for (var i =1;i<=len;i++) {
				selector.append('<option value="'+i+'" >第'+i+'期</option>')
			}
		}
</script>
<script>
	host_img = 'http://puxitestpublic1.oss-cn-beijing.aliyuncs.com';
	g_dirname_img = 'paperpreview/'//目录
	g_object_name_img = ''
	docname_img=''
	g_object_name_type = ''//生成文件名类型
	now = timestamp = Date.parse(new Date()) / 1000;
	var sort=0;

	var policyText = {
		"expiration": "2020-01-01T12:00:00.000Z", //设置该Policy的失效时间，超过这个失效时间之后，就没有办法通过这个policy上传文件了
		"conditions": [
			["content-length-range", 0, 1048576000] // 设置上传文件的大小限制
		]
	};

	var policyBase64 = Base64.encode(JSON.stringify(policyText))
	message = policyBase64
	var bytes = Crypto.HMAC(Crypto.SHA1, message, accesskey, { asBytes: true }) ;
	var signature = Crypto.util.bytesToBase64(bytes);

	//设置上传目录名,为空时则为根目录
	function get_dirname_img()
	{
		dir = document.getElementById("dirname").value;
		//目录名不为空且不为/
		if (dir != '' && dir.indexOf('/') != dir.length - 1)
		{
			dir = dir + '/'
		}
		//alert(dir)
		g_dirname_img = dir
	}
	//生成指定长度的随机文件名
	function random_string_img(len) {
		len = len || 32;
		var chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';
		var maxPos = chars.length;
		var pwd = '';
		for (i = 0; i < len; i++) {
			pwd += chars.charAt(Math.floor(Math.random() * maxPos));
		}
		return pwd;
	}
	//获取文件扩展名
	function get_suffix(filename) {
		pos = filename.lastIndexOf('.')
		suffix = ''
		if (pos != -1) {
			suffix = filename.substring(pos)
		}
		return suffix;
	}

	//设置上传的文件名 g_object_name=路径+名字
	function set_upload_param_img(up, filename, ret)
	{
		docname_img='img'+random_string_img(10)+new Date().getTime()+get_suffix(filename)
		g_object_name_img = g_dirname_img+docname_img//1.**指定文件名的代码

		new_multipart_params = {
			'key' : g_object_name_img,
			'policy': policyBase64,
			'OSSAccessKeyId': accessid,
			'success_action_status' : '200', //让服务端返回200,不然，默认会返回204
			'signature': signature,
		};

		up.setOption({
			'url': host_img,
			'multipart_params': new_multipart_params
		});

		up.start();
	}

	var uploader_img = new plupload.Uploader({
		runtimes : 'html5,flash,silverlight,html4',
		browse_button : 'selectfiles-img',
		multi_selection: false,
		container: document.getElementById('container-img'),
		flash_swf_url : '{{asset('admin/aililib/lib/plupload-2.1.2/js/Moxie.swf')}}',
		silverlight_xap_url : '{{asset('lib/plupload-2.1.2/js/Moxie.xap')}}',
		url : 'http://oss.aliyuncs.com',
		filters: {
			mime_types : [ //只允许上传图片和zip文件
				{ title : "docs", extensions : "jpg,png" },
			],
			max_file_size : '400MB', //最大只能上传400KB的文件
			prevent_duplicates : true //不允许选取重复文件
		},
		init: {//uploader对象调用init时调用
			PostInit: function() {
				$('#ossfile-img').html('')
				$('#postfiles-img').click(function() {
					set_upload_param_img(uploader_img, '', false);
					return false;
				})
			},

			FilesAdded: function(up, files) {
				plupload.each(files, function(file) {
					$('#ossfile-img').append($('<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ')<b></b>'
							+'<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'
							+'</div>'))
					// $("input[name='original']").val(file.name)
				});
				// $("#selectfiles-img").attr('disabled','')

			},

			BeforeUpload: function(up, file) {
				//check_object_radio();
				//get_dirname();
				set_upload_param_img(up, file.name, true);
			},

			UploadProgress: function(up, file) {
				var d = document.getElementById(file.id);
				d.getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
				var prog = d.getElementsByTagName('div')[0];
				var progBar = prog.getElementsByTagName('div')[0]
				progBar.style.width= 2*file.percent+'px';
				progBar.setAttribute('aria-valuenow', file.percent);
			},

			FileUploaded: function(up, file, info) {
				if (info.status == 200)
				{
					document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '上传成功';
					//成功时的回调
					//设置隐藏域的值
					$("#completeinfo-img").show("fast")
					$('#completeinfo-img').attr('class','Huialert Huialert-success')
					$('#console-img').append('['+file.name+']'+'：上传成功')
					//$("input[name='name']").val(docname)
					sort++;
					var input = "<input name='previews[]' type='hidden' value='"+sort+"_"+docname_img+"'>"
					$("#imgs").append(input)
				}
				else
				{
					$("#completeinfo-img").show("fast")
					document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '上传失败';
					$('#completeinfo-img').attr('class','Huialert Huialert-error')
					$('#console-img').append(file.name+'上传失败')
					//$("input[name='name']").val('')

				}
			},

			Error: function(up, err) {
				$("#completeinfo-img").show("fast")
				$('#completeinfo-img').attr('class','Huialert Huialert-danger')
				$('#console-img').append('上传错误')

			}
		}
	});

	uploader_img.init();

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>