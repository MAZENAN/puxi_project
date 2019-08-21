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
<title>上传期刊文档</title>

<link href="{{asset('admin/lib/webuploader/0.1.5/webuploader.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form class="form form-horizontal" id="form-periodicalDoc-add" action="" method="post">
		<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>期刊日期：<a href="javascript:void(0);" onClick="help(1)"><i class="Hui-iconfont" id="help1">&#xe633;</i></a></label>
		<div class="formControls col-xs-8 col-sm-9">
		<input type="text" onfocus="WdatePicker({dateFmt:'yyyy', maxDate:'#F{\'%y\'}' })" id="establish_at" class="input-text Wdate"  autocomplete="off" name="year" >
		</div>

		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>出版周期：<a href="javascript:void(0);" onClick="help(2)"><i class="Hui-iconfont" id="help2">&#xe633;</i></a></label>
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
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择期数：<a href="javascript:void(0);" onClick="help(3)"><i class="Hui-iconfont" id="help3">&#xe633;</i></a></label>
			<div class="formControls col-xs-4 col-sm-3">
				<span class="select-box">
				<select class="select" id="quick">
					<option value="" selected="" disabled="">快速选择</option>
				</select>
				</span>
			</div>
			<div class="formControls col-xs-4 col-sm-3">手动选择:<a href="javascript:void(0);" onClick="help(4)"><i class="Hui-iconfont" id="help4">&#xe633;</i></a>&nbsp;&nbsp;第<input type="text" class="input-text" style="width: 40px;" id="manual">期
				</span>
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文档备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="description" cols="" rows="" class="textarea"  placeholder="说点什么...最多输入50个字符" datatype="*0-50" dragonfly="true" nullmsg="备注不能为空！" ></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/50</p>
			</div>
		</div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文档上传：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="uploader-list-container">
                    <div class="queueList">
                        <div id="dndArea" class="placeholder">
                            <div id="filePicker-1"></div>
                            <p>或将文档拖到这里，只支持PDF单个</p>
                        </div>
                    </div>
                    <div class="statusBar" style="display:none;">
                        <div class="progress"> <span class="text">0%</span> <span class="percentage"></span> </div>
                        <div class="info"></div>
                        <div class="btns">
                            <div id="filePicker"></div>
                            <div class="uploadBtn">开始上传</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				{{csrf_field()}}
				<input type="hidden" name="phase" id="phase">
				<button class="btn btn-primary radius" ><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button onClick="periodical_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="reset">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>


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
<script type="text/javascript" src="{{asset('admin/lib/webuploader/0.1.5/webuploader.min.js')}}"></script>
<script type="text/javascript">
function periodical_save(){
	alert("刷新父级的时候会自动关闭弹层。")
	window.parent.location.reload();
}


(function( $ ){
    // 当domReady的时候开始初始化
    $(function() {
    	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

        var responsecode ;//上传文档的响应码
        var currentli;
        var $wrap = $('.uploader-list-container'),
            // 期刊容器
            $queue = $( '<ul class="filelist"></ul>' )
                .appendTo( $wrap.find( '.queueList' ) ),

            // 状态栏，包括进度和控制按钮
            $statusBar = $wrap.find( '.statusBar' ),

            // 文件总体选择信息。
            $info = $statusBar.find( '.info' ),

            // 上传按钮
            $upload = $wrap.find( '.uploadBtn' ),

            // 没选择文件之前的内容。
            $placeHolder = $wrap.find( '.placeholder' ),

            $progress = $statusBar.find( '.progress' ).hide(),

            // 添加的文件数量
            fileCount = 0,

            // 添加的文件总大小
            fileSize = 0,

            // 优化retina, 在retina下这个值是2
            ratio = window.devicePixelRatio || 1,

            // 缩略图大小
            thumbnailWidth = 110 * ratio,
            thumbnailHeight = 110 * ratio,

            // 可能有pedding, ready, uploading, confirm, done.
            state = 'pedding',

            // 所有文件的进度信息，key为file id
            percentages = {},
            // 判断浏览器是否支持期刊的base64
            isSupportBase64 = ( function() {
                var data = new Image();
                var support = true;
                data.onload = data.onerror = function() {
                    if( this.width != 1 || this.height != 1 ) {
                        support = false;
                    }
                }
                data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                return support;
            } )(),

            // 检测是否已经安装flash，检测flash的版本
            flashVersion = ( function() {
                var version;

                try {
                    version = navigator.plugins[ 'Shockwave Flash' ];
                    version = version.description;
                } catch ( ex ) {
                    try {
                        version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                                .GetVariable('$version');
                    } catch ( ex2 ) {
                        version = '0.0';
                    }
                }
                version = version.match( /\d+/g );
                return parseFloat( version[ 0 ] + '.' + version[ 1 ], 10 );
            } )(),

            supportTransition = (function(){
                var s = document.createElement('p').style,
                    r = 'transition' in s ||
                            'WebkitTransition' in s ||
                            'MozTransition' in s ||
                            'msTransition' in s ||
                            'OTransition' in s;
                s = null;
                return r;
            })(),

            // WebUploader实例
            uploader;

        if ( !WebUploader.Uploader.support('flash') && WebUploader.browser.ie ) {

            // flash 安装了但是版本过低。
            if (flashVersion) {
                (function(container) {
                    window['expressinstallcallback'] = function( state ) {
                        switch(state) {
                            case 'Download.Cancelled':
                                alert('您取消了更新！')
                                break;

                            case 'Download.Failed':
                                alert('安装失败')
                                break;

                            default:
                                alert('安装已成功，请刷新！');
                                break;
                        }
                        delete window['expressinstallcallback'];
                    };

                    var swf = 'expressInstall.swf';
                    // insert flash object
                    var html = '<object type="application/' +
                            'x-shockwave-flash" data="' +  swf + '" ';

                    if (WebUploader.browser.ie) {
                        html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
                    }

                    html += 'width="100%" height="100%" style="outline:0">'  +
                        '<param name="movie" value="' + swf + '" />' +
                        '<param name="wmode" value="transparent" />' +
                        '<param name="allowscriptaccess" value="always" />' +
                    '</object>';

                    container.html(html);

                })($wrap);

            // 压根就没有安转。
            } else {
                $wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
            }

            return;
        } else if (!WebUploader.Uploader.support()) {
            alert( 'Web Uploader 不支持您的浏览器！');
            return;
        }

        // 实例化
        uploader = WebUploader.create({
            pick: {
                id: '#filePicker-1',
                label: '点击选择文档',
                multiple:false
            },
            formData: {
                _token:$('[name=_token]').val(),
                'time':new Date().getTime()+Math.random()
            },
            fileVal:'cover',
            dnd: '#dndArea',
            paste: '#uploader',
            swf: 'admin/lib/webuploader/0.1.5/Uploader.swf',
            chunked: true,
            chunkSize: 2*1024 * 1024,//2m
            server: '{{url('admin/upload/file')}}',
            accept: {
                title: 'Docs',
                extensions: 'pdf',
                mimeTypes: 'application/pdf'
            },

            // 禁掉全局的拖拽功能。这样不会出现期刊拖进页面的时候，把期刊文档打开。
            disableGlobalDnd: true,
            fileNumLimit: 1,
            fileSizeLimit: 200 * 1024 * 1024,    // 200 M
            fileSingleSizeLimit:  200* 1024 * 1024    // 200 M
        });

        // 拖拽时不接受 js, txt 文件。
        uploader.on( 'dndAccept', function( items ) {
            var denied = false,
                len = items.length,
                i = 0,
                // 修改js类型
                unAllowed = 'text/plain;application/javascript ';

            for ( ; i < len; i++ ) {
                // 如果在列表里面
                if ( ~unAllowed.indexOf( items[i].type ) ) {
                    denied = true;
                    break;
                }
            }

            return !denied;
        });

        uploader.on('dialogOpen', function() {

        });
    //当一批文件添加进队列以后触发  {File}数组
        // uploader.on('filesQueued', function(files) {
        //     uploader.sort(function( a, b ) {
        //         if ( a.name < b.name )
        //           return -1;
        //         if ( a.name > b.name )
        //           return 1;
        //         return 0;
        //     });
        // });

        //添加“添加文件”的按钮，
        // uploader.addButton({
        //     id: '#filePicker',
        //     label: '继续添加'
        // });

        uploader.on('ready', function() {
            window.uploader = uploader;
        });

        // 当有文件添加进来时执行，负责view的创建
        function addFile(file) {
            var $li = $( '<li id="' + file.id + '">' +
                    '<p class="title">' + file.name + '</p>' +
                    '<p class="imgWrap"></p>'+
                    '<p class="progress"><span></span></p>' +
                    '</li>' ),

                $btns = $('<div class="file-panel">' +
                    '<span class="cancel">删除</span>' +
                    '<span class="rotateRight">向右旋转</span>' +
                    '<span class="rotateLeft">向左旋转</span></div>').appendTo( $li ),
                $prgress = $li.find('p.progress span'),
                $wrap = $li.find( 'p.imgWrap' ),
                $info = $('<p class="error"></p>'),

                showError = function( code ) {
                    switch( code ) {
                        case 'exceed_size':
                            text = '文件大小超出';
                            break;

                        case 'interrupt':
                            text = '上传暂停';
                            break;

                        default:
                            text = '上传失败，请重试';
                            break;
                    }

                    $info.text( text ).appendTo( $li );
                };

            if ( file.getStatus() === 'invalid' ) {
                showError( file.statusText );
            } else {
                // @todo lazyload
                $wrap.text( '预览中' );
                uploader.makeThumb( file, function( error, src ) {
                    var img;

                    if ( error ) {
                        $wrap.text( '不能预览' );
                        return;
                    }

                    if( isSupportBase64 ) {
                        img = $('<img src="'+src+'">');
                        $wrap.empty().append( img );
                    } else {
                        $.ajax('lib/webuploader/0.1.5/server/preview.php', {
                            method: 'POST',
                            data: src,
                            dataType:'json'
                        }).done(function( response ) {
                            if (response.result) {
                                img = $('<img src="'+response.result+'">');
                                $wrap.empty().append( img );
                            } else {
                                $wrap.text("预览出错");
                            }
                        });
                    }
                }, thumbnailWidth, thumbnailHeight );

                percentages[ file.id ] = [ file.size, 0 ];
                file.rotation = 0;
            }

            file.on('statuschange', function( cur, prev ) {
                if ( prev === 'progress' ) {
                    $prgress.hide().width(0);
                } else if ( prev === 'queued' ) {
                    $li.off( 'mouseenter mouseleave' );
                    $btns.remove();
                }

                // 成功
                if ( cur === 'error' || cur === 'invalid' ) {
                    showError(file.statusText );
                    percentages[ file.id ][ 1 ] = 1;
                } else if ( cur === 'interrupt' ) {
                    showError( 'interrupt' );
                } else if ( cur === 'queued' ) {
                    percentages[ file.id ][ 1 ] = 0;
                } else if ( cur === 'progress' ) {
                    $info.remove();
                    $prgress.css('display', 'block');
                } else if ( cur === 'complete' ) {

                    // if (responsecode==1) {
                    //  $li.append( '<span class="success"></span>' );
                    // }else{
                    //  $li.append('<p class="error">上传失败,请重试</p>')
                    // }
                    currentli = $li;
                }

                $li.removeClass( 'state-' + prev ).addClass( 'state-' + cur );
            });

            $li.on( 'mouseenter', function() {
                $btns.stop().animate({height: 30});
            });

            $li.on( 'mouseleave', function() {
                $btns.stop().animate({height: 0});
            });

            $btns.on( 'click', 'span', function() {
                var index = $(this).index(),
                    deg;

                switch ( index ) {
                    case 0:
                        uploader.removeFile( file );
                        return;

                    case 1:
                        file.rotation += 90;
                        break;

                    case 2:
                        file.rotation -= 90;
                        break;
                }

                if ( supportTransition ) {
                    deg = 'rotate(' + file.rotation + 'deg)';
                    $wrap.css({
                        '-webkit-transform': deg,
                        '-mos-transform': deg,
                        '-o-transform': deg,
                        'transform': deg
                    });
                } else {
                    $wrap.css( 'filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ (~~((file.rotation/90)%4 + 4)%4) +')');

                }


            });

            $li.appendTo( $queue );
        }

        // 负责view的销毁
        function removeFile( file ) {
            var $li = $('#'+file.id);

            delete percentages[ file.id ];
            updateTotalProgress();
            $li.off().find('.file-panel').off().end().remove();
        }

        function updateTotalProgress() {
            var loaded = 0,
                total = 0,
                spans = $progress.children(),
                percent;

            $.each( percentages, function( k, v ) {
                total += v[ 0 ];
                loaded += v[ 0 ] * v[ 1 ];
            } );

            percent = total ? loaded / total : 0;


            spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
            spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );
            updateStatus();
        }

        function updateStatus() {
            var text = '', stats;

            if ( state === 'ready' ) {
                text = '选中' + fileCount + '本期刊，共' +
                        WebUploader.formatSize( fileSize ) + '。';
            } else if ( state === 'confirm' ) {
                stats = uploader.getStats();
                if ( stats.uploadFailNum ||responsecode==0) {
                        layer.msg('文档上传失败',{icon:2,time:1000})
                        $upload.text( '或选择重新上传' );
                        state = 'done';
                        //location.reload();
                    text = '文档上传失败，<a class="retry" href="javascript:void(0);">重新上传</a>失败期刊或<a class="ignore" href="#">忽略</a>'
                }

            } else if(state=='finish'){
                if (responsecode==1) {
                    stats = uploader.getStats();
                    text = '文档上传成功'
                }
            }

            $info.html( text );
        }

        function setState( val ) {
            var file, stats;

            if ( val === state ) {
                return;
            }

            $upload.removeClass( 'state-' + state );
            $upload.addClass( 'state-' + val );
            state = val;

            switch ( state ) {
                case 'pedding':
                    $placeHolder.removeClass( 'element-invisible' );
                    $queue.hide();
                    $statusBar.addClass( 'element-invisible' );
                    uploader.refresh();
                    break;

                case 'ready':
                    $placeHolder.addClass( 'element-invisible' );
                    $( '#filePicker' ).removeClass( 'element-invisible');
                    $queue.show();
                    $statusBar.removeClass('element-invisible');
                    uploader.refresh();
                    break;

                case 'uploading':
                    $( '#filePicker' ).addClass( 'element-invisible' );
                    $progress.show();
                    $upload.text( '暂停上传' );
                    break;

                case 'paused':
                    $progress.show();
                    $upload.text( '继续上传' );
                    break;

                case 'confirm':
                    $progress.hide();
                    $('#filePicker').removeClass('element-invisible');

                   $upload.text( '上传结束' );
                   $upload.addClass('disabled')

                    stats = uploader.getStats();
                    if (stats.successNum && !stats.uploadFailNum && responsecode==1) {
                        setState('finish');
                        return;
                    }


                    // if (stats.successNum ===1) {
                    //     setState('finish');
                    //     return;
                    // }
                    break;
                case 'finish':
                    //stats = uploader.getStats();
                    if (responsecode==1) {
                        layer.msg('文档上传成功',{icon:1,time:1000})
                        $upload.text( '上传结束' );
                    } else {
                        // 没有成功的期刊，重设
                        layer.msg('文档上传失败',{icon:2,time:1000})
                        $upload.text( '重新上传' );
                        state = 'done';
                        location.reload();
                    }
                    break;
            }

            updateStatus();
        }
        //上传过程中触发，携带上传进度
        uploader.onUploadProgress = function( file, percentage ) {
            var $li = $('#'+file.id),
                $percent = $li.find('.progress span');

            $percent.css( 'width', percentage * 100 + '%' );
            percentages[ file.id ][ 1 ] = percentage;
            updateTotalProgress();
        };
        //当文件被加入队列以后触发  File对象
        uploader.onFileQueued = function( file ) {
            fileCount++;
            fileSize += file.size;

            if ( fileCount === 1 ) {
                $placeHolder.addClass( 'element-invisible' );
                $statusBar.show();
            }

            addFile(file);
            setState('ready');
            updateTotalProgress();
        };
        //当文件被移除队列后触发
        uploader.onFileDequeued = function( file ) {
            fileCount--;
            fileSize -= file.size;

            if ( !fileCount ) {
                setState( 'pedding' );
            }

            removeFile( file );
            updateTotalProgress();

        };

        uploader.on( 'all', function( type,file, response) {
            var stats;
            switch( type ) {
                //当所有文件上传结束时触
                case 'uploadFinished':
                    setState( 'confirm' );
                    break;
                //当开始上传流程时触发
                case 'startUpload':
                    setState( 'uploading' );
                    break;
                //当开始上传流程暂停时触发
                case 'stopUpload':
                    setState( 'paused' );
                    break;
                //
            }
        });
//文档校验
        uploader.onError = function( code ) {
            switch (code) {
                case 'Q_EXCEED_NUM_LIMIT':
                    code='超出可选数量'
                    break;
                case 'Q_EXCEED_SIZE_LIMIT':
                    code='文件超出规范大小'
                case 'Q_TYPE_DENIED':
                    code='文件类型错误'
                default:
                    code = '该文件不支持,请重试'
                    break;
            }
            layer.alert(code,{icon:5})
        };


        //当文件上传出错时触发
        // uploader.on('uploadError',function(file,reason){

        // })

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on('uploadSuccess', function( file,response ) {
        if (response.code==1) {
            responsecode =1;
            $('#phase').val(response.path)
            currentli.append('<span class="success"></span>')
        }else{
            responsecode=0;
            currentli.append('<p class="error">上传失败,请重试</p>')
                }

        });

        // 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file ) {
        $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
        });

        $upload.on('click', function() {
            if ( $(this).hasClass( 'disabled' ) ) {
                return false;
            }

            if ( state === 'ready' ) {
                uploader.upload();
            } else if ( state === 'paused' ) {
                uploader.upload();
            } else if ( state === 'uploading' ) {
                uploader.stop();
            }
        });



        $info.on( 'click', '.retry', function() {
            uploader.retry();
        } );

        $info.on( 'click', '.ignore', function() {
            layer.alert('当前版本请重新上传')
        } );

        $upload.addClass( 'state-' + state );
        updateTotalProgress();
    });


		$("#form-periodicalDoc-add").validate({
		rules:{
			year:{
				required:true,
				minlength:2,
				maxlength:50
			},
			phase:{
				required:true
			}
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
						layer.msg('添加期刊成功',{icon:1,time:1000},function(){
							var index = parent.layer.getFrameIndex(window.name);
							parent.window.location = parent.window.location;
						})
					}else{
						layer.msg('添加期刊失败!',{icon:2,time:2000});
					}
				},
                error: function(XmlHttpRequest, textis_nav, errorThrown){
					layer.msg('请重新尝试!',{icon:2,time:2000});
				}
			});
		}
	});


		$("#cycle").change(function(){
			$("#quick").empty()
			$("#quick").append('<option selected="" disabled="">快速选择</option>')
			var arr = new Array(36,24,12,6,4,2,1)
			changePhase($("#quick"),arr[parseInt($(this).val())-1])

		})

		$("#manual").blur(function(){
			var value = $(this).val();
			if (value !="") {
				$("#phase").val(value)
			}
		})

		$("#quick").change(function(){
			var value = $("#quick").val()
			$("#phase").val(value)
		})


})( jQuery );

		function help(i){
			switch (i) {
				case 1:
					layer.tips('格式为xxxx四位数', "#help"+i);
					break;
				case 2:
					layer.tips('选择出版周期后才能快速选择期数', "#help"+i);
					break;
				case 3:
					layer.tips('使用快速选择请先选择期数', "#help"+i);
					break;
				case 4:
					layer.tips('手动输入期数后快速选择将会失效',"#help"+i);
			}

		}

		function changePhase(selector,len){
			for (var i =1;i<=len;i++) {
				selector.append('<option value="'+i+'" >第'+i+'期</option>')
			}
		}
</script>
</body>
</html>