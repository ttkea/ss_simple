<?php echo $this->fetch('head.htm'); ?>
<?php echo $this->fetch('nav.htm'); ?>

<div class="span10">
	  
		  <div class="page-header">
            <h3>新建用户</h3>
          </div>
		  
          <div class="row-fluid">
            <div class="span12">
	  
	  
	  
	  <form class="form-horizontal" method="post" action="?action=user&do=add">
	  
			<div class="control-group">
            <label for="input01" class="control-label">用户名：</label>
            <div class="controls">
              <input type="text" id="input01" class="input-xlarge" name="user_name">
            </div>
          </div>
		  
		  		  <div class="control-group">
            <label for="input01" class="control-label">邮&nbsp;&nbsp;&nbsp;箱：</label>
            <div class="controls">
              <input type="text" id="input01" name="email" class="input-xlarge">
            </div>
          </div>

	

          <div class="control-group">
            <label for="input01" class="control-label">密&nbsp;&nbsp;&nbsp;码：</label>
            <div class="controls">
              <input type="pass" id="input01" class="input-xlarge" name="pass">
            </div>
          </div>

		    <div class="control-group">
            <label for="input01" class="control-label">ss&nbsp;&nbsp;&nbsp;密码：</label>
            <div class="controls">
              <input type="text" id="input01" class="input-xlarge" name="passwd">
            </div>
          </div>
		  
  
			<div class="form-actions">
            <button class="btn btn-success" type="submit">保存</button>
			   <a class="btn" href="?action=user"><i class="icon-share"></i> 返回</a>		
          </div>   	
      </form>
		  
		  
	   
            </div>
          </div>
		  
		  
        </div>

		
<?php echo $this->fetch('foot.htm'); ?>