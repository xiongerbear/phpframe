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
				MySQL监控信息 <small>statistics and more</small>
			</h3>
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">首页</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">MySQL监控信息</a></li>
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
						<div class="caption"><i class="icon-reorder"></i>MySQL监控信息</div>
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
		<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption"><i class="icon-calendar"></i>General Stats</div>
				<!-- <div class="actions">
					<a href="javascript:;" class="btn yellow easy-pie-chart-reload"><i class="icon-repeat"></i> Reload</a>
				</div> -->
				<div class="tools">
					<a href="" class="collapse"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row-fluid">
					<div class="span4">
						<div class="easy-pie-chart">
							<div class="number transactions easyPieChart" data-percent="30" style="width:75px;height:75px;line-height:75px;"><span>30</span>%<canvas width="75" height="75"></canvas></div>
							<a class="title" href="#">Transactions <i class="m-icon-swapright"></i></a>
						</div>
					</div>
					<div class="margin-bottom-10 visible-phone"></div>
					<div class="span4">
						<div class="easy-pie-chart">
							<div class="number visits easyPieChart" data-percent="60" style="width: 75px; height: 75px; line-height: 75px;"><span>60</span>%<canvas width="75" height="75"></canvas></div>
							<a class="title" href="#">New Visits <i class="m-icon-swapright"></i></a>
						</div>
					</div>
					<div class="margin-bottom-10 visible-phone"></div>
					<div class="span4">
						<div class="easy-pie-chart">
							<div class="number bounce easyPieChart" data-percent="90" style="width: 75px; height: 75px; line-height: 75px;"><span>90</span>%<canvas width="75" height="75"></canvas></div>
							<a class="title" href="#">Bounce <i class="m-icon-swapright"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-calendar"></i>Server Stats</div>
				<div class="tools">
					<a href="" class="collapse"></a>
					<!-- <a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="" class="reload"></a>
					<a href="" class="remove"></a> -->
				</div>
			</div>
			<div class="portlet-body">
				<div class="row-fluid">
					<div class="span4">
						<div class="sparkline-chart">
							<div class="number" id="sparkline_bar"><canvas style="display: inline-block; width: 113px; height: 55px; vertical-align: top;" width="113" height="55"></canvas></div>
							<a class="title" href="#">Network <i class="m-icon-swapright"></i></a>
						</div>
					</div>
					<div class="margin-bottom-10 visible-phone"></div>
					<div class="span4">
						<div class="sparkline-chart">
							<div class="number" id="sparkline_bar2"><canvas style="display: inline-block; width: 107px; height: 55px; vertical-align: top;" width="107" height="55"></canvas></div>
							<a class="title" href="#">CPU Load <i class="m-icon-swapright"></i></a>
						</div>
					</div>
					<div class="margin-bottom-10 visible-phone"></div>
					<div class="span4">
						<div class="sparkline-chart">
							<div class="number" id="sparkline_line"><canvas style="display: inline-block; width: 100px; height: 55px; vertical-align: top;" width="100" height="55"></canvas></div>
							<a class="title" href="#">Load Rate <i class="m-icon-swapright"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
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
