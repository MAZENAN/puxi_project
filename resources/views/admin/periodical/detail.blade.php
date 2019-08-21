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
    <title>新增期刊</title>

    <link href="{{asset('admin/lib/webuploader/0.1.5/webuploader.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
    <form class="form form-horizontal" id="form-periodical-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>期刊名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="必填项,不超过50个字符" id="title" name="title" value="{{$periodical->title}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">外文标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="可选项" id="foreign-title" name="foreign_title" value="{{$periodical->foreign_title}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择分类：</label>
            <div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="typestr" class="select" disabled>
					<option value="0" selected="" disabled="">选择分类</option>
					<option value="0" @if($periodical->typestr==0) selected="" @endif >无分类</option>
					@foreach($categorys as $category)
                        <option value="{{$category['typestr']}}" @if($periodical->typestr==$category['typestr']) selected="" @endif>{{str_repeat('---',$category['level'])}}{{$category['name']}}</option>
                    @endforeach
				</select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>出版周期：</label>
            <div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="cycle" class="select" disabled>
					<option value="" selected="" disabled="">请选择</option>
					<option value="1" @if($periodical->cycle==1) selected="" @endif>旬刊</option>
					<option value="2" @if($periodical->cycle==2) selected="" @endif>半月刊</option>
					<option value="3" @if($periodical->cycle==3) selected="" @endif>月刊</option>
					<option value="4" @if($periodical->cycle==4) selected="" @endif>双月刊</option>
					<option value="5" @if($periodical->cycle==5) selected="" @endif>季刊</option>
					<option value="6" @if($periodical->cycle==6) selected="" @endif>半年刊</option>
					<option value="7" @if($periodical->cycle==7) selected="" @endif>年刊</option>
				</select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>语言：</label>
            <div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="lang" class="select" disabled>
					<option value="1" @if($periodical->lang==1) selected="" @endif>中文</option>
					<option value="2" @if($periodical->lang==2) selected="" @endif>英文</option>
				</select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">国际标准刊号issn：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="例如：1674-6554" id="" name="issn" value="{{$periodical->issn}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>国内统一刊号cn：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="例如：37-1468/R" id="cn" name="cn" value="{{$periodical->cn}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">手机号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="期刊联系方手机号" id="mobile" name="mobile" value="{{$periodical->mobile}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">邮箱号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="期刊联系方邮箱号" id="email" name="email" value="{{$periodical->email}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">地址：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="请输入地址" id="address" name="address" value="{{$periodical->address}}" disabled>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">创刊日期：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" onfocus="WdatePicker({dateFmt:'yyyy-M-d', maxDate:'#F{\'%y-%M-%d\'}' })" id="establish_at" class="input-text Wdate"  autocomplete="off" name="establish_at" value="{{$periodical->establish_at}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">主管单位：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="例如：中华人民共和国卫生部" id="competent-unit" name="competent_unit" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">主办单位：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="例如：中华医学会" id="sponsor-unit" name="sponsor_unit" value="{{$periodical->sponsor_unit}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">编辑单位：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="例如：中华行为医学与脑科学杂志编辑委员会" id="editorial-unit" name="editorial_unit" value="{{$periodical->editorial_unit}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">邮发代号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="例如：24-115" id="postal-code" name="postal_code" value="{{$periodical->postal_code}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">定价信息：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="例如：15.00元/期；180.00元/年" id="" name="price_info" value="{{$periodical->price_info}}" disabled>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>期刊级别：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                @foreach($levels as $level)
                    <div class="check-box">
                        <input type="checkbox" id="checkbox-{{$level->id}}" name="level_ids[]" value="{{$level->id}}" @if(in_array($level->id,$dbs)) checked @endif disabled>
                        <label for="checkbox-{{$level->id}}">{{$level->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">期刊描述：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="description" cols="" rows="" class="textarea"  placeholder="说点什么...最多输入500个字符" datatype="*0-500" dragonfly="true" nullmsg="备注不能为空！" disabled>{{$periodical->description}}</textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/500</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">期刊封面：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <img src="{{$periodical->imageUrl()}}" alt="{{$periodical->title}}" class="radius">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否上线：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="status" type="radio" id="status-1" value="1" @if($periodical->status==1) checked @endif disabled>
                    <label for="status-1">不上线</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="status-2" name="status" value="2" @if($periodical->status==2) checked @endif disabled>
                    <label for="status-2">上线</label>
                </div>
            </div>
        </div>
</div>
</form>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript">

    (function( $ ){
        // 当domReady的时候开始初始化
        $(function() {
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });

        });

    })( jQuery );
</script>
</body>
</html>