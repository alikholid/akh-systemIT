<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		//alert(' echo $page_title ?>');
		new_karyawan = 1;
		karyawan_id = 0;
		karyawan_type_id = 1;
		karyawan_this_memo = 0;
		karyawan_lock_data = 0;
		karyawan_open_form = 1;
		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
	  //	page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		
		//$("#tab_<?php echo $methodid; ?>_header").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_trims").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_picture").removeAttr("data-toggle");
		
		//$("#tab_<?php echo $methodid; ?>_header").addClass( "tab_disabled");
		$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		$("#tab_<?php echo $methodid; ?>_trims").addClass( "tab_disabled");
	    $("#tab_<?php echo $methodid; ?>_picture").addClass( "tab_disabled");
		
		//$("#tab_<?php echo $methodid; ?>_trims").hide();
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		//$('#panel_content_form_upload_<?php echo $methodid ?>').hide();
		
		$('#form_<?php echo $methodid ?>_style_spec_header_id').val('');
		$('#form_<?php echo $methodid ?>_detail_style_spec_header_id').val('');
		$('#form_<?php echo $methodid ?>_detail_info_spec').val('add');
		getnexttransno(58, 'form_<?php echo $methodid ?>_style_spec_nomor');
		//$('#form_<?php echo $methodid ?>_detail_keterangan_spec').val('ADD');
		
		//$('.button_<?php echo $methodid ?>_keluarga_edit').hide();
		//$('.button_<?php echo $methodid ?>_keluarga_new').show();
		
		//$('.button_<?php echo $methodid ?>_dokumen_edit').hide();
		//$('.button_<?php echo $methodid ?>_dokumen_new').show();
		
		
		// change_mat_item(-1);
		
		setTimeout(function(){ 
			//purchase_order_get_purchase_data();
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
	

</script>