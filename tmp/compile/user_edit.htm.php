<?php echo $this->fetch('head.htm'); ?>
<?php echo $this->fetch('nav.htm'); ?>
<div class="span10">
	  
		  <div class="page-header">
            <h3>个人信息</h3>
          </div>
		  
          <div class="row-fluid">
            <div class="span12">
	  
	  
	  
	  <form class="form-horizontal" method="post" action="?action=user&do=updatapt">
	  
	       <input type="text" name="id" value="<?php echo $this->_var['row']['id']; ?>" style="display:none;">



		      <div class="control-group"><label class="checkbox inline">
            <label for="input01" class="control-label">用户名：</label>
            <input type="text" id="username" class="input-xlarge" name="user_name" value="<?php echo $this->_var['row']['user_name']; ?>" readonly>
              </label>
			<label class="checkbox inline">	
            <label for="input01" class="control-label">邮箱：</label>
            <input type="text" id="username" class="input-xlarge" name="email" value="<?php echo $this->_var['row']['email']; ?>" readonly>
              </label>
              </div>
			  
			  		      <div class="control-group"><label class="checkbox inline">
            <label for="input01" class="control-label">SS密码：</label>
            <input type="text" id="username" class="input-xlarge" name="passwd" value="<?php echo $this->_var['row']['passwd']; ?>" >
              </label>
			<label class="checkbox inline">	
            <label for="input01" class="control-label">端口：</label>
                    <input type="text" id="username" class="input-xlarge" name="port" value="<?php echo $this->_var['row']['port']; ?>"  readonly>
              </label>
              </div>
			  
				  
		      <div class="control-group"><label class="checkbox inline">
            <label for="input01" class="control-label">总流量：</label>
            <input type="text" id="username" class="input-xlarge" name="transfer_enable" value="<?php echo $this->_var['row']['transfer_enable']; ?>" readonly>
              </label>
			<label class="checkbox inline">	
               <label for="input01" class="control-label">服务状态：</label>
			     <input type="text" id="username" class="input-xlarge" name="enable" 
			   			value="<?php if ($this->_var['row']['enable'] == "0"): ?>OFF<?php endif; ?><?php if ($this->_var['row']['enable'] == "1"): ?>ON<?php endif; ?>" readonly>
              </label>
              </div>
			  
	
		      <div class="control-group"><label class="checkbox inline">
            <label for="input01" class="control-label">上传流量：</label>
            <input type="text" id="username" class="input-xlarge" name="u" value="<?php echo $this->_var['row']['u']; ?>" readonly>
              </label>
			<label class="checkbox inline">	
            <label for="input01" class="control-label">下载流量：</label>
            <input type="text" id="username" class="input-xlarge" name="d" value="<?php echo $this->_var['row']['d']; ?>" readonly>
              </label>
              </div>

  
  		      <div class="control-group"><label class="checkbox inline">
            <label for="input01" class="control-label">用户组：</label>
            <input type="text" id="username" class="input-xlarge" name="enable" 
			   			value="<?php if ($this->_var['row']['invite_num'] == "0"): ?>普通用户<?php endif; ?><?php if ($this->_var['row']['invite_num'] == "1"): ?>管理员<?php endif; ?>" readonly>
              </label>
			<label class="checkbox inline">	
            <label for="input01" class="control-label">帐户余额：</label>
            <input type="text" id="username" class="input-xlarge" name="money" value="<?php echo $this->_var['row']['money']; ?>" readonly>
              </label>
              </div>
			

			<div class="form-actions">
            <button class="btn btn-success" type="submit" >保存</button>
			   <a class="btn" href="?index"><i class="icon-share"></i> 返回</a>		
          </div>   	

		  
	   
            </div>
          </div>
		  
		  
        </div>

		
<?php echo $this->fetch('foot.htm'); ?>