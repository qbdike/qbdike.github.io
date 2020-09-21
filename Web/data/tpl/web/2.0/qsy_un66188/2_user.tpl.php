<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

		<form action="<?php  echo $this->createWebUrl('user');?>" method="POST" class="form-horizontal" role="form">
			<div class="col-xs-8">
				<input type="text" name="name" class="form-control" value="<?php  echo $_GPC['name'];?>" placeholder="请输入要搜索的微信名，支持模糊搜索！" />
			</div>	
			<div class="form-group">				
				<div class="col-xs-12 col-sm-2 col-md-1 col-lg-1" >
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>					
				</div>
			</div>			
		</form>

<table class="table table-bordered">
  <caption>会员列表</caption>
  <!-- <a class="btn btn-primary" style="float: right;" href="<?php  echo $this->createWebUrl('member');?>&method=add">增加</a> -->
          
  <thead>
    <tr>
      <th>序号</th>
      <th>头像</th>
      <th>微信名</th>
      <th>性别</th>
      <th>可用次数</th>
      <th>省份</th>
      <th>城市</th>
      <th>注册时间</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php  if(is_array($orderdata)) { foreach($orderdata as $key => $row) { ?>
    <?php  $n--;?>
    <tr>
      <td><?php  echo $n;?></td>
      <!-- <?php  echo $_W['attachurl'];?>  这代码可以获取图片根网址，自动识别远程或者本地服务器-->
      <td>
      <!-- <?php  if(strpos($row['headingimg'],'http') !== false) { ?><img src="<?php  echo $row['headingimg'];?>" height="20px" width="20px"><?php  } else { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $row['headingimg'];?>" height="20px" width="20px"><?php  } ?> -->
      <img src="<?php  if(strpos($row['headimg'],'http') !== false) { ?><?php  echo $row['headimg'];?><?php  } else { ?>{$htis->w['attachurl']}<?php  echo $row['headimg'];?><?php  } ?>" height="20px" width="20px">   
      </td> 
      <td style="max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?php  echo $row['nickname'];?></td>
      <td>  <?php  if($row['sex'] == 1) { ?>男<?php  } else if($row['sex'] == 2) { ?>女<?php  } else { ?>未知 <?php  } ?></td>
      <td><?php  echo $row['maximum'];?></td>
      <td><?php  echo $row['province'];?></td>
      <td><?php  echo $row['city'];?></td>
      <td><?php  echo date("Y-m-d H:i:s",$row['regtime']);?></td>
      <td>
        <a href="<?php  echo $this->createWebUrl('edituser');?>&id=<?php  echo $row['id'];?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>&nbsp;编辑</a>
        <a class="btn btn-danger btn-xs delete" href="#" onclick="window.confirm('确定删除吗？')?this.href='<?php  echo $this->createWebUrl('user');?>&method=delete&id=<?php  echo $row['id'];?>':this.href='javascript:void()';"><i class="fa fa-trash"></i>&nbsp;删除</a>
</td>
    </tr>
    <?php  } } ?>

  </tbody>
</table>
<?php  echo $pager;?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>