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
			<div class="color-panel hidden-phone">
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
			</div>
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
							<?php if(isset($dir)){?>
							<?php foreach((array)$dir as $K=>$V){ ?>
								<a href="<?php echo U('File/index',array('path'=>$V,'deep'=>$deep));?>"><div class="line-2">
									<div>
										<img src="<?php echo PUBLICPATH;?>/public/images/wenjianjia.png" />
									</div>
									<span><?php echo $V; ?></span>
								</div></a>
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
<?php require PUBLICPATH."/views/common/footer.html"; ?>