<!DOCTYPE html >
<html>
<head>
<title>期刊文档下载</title>
<meta http-equiv="Cache-Control" content="no-transform" />
<meta name="applicable-device" content="pc,mobile">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="MobileOptimized" content="width"/>
<meta name="HandheldFriendly" content="true"/>
<meta http-equiv=Content-Type content="text/html; charset=gb2312">
<meta name=viewport content="width=device-width, initial-scale=1">

<link href="{{asset('public/list.css')}}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/style.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('admin/lib/layui-v2.4.5/css/layui.css')}}">
</head>
<body>
	<div id="wrapper">
		<div id="content" class="mb20">
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>《{{$periodical->title}}》文档时间线</legend>
</fieldset>
<ul class="layui-timeline">
@foreach($newArr as $key=>$value)
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis">&#xe60e;</i>
    <div class="layui-timeline-content layui-text">
      <h3 class="layui-timeline-title">{{$key}}年</h3>
      <div>
      	<table class="table table-border table-bordered table-hover radius">
      		<thead>
      		<tr class="text-c">
      			<th width="40">期数</th>
      			<th width="100">原文档名</th>
      			<th width="200">备注</th>
      			<th width="40">操作</th>
      		</tr>
      		</thead>
      		<tbody>
      	@foreach($value as $innerArr)
      		<tr>
      			<td class="text-c">第{{$innerArr['phase']}}期</td>
      			<td class="text-c">{{$innerArr['original']}}</td>
      			<td >{{$innerArr['note']}}</td>
      			<td class="td-manage text-c"><a style="text-decoration:none" class="ml-5" onClick="read({{$innerArr['id']}})" href="javascript:;" title="查看"><span class="btn btn-secondary-outline radius size-S" ><i class="Hui-iconfont">&#xe720;</i>查看文档</span></a><a style="text-decoration:none" class="ml-5" onClick="downloadFile({{$innerArr['id']}})" href="javascript:;" title="下载"><span class="btn btn-secondary-outline radius size-S" ><i class="Hui-iconfont">&#xe640;</i>直接下载</span></a></td>
      		</tr>
      	@endforeach
      		</tbody>
      	</table>
      </div>
    </div>
  </li>
@endforeach
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis">&#xe60e;</i>
    <div class="layui-timeline-content layui-text">
      <div class="layui-timeline-title">过去...</div>
    </div>
  </li>
</ul>
		<div class="clear"></div>
		</div>
	</div>

	<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layui-v2.4.5/layui.js')}}"></script>
<script type="text/javascript" src="{{asset('public/download.min.js')}}"></script>
<script type="text/javascript">
function read(id){
layer.open({
  type: 2,
  title: '查看文档',
  shadeClose: true,
  shade: 0.8,
  area: ['40%', '100%'],
  content: '{{url('admin/periodicalDoc/read')}}'+'/'+id //iframe的url
});
}
function downloadFile(id){
   var $eleForm = $("<form method='get'></form>");
    $eleForm.attr("action","{{url('admin/periodicalDoc/realDownload')}}/"+id);
    $(document.body).append($eleForm);
    $eleForm.submit();
}
</script>
</body>
</html>