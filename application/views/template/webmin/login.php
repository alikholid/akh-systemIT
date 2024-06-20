<!doctype html>
<html lang="en">
 
	<?php $this->load->view($path_template.'/include/global/meta'); ?>
	<body>
		<div class="wrapper">
			<div id="pre-loader">
				<img src="<?php echo BASEDIR . "assets/" . $path_template ."/" ?>images/pre-loader/loader-01.svg" alt="">
			</div>
			
			<?php 
		  //print_r($view_load);
				if(isset($view_load)){
					if(is_array($view_load)){
						foreach($view_load as $dt_load){
							$this->load->view('content/'.$dt_load);
						}
					} else {
						$this->load->view('content/'.$view_load);
					}
				}
			?>	
		
		</div>
		
		<?php $this->load->view($path_template.'/include/global/javascript'); ?>
	</body>
</html>
