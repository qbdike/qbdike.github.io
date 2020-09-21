<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div  class="account-list-add">
	<ol class="breadcrumb we7-breadcrumb">
		<a href="<?php  echo url ('account/manage')?>"><i class="wi wi-back-circle"></i></a>
		<li><a href="<?php  echo url ('account/manage')?>">平台列表</a></li>
		<li>新建小程序</li>
	</ol>
	<div class="panel we7-panel">
		<div class="wxapp-creat-select we7-padding clearfix">
			<div class="col-sm-6">
				<div class="title">
					<span class="wi wi-small-routine"></span>
					新建单个小程序
				</div>
				<div class="con">
					打包生成小程序，仅针对开发者单个小程序插件.
				</div>
				<div>
					<a href="<?php  echo url('account/create', array('sign' => 'wxapp'))?>" class="btn btn-primary">新建小程序</a>
					<!--<a href="<?php  echo url('wxapp/post/post', array('design_method' => WXAPP_MODULE, 'uniacid' => $uniacid))?>" class="btn btn-primary">新建小程序</a>-->
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="title">
					<span class="wi wi-wxapp-pack"></span>
					打包普通应用为小程序
				</div>
				<div class="con">
					打包生成小程序，选择一个公众号应用/多个公众号应用打包为小程序
				</div>
				<div>
					<a href="<?php  echo url('wxapp/post/post', array('design_method' => WXAPP_MODULE, 'uniacid' => $uniacid, 'create_type'=>WXAPP_CREATE_MODULE))?>" class="btn btn-primary">打包一个</a>
					<a href="<?php  echo url('wxapp/post/post', array('design_method' => WXAPP_MODULE, 'uniacid' => $uniacid, 'create_type'=>WXAPP_CREATE_MUTI_MODULE))?>" class="btn btn-primary">打包多个</a>
				</div>
			</div>
			
		</div>

	</div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>