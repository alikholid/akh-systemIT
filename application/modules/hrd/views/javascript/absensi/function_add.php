<script type="text/javascript">  
	function nav_button_<?php echo $function ?>(){
		//alert('<?php echo $page_title ?>');
		new_karyawan = 1;
		karyawan_id = 0;
		karyawan_type_id = 1;
		karyawan_this_memo = 0;
		karyawan_lock_data = 0;
		karyawan_open_form = 1;
		
		$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
	  //	page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		
		//$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_biodata").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_keluarga").removeAttr("data-toggle");
		$("#tab_<?php echo $methodid; ?>_dokumen").removeAttr("data-toggle");
		
		$("#tab_<?php echo $methodid; ?>_biodata").addClass( "tab_disabled");
		$("#tab_<?php echo $methodid; ?>_keluarga").addClass( "tab_disabled");
		$("#tab_<?php echo $methodid; ?>_dokumen").addClass( "tab_disabled");
		
		$('#panel_content_<?php echo $methodid ?>').hide();
		$('#panel_content_form_<?php echo $methodid ?>').show();
		
		$('#form_<?php echo $methodid ?>_karyawan_id').val('');
		//$('#form_<?php echo $methodid ?>_karyawan_type_id').val(karyawan_type_id);
		
		//new_purchase_order = 1;
		//purchase_order_id = 0;
		//purchase_type_id = 1;
		//purchase_order_this_memo = 0;
		//purchase_order_lock_data = 0;
		//purchase_order_open_form = 1;
		//
		//$('.form_title_<?php echo $methodid ?>').html('New <?php echo $page_title ?>');
		//
		//page_loading("show",'New <?php echo $page_title ?>','Please Wait...');
		//
		//$("#tab_<?php echo $methodid; ?>_detail").removeAttr("data-toggle");
		//$("#tab_<?php echo $methodid; ?>_detail").addClass( "tab_disabled");
		//
		//$('#panel_content_<?php echo $methodid ?>').hide();
		//$('#panel_content_form_<?php echo $methodid ?>').show();
		//
		//
		//$('#form_<?php echo $methodid ?>_purchase_order_id').val('');
		//$('#form_<?php echo $methodid ?>_purchase_type_id').val(purchase_type_id);
		//$('#form_<?php echo $methodid ?>_this_memo').val(purchase_order_this_memo);
		//getnexttransno(2, 'form_<?php echo $methodid ?>_purchase_order_no');
		//$('#form_<?php echo $methodid ?>_purchase_order_date').val('<?php echo date('Y-m-d') ?>');
		//$('#form_<?php echo $methodid ?>_purchase_order_memo').val('');
		//
		//$('#form_<?php echo $methodid ?>_detail_purchase_order_id').val('');
		//$('#form_<?php echo $methodid ?>_detail_purchase_order_detail_id').val('');
		//$('#form_<?php echo $methodid ?>_detail_quantity_ordered').val(0);
		//$('#form_<?php echo $methodid ?>_detail_conversion').val(1);
		//$('#form_<?php echo $methodid ?>_detail_unit_price').val(0);
		//		
		$('.button_<?php echo $methodid ?>_keluarga_edit').hide();
		$('.button_<?php echo $methodid ?>_keluarga_new').show();
		
		$('.button_<?php echo $methodid ?>_dokumen_edit').hide();
		$('.button_<?php echo $methodid ?>_dokumen_new').show();
		//
		//$('.panel_<?php echo $methodid ?>_panel_detail').show();
		//$('.panel_<?php echo $methodid ?>_panel_purchase_request').hide();
		//$("#table_<?php echo $methodid ?>_detail").trigger('reloadGrid');
		
		 change_mat_item(-1);
		
		setTimeout(function(){ 
			//purchase_order_get_purchase_data();
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
	}
	

</script>