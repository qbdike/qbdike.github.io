<?php defined('IN_IA') or exit('Access Denied');?><?php  if($nav_top_message['is_display']) { ?>
<li class="dropdown msg header-notice">
    <a href="javascript:;" class="dropdown-toogle" data-toggle="dropdown"><span class="wi wi-bell"></span>消息</a>
    <div class="dropdown-menu">
        <div class="clearfix top">消息<a href="./index.php?c=message&a=notice" class="pull-right">查看更多</a></div>
    </div>
</li>
<?php  } ?>