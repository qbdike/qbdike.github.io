<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<table class="table table-bordered">
  <caption>卡密兑换订单</caption>  
  <thead>
    <tr>
      <th style="width:6%">序号</th>
      <th style="width:5%">头像</th>
      <th style="width:15">用户名</th>
      <th style="width:20">卡密</th>
      <th style="width:10">天数/次数</th>
      <th style="width:25%">兑换时间</th>
    </tr>
  </thead>

  <tbody>
        <?php  if(is_array($orderdata)) { foreach($orderdata as $key => $row) { ?>
        <?php  $n--;?>
    <tr >
        <td><?php  echo $n;?></td>
        <td><img src="<?php  echo $row['headimg'];?>" height="25px" width="25px"></td>
        <td><?php  echo $row['nickname'];?></td>
        <td><?php  echo $row['key'];?></td>
        <td><?php  echo $row['day'];?> <?php echo substr($row['key'],0,6) == "addnum" || substr($row['key'],0,6) == "tommie"?"<font style='color:red;'>次</font>":"天";?></td>
        <td><?php  echo date("Y-m-d H:i:s",$row['t']);?></td>
    </tr>
 <?php  } } ?>
  </tbody>
</table>

<?php  echo $pager;?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>