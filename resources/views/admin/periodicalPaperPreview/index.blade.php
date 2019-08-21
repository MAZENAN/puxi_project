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
<link rel="stylesheet" type="text/css" href="{{asset('public/page.css')}}">
<!--[if IE 6]>
<script type="text/javascript" src="{{asset('admin/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>期刊列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 期刊管理 <span class="c-gray en">&gt;</span> <a href="/admin/periodicalDoc/index">期刊列表</a> <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form class="form" id="form-search" action="/admin/periodicalDoc/search" method="get">
		<input type="text" name="key" id="key" placeholder="请输入期刊名称" style="width:700px" class="input-text" value="{{$key??''}}">
		<button  class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜期刊</button>
	</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"></span> <span class="l">共有数据：<strong>{{$periodicals->total()}}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40">ID</th>
					<th width="150">分类</th>
					<th width="100">封面</th>
					<th width="170">期刊名称</th>
					<th width="100">cn</th>
					<th width="60">期刊周期</th>
					<th width="120">更新时间</th>
					<th width="60">发布状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($periodicals as $periodical)
				<tr class="text-c">
					<td>{{$periodical->id}}</td>
					<td>{{$periodical->tystrToName()}}</td>
					<td><a href="javascript:;" onClick="paper_add('图库编辑','picture-show.html','10001')"><img width="100" class="picture-thumb" src="{{$periodical->imageUrl()}}"></a></td>
					<td class="text-l"><a class="maincolor" href="javascript:;" onClick="paper_add('图库编辑','picture-show.html','10001')">{{$periodical->title}}</a></td>
					<td class="text-c">{{$periodical->cn}}</td>
					<td>{{$periodical->updated_at}}</td>
					<td>{{$periodical->getCycle()}}</td>
					<td class="td-status"><span class="label @if($periodical->status==2) label-success @endif radius">{{$periodical->getStatus()}}</span></td>
					<td class="td-manage">
						<a style="text-decoration:none" class="ml-5" onClick="phase_show('《{{$periodical->title}}》:期数列表','/admin/periodicalPaperPreview/phase','{{$periodical->id}}')" href="javascript:;" title="读论文"><span class="btn btn-success-outline radius" ><i class="Hui-iconfont">&#xe695;</i>浏览期数</span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$periodicals->appends($_GET)->links()}}
	</div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>


<script type="text/javascript">

/*论文-查看*/
function phase_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url+"/"+id
	});
	layer.full(index);
}


/*论文-添加*/
function paper_add(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url+"/"+id
	});
	layer.full(index);
}

$("#form-search").validate({
rules:{
	key:{
		required:true
	}
},
onkeyup:false,
focusCleanup:true,
success:"valid"
});


</script>
</body>
</html>