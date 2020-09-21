<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<!--new-->
<div class="panel panel-cut" id="js-module-display" ng-controller="userModuleDisplayCtrl" ng-cloak>
	<div class="panel-body">
		<div class="search-box">
			<select name="" class="select-letter we7-margin-right"  ng-init="letter = '<?php echo $_GPC['letter'] ? $_GPC['letter'] : '全部'?>'" ng-model="letter" ng-change="searchModule()">
				<option value="{{item == '按字母筛选(全部)' ? '全部' : item}}"  ng-repeat="item in letters">{{item}}</option>
			</select>
			<div class="search-form">
				<div class="input-group">
					<input type="text" ng-model="keyword" placeholder="请输入要搜索的应用名称" class="form-control">
					<span class="input-group-btn" ng-click="searchModule()"><button class="btn btn-default"><i class="wi wi-search"></i></button></span>
				</div>
			</div>
			<a href="<?php  echo url('module/link')?>" class="btn btn-primary">新建应用关联组</a>
		</div>

		<div class="module-display-list">
			<div class="item" ng-repeat="module in own_account_modules.modules" >
				<div class="item-box">
					<a href="javascript:void(0);" ng-click="switchModule(module)" class="action-in">进入<i class="wi wi-denglu"></i></a>
					<a class="info" href="javascript:void(0);" ng-click="switchModule(module)">
						<img ng-src="{{ module.logo }}" class="logo" alt="">
						<div class="name text-over">{{ module.title }}</div>
					</a>
					<div class="action">
						<a href="javascript:void(0);" class="action-up" data-toggle="tooltip" data-placement="bottom" data-title="置顶" ng-click="setTop(module.module_name, module.uniacid)">
							<i class="wi wi-stick-sign"></i>
						</a>
						<div href="" class="action-account text-over text-over">
							<img ng-if="module.default_uniacid" ng-src="{{ module.default_account_logo}}" class="account-logo account-img" alt="">
							<img ng-if="!module.default_uniacid" ng-src="{{ module.account_logo }}" class="account-logo account-img" alt="">
							<span class="account-name" ng-if="module.default_account_name">{{ module.default_account_info.name }}</span>
							<span class="account-name" ng-if="!module.default_account_name">{{ module.account_name }}</span>
						</div>
						<div class="dropdown action-cut">
							<a data-target="#" ng-click="showAccounts(module.module_name, module.default_account_name)">
								<i class="wi wi-wxapp" data-toggle="tooltip" data-placement="bottom" data-title="切换关联平台"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="text-right"><?php  echo $own_account_modules['pager'];?></div>
	<div class="uploader-modal modal fade module" id="jurisdiction-add">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel2">切换关联平台</h4>
				</div>
				<div class="modal-body material-content clearfix">
					<div class="material-search">
						<div class="input-group col-sm-5">
							<input class="form-control" name="keyword" ng-model="module_keyword" type="text" placeholder="请输入名称" autocomplete="false">
							<span class="input-group-btn" ng-click="loadMore(1)">
								<span class="btn btn-primary button"><i class="wi wi-search"></i></span>
							</span>
						</div>
					</div>
					<div class="material-body" id="content-modules" >
						<div class="row">
							<div class="col-sm-2" ng-repeat="module_account_info in module_hava_accounts">
								<div class="item"
									ng-click="setDefaultAccount(module_account_info.uniacid, changaModule.name)"
									ng-class="{true:'active',false:''}[module_account_info.account_name == changaModule.default_name]" >
									<img ng-src="{{ module_account_info.logo }}" alt="" class="account-img icon"/>
									<div class="name" ng-bind="module_account_info.account_name"></div>
									<div class="mask">
										<span class="wi wi-right"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--<div class="material-pager text-right clearfix" style="padding: 10px">-->
					<!--<div class="js-pager">-->
						<!--<ul class="pagination">-->
						<!--</ul>-->
					<!--</div>-->
				<!--</div>-->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	angular.module('moduleApp').value('config', {
		'own_account_modules': <?php echo !empty($own_account_modules) ? json_encode($own_account_modules) : 'null'?>,
		'activeLetter': <?php echo !empty($_GPC['letter']) ? json_encode($_GPC['letter']) : 'null'?>,
		'links': {
			'module_display' : "<?php  echo url('module/display')?>",
			'moduleAccounts' : "<?php  echo url('module/display/have_permission_uniacids')?>",
			'setDefaultAccountUrl' : "<?php  echo url('module/display/set_default_account')?>",
			'init_uni_modules': "<?php  echo url('module/display/init_uni_modules')?>",
			'set_top_url': "<?php  echo url('module/display/rank')?>",
			'module_switch_url': "<?php  echo url('module/display/switch')?>",
		},
	});
	angular.bootstrap($('#js-module-display'), ['moduleApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>