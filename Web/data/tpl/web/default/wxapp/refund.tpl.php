<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="we7-page-tab">
	<?php  if(is_array($active_sub_permission)) { foreach($active_sub_permission as $active_menu) { ?>
	<?php  if(permission_check_account_user($active_menu['permission_name'], false, 'wxapp')) { ?>
	<li <?php  if($action == $active_menu['active']) { ?>class="active"<?php  } ?>><a href="<?php  echo $active_menu['url'];?>version_id=<?php  echo $_GPC['version_id'];?>"><?php  echo $active_menu['title'];?></a></li>
	<?php  } ?>
	<?php  } } ?>
</ul>
<div class="main">
	<form id="form21" action="" method="post" class="we7-form form" enctype="multipart/form-data">
		<div class="panel-body">
			<table class="we7-table table-hover table-form">
				<col width="150px"/>
				<col />
				<col width="150px"/>
				<tr>
					<th colspan="4">微信退款设置</th>
				</tr>
				<tr>
					<td>微信退款</td>
					<td class="color-gray"></td>
					<td class="color-gray"><?php echo($open_or_close ? '开启': '关闭')?></td>
					<td class="text-right">
						<a class="link-group" data-toggle="modal" data-target="#wechat_refund"><span >修改</span></a>
					</td>
				</tr>
			</table>
		</div>
	</form>

	<div class="modal fade" id="wechat_refund" tabindex="-1" role="dialog"
	     aria-hidden="true">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<form action="<?php  echo url('wxapp/refund/save_setting')?>" method="post" class="we7-form form" id="form_wechat" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<div class="modal-title">微信退款设置</div>
					</div>
					<div class="modal-body">
						<div class="we7-form">
							<div class="alert alert-warning">
								证书:<br/>
								使用微信退款功能需要上传双向证书。<br/>
								证书下载方式:<br>
								微信商户平台(pay.weixin.qq.com)-->账户中心-->账户设置-->API安全-->证书下载。<br>
								我们仅用到apiclient_cert.pem 和 apiclient_key.pem这两个证书<br>

							</div>
							<div class="alert alert-warning">
								接口:<br/>
								支付回调URL: <?php  echo $_W['siteroot'];?>payment/wechat/refund.php
							</div>
							<div class="form-group">
								<label for="" class="control-label col-sm-3"><span class="pull-right">微信退款</span></label>
								<div class="form-controls col-sm-7 pull-right">
									<input type="radio" id="radio-wechat-1" name="switch" value="1" <?php  if($open_or_close == true) { ?> checked <?php  } ?>/>
									<label for="radio-wechat-1">开启 </label>
									<input type="radio" id="raido-wechat-0" name="switch" value="0" <?php  if($open_or_close == false) { ?> checked <?php  } ?>/>
									<label for="raido-wechat-0">关闭 </label>
								</div>
							</div>
							<input type="hidden" name="type" value="wechat_refund">
							<div class="form-group">
								<label for="" class="control-label col-sm-5">apiclient_cert.pem 证书</label>
								<span class="text-success  col-sm-4"><?php echo($has_cert  ? '已上传' : '') ?></span>
								<div class="form-controls col-sm-3 pull-right">
									<input type="file" id="cert" name="cert">
									<!--<a class="color-default" href="javascript:;" onclick="cert.click()">上传证书</a>-->
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-sm-5">apiclient_key.pem 证书</label>
								<span class="text-success  col-sm-4"><?php echo($has_key ? '已上传' : '')?></span>
								<div class="form-controls col-sm-3 pull-right">
									<input type="file" id="key" name="key">
									<!--<a class="color-default" href="javascript:;" onclick="key.click()">上传证书</a>-->
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">确定</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>