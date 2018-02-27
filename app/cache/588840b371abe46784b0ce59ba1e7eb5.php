<?php require PUBLICPATH."/views/common/head.html"; ?>
<!-- BEGIN BODY -->
<!-- END SIDEBAR -->
<!-- BEGIN PAGE -->
<div class="page-content">
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div id="portlet-config" class="modal hide">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button"></button>
		<h3>Widget Settings</h3>
	</div>
	<div class="modal-body">
		Widget settings form goes here
	</div>
</div>
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
	<!-- BEGIN PAGE HEADER-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN STYLE CUSTOMIZER -->
			<!-- <div class="color-panel hidden-phone">
				<div class="color-mode-icons icon-color"></div>
				<div class="color-mode-icons icon-color-close"></div>
				<div class="color-mode">
					<p>THEME COLOR</p>
					<ul class="inline">
						<li class="color-black current color-default" data-style="default"></li>
						<li class="color-blue" data-style="blue"></li>
						<li class="color-brown" data-style="brown"></li>
						<li class="color-purple" data-style="purple"></li>
						<li class="color-grey" data-style="grey"></li>
						<li class="color-white color-light" data-style="light"></li>
					</ul>
					<label>
						<span>Layout</span>
						<select class="layout-option m-wrap small">
							<option value="fluid" selected>Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</label>
					<label>
						<span>Header</span>
						<select class="header-option m-wrap small">
							<option value="fixed" selected>Fixed</option>
							<option value="default">Default</option>
						</select>
					</label>
					<label>
						<span>Sidebar</span>
						<select class="sidebar-option m-wrap small">
							<option value="fixed">Fixed</option>
							<option value="default" selected>Default</option>
						</select>
					</label>
					<label>
						<span>Footer</span>
						<select class="footer-option m-wrap small">
							<option value="fixed">Fixed</option>
							<option value="default" selected>Default</option>
						</select>
					</label>
				</div>
			</div> -->
			<!-- END BEGIN STYLE CUSTOMIZER -->    
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
				文件目录管理 <small>statistics and more</small>
			</h3>
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">首页</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">文件目录管理</a></li>
				<!-- <li class="pull-right no-text-shadow">
					<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>
						<span></span>
						<i class="icon-angle-down"></i>
					</div>
				</li> -->
			</ul>
			<!-- END PAGE TITLE & BREADCRUMB-->
		</div>
	</div>
	<!-- END PAGE HEADER-->
	<div id="dashboard">
		<!-- BEGIN DASHBOARD STATS -->
		<!-- start自定义修改的表格 -->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN BUTTONS PORTLET-->
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption"><i class="icon-reorder"></i>文件目录管理</div>
						<div class="tools">
							<a href="javascript:;" class="collapse"></a>
							<!-- <a href="#portlet-config" data-toggle="modal" class="config"></a>
							<a href="javascript:;" class="reload"></a>
							<a href="javascript:;" class="remove"></a> -->
						</div>
					</div>
					<div class="portlet-body">
						<div class="row-fluid">
							<div class="span7">
								<a href="<?php echo U('File/file'); ?>" class="btn purple">
									<i class="icon-arrow-left icon-white"></i>
									<span>返回首页</span>
								</a>
								<label class="btn green">
									<i class="icon-plus icon-white"></i>
									<span>上传文件</span>
									<input name="files" type="file" style="display:none;" id="file_upload">
								</label>
								<a href="<?php echo $backurl;?>" class="btn blue">
									<i class="icon-arrow-left icon-white"></i>
									<span>返回上一级</span>
								</a>
								<button type="1" class="btn yellow addnew">
									<i class="icon-folder-open icon-white"></i>
									<span>新建文件夹</span>
								</button>
								<button type="2" class="btn red addnew">
									<i class="icon-book icon-white"></i>
									<span>新建文件</span>
								</button>
							</div>
							<!-- The global progress information -->
							<div class="span5 fileupload-progress fade">
								<!-- The global progress bar -->
								<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
									<div class="bar" style="width:0%;"></div>
								</div>
								<!-- The extended global progress information -->
								<div class="progress-extended">&nbsp;</div>
							</div>
						</div>
						<div class="row-fluid">
							<?php if(isset($dir)){?>
							<?php foreach((array)$dir as $K=>$V){ ?>
								<div class="line-2" path="<?php echo U('File/file',array('path'=>$V,'deep'=>$deep));?>">
									<div>
										<img src="<?php echo PUBLICPATH;?>/public/images/wenjianjia.png" />
									</div>
									<span><?php echo $V; ?></span>
								</div>
							<?php } ?>
							<?php }else{?>
								<div class="line-2"><span>无任何目录</span></div>
							<?php }?>
							<?php if(isset($files)){?>
							<?php foreach((array)$files as $K=>$V){ ?>
								<div class="line-2">
									<div>
										<img src="<?php echo PUBLICPATH;?>/public/images/wenjian.png" />
									</div>
									<span><?php echo $V; ?></span>
								</div>
							<?php } ?>
							<?php }else{?>
								<div class="line-2"><span>无任何文件</span></div>
							<?php }?>
						</div>
						<!-- END DASHBOARD STATS -->
						<div class="clearfix"></div>

					</div>
				</div>
				<!-- END BUTTONS PORTLET-->      
			</div>
		</div>
		<!-- end自定义修改的表格 -->
	</div>
</div>
<!-- END PAGE CONTAINER-->    
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="modal-scrollable createDirFile" style="z-index:10050;display:none;">
	<div id="stack1" class="modal hide fade in modal-overflow" tabindex="-1" data-focus-on="input:first" style="display:block;margin-top:0px;top:30%;width:30%;" aria-hidden="false">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h3 class="title">新建文件目录</h3>
		</div>
		<div class="modal-body">
			<!-- <p>请输入文件名</p> -->
			<input class="m-wrap" type="text" name="name" placeholder="请输入文件夹或者文件名" style="width:70%;" />
			<input name="type" type="hidden" value="1" />
			<button type="button" class="btn red" id="addnew">确定</button>
		</div>
		<!-- <div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn">Close</button>
			<button type="button" class="btn red">确定</button>
		</div> -->
	</div>
</div>
<ul class="dropdown-menu keyright" style="display:none!important;position:fixed;left:0;top:0;">
	<li>
		<a href="javascript:;" id="rename"><i class="icon-edit"></i>重命名</a>
	</li>
	<li>
		<a href="javascript:;" id="copy"><i class="icon-random"></i>复制到</a>
	</li>
	<li>
		<a href="javascript:;" id="move"><i class="icon-signout"></i>移动到</a>
	</li>
	<li>
		<a href="javascript:;" id="del"><i class="icon-remove"></i>删除</a>
	</li>
</ul>
<div class="modal-scrollable reDirFile" style="z-index:10050;display:none;">
	<div class="modal hide fade in modal-overflow" style="display:block;margin-top:0px;top:30%;width:30%;" aria-hidden="false">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h3 class="title">重命名</h3>
		</div>
		<div class="modal-body">
			<input class="m-wrap" type="text" name="filename" placeholder="请输入文件夹或者文件名" style="width:70%;" />
			<input name="oldname" type="hidden" />
			<button type="button" class="btn red" id="reDirFile">确定修改</button>
		</div>
	</div>
</div>
<div class="modal-scrollable moveDirFile" style="z-index:10050;display:none;">
	<div class="modal hide fade in modal-overflow" style="display:block;margin-top:0px;top:30%;width:30%;" aria-hidden="false">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h3 class="title">请选择目录</h3>
		</div>
		<div class="modal-body" style="height:50px;">
			<select class="selectDir" name="newdir" style="width:100%;">

			</select>
		</div>
		<div class="modal-footer">
			<input name="olddirfile" type="hidden" />
			<input name="mvcptype" type="hidden" />
			<button type="button" class="btn red" id="moveDirFile">确定</button>
		</div>
	</div>
</div>
<div class="modal-backdrop fade in" style="z-index:10049;display:none;"></div>
<?php require PUBLICPATH."/views/common/footer.html"; ?>
<script src="<?php echo PUBLICPATH;?>/public/js/ajaxfileupload.js" type="text/javascript"></script> 
<script type="text/javascript">
	$(function(){

		$(document).bind("contextmenu",function(e){   
	    	return false;   
	    });

		$(".line-2").mousedown(function(e){
        	if(e.which == 3){
            	var xx = e.originalEvent.x || e.originalEvent.layerX || 0;
				var yy = e.originalEvent.y || e.originalEvent.layerY || 0;
				var file = $(this).find("span").html();

				$(".keyright").find("a").attr("name",file);
				$(".keyright").css("left",xx);
				$(".keyright").css("top",yy);
				$(".keyright").css("display","block");
        	}else if(e.which == 1){
                var url = $(this).attr("path");
                if(typeof(url) == "undefined"){
                	//alert('这是文件左键单击事件');
                	return false;  
                }else{
                	window.location.href=url;
                }
            }
        })

		//异步删除文件或者目录
		$("#del").click(function(){
			var name = $(this).attr("name");
			var dirpath = "<?php echo $dirpath;?>";
			$.ajax({
        		type:"post",
        		url:"<?php echo U('File/delDirFile'); ?>",
        		dataType:"json",
        		data:{name:name,dirpath:dirpath},
        		success:function(data){
        			if(data.state==200){
        				alert(data.msg);
        				window.location.reload();//刷新当前页面
        			}else{
        				alert(data.msg);
        			}
        		},
        	});
		});
		//重命名文件或者目录
		$("#rename").click(function(){
			var name = $(this).attr("name");
			$("input[name=filename]").val(name);
			$("input[name=oldname]").val(name);
			$(".reDirFile").fadeIn()
			$(".fade,.in").fadeIn()
		});
		//重命名文件或者目录
		$("#reDirFile").click(function(){
			var name = $("input[name=filename]").val();
			var oldname = $("input[name=oldname]").val();
			var dirpath = "<?php echo $dirpath;?>";
			$.ajax({
        		type:"post",
        		url:"<?php echo U('File/renameDirFile'); ?>",
        		dataType:"json",
        		data:{name:name,dirpath:dirpath,oldname:oldname},
        		success:function(data){
        			if(data.state==200){
        				alert(data.msg);
        				window.location.reload();//刷新当前页面
        			}else{
        				alert(data.msg);
        			}
        		},
        	});
		});



		//移动文件或者目录
		$("#move").click(function(){
			var name = $(this).attr("name");
			$.ajax({
        		type:"post",
        		url:"<?php echo U('File/readAllDir'); ?>",
        		dataType:"json",
        		success:function(data){
        			if(data.state==200){
        				var obj = data.dir;
        				var str = "";
        				$.each(obj,function (n, value) {
			               //alert(n + ' ' + value);
			               str += "<option class='m-wrap' value='"+value+"'>"+value+"</option>";
			        	});
			        	$("input[name=olddirfile]").val(name);
			        	$("input[name=mvcptype]").val("1");
        				$(".selectDir").empty();
        				$(".selectDir").append(str);
        				$(".moveDirFile").fadeIn();
						$(".fade,.in").fadeIn();
        			}else{
        				alert(data.msg);
        			}
        		},
        	});
		});

		//移动文件或者目录
		$("#copy").click(function(){
			var name = $(this).attr("name");
			$.ajax({
        		type:"post",
        		url:"<?php echo U('File/readAllDir'); ?>",
        		dataType:"json",
        		success:function(data){
        			if(data.state==200){
        				var obj = data.dir;
        				var str = "";
        				$.each(obj,function (n, value) {
			               //alert(n + ' ' + value);
			               str += "<option class='m-wrap' value='"+value+"'>"+value+"</option>";
			        	});
			        	$("input[name=olddirfile]").val(name);
			        	$("input[name=mvcptype]").val("2");
        				$(".selectDir").empty();
        				$(".selectDir").append(str);
        				$(".moveDirFile").fadeIn();
						$(".fade,.in").fadeIn();
        			}else{
        				alert(data.msg);
        			}
        		},
        	});
		});

		$("#moveDirFile").click(function(){
			var selectname = $("select[name=newdir]").val();
			var olddirfile = $("input[name=olddirfile]").val();
			var type = $("input[name=mvcptype]").val();
			var dirpath = "<?php echo $dirpath;?>";
			$.ajax({
        		type:"post",
        		url:"<?php echo U('File/moveDirFile'); ?>",
        		dataType:"json",
        		data:{olddirfile:olddirfile,dirpath:dirpath,selectname:selectname,type:type},
        		success:function(data){
        			if(data.state==200){
        				alert(data.msg);
        				window.location.reload();//刷新当前页面
        			}else{
        				alert(data.msg);
        			}
        		},
        	});
		});

        $(".close,.modal-backdrop").click(function(){
        	$(".modal-scrollable,.modal-backdrop").fadeOut();
        });

        $(".addnew").click(function(){
        	var type=$(this).attr("type");
        	$("input[name=type]").val(type);
        	if(type==1){
        		$(".title").html("新建文件夹");
        	}else{
        		$(".title").html("新建文件");
        	}
        	$(".createDirFile,.modal-backdrop").fadeIn();
        });

        $("#addnew").click(function(){
        	var dirpath = "<?php echo $dirpath;?>";
        	var name = $("input[name=name]").val();
        	var type = $("input[name=type]").val();
        	$.ajax({
        		type:"post",
        		url:"<?php echo U('File/createNew'); ?>",
        		dataType:"json",
        		data:{name:name,dirpath:dirpath,type:type},
        		success:function(data){
        			if(data.state==200){
        				alert(data.msg);
        				window.location.reload();//刷新当前页面
        			}else{
        				alert(data.msg);
        			}
        		},
        	});
        });


        /**********异步上传文件*******/
		$("#file_upload").change(function(){
			var dirpath = "<?php echo $dirpath;?>";
			$.ajaxFileUpload({
				url:"<?php echo U('File/uploadFile');?>", //用于文件上传的服务器端请求地址
				type:'POST',
				secureuri:false, //是否需要安全协议，一般设置为false
				fileElementId:'file_upload', //文件上传域的ID
				dataType:'text', //返回值类型 一般设置为json
				data:{dirpath:dirpath},
				success:function(data,status){
	                var info = JSON.parse(data);
	                if(info.state==200){
	                	alert(info.msg);
	                	window.location.reload();//刷新当前页面
	                }else{
	                	alert(info.msg);
	                }
	                window.location.reload();
	            },
	            error:function(data,status,e){
	                alert(e);
	                window.location.reload();
	            }
			});
		});

	});
</script>
