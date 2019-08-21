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
<link rel="stylesheet" type="text/css" href="{{asset('public/page.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/page.css')}}">
<style type="text/css">

</style>
<!--[if IE 6]>
<script type="text/javascript" src="{{asset('admin/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>分类列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 期刊管理 <span class="c-gray en">&gt;</span> 分类列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="category_add('添加分类','{{url('admin/periodicalCategory/add')}}','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a></span> <span class="r">共有数据：<strong>{{$total}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">分类列表</th>
			</tr>
			<tr class="text-c">
				<th width="30">ID</th>
				<th width="150">分类名</th>
				<th width="150">排序码</th>
				<th width="200">分类描述</th>
				<th width="20">是否已启用</th>
				<th width="50">操作</th>
			</tr>
		</thead>
		<tbody>
	@foreach($categorys as $category)
				<tr>
				<td>{{$category->id}}</td>
					<td><span>{{str_repeat('--',$category->level-1)}}{{$category->level}}级分类</span><form id="form_{{$category->id}}" action="/admin/periodicalCategory/update/{{$category->id}}"><input name="name" value="{{$category->name}}" id="name_{{$category->id}}" class="input-text size-S" style="width: 200px;"><a class="btn btn-success-outline size-S radius" href="javascript:;" onclick="name_update({{$category->id}})">更新</a></form></td>
				<td><form id="form_id_{{$category->id}}" action="/admin/periodicalCategory/update/{{$category->id}}"><input name="sortcode" id="id_{{$category->id}}" value="{{$category->sortcode}}" class="input-text radius" style="width: 200px;"><a class="btn btn-success-outline size-S radius" href="javascript:;" onclick="sortcode_update({{$category->id}})">更新</a></form></td>
				<td>{{$category->description}}</td>
				<td class="td-status"><span class="label @if($category->status==2) label-success @else @endif radius">{{$category->getStatus()}}</span></td>
				<td class="td-manage"><a style="text-decoration:none" onClick="@if($category->status==2) category_stop(this,{{$category->id}}) @else category_start(this,{{$category->id}}) @endif " href="javascript:;" title="@if($category->status==2)停用 @else 启用 @endif"><i class="Hui-iconfont">@if($category->status==2) &#xe631; @else &#xe615; @endif</i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('分类编辑','{{url('admin/periodicalCategory/edit')}}',{{$category->id}},'800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_del(this,{{$category->id}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
	@endforeach
		</tbody>
	</table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script>

<script type="text/javascript">

/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*分类-增加*/
function category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*分类-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/admin/periodicalCategory/delete/'+id,
			dataType: 'json',
			data:'_token={{csrf_token()}}',
			success: function(data){
				if (data.code==1){
					$(obj).parents("tr").remove();
					layer.msg(data.message,{icon:1,time:1000});
				} else{
					layer.msg(data.message,{icon:5,time:1000});
				}

			},
			error:function(data) {
				layer.msg('操作失败，请重试!',{icon:5,time:1000});
			},
		});
	});
}

/*分类-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url+'/'+id,w,h);
}
/*分类-停用*/
function category_stop(obj,id){

	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.ajax({
			url:'/admin/periodicalCategory/stop/'+id,
			type:'post',
			data:'_token={{csrf_token()}}',
			success:function(data){
				if(data==1){
					$(obj).parents("tr").find(".td-manage").prepend('<a onClick="category_start(this,'+id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
					$(obj).remove();
					layer.msg('已停用!',{icon: 5,time:1000});
				}else{
					layer.msg('操作失败!',{icon: 5,time:1000});
				}
			},
			error:function (data) {
				layer.msg('操作失败!',{icon: 5,time:1000});
			}
		})

	});
}

/*分类-启用*/
function category_start(obj,id){

	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.ajax({
			url:'/admin/periodicalCategory/start/'+id,
			type:'post',
			data:'_token={{csrf_token()}}',
			success:function(data){
				if(data==1){
					$(obj).parents("tr").find(".td-manage").prepend('<a onClick="category_stop(this,'+id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
					$(obj).remove();
					layer.msg('已启用!',{icon: 1,time:1000});
				}else{
					layer.msg('操作失败!',{icon: 5,time:1000});
				}
			},
			error:function (data) {
				layer.msg('操作失败!',{icon: 5,time:1000});
			}
		})

	});
}

/*更新分类名*/
function name_update(id){
	var name = $('#name_'+id).val().trim()
	if (name.length<=0 || name.length>50){
		layer.msg('分类名不符合要求',{icon:5,time:1000});
	}else {
		$('#form_'+id).submit()
		// window.location = window.location
	}
}
/*更新排序码*/
function sortcode_update(id){
	var code = $('#id_'+id).val().trim()
	if (!/[0-9]+/.test(code)){
		layer.msg('排序码不符合要求',{icon:5,time:1000});
	}else {
		$('#form_id_'+id).submit()
	}
}
</script>
</body>
</html>