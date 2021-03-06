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
				Linux监控信息 <small>statistics and more</small>
			</h3>
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">首页</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Linux监控信息</a></li>
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
						<div class="caption"><i class="icon-reorder"></i>Linux监控信息</div>
						<div class="tools">
							<a href="javascript:;" class="collapse"></a>
							<!-- <a href="#portlet-config" data-toggle="modal" class="config"></a>
							<a href="javascript:;" class="reload"></a>
							<a href="javascript:;" class="remove"></a> -->
						</div>
					</div>
					<div class="portlet-body">
<!-- BEGIN 主要内容-->
<div class="row-fluid">
	<div class="span12">
		<div class="alert">
		<?php echo $content;?>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<table class="table table-hover table-striped table-bordered"><tbody>
	<tr>
		<td><?php echo $load;?></td>
		<td><button id="basic_opener1" class="btn yellow">重启服务器</button></td>
	</tr>
</tbody></table>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption"><i class="icon-cogs"></i>最近十条检测结果</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<?php foreach((array)$res as $K=>$V){ ?>
				<?php 
					$count = sizeof($res);
					if(($count-9)<=$K && $K<=($count-1)){ 
				?>
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert"></button>
					<strong><?php echo $V; ?></strong>
				</div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
		<!-- END ALERTS PORTLET-->
	</div>
</div>
<!-- BEGIN 主要内容-->
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
