?><!-- START PLUGINS -->
<script type="text/javascript">
	var baseurl = "<?php echo base_url() ?>";
	var full_path_template = "<?php echo BASEDIR . "assets/" . $path_template ."/frontend/" ?>";	
</script>

<!-- JAVASCRIPT FILES -->
<script type="text/javascript">var plugin_path = '<?php echo BASEDIR . "assets/" . $path_template ."/frontend/" ?>plugins/';</script>
<script type="text/javascript" src="<?php echo BASEDIR . "assets/" . $path_template ."/frontend/" ?>plugins/jquery/jquery-2.1.4.min.js"></script>

<script type="text/javascript" src="<?php echo BASEDIR . "assets/" . $path_template ."/frontend/" ?>js/scripts.js"></script>

<!-- PARTICLE EFFECT -->
<script type="text/javascript" src="<?php echo BASEDIR . "assets/" . $path_template ."/frontend/" ?>plugins/effects/canvas.particles.js"></script>
<script type="text/javascript">

</script>
<?php 
	if(isset($load_js)){
		if(is_array($load_js)){
			foreach($load_js as $dt_js){
				if(substr($dt_js,0,8) == 'https://'){
					echo "<script src='". $dt_js ."'></script>";
				} elseif(substr($dt_js,0,7) == 'http://'){
					echo "<script src='". $dt_js ."'></script>";
				} else {
					$this->load->view('javascript/'.$dt_js);
				}
			}
		} else {
			if(substr($load_js,0,8) == 'https://'){
				echo "<script src='". $load_js ."'></script>";
			} elseif(substr($load_js,0,7) == 'http://'){
				echo "<script src='". $load_js ."'></script>";
			} else {
				$this->load->view('javascript/'.$load_js);
			}
		}
	} 
?>