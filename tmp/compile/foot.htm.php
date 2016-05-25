
  </div>

  <hr>

  <footer>
	<p> Powered by <a href="http://ttkea.com" target="_blank">TTkea</a> <?php echo $this->_var['cfg']['version']; ?> 2015 Some rights reserved</p>
  </footer>

</div>



<script src="<?php echo $this->_var['cfg']['website']; ?>/js/jquery.js"></script>
<script src="<?php echo $this->_var['cfg']['website']; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $this->_var['cfg']['website']; ?>/js/bootstrap-datepicker.js"></script>

<script>
$(function(){
	window.prettyPrint && prettyPrint();
	$('#datepicker').datepicker({
		format: 'yyyy-mm-dd'
	});
	$('#datepicker2').datepicker({
		format: 'yyyy-mm-dd'
	});
});
</script>
</body>
</html>