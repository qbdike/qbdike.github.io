<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel=title">
        充值设置
      </h3>
    </div>
    <div class="panel-body">
        
      <form action="<?php  echo $this->createWebUrl('payconfig');?>" method="POST" class="form-horizontal" role="form">
     
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">充值(1)</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-lg-5">
                      <input name="moneya" type="text" class="form-control" placeholder="充值金额(元)输入整数" value="<?php  echo $config['money_a'];?>"> 
                    </div>
                    <div class="col-lg-5">
                      <input name="numa" type="text" class="form-control" placeholder="充值次数" value="<?php  echo $config['num_a'];?>">
                    </div>
                  </div>
            </div>
          </div>
        
          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">充值(2)</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-lg-5">
                      <input name="moneyb" type="text" class="form-control" placeholder="充值金额(元)输入整数" value="<?php  echo $config['money_b'];?>">
                    </div>
                    <div class="col-lg-5">
                      <input name="numb" type="text" class="form-control" placeholder="充值次数" value="<?php  echo $config['num_b'];?>">
                    </div>
                  </div>
            </div>
          </div>

          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">充值(3)</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-lg-5">
                      <input name="moneyc" type="text" class="form-control" placeholder="充值金额(元)输入整数" value="<?php  echo $config['money_c'];?>">
                    </div>
                    <div class="col-lg-5">
                      <input name="numc" type="text" class="form-control" placeholder="充值次数" value="<?php  echo $config['num_c'];?>">
                    </div>
                  </div>
            </div>
          </div>
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">提交</button>
          </div>
        </div> 
      </form>
    </div>
  </div>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>