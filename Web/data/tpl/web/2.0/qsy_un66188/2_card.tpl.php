<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs"> 
	<li <?php  if($op == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('card', array('op' => 'display'))?>">管理卡密</a></li>
	<li <?php  if($op == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('card', array('op' => 'post'))?>">添加卡密</a></li> 
	
</ul>
<?php  if($op == 'post') { ?>
<div class="main">
	<div class="panel panel-info">
	<div class="panel-heading">卡密说明</div>
	<div class="panel-body">
		卡密生成后，不能重新编辑，请一次性添加好，生成尽量1000以内，卡密标识唯一，不能重复，防止卡密生成后卡的密码重复
	</div>
</div>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<div class="panel panel-default">			
			<div class="panel-body">				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>卡密名称</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="data[title]" class="form-control" value="<?php  echo $item['name'];?>" /> 
					</div>
				</div>		
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>卡密标识</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="data[card_id]" class="form-control" value="<?php  echo $item['name'];?>" />
					</div>
				</div>	
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>生成数量</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="data[num]" class="form-control" value="<?php  echo $item['name'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>生成位数</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="weishu" class="form-control" value="<?php  echo $item['name'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>天数/次数</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="data[day]" class="form-control" value="<?php  echo $item['day'];?>" />
					</div>
				</div>			
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>
<?php  } else if($op == 'display') { ?>
<div class="main">
	<div class="category">
		<form action="" method="post" onsubmit="return formcheck(this)">
			<div class="panel panel-default">
				<div class="panel-body table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>卡密名称</th>
								<th>卡密标识</th>
								<th>生成数量</th>								
								<th>生成天数/次数</th>	
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php  if(is_array($list)) { foreach($list as $row) { ?>
						
						<tr>
							<td><?php  echo $row['title'];?></td>							
							<td><?php  echo $row['card_id'];?></td>							
							<td><?php  echo $row['num'];?></td>							
							<td><?php  echo $row['day'];?></td>							
											
							<td>
								<a href="<?php  echo $this->createWebUrl('card', array('op' => 'card', 'id' => $row['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="编辑">查看卡密</a>&nbsp;&nbsp;
								<a href="<?php  echo $this->createWebUrl('card', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除吗？');return false;" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="删除">删除卡密</a>
							</td>
						</tr>						
						<?php  } } ?>				
						
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>
<?php  echo $pager;?>
<?php  } ?>
<?php  if($op == 'card') { ?>
<style>
.table td span{display:inline-block;margin-top:4px;}
.table td input{margin-bottom:0;}
.account-stat{overflow:hidden; color:#666;}
.account-stat .account-stat-btn{width:100%; overflow:hidden;}
.account-stat .account-stat-btn > div{text-align:center; margin-bottom:5px;margin-right:2%; float:left;width:23%; height:80px; padding-top:10px;font-size:16px; border-left:1px #DDD solid;position: relative}
.account-stat .account-stat-btn > div.col-3{width: 31%}
.account-stat .account-stat-btn > div:first-child{border-left:0;}
.account-stat .account-stat-btn > div span{display:block; font-size:30px; font-weight:bold}
.account-stat .account-stat-btn > div.col-12{width: 12.2%;}
.account-stat .account-stat-btn > div.col-6{width: 48%;}
.account-stat .account-stat-btn > div a{font-size: 15px; position: absolute; right: 0; bottom: 10px}
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        关键指标
    </div>
    <div class="account-stat">
        <div class="account-stat-btn">
            <div>排重卡密数量<span><?php  echo $total;?></span></div>                  
            <div>已兑换<span><?php  echo $ydh;?>个</span></div> 
            <div>兑换天数<span><?php  echo $card['day'];?>天</span></div> 
        </div>
    </div>
</div>
<div class="main">
	<div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site">
			<input type="hidden" name="a" value="entry">
			<input type="hidden" name="m" value="<?php  echo $_GPC['m'];?>">
			<input type="hidden" name="do" value="<?php  echo $_GPC['do'];?>"/>
			<input type="hidden" name="op" value="<?php  echo $_GPC['op'];?>"/>			
			<input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>"/>	
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">卡密密码</label> 
			<div class="col-xs-8">
				<input type="text" name="pwd" class="form-control" value="<?php  echo $_GPC['pwd'];?>" placeholder="可搜索卡密密码 " />
			</div>	
			<div class="form-group">				
				<div class="col-xs-12 col-sm-2 col-md-1 col-lg-1" >
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>					
				</div>
			</div>		
			<div class="form-group">				
                <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1">						
					<input class="btn btn-primary" type="submit" name="export_submit"  value="导出excel">			
				</div> 				
			</div>
			
		</form>
	</div>
</div>
<div class="main">
	<div class="category">
		<form action="" method="post" onsubmit="return formcheck(this)">
			<div class="panel panel-default">
				<div class="panel-body table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>卡密密码</th>
								<th>卡密天数</th>
								<th>会员</th>
								<th>状态</th>
							</tr>
						</thead>
						<tbody>
						<?php  if(is_array($list)) { foreach($list as $row) { ?>
						<?php  $member = pdo_get('qsy_un66188_member',['openid'=>$row['openid']]);?>
						<tr>
							<td><?php  echo $row['pwd'];?></td>							
							<td><?php  echo $row['day'];?></td>
							<td><?php  echo $member['nickname'];?></td> 										
							<td><?php  if($row['status'] == 1) { ?><font style="color:red;">已兑换</font><?php  } else { ?>未兑换<?php  } ?></td>							
												
						</tr>						
						<?php  } } ?>				
						
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>
<?php  echo $pager;?>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
