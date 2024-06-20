<script type="text/javascript">  
	$(function () {
        "use strict";
		
        $("#table_<?php echo $methodid ?>_absen_karyawan").jqGrid({
			url: baseurl+'<?php echo $class_uri ?>/loaddata',
			mtype : "post",
			postData:{'q':'1','date':'<?php echo date("Y-m-d") ?>','<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'},
			datatype: "json",
			colNames:['ABSEN ID','NAME','DIVISI','SUB DIVISI', 'IN', 'OUT', 'IN STATUS', 'OUT STATUS','INFORMATION','DIFFERENCE','ABSEN TYPE','',''],
			colModel:[
				{name:'r1',index:'r1', width:70,},
				{name:'r2',index:'r2', width:200},
				{name:'r3',index:'r3', width:150},
				{name:'r4',index:'r4', width:100},
				{name:'r5',index:'r5', width:90,search: false},  
				{name:'r6',index:'r6', width:90,search: false},  
				{name:'r7',index:'r7', width:100,search: true,formatter:fontColorFormat},  
				{name:'r8',index:'r8', width:100,search: true,formatter:fontColorFormat},
				{name:'r9',index:'r9', width:200,formatter:font_information},
				{name:'r10',index:'r10', width:90},
				{name:'r11',index:'r11', width:90},
				{name:'r12',index:'r12', width:70,hidden: true },
				{name:'r13',index:'r13', width:70,hidden: true }
			],
			iconSet: "fontAwesome",
            iconSet: "fontAwesome",
            idPrefix: "g1_",
            rownumbers: true,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>',
            sortname: "r1",
            sortorder: "asc",
			shrinkToFit:false,
			autowidth: true,
			height: 250,		
			jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true
			}); 
		$("#table_<?php echo $methodid ?>_absen_karyawan").jqGrid("setColProp", "rn", {hidedlg: false});
				 	
		$("#table_<?php echo $methodid ?>_absen_karyawan").jqGrid('navGrid','#ptable_<?php echo $methodid ?>',{edit:false,add:false,del:false,view:false, search: false}
		   ,editOptions
		   ,{}
		   ,{}
		   ,{}
		   ,{}
			);
      			
		$("#table_<?php echo $methodid ?>_absen_karyawan").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});



        $("#table_<?php echo $methodid ?>_report_absen").jqGrid({
			url: baseurl+'<?php echo $class_uri ?>/loaddata_report',
			mtype : "post",
			postData:{'q':'1','date_start':'<?php echo date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) ) ?>','date_end':'<?php echo date("Y-m-d") ?>','<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'},
			datatype: "json",
			colNames:['ID','ID ABSEN','NAME','DEPARTEMENT', 'DIVISI', 'SUB DIVISI', 'WORKING TIME', 'YEAR','HOURS','IN','CT','SK','P2'
			          ,'P3','SD','DS','DL','IP','TM','TP','PC','M'],  
			colModel:[
				{name:'r1',index:'r1', width:50,},
				{name:'r2',index:'r2', width:70},
				{name:'r3',index:'r3', width:140},
				{name:'r4',index:'r4', width:80,hidden: true },
				{name:'r5',index:'r5', width:70,hidden: true },  
				{name:'r6',index:'r6', width:80,hidden: true },  
				{name:'r7',index:'r7', width:150},  
				{name:'r8',index:'r8', width:50,align: 'center',search: false,sortable: false},
				{name:'r9',index:'r9', width:50,align: 'center',search: false},
				{name:'r10',index:'r10', width:40,align: 'center',search: false},
				{name:'r11',index:'r11', width:40,align: 'center',search: false},
				{name:'r12',index:'r12', width:40,align: 'center',search: false},
				{name:'r13',index:'r13', width:40,align: 'center',search: false},
				{name:'r14',index:'r14', width:40,align: 'center',search: false},
				{name:'r15',index:'r15', width:40,align: 'center',search: false},
				{name:'r16',index:'r16', width:40,align: 'center',search: false},
				{name:'r17',index:'r17', width:40,align: 'center',search: false},
				{name:'r18',index:'r18', width:40,align: 'center',search: false},
				{name:'r19',index:'r19', width:40,align: 'center',search: false,formatter:'showlink',
				formatoptions: {
                url: function (cellValue, rowId, rowData) {
                    return baseurl+ 'loaddata_awal' + cellValue+ '?' +
                      $.param({
                           quantity: rowData.r2
                       });
                    }
                  }
	            },
				{name:'r20',index:'r20', width:40,align: 'center',search: false,key: true,formatter:'showlink',
				formatoptions: { 
				      baseLinkUrl: baseurl+ 'loaddata_awal', 
				      idName: 'TP', 
					   // target: 'modal'
				     }
				},
				{name:'r21',index:'r21', width:40,align: 'center',search: false,formatter:'dynamicLink',
				formatoptions: {
					 onClick: function (rowid, iRow, iCol, cellValue, e) {
						 var myrow = $(this).jqGrid('getCell', rowid, 'myrow');
						 alert("df");
					 }
				}
				// formatoptions: function (cellValue, rowId, rowData) {
				//	   
                //          $('#view_modal').modal('show');  //---popupshow
                //           sessionStorage["Selected"] = null;
				//
                //        return '/r22/r22' + rowId + '?' ;
                //     }, sortable: false, editable: false
			    	
				
				},
				{name:'r22',index:'r22', width:40,align: 'center',search: false,
				formatter:'dynamicLink',
				formatoptions: {
                    url: function (cellValue, rowId, rowData) {
                     return '/r22/r22' + rowId + '?' +
                        $.param({
                          quantity: rowData.r3
                        });
                    }
                  }
				}
					
			],
			iconSet: "fontAwesome",
            iconSet: "fontAwesome",
            idPrefix: "g1_",
            rownumbers: true,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#ptable_<?php echo $methodid ?>_report_absen',
            sortname: "r1",
            sortorder: "asc",
			shrinkToFit:true,
			autowidth: true,
			height: 250,		
			jsonReader: { repeatitems : false },
			viewrecords : true,
			gridview:true
	       	           			
		});	
		
	    $("#table_<?php echo $methodid ?>_report_absen").jqGrid("setColProp", "rn", {hidedlg: false});
				 	
		$("#table_<?php echo $methodid ?>_report_absen").jqGrid('navGrid','#ptable_<?php echo $methodid ?>_report_absen',{edit:false,add:false,del:false,view:false,search: false});
      			
		$("#table_<?php echo $methodid ?>_report_absen").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false, defaultSearch: 'cn', ignoreCase: false});		
          
	    }
	 );
	 
	    
	//	 var $r10=$(".r10").grid();
	//	 $r10.on("rowClick",function(event,$row,rowdata){
	//		 alert("coba");
	//		 console.log(rowdata);
	//	 });
	
	
	$(".form_tab_<?php echo $methodid ?>").on("click", "a", function (e) {
		//alert{'coba');
        e.preventDefault();
		setTimeout(function(){ 
	    	$("#table_<?php echo $methodid ?>_absen_karyawan").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_absen_karyawan").setGridWidth($('.grid_container_<?php echo $methodid; ?>_absen_karyawan').width() - 20,true).trigger('resize');
		
			$("#table_<?php echo $methodid ?>_report_absen").trigger('reloadGrid');
			$("#table_<?php echo $methodid ?>_report_absen").setGridWidth($('.grid_container_<?php echo $methodid; ?>_report_absen').width() - 20,true).trigger('resize');
			
							
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 1000);
    });
	
	jQuery("#add_edit").click( function(){
		 var id = jQuery("#table_<?php echo $methodid ?>_absen_karyawan").jqGrid('getGridParam','selrow');
	      if (id)	{
			  var row = jQuery("#table_<?php echo $methodid ?>_absen_karyawan").jqGrid('getRowData',id); 
			    // $("#form_add_edit").fadeIn("slow");
				//   $('#form_add_edit').show('slow');
				 $("#form_add_edit").fadeIn("slow");
				 // alert("nomor id="+row.r5);
				$('#form_<?php echo $methodid ?>_badgenumber').val(row.r1);
			    $('#form_<?php echo $methodid ?>_in').val(row.r5);
				$('#form_<?php echo $methodid ?>_out').val(row.r6);
				$('#form_<?php echo $methodid ?>_keterangan').val(row.r8);
                $('#form_<?php echo $methodid ?>_tanggal_absen').val(row.r12);		
                $('#form_<?php echo $methodid ?>_absen_id').val(row.r13);				
	          //add_edit_<?php echo $methodid?>(row.r1);
		  } else {
				show_error("show",'Error','Please select row');
			 }
		setTimeout(function(){ 
			$('.tab_scrollbar').getNiceScroll().resize(); 
		}, 100);
     });
	 
	  function add_edit_<?php echo $methodid ?>(id){
	    // alert("nomor id="+id);
        page_loading("show",'<?php echo $page_title ?>','Please Wait...');		 
	       $.ajax({
		     url: baseurl+'loader',
		     data: {
				'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>'
				,param: 'data_purchase_order'
				,id : id
			  }
	      })
        }
		
	  function addToCartOnClick(rowId, iRow, iCol, cellValue, e) {
         var iCol = getColumnIndexByName($grid, 'Stocks_valkogus') ,
          quantityVal = $('#' + $.jgrid.jqID(rowId) + '>td:nth-child(' + (iCol + 1) + '>input').val();
         alert(iCol); // returns 3 
         alert(quantityVal); // returns undefined. 
        window.location = 'Store/Details?' + $.param({
             id: rowId,
             quantity: quantityVal
          });
       } 

	 function add_<?php echo $methodid ?>_absen(){
			// page_loading("show",'<?php echo $page_title ?> add/edit absen','Please Wait...');
			 var data = $("#form_<?php echo $methodid ?>_add_edit_absen").serialize();
			// alert(baseurl+'<?php echo $class_uri ?>/post_add_edit_absen')
			 $.ajax({
				url: baseurl +'<?php echo $class_uri ?>/post_add_edit_absen',
				data: data,
				dataType: 'json',
				method: 'post',
				success: function(data){
					page_loading("hide");
					$("#table_<?php echo $methodid ?>_absen_karyawan").trigger('reloadGrid');
					//alert(data[0])
					
				},
				error: function(xhr,error){
					show_error("show",xhr.status.toString() + ' ' + xhr.statusText,'Please try again');
					check_submit = 0;
				}
			 })

		    $("#form_add_edit").hide("slow"); 
			
	   }
	 
	
	 
	 jQuery("#tutup").click( function(){
		$("#form_add_edit").hide("slow"); 
		
	 });
	 jQuery("#batal").click( function(){
		$("#form_add_edit").hide("slow"); 
	 });
	 
 
	
	 //define handler for 'editSubmit' event
     var fn_editSubmit=function(response,postdata){
		// console.log(response);
		// alert(response);
        var json=response.responseText; //in my case response text form server is "{sc:true,msg:''}"
        var result=eval("("+json+")"); //create js object from server reponse
         return [result.sc,result.msg,null]; 
      }

        //define edit options for navgrid
        var editOptions={
            top: 50, left: 300, width: 300  
           ,closeOnEscape: true, afterSubmit: fn_editSubmit
		   ,beforeSubmitCell: function (rowid,celname,value,iRow,iCol) {
              return {'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'} 
            }
		     }
			 
	function formatOperations(cellvalue, options, rowObject) {
            return "<a href='/exam/editQuestion.html?q_id=" + cellvalue +"'><u>"+ cellvalue +"</u></a>  "
       }
		  
		function mypricecheck(value, colname) {
            if (value < 0 || value >20) 
              return [false,"Please enter value between 0 and 20"];
           else 
              return [true,""];
           }
		   
		function myelem (value, options) {
          var el = document.createElement("input");
             el.type="text";
             el.value = value;
          return el;
         }
 
     function myvalue(elem, operation, value) {
       if(operation === 'get') {
            return $(elem).val();
        } else if(operation === 'set') {
            $('input',elem).val(value);
        }
    }   
		
     function fontColorFormat(cellvalue, options, rowObject) {
         var color = "green";
		 if (cellvalue == "Terlambat"){
			  var color = "Red";
		 }
					 
         var cellHtml = "<span style='color:" + color + "' originalValue='" + cellvalue + "'>" + cellvalue + "</span>";
         return cellHtml;
     }

 function font_information(cellvalue, options, rowObject) {
         var color = "black";
			 
		 if (cellvalue == "M - Absen Tanpa Keterangan"){
			  var color = "Red";
		 }
		 
		 if (cellvalue == "TP - Tidak Absen Pulang" || cellvalue == "TM - Tidak Absen masuk"){
			  var color = "#A52A2A";
		 }
				 
         var cellHtml = "<span style='color:" + color + "' originalValue='" + cellvalue + "'>" + cellvalue + "</span>";
         return cellHtml;
     }	 
					
	$( document ).ready(function() {
		$('#form_<?php echo $methodid ?>_date').datepicker(
			{
				format: 'yyyy-mm-dd',
				todayBtn: "linked",
				autoclose: true
			}
		);	
		
		
		$('#form_<?php echo $methodid ?>_date_start').datepicker(
			{
				format: 'yyyy-mm-dd',
				todayBtn: "linked",
				autoclose: true
			}
		);		
		
		$('#form_<?php echo $methodid ?>_date_end').datepicker(
			{
				format: 'yyyy-mm-dd',
				todayBtn: "linked",
				autoclose: true
			}
		);						
	});
	
	function add_<?php echo $methodid ?>(){
		
		alert("coba");
	}
	
	function search_<?php echo $methodid ?>(){
		karyawan_name = $('#form_<?php echo $methodid ?>_karyawan_name').val();
		departemen = $('#form_<?php echo $methodid ?>_karyawan_departemen').val();
		date = $('#form_<?php echo $methodid ?>_date').val();
		//date_end = $('#form_<?php echo $methodid ?>_date_end').val();  
	
		$("#table_<?php echo $methodid ?>_absen_karyawan").jqGrid('setGridParam', 
			{
				postData: {
					'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
					 ,karyawan_name:karyawan_name
					 ,departemen:departemen
					 ,date:date
					
				} 
			
			}
		);
      
	  $('#table_<?php echo $methodid ?>_absen_karyawan').trigger( 'reloadGrid' );
	}
	
	function search_report_<?php echo $methodid ?>(){
		karyawan_departemen1 = $('#form_<?php echo $methodid ?>_karyawan_departemen1').val();
		karyawan_divisi = $('#form_<?php echo $methodid ?>_karyawan_divisi').val();
		karyawan_sub_divisi = $('#form_<?php echo $methodid ?>_karyawan_sub_divisi').val();
		karyawan_lama_kerja = $('#form_<?php echo $methodid ?>_karyawan_lama_kerja').val();
		
		date_start = $('#form_<?php echo $methodid ?>_date_start').val();
		date_end = $('#form_<?php echo $methodid ?>_date_end').val();
		//alert(lama_kerja);
		//date_end = $('#form_<?php echo $methodid ?>_date_end').val();  
	
		$("#table_<?php echo $methodid ?>_report_absen").jqGrid('setGridParam', 
			{
				postData: {
					'<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
					 ,karyawan_departemen1:karyawan_departemen1
					 ,karyawan_divisi:karyawan_divisi
					 ,karyawan_sub_divisi:karyawan_sub_divisi
					 ,karyawan_lama_kerja:karyawan_lama_kerja
					 ,date_start:date_start
					 ,date_end:date_end
					
				} 
			
			}
		);
      
	  $('#table_<?php echo $methodid ?>_report_absen').trigger( 'reloadGrid' );
	}
	
	
	function print_<?php echo $methodid ?>_absen_1(format){
		karyawan_name = $('#form_<?php echo $methodid ?>_karyawan_name').val();
		departemen = $('#form_<?php echo $methodid ?>_karyawan_departemen').val();
		date = $('#form_<?php echo $methodid ?>_date').val();
      //  alert (karyawan_name);
       var data_send={
         '<?php echo $this->security->get_csrf_token_name() ?>': '<?php echo $this->security->get_csrf_hash() ?>'
         ,date:date
		 ,karyawan_name:karyawan_name
		 ,departemen:departemen
         ,format:format
         ,print:1
	   }; 
      $.ajax({
         type: "POST",
         url:baseurl + '<?php echo $class_uri ?>/loaddata',
         data: data_send,
         dataType : 'json',
         success: function(msg){
            if (!msg.valid){  
               show_error('show','error',msg.des);
               return false;
            }else{
               download_file('<?php echo $methodid ?>',msg.xfile,msg.namafile,'<?php echo $this->security->get_csrf_token_name() ?>','<?php echo $this->security->get_csrf_hash() ?>'             ); 
               return false; 
            } 
         }
      }) ;   
	}		
</script>
