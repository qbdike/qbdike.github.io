<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<table class="table table-bordered">
  <caption>小程序列表</caption>  
  <a class="btn btn-primary" style="float: right;" href="<?php  echo $this->createWebUrl('tuijian');?>&method=add">增加</a>
  <thead>
    <tr>
      <th style="width:6%">序号</th>
      <th style="width:6%">图片</th>
      <th style="width:15%">小程序id</th>
      <th style="width:28%">小程序名字/标题</th>
      <th style="width:30%">小程序路/网址</th>
      <th style="width:15%">操作</th>
    </tr>
  </thead>
  
  <tbody>
        <?php  if(is_array($tuijiandata)) { foreach($tuijiandata as $key => $row) { ?>
        <?php  $n--;?>
    <tr style="text-align: center;">
      <td style="max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?php  echo $n;?></td>
        <td style="max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><img style="width:40px;height:25px;"  src="<?php  echo $_W['attachurl'];?><?php  echo $row['img'];?>"></td>
          <td style="max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?php  echo $row['app_id'];?></td>
          <td style="max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?php  echo $row['app_name'];?></td>
        <td style="max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?php  echo $row['path'];?></td>
        <th style="width:10%">
        <a href="<?php  echo $this->createWebUrl('tuijian');?>&method=edit&id=<?php  echo $row['id'];?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>&nbsp;编辑</a>
        <a class="btn btn-danger btn-xs delete" href="#" onclick="window.confirm('确定删除吗？')?this.href='<?php  echo $this->createWebUrl('tuijian');?>&method=delete&id=<?php  echo $row['id'];?>':this.href='javascript:void()';"><i class="fa fa-trash"></i>&nbsp;删除</a>
     </td>
    </tr>
 <?php  } } ?>

  </tbody>
</table>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>