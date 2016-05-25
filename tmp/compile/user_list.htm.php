<?php echo $this->fetch('head.htm'); ?>
<?php echo $this->fetch('nav.htm'); ?>

<div class="span11">
		  <div class="page-header">
            <h3><?php echo $this->_var['title']; ?></h3>
          </div>

			<form class="form-search" action="" method="post">
			<?php if ($_SESSION['invite_num'] == "1"): ?>	
			<a href="?action=user&do=new" class="btn btn-primary pull-right"><i class="icon-pencil icon-white"></i> 新建</a>
			<?php else: ?>
		     
		    <?php endif; ?>		
			
			<input type="text" name="kewords" class="input-small" value="<?php echo $_REQUEST['kewords']; ?>"  placeholder="关键词">	
			<?php echo $this->_var['select_userlist']; ?>	
			<input type="text" name="time_start" value="<?php echo $_REQUEST['time_start']; ?>"  id="datepicker" placeholder="开始时间" class="input-small hidden-phone"/>
			- <input type="text" name="time_over" value="<?php echo $_REQUEST['time_over']; ?>"  id="datepicker2" placeholder="结束时间" class="input-small hidden-phone"/>
			<button type="submit" class="btn"><i class="icon-search"></i> 查询</button>
			<a href="" class="btn hidden-phone"><i class="icon-th-list"></i> 全部</a>
			</form> 
			
          <div class="row-fluid">
            <div class="span12">

				<table width="100%" class="table table-bordered table-striped">
					<thead>
					  <tr>
						<th width="32">用户名</th>
						<th width="32">服务状态</th>
						<th width="32">端口</th>
						<th width="50">总流量</th>
						<th width="50">上传流量</th>
						<th width="50">下载流量</th>
						<th width="50" class="hidden-phone">最后使用时间</th>
						<th width="30">用户组</th>
						<th width="30">操作</th>
					  </tr>
					</thead>
					<tbody>
					 
			<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
				<tr>
					<td><?php echo $this->_var['row']['user_name']; ?></td>
					<td>
					<?php if ($this->_var['row']['enable'] == "0"): ?>OFF<?php endif; ?>
					<?php if ($this->_var['row']['enable'] == "1"): ?>ON<?php endif; ?>
					</td>
					<td><?php echo $this->_var['row']['port']; ?></td>
					<td><?php echo $this->_var['row']['transfer_enable']; ?></td>
					<td><?php echo $this->_var['row']['u']; ?></td>
					<td><?php echo $this->_var['row']['d']; ?></td>
					<td class="hidden-phone"><?php echo date("Y-m-d H:i:s",$this->_var['row']['t']); ?></td>
					<td>
					<?php if ($this->_var['row']['invite_num'] == "0"): ?>普通用户<?php endif; ?>
					<?php if ($this->_var['row']['invite_num'] == "1"): ?>管理员<?php endif; ?>
					</td>
					<td>
<?php if ($_SESSION['invite_num'] == "1"): ?>	
		<a class="btn btn-small" href="?action=user&do=editpass&id=<?php echo $this->_var['row']['id']; ?>"><i class="icon-edit"></i> 编辑</a>	
		<a class="btn btn-small" href="?action=user&do=del&id=<?php echo $this->_var['row']['id']; ?>" onclick="if(!confirm( '确认要删除吗? ')){return false;}"><i class="icon-trash"></i> 删除</a>
<?php else: ?>
无权限
<?php endif; ?>		
					</td>
				</tr>			
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 
					</tbody>
				  </table>
				  
				<div class="pagination pagination-centered">
					  <ul class="">
						<li><span class="btn">共<?php echo $this->_var['total']; ?>条</span></li>
						<?php echo $this->_var['page']; ?>
					 </ul>
				</div>
	  
            </div>
          </div>
		  
		  
        </div>

<?php echo $this->fetch('foot.htm'); ?>