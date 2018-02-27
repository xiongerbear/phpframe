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
				Linux管理面板首页 <small>statistics and more</small>
			</h3>
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">首页</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Linux管理面板首页</a></li>
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
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption"><i class="icon-reorder"></i>系统基本信息</div>
						<div class="tools">
							<a href="javascript:;" class="collapse"></a>
							<!-- <a href="#portlet-config" data-toggle="modal" class="config"></a>
							<a href="javascript:;" class="reload"></a>
							<a href="javascript:;" class="remove"></a> -->
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<div class="form-horizontal form-view">
							<h3>管理系统的基本信息</h3>
							<h3 class="form-section">个人信息</h3>
							<div class="row-fluid">
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label" for="firstName">管理员名称:</label>
										<div class="controls">
											<span class="text"><?php echo $userInfo['username']; ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label" for="lastName">计划任务数量:</label>
										<div class="controls">
											<span class="text"><?php echo $userInfo['cron']; ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row-fluid">
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">上次登陆的IP:</label>
										<div class="controls">
											<span class="text bold"><?php echo $userInfo['lip']; ?></span> 
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">上次登陆时间:</label>
										<div class="controls">
											<span class="text bold"><?php echo date('Y-m-d H:i:s',$userInfo['ltime']); ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->        
							<div class="row-fluid">
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">本次登陆的IP:</label>
										<div class="controls">
											<span class="text bold"><?php echo $userInfo['nip']; ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">本次登陆的时间:</label>
										<div class="controls">
											<span class="text bold"><?php echo date('Y-m-d H:i:s',$userInfo['ntime']); ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->                
							<h3 class="form-section">系统信息</h3>
							<div class="row-fluid">
								<div class="span12 ">
									<div class="control-group">
										<label class="control-label">系统名称:</label>
										<div class="controls">
											<span class="text">linux简易管理面板</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">操作系统:</label>
										<div class="controls">
											<span class="text"><?php echo $system['system']; ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="span6">
									<div class="control-group">
										<label class="control-label">主机名:</label>
										<div class="controls">
											<span class="text"><?php echo $system['host']; ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->           
							<div class="row-fluid">
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">CPU参数:</label>
										<div class="controls">
											<span class="text"><?php echo $system['cpuCate']; ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">CPU型号:</label>
										<div class="controls">
											<span class="text"><?php echo $system['cpu']; ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->           
							<div class="row-fluid">
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">系统当前时间:</label>
										<div class="controls">
											<span class="text"><?php echo $system['date']; ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">系统运行时间:</label>
										<div class="controls">
											<span class="text"><?php echo $system['runtime']; ?></span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->           
							<div class="row-fluid">
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">系统总内存:</label>
										<div class="controls">
											<span class="text"><?php echo $system['total']; ?>M</span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="span6 ">
									<div class="control-group">
										<label class="control-label">系统已经使用内存:</label>
										<div class="controls">
											<span class="text"><?php echo $system['used']; ?>M</span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!-- <div class="form-actions">
								<button type="submit" class="btn blue"><i class="icon-pencil"></i>Edit</button>
								<button type="button" class="btn">Back</button>
							</div> -->
						</div>
						<!-- END FORM-->  
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