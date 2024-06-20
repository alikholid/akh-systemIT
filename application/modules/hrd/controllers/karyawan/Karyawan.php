<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Karyawan extends CI_Controller { 

	function __construct()
   { 
		parent::__construct(); 
		//$this->load->library(array('excel'));
		$this->data_request = $_REQUEST;
		
		$module = $this->router->module;
		$directory = $this->router->directory;
		$class = $this->router->class;
		$method = $this->router->method;
		$directory = trim(str_replace('../modules/'.$module ,'',str_replace('/controllers/','',$directory)),'/');
		//var_dump($directory);
		$this->module = $module;
		if(trim($directory) != ''){
			$this->directory = $directory;
		} else {
			$this->directory = '0';
			$this->directory2 = '';
		}
		$this->class = $class;
		$this->method = $method;
	}
	
	function karyawan_table() {
		//$view = 'view_purchase_order';
		$view = 'view_karyawan';
		$get_field = $this->ecc_library->get_field_pop($view);
		//12
		$get_field['r1']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		//$get_field['r7']['hidden'] = true;
		$get_field['r10']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		$get_field['r12']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		$get_field['r14']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		$get_field['r16']['hidden'] = true;
		$get_field['r17']['hidden'] = true;
		$get_field['r18']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r23']['hidden'] = true;
		$get_field['r24']['hidden'] = true;
		
		 
		$get_field['r2']['width'] = 90;
		$get_field['r3']['width'] = 150;
        $get_field['r4']['width'] = 100;
        $get_field['r5']['width'] = 90;
		$get_field['r8']['width'] = 100;
		$get_field['r2']['formatter'] = 'text';
		$get_field['r3']['formatter'] = 'strtoupper';
		//$data['formatter'] = 'formatNumerics';
      // $get_field['r5']['width'] = 170;
      // $get_field['r6']['width'] = 210;
      // $get_field['r9']['width'] = 170;
		
		return $get_field;
	}
	
	function keluarga_table() {
		//$view = 'view_purchase_order_detail';
		//$get_field = $this->ecc_library->get_field($view);
		//   
		//$view_pop = 'view_po_detail_pop';
		//$get_field_pop = $this->ecc_library->get_field_pop($view_pop);
		$view_keluarga = 'view_karyawan_keluarga';
		$get_field = $this->ecc_library->get_field_pop($view_keluarga);
	
					
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r10']['hidden'] = true;
		$get_field['r11']['hidden'] = true;
		
		
		//total 7
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_keluarga';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	function dokumen_table() {
		
		$view_keluarga = 'view_karyawan_dokumen';
		$get_field = $this->ecc_library->get_field_pop($view_keluarga);
	
					
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r4']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		//total 7
		
		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations_dokumen';
		$get_field['act']['width'] = 400;
		
		return $get_field;
	}
	
	function purchase_order_request_table() {
		$view = 'view_purchase_request_item';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r2']['hidden'] = true;
		$get_field['r18']['hidden'] = true;
		$get_field['r19']['hidden'] = true;
		$get_field['r20']['hidden'] = true;
		$get_field['r21']['hidden'] = true;
		$get_field['r22']['hidden'] = true;
		
		$get_field['r13']['title'] = "Unit";
		
		$get_field['r12']['editable'] = true;
		$get_field['r13']['editable'] = true;
		$get_field['r13']['edittype'] = 'select';
		$get_field['r13']['formatter'] = 'select';
		
		$array_test = array();
		$array_test['value'] = $this->ecc_library->load_uom();
		
		$get_field['r13']['editoptions'] = $array_test;
		
		$get_field['r14']['editable'] = true;
		$get_field['r15']['editable'] = true;
		$get_field['r16']['editable'] = true;
		$get_field['r17']['editable'] = true;
		

		$get_field['act']['sc'] = 'act';
		$get_field['act']['title'] = '#';
		$get_field['act']['bypassvalue'] = '';
		$get_field['act']['ctype'] = 'text';
		$get_field['act']['align'] = 'center';
		$get_field['act']['search'] = false;
		$get_field['act']['sortable'] = false;
		$get_field['act']['formatter'] = 'formatOperations2';
		$get_field['act']['width'] = 300;
		
		return $get_field;
	}
	
	function index() {
		$this->load->model('main');
	    //var_dump("HRD");die();
		$component['loadlayout'] = true;
		$component['view_load'] = 'karyawan/view';
		$component['view_load_form'] = 'karyawan/form';
		$component['view_load_form_upload'] = 'karyawan/form_upload_excel';
	    $component['load_js'][] = 'karyawan/view';
		$component['load_js'][] = 'karyawan/form';
		//var_dump($component);die();
		$component['page_title'] = "Karyawan";
		
		$dashboard_table = array();
		
		$nav_button = array();
		$nav_button[] = array('method_id' => 1017,'title' => 'Add', 'icon' => 'fa fa-plus', 'load' => 'karyawan/function_add');
		$nav_button[] = array('method_id' => 1018,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'karyawan/function_edit');
		$nav_button[] = array('method_id' => 1019,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'karyawan/function_delete');
		$nav_button[] = array('method_id' => 1074,'title' => 'Upload Excel', 'icon' => 'fa fa-upload', 'load' => 'karyawan/function_upload');
			
		//$nav_button[] = array('method_id' => 149,'title' => 'Add Employee', 'icon' => 'fa fa-plus', 'load' => 'purchase_order/function_add_from_request');
		//$nav_button[] = array('method_id' => 142,'title' => 'Edit', 'icon' => 'fa fa-pencil', 'load' => 'purchase_order/function_edit');
		//$nav_button[] = array('method_id' => 144,'title' => 'Approve', 'icon' => 'fa fa-check', 'load' => 'purchase_order/function_approve');
		//$nav_button[] = array('method_id' => 143,'title' => 'Delete', 'icon' => 'fa fa-trash-o', 'load' => 'purchase_order/function_delete');
		//$nav_button[] = array('method_id' => 489,'title' => 'Print', 'icon' => 'fa fa-print', 'load' => 'purchase_order/function_print');
		//$nav_button[] = array('method_id' => 743,'title' => 'Cancel Approve', 'icon' => 'fa fa-cross', 'load' => 'purchase_order/function_cancel_approve');
		
		$field = $this->karyawan_table();
	    $field_keluarga = $this->keluarga_table();
		$field_dokumen = $this->dokumen_table();
	//	$field_purchase_request = $this->purchase_order_request_table();
		
		//var_dump($field);
		
		$dashboard_table['nav_button'] = $nav_button;
		$dashboard_table['field'] = $field;
		$dashboard_table['field_keluarga'] = $field_keluarga;
    	$dashboard_table['field_keluarga_loaddata'] = 'loaddata_keluarga';
		$dashboard_table['field_biodata_loaddata'] = 'loaddata_biodata';
        $dashboard_table['field_dokumen'] = $field_dokumen;
    	$dashboard_table['field_dokumen_loaddata'] = 'loaddata_dokumen';		
		//$dashboard_table['field_purchase_request'] = $field_purchase_request;
		//$dashboard_table['field_purchase_request_loaddata'] = 'loaddata_request_item';
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata()
   {
	  //karyawan/loaddata
		$this->authentication->plainlayout();
		$view = 'view_karyawan';
		$field = $this->karyawan_table();
	   
		//$view = 'view_purchase_order';
		//$field = $this->purchase_order_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
 
		$loaddata = $this->ecc_library-> get_field_data_pop($view,$field);
		//	var_dump($loaddata);
		echo $loaddata;
	}

	function approve()
   {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($purchase_order_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_approve");
				$this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			}
					
			$result = $this->rpc_service->resultJSON();
			// print_r($result);
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	function cancel_approve()
   {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($purchase_order_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_cancel_approve");
				$this->rpc_service->addField('purchase_order_id',$purchase_order_id);
			}
					
			$result = $this->rpc_service->resultJSON();
			// print_r($result);
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
	
	function delete()
   {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
				
		$karyawan_id = isset($_POST['karyawan_id']) ? $_POST['karyawan_id'] : false;
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			
			if($karyawan_id){
				$this->rpc_service->setSP("dbo.sp_karyawan_delete");
				$this->rpc_service->addField('karyawan_id',$karyawan_id);
			}
					
			$result = $this->rpc_service->resultJSON_pop();
			// print_r($result);
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],true);
							
							$nama_karyawan = $data_result['nama_karyawan'];
							$lokasi='./assets/img/profile/'.$nama_karyawan;
							$lokasi2 = $lokasi.'/dokumen/';
							//var_dump(is_dir($lokasi));die();
							  if(is_dir($lokasi2)){
								 $files2 = glob($lokasi.'/dokumen/*'); 
								 foreach($files2 as $file){
                                  if(is_file($file2))
                                   unlink($file2); //delete file
                                }
								rmdir($lokasi2);
							  }
							  
							if(is_dir($lokasi)){
							  $files = glob($lokasi.'/*'); //get all file names
                               foreach($files as $file){
                                  if(is_file($file))
                                  unlink($file); //delete file
                                }
							   rmdir($lokasi);
							};
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['karyawan_id'] = $data_result['karyawan_id'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		
		echo json_encode($return);
	}
		
	function post_add_edit() {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
	
	    $karyawan_id = isset($_POST['karyawan_id']) ? $_POST['karyawan_id'] : '';
		$nama_karyawan = isset($_POST['nama_karyawan']) ? $_POST['nama_karyawan'] : '';
		$gender = isset($_POST['gender_id']) ? $_POST['gender_id'] : '';
		$nik = isset($_POST['nik']) ? $_POST['nik'] : '';
		$badgenumber = isset($_POST['badgenumber']) ? $_POST['badgenumber'] : '';
		$divisi = isset($_POST['divisi_id']) ? $_POST['divisi_id'] : '';
		$departement = isset($_POST['departement_id']) ? $_POST['departement_id'] : '';
		$status = isset($_POST['status_id']) ? $_POST['status_id'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$jabatan = isset($_POST['jabatan_id']) ? $_POST['jabatan_id'] : '';
		$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : '';
		$date_out = isset($_POST['date_out']) ? $_POST['date_out'] : '';
		$group = isset($_POST['group_id']) ? $_POST['group_id'] : '';
		$jam_kerja = isset($_POST['jam_kerja']) ? $_POST['jam_kerja'] : '';
		$ket_status = isset($_POST['ket_status']) ? $_POST['ket_status'] : '';
		$photo = isset($_FILES['file']) ? $_FILES['file'] : '';
	
	
		
		//$purchase_order_no = isset($_POST['purchase_order_no']) ? $_POST['purchase_order_no'] : '';
		//$purchase_order_date = isset($_POST['purchase_order_date']) ? $_POST['purchase_order_date'] : '';
		//$partner_id = isset($_POST['partner_id']) ? $_POST['partner_id'] : '';
		//$currencies_id = isset($_POST['currencies_id']) ? $_POST['currencies_id'] : '';
		//$purchase_type_id = isset($_POST['purchase_type_id']) ? $_POST['purchase_type_id'] : '';
		//$this_memo = isset($_POST['this_memo']) ? $_POST['this_memo'] : '';
		//$purchase_order_type_id = isset($_POST['purchase_order_type_id']) ? $_POST['purchase_order_type_id'] : '';
		//$purchase_order_memo = isset($_POST['purchase_order_memo']) ? $_POST['purchase_order_memo'] : '';

		$user_id = $this->session->userdata('user_id');
		
		//------ Untuk proses Upload photo ------------
		  if($_POST['info'] =='Yes'){
			    $file=$_FILES['file'];
			    $file_name = $file['name'];
			    $file_temp=$file['tmp_name'];
				$lok='./assets/img/profile/'.$nama_karyawan.'/';
				$dir=false;
				if(!is_dir($lok)){
			       $dir=mkdir("./assets/img/profile/".$nama_karyawan."/dokumen",0777,true);
				}
				$namaFile=$nama_karyawan.'_'.date('His').'_'.$file_name;
				
                if ($dir) {
                    $location='assets/img/profile/'.$nama_karyawan.'/'.$namaFile;
                } else {
					$location='assets/img/profile/'.$namaFile;
                 
                }
						
			    $upload=move_uploaded_file($file_temp,$location);
			 
				if ($upload){
					$upload_photo=true;
				}else{
					$upload_photo=false;
				}
	 	 // var_dump($location.' - '.$upload);die();	
		 }else{
			 $namaFile='';
			 $location='';
		 }
		 
		//---------------------------------------------
		
		$link_photo=$location;
	 //   var_dump($link_photo);die();
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			//--cek apakah proses edit atau add -------------
			$this->load->model('main');
					
			if($karyawan_id){
				$this->rpc_service->setSP("dbo.sp_karyawan_edit");
				$this->rpc_service->addField('karyawan_id',$karyawan_id);
					$karyawan=$this->main->find_table_pop("dbo.dt_karyawan","karyawan_id",$karyawan_id);
					//var_dump($karyawan[0]["karyawan_link_photo"]);
					if($link_photo == ""){
  				      $link_photo=$karyawan[0]["karyawan_link_photo"];
				    }else{
					  $link_photo=$link_photo;
					}
					
			} else {
				$this->rpc_service->setSP("dbo.sp_karyawan_add");
			}
				
			$this->rpc_service->addField('nama_karyawan',strtolower($nama_karyawan));
			$this->rpc_service->addField('gender',$gender);
			$this->rpc_service->addField('nik',$nik);
			$this->rpc_service->addField('badgenumber',$badgenumber);
			$this->rpc_service->addField('divisi',$divisi);
			$this->rpc_service->addField('departement',$departement);
			$this->rpc_service->addField('status',$status);
			$this->rpc_service->addField('email',$email);
			$this->rpc_service->addField('jabatan',$jabatan);
			$this->rpc_service->addField('date_in',$date_in);
			$this->rpc_service->addField('date_out',$date_out);
			$this->rpc_service->addField('group',$group);
			$this->rpc_service->addField('jam_kerja',$jam_kerja);
			$this->rpc_service->addField('keterangan_karyawan',$ket_status);
			$this->rpc_service->addField('link_photo',$link_photo);	
			
			
			$result = $this->rpc_service->resultJSON_pop();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],true);
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['karyawan_id'] = $data_result['karyawan_id'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
	
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		//var_dump($link_photo);
		//var_dump($return['karyawan_id']);
		echo json_encode($return);
	}
	
	function post_add_edit_dokumen() {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$karyawan_id = isset($_POST['karyawan_id']) ? $_POST['karyawan_id'] : '';
		$dokumen_id = isset($_POST['dokumen_id']) ? $_POST['dokumen_id'] : '';
		$nama_dokumen = isset($_POST['nama_dokumen']) ? $_POST['nama_dokumen'] : '';
		$keterangan_dokumen = isset($_POST['keterangan_dokumen']) ? $_POST['keterangan_dokumen'] : '';
		$alamat_dok = isset($_POST['alamat_dok']) ? $_POST['alamat_dok'] : '';
		// var_dump($nama_dokumen);die();
		$user_id = $this->session->userdata('user_id');
		//------ Untuk proses Upload photo ------------
		  if($_POST['info'] =='Yes'){
			    $file=$_FILES['file'];
			    $file_name = $file['name'];
				$file_temp=$file['tmp_name'];
				
				if($alamat_dok){
					if(file_exists($alamat_dok)){
					 	unlink($alamat_dok);
						}
				}
				
				$this->load->model('main');
				$nama_karyawan=$this->main->cari_nama($karyawan_id);
				$nama_karyawan=$nama_karyawan[0]["karyawan_name"];
			//	var_dump($nama_karyawan);die();
			
				$namaFile=date('His').'_'.$file_name;
				$location='./assets/img/profile/'.$nama_karyawan.'/dokumen/'.$namaFile;
				 
				  $upload=move_uploaded_file($file_temp,$location);
				
				if ($upload){
					$upload_photo=true;
				}else{
					$upload_photo=false;
				}
	 	 // var_dump($location.' - '.$upload);die();	
		 }else{
			
			 $namaFile='';
			 $location=$alamat_dok;
		 }
		 
		//---------------------------------------------
		
		$link_dok=$location;
	 
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		if(count($_POST) > 0){
			//--cek apakah proses edit atau add -------------
			if($dokumen_id){
				$this->rpc_service->setSP("dbo.sp_karyawan_dokumen_edit");
				$this->rpc_service->addField('dokumen_id',$dokumen_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_karyawan_dokumen_add");
			}
				
			$this->rpc_service->addField('karyawan_id',$karyawan_id);
			$this->rpc_service->addField('nama_dokumen',$nama_dokumen);
			$this->rpc_service->addField('keterangan_dokumen',$keterangan_dokumen);
			$this->rpc_service->addField('lokasi_dokumen',$link_dok);
									
			$result = $this->rpc_service->resultJSON_pop();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							
							$data_result = json_decode($result['data'],true);
							//var_dump($result['des']);die();
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['karyawan_id'] = $data_result['karyawan_id'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
	
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
		echo json_encode($return);
	}
	
	function loaddata_biodata() {
		$this->authentication->plainlayout();
		
		$karyawan_id = isset($_REQUEST['karyawan_id']) ? is_numeric($_REQUEST['karyawan_id']) ? $_REQUEST['karyawan_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		//$view = 'view_purchase_order_detail';
		$view2 = 'view_karyawan_biodata';
		$field = $this->keluarga_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $karyawan_id;
		$extra_param['methodid'] = $methodid;
		
	  //  $loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
		$loaddata_biodata = $this->ecc_library->get_field_data_pop($view2,$field,$extra_param);
		//$cek_data_pop=  json_decode($loaddata_pop, true);
		//$cek_data_ecc=  json_decode($loaddata, true);
	
	    echo $loaddata_biodata;
		
	
	}
	
	function loaddata_dokumen() {
		$this->authentication->plainlayout();
		
		$karyawan_id = isset($_REQUEST['karyawan_id']) ? is_numeric($_REQUEST['karyawan_id']) ? $_REQUEST['karyawan_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		//$view = 'view_purchase_order_detail';
		$view2 = 'view_karyawan_dokumen';
		$field = $this->keluarga_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $karyawan_id;
		$extra_param['methodid'] = $methodid;
		
	  //  $loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
		$loaddata_dokumen = $this->ecc_library->get_field_data_pop($view2,$field,$extra_param);
		//$cek_data_pop=  json_decode($loaddata_pop, true);
		//$cek_data_ecc=  json_decode($loaddata, true);
	
	    echo $loaddata_dokumen;
		
	
	}
	
	function loaddata_keluarga() {
		$this->authentication->plainlayout();
		
		$karyawan_id = isset($_REQUEST['karyawan_id']) ? is_numeric($_REQUEST['karyawan_id']) ? $_REQUEST['karyawan_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		//$view = 'view_purchase_order_detail';
		$view2 = 'view_karyawan_keluarga';
		$field = $this->keluarga_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r2';
		$extra_param['where']['0']['data'] = $karyawan_id;
		$extra_param['methodid'] = $methodid;
		
	  //  $loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
		$loaddata_pop = $this->ecc_library->get_field_data_pop($view2,$field,$extra_param);
		$cek_data_pop=  json_decode($loaddata_pop, true);
		//$cek_data_ecc=  json_decode($loaddata, true);
	
	    echo $loaddata_pop;
		
	
	}
	
	function post_add_edit_biodata() {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$karyawan_id = isset($_POST['karyawan_id']) ? $_POST['karyawan_id'] : 0;
		$biodata_id = isset($_POST['biodata_id']) ? $_POST['biodata_id'] : '';
		$tempat_lahir = isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '';
		$tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
		$agama = isset($_POST['agama']) ? $_POST['agama'] : '';
		$pendidikan = isset($_POST['pendidikan']) ? $_POST['pendidikan'] : '';
		$jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';
		$nikah = isset($_POST['nikah_id']) ? $_POST['nikah_id'] : '';
		$no_npwp = isset($_POST['no_npwp']) ? $_POST['no_npwp'] : '';
		$no_ktp = isset($_POST['no_ktp']) ? $_POST['no_ktp'] : '';
		$no_kk = isset($_POST['no_kk']) ? $_POST['no_kk'] : '';
		$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
		$rt = isset($_POST['rt']) ? $_POST['rt'] : '';
		$rw = isset($_POST['rw']) ? $_POST['rw'] : '';
		$kelurahan = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : '';
		$kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';
		$kota = isset($_POST['kota']) ? $_POST['kota'] : '';
		$provinsi = isset($_POST['provinsi']) ? $_POST['provinsi'] : '';
		$kode_pos = isset($_POST['kode_pos']) ? $_POST['kode_pos'] : '';
		$no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';
		$nama_ibu = isset($_POST['nama_ibu']) ? $_POST['nama_ibu'] : '';
		$nama_bapak = isset($_POST['nama_bapak']) ? $_POST['nama_bapak'] : '';
		$alamat_lain = isset($_POST['alamat_lain']) ? $_POST['alamat_lain'] : '';
		$handphone2 = isset($_POST['handphone2']) ? $_POST['handphone2'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		//var_dump($this->rpc_service->setsp("dbo.sp_purchase_order_detail_add"));die();
			
		if(count($_POST) > 0){
			if($biodata_id){
				
				$this->rpc_service->setSP("dbo.sp_karyawan_biodata_edit");
				$this->rpc_service->addField('biodata_id',$biodata_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_karyawan_biodata_add");
				$this->rpc_service->addField('biodata_id',$biodata_id);
				//$this->load->model('main');
				
	    	}
			
			$this->rpc_service->addField('karyawan_id',$karyawan_id);
		//	$this->rpc_service->addField('biodata_id',$biodata_id);
			$this->rpc_service->addField('tempat_lahir',$tempat_lahir);
			$this->rpc_service->addField('tanggal_lahir',$tanggal_lahir);
			$this->rpc_service->addField('agama',$agama);
			$this->rpc_service->addField('pendidikan',$pendidikan);
			$this->rpc_service->addField('nama_sekolah','');
			$this->rpc_service->addField('status_nikah',$nikah);
			$this->rpc_service->addField('npwp',$no_npwp);
			$this->rpc_service->addField('askes','');
			$this->rpc_service->addField('no_kartu_keluarga',$no_kk);
			$this->rpc_service->addField('no_ktp',$no_ktp);
			$this->rpc_service->addField('alamat',$alamat);
			$this->rpc_service->addField('rt',$rt);
			$this->rpc_service->addField('rw',$rw);
			$this->rpc_service->addField('kelurahan',$kelurahan);
			$this->rpc_service->addField('kecamatan',$kecamatan);
			$this->rpc_service->addField('kota',$kota);
			$this->rpc_service->addField('provinsi',$provinsi);
			$this->rpc_service->addField('kode_pos',$kode_pos);
			$this->rpc_service->addField('handphone_1',$no_hp);
			$this->rpc_service->addField('nama_pasangan','');
			$this->rpc_service->addField('nama_ibu',$nama_ibu);
			$this->rpc_service->addField('nama_bapak',$nama_bapak);
			$this->rpc_service->addField('alamat_lain',$alamat_lain);
			$this->rpc_service->addField('handphone_2',$handphone2);
						
			$result = $this->rpc_service->resultJSON_pop();
			//var_dump($result['data']);die();
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],TRUE);
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['karyawan_id'] = $data_result['karyawan_id'];
							$return['biodata_id'] = $data_result['biodata_id'];
							
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}
				
		echo json_encode($return);
	}
	
	function post_add_edit_Keluarga() {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$karyawan_id = isset($_POST['karyawan_id']) ? $_POST['karyawan_id'] : '';
		$keluarga_id = isset($_POST['keluarga_id']) ? $_POST['keluarga_id'] : '';
		$nama_keluarga = isset($_POST['nama_keluarga']) ? $_POST['nama_keluarga'] : '';
		$status_keluarga_id = isset($_POST['status_keluarga_id']) ? $_POST['status_keluarga_id'] : '';
		$gender_keluarga = isset($_POST['gender_keluarga']) ? $_POST['gender_keluarga'] : '';
		$pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';
		$pendidikan = isset($_POST['pendidikan']) ? $_POST['pendidikan'] : '';
		$tempat_lahir_keluarga = isset($_POST['tempat_lahir_keluarga']) ? $_POST['tempat_lahir_keluarga'] : '';
		$tanggal_lahir_keluarga = isset($_POST['tanggal_lahir_keluarga']) ? $_POST['tanggal_lahir_keluarga'] : '';
		
		$user_id = $this->session->userdata('user_id');
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		if(count($_POST) > 0){
			if($keluarga_id){
				$this->rpc_service->setSP("dbo.sp_karyawan_keluarga_edit");
				$this->rpc_service->addField('keluarga_id',$keluarga_id);
			} else {
				$this->rpc_service->setSP("dbo.sp_karyawan_keluarga_add");
				$this->rpc_service->addField('keluarga_id',$keluarga_id);
			}
					
			$this->rpc_service->addField('karyawan_id',$karyawan_id);
			$this->rpc_service->addField('nama_keluarga',$nama_keluarga);
			$this->rpc_service->addField('status_keluarga_id',$status_keluarga_id);
			$this->rpc_service->addField('gender_keluarga',$gender_keluarga);
			$this->rpc_service->addField('tempat_lahir_keluarga',$tempat_lahir_keluarga);
			$this->rpc_service->addField('tanggal_lahir_keluarga',$tanggal_lahir_keluarga);
			$this->rpc_service->addField('pekerjaan',$pekerjaan);
			$this->rpc_service->addField('pendidikan',$pendidikan);
									
			$result = $this->rpc_service->resultJSON_pop();
			//var_dump($result['data']);die();
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],TRUE);
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$return['karyawan_id'] = $data_result['karyawan_id'];
							$return['keluarga_id'] = $data_result['keluarga_id'];
							
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
			
			
		}			
		//$karyawan_id = isset($_POST['karyawan_id']) ? $_POST['karyawan_id'] : 0;
		echo json_encode($return);
	}
	
	function delete_keluarga() {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		$keluarga_id = isset($_POST['keluarga_id']) ? $_POST['keluarga_id'] : '';
		$user_id = $this->session->userdata('user_id');
		
		if(count($_POST) > 0){
			
			$this->rpc_service->setSP("dbo.sp_karyawan_keluarga_delete");
			$this->rpc_service->addField('keluarga_id',$keluarga_id);
			$result = $this->rpc_service->resultJSON_pop();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
				
			}
		 echo json_encode($return);	
		}
	}
	
	function delete_dokumen() {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		$dokumen_id = isset($_POST['dokumen_id']) ? $_POST['dokumen_id'] : '';
		$user_id = $this->session->userdata('user_id');
		
		if(count($_POST) > 0){
						
			$this->rpc_service->setSP("dbo.sp_karyawan_dokumen_delete");
			$this->rpc_service->addField('dokumen_id',$dokumen_id);
			$result = $this->rpc_service->resultJSON_pop();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$data_result = json_decode($result['data'],TRUE);
							
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
							$lokasi = $data_result['lokasi_dokumen'];
							
							//---- Untuk mrnghapus file upload ---------
							  if(file_exists($lokasi)){
					            unlink($lokasi);
			                 }
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
				
			}
		 echo json_encode($return);	
		}
	}
	function download_dokumen() {
		$this->authentication->plainlayout();
			
        $this->load->helper('download');
		$parameter = array();
		$return = array();
		
		//$result = array();
		//$return['valid'] = false;
		//$return['status_code'] = 501;
		//$return['message'] = "Internal Server Error";
		$this->load->model('main');
		$dokumen_id = isset($_POST['dokumen_id']) ? $_POST['dokumen_id'] : '';
		
		$data_karyawan=$this->main->find_table_pop('dbo.dt_karyawan_dokumen','dokumen_id',$dokumen_id);
		$lokasi=$data_karyawan[0]['lokasi_dokumen'];
		$temp= explode('.',$lokasi);
		$max = max($temp);
		//var_dump($max);die();
		$user_id = $this->session->userdata('user_id');
		//	$result = $this->rpc_service->save('','','','',$format,$date_start,$date_end);
		//download file from directory
           $result = force_download($lokasi, NULL);
			//$result = $this->rpc_service->saveDownload_dokumen($lokasi,$max);
	//	$return['message'] = 'OK '.$dokumen_id;
		  //  echo json_encode($return);
	}
	
	function preview_dokumen() {
		$this->load->model('main');
		$dokumen_id = isset($_POST['dokumen_id']) ? $_POST['dokumen_id'] : '';
		$this->load->model('main');
		$dokumen_id = isset($_POST['dokumen_id']) ? $_POST['dokumen_id'] : '';
		
		$data_karyawan=$this->main->find_table_pop('dbo.dt_karyawan_dokumen','dokumen_id',$dokumen_id);
		$lokasi=$data_karyawan[0]['lokasi_dokumen'];
		$temp= explode('.',$lokasi);
		$max = max($temp);
		$return['lokasi'] = $lokasi;
		echo json_encode($return);
	}
	function delete_detail() {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		
		$result = array();
		$return['valid'] = false;
		$return['status_code'] = 501;
		$return['message'] = "Internal Server Error";
		
		$purchase_order_detail_id = isset($_POST['purchase_order_detail_id']) ? $_POST['purchase_order_detail_id'] : '';
		$user_id = $this->session->userdata('user_id');
		
		
		if(count($_POST) > 0){
			
			if($purchase_order_detail_id){
				$this->rpc_service->setSP("dbo.sp_purchase_order_detail_delete");
				$this->rpc_service->addField('purchase_order_detail_id',$purchase_order_detail_id);
				$this->load->model('main');
				//$this->main->insert_pop('dbo.dt_po_detail_pop', $data,$note=null);
				$where_del=array('purchase_order_detail_id' =>$purchase_order_detail_id);
				//function delete_pop($table,$where=array(),$note=null)
				$this->main->delete_pop('dbo.dt_po_detail_pop',$where_del,$note=null);
			}
					
			$result = $this->rpc_service->resultJSON();
			
			$data = array();
			if(isset($result)){
				if(isset($result['valid'])){
					if($result['valid']){
						if(isset($result['data'])){
							$return['valid'] = $result['valid'];
							$return['status_code'] = $result['no'];
							$return['message'] = $result['des'];
						}
					} else {
						$return['status_code'] = $result['no'];
						$return['message'] = $result['des'];
					}
				}
			}
			
		} else {
			$return['valid'] = false;
			$return['message'] = "Session expired";
		}

		echo json_encode($return);
		
	}
	
	function loaddata_request_item() {
		$this->authentication->plainlayout();
		
		$purchase_order_detail_id = isset($_POST['purchase_order_detail_id']) ? $_POST['purchase_order_detail_id'] : '';
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$field = $this->purchase_order_request_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		if($purchase_order_detail_id){
			$view = 'view_purchase_order_detail_request';
			$extra_param['where']['0']['field'] = 'r22';
			$extra_param['where']['0']['data'] = $purchase_order_detail_id;
		} else {
			$view = 'view_purchase_request_item';
		}
		
		$extra_param['field']['rh_id'] = $purchase_order_detail_id;
		
		
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function loaddata_request_item2() {
		$this->authentication->plainlayout();
		
		$field = array();
		$field[] = array('field' => 'purchase_request_detail_id', 'title' => 'purchase_request_detail_id');
		$field[] = array('field' => 'purchase_request_id', 'title' => 'purchase_request_id');
		$field[] = array('field' => 'purchase_request_date', 'title' => 'purchase_request_date');
		$field[] = array('field' => 'purchase_request_no', 'title' => 'purchase_request_no');
		$field[] = array('field' => 'item', 'title' => 'item');
		$field[] = array('field' => 'quantity_requested', 'title' => 'quantity_requested');
		$field[] = array('field' => 'quantity_ordered', 'title' => 'quantity_ordered');
		$field[] = array('field' => 'unit', 'title' => 'TOTAL');
		$field[] = array('field' => 'purchase_request_status_id', 'title' => 'purchase_request_status_id');
		$field[] = array('field' => 'item_id', 'title' => 'item_id');
		$field[] = array('field' => 'request_delivery_date', 'title' => 'request_delivery_date');
		$field[] = array('field' => 'outstanding_qty', 'title' => 'outstanding_qty');
		$field[] = array('field' => 'uom_id', 'title' => 'uom_id');
		$field[] = array('field' => 'memo', 'title' => 'memo');
		$field[] = array('field' => 'request_delivery_date', 'title' => 'request_delivery_date');
	
		$new_purchase_order = isset($_POST['new_purchase_order']) ? $_POST['new_purchase_order'] : 0;
		$purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : 0;
		$lock_data = isset($_POST['lock_data']) ? $_POST['lock_data'] : 0;
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		$loaddata_table = array();
		
		if($lock_data == 0){
			$view = 'dbo.view_purchase_request_item';
			$loaddata = $this->ecc_library->loaddata($view,$field);
				
			foreach($loaddata['data'] as $key => $value){
				$this_order[$key] = 0;
				
				$new_row = array();
				$new_row[] = $value[0];
				$new_row[] = $value[3];
				$new_row[] = $value[2];
				$new_row[] = $value[4];
				$new_row[] = $this->mainconfig->get_decimal_format($value[5],12);
				$new_row[] = $this->mainconfig->get_decimal_format($value[6],12);
				$new_row[] = $value[7];
				$new_row[] = "<input class=\"form-control\" name=\"quantity_ordered[". $value[0] ."]\" type=\"text\" placeholder=\"This Order\" value=\"". $this_order[$key] ."\" />";
				$select = "<select class=\"form-control search_uom\" name=\"uom_id[". $value[0] ."]\" style=\"width:150px\">";
				$select .= "<option value=\"".$value[12]."\" selected=\"selectted\">". $value[7]."</option>";
				$select .= "</select>";
				
				$new_row[] = $select;
				$new_row[] = "<input class=\"form-control\" name=\"conversion[". $value[0] ."]\" type=\"text\" placeholder=\"Conversion\" value=\"1\" />";
				$new_row[] = "
				<input name=\"item_id[". $value[0] ."]\" type=\"hidden\" value=\"". $value[9] ."\" /><input class=\"form-control\" name=\"unit_price[". $value[0] ."]\" type=\"text\" placeholder=\"Unit Price\" value=\"1\" />";
				$new_row[] = "";
				
				
				$loaddata_table[$value[0]] = $new_row;
			}
		}
		
		if($new_purchase_order == '0')
      {
			$view = 'dbo.view_purchase_order_detail_request';
			
			$field = array();
			$field[] = array('field' => 'purchase_request_detail_id', 'title' => 'purchase_request_detail_id');
			$field[] = array('field' => 'purchase_request_id', 'title' => 'purchase_request_id');
			$field[] = array('field' => 'purchase_request_date', 'title' => 'purchase_request_date');
			$field[] = array('field' => 'purchase_request_no', 'title' => 'purchase_request_no');
			$field[] = array('field' => 'item', 'title' => 'item');
			$field[] = array('field' => 'quantity_requested', 'title' => 'quantity_requested');
			$field[] = array('field' => 'quantity_ordered', 'title' => 'quantity_ordered');
			$field[] = array('field' => 'unit', 'title' => 'TOTAL');
			$field[] = array('field' => 'purchase_request_status_id', 'title' => 'purchase_request_status_id');
			$field[] = array('field' => 'item_id', 'title' => 'item_id');
			$field[] = array('field' => 'request_delivery_date', 'title' => 'request_delivery_date');
			$field[] = array('field' => 'outstanding_qty', 'title' => 'outstanding_qty');
			$field[] = array('field' => 'uom_id', 'title' => 'uom_id');
			$field[] = array('field' => 'request_delivery_date', 'title' => 'request_delivery_date');
			$field[] = array('field' => 'conversion', 'title' => 'conversion');
			$field[] = array('field' => 'unit_price', 'title' => 'unit_price');
			$field[] = array('field' => 'unit_order', 'title' => 'unit_order');
			
			$where = array();
			$where['purchase_order_id'] = $purchase_order_id;
			$loaddata_purchase = $this->ecc_library->loaddata($view,$field,$where);
			
			
			foreach($loaddata_purchase['data'] as $key => $value){
				if($lock_data == 0){
					
					$loaddata_table[$value[0]][7] = "<input class=\"form-control\" name=\"quantity_ordered[". $value[0] ."]\" type=\"text\" placeholder=\"This Order\" value=\"". $this->mainconfig->get_decimal_format2($value[11],12) ."\" />";
					$select = "<select class=\"form-control search_uom\" name=\"uom_id[". $value[0] ."]\" style=\"width:150px\">";
					$select .= "<option value=\"".$value[12]."\" selected=\"selectted\">". $value[16]."</option>";
					$select .= "</select>";
					$loaddata_table[$value[0]][8] = $select;
					$loaddata_table[$value[0]][9] = "<input class=\"form-control\" name=\"conversion[". $value[0] ."]\" type=\"text\" placeholder=\"Conversion\" value=\"". $this->mainconfig->get_decimal_format2($value[14],12) ."\" />";
					$loaddata_table[$value[0]][10] = "<input name=\"item_id[". $value[0] ."]\" type=\"hidden\" value=\"". $value[9] ."\" /><input class=\"form-control\" name=\"unit_price[". $value[0] ."]\" type=\"text\" placeholder=\"Unit Price\" value=\"". $this->mainconfig->get_decimal_format2($value[15],12) ."\" />";
					
				} else {
					$this_order[$value[0]] = $value[11];
					$new_row = array();
					$new_row[] = $value[0];
					$new_row[] = $value[3];
					$new_row[] = $value[2];
					$new_row[] = $value[4];
					$new_row[] = $this->mainconfig->get_decimal_format($value[5],12);
					$new_row[] = $this->mainconfig->get_decimal_format($value[6],12);
					$new_row[] = $value[7];
					$new_row[] = $this->mainconfig->get_decimal_format($value[11],12);
					$new_row[] = $value[16];
					$new_row[] = $this->mainconfig->get_decimal_format($value[14],12);
					$new_row[] = $this->mainconfig->get_decimal_format($value[15],12);
					$new_row[] = "";
					
					$loaddata_table[$value[0]] = $new_row;
				}
				
			}
		
		}
		
		$loaddata['data'] = array();
		foreach($loaddata_table as $value){
			
			$data = array();
			$data[] = $value[0];
			$data[] = $value[1];
			$data[] = $value[2];
			$data[] = $value[3];
			$data[] = $value[4];
			$data[] = $value[5];
			$data[] = $value[6];
			$data[] = $value[7];
			$data[] = $value[8];
			$data[] = $value[9];
			$data[] = $value[10];
			$data[] = $value[11];
			
			$loaddata['data'][] = $data;
		}
		
		echo json_encode($loaddata);
	}
	
	function print_purchase_order_asli() {
      
      $purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
      $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
      $user_id = $this->session->userdata('user_id');
      
      $sp = "dbo.sp_rpt_purchase_order";
 
      //$this->rpc_service_portal->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
      //$this->rpc_service_portal->addField('purchase_order_id',$purchase_order_id);
      //$this->rpc_service_portal->addField('format',$format);
      //$this->rpc_service_portal->addField('temp_folder',sys_get_temp_dir());
      //$this->rpc_service_portal->addField('sort','e.item_code asc');  
      //$result = $this->rpc_service_portal->resultPrint2();
	  
	  $this->rpc_service->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
      $this->rpc_service->addField('purchase_order_id',$purchase_order_id);
      $this->rpc_service->addField('format',$format);
      $this->rpc_service->addField('temp_folder',sys_get_temp_dir());
      $this->rpc_service->addField('sort','e.item_code asc');
      $result = $this->rpc_service->resultPrint_baru();  
     // $result = $this->rpc_service->resultPrint2();
    // var_dump($result);die();
      echo json_encode($result);
	}
  
	function upload_excel_karyawan() {
		$this->authentication->plainlayout();
		$parameter = array();
		$return = array();
		$file = isset($_FILES['file']) ? $_FILES['file'] : '';
       // $file= $_FILES['file'];
		

		//	$this->CI->load->library('PdfLibrary');
		//$this->load->library('pdf');
		$this->load->library('Excel');
		$this->load->model('main');

      	if (isset($_FILES['file'])) {
			$file_name = $file['name'];
		    $file_temp=$file['tmp_name'];
		    $lok='./assets/upload/karyawan/';
		    $namaFile=date('His').'_'.$file_name;
		    $location=$lok.$namaFile;
	  	   //    $upload=move_uploaded_file($file_temp,$location);
			 $object = PHPExcel_IOFactory::load($file_temp);
			 $message_name='';
			 foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=3; $row<=$highestRow; $row++)
				  {
				     $badgenumber = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					 $karyawan_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					 $karyawan_departemen = $worksheet->getCellByColumnAndRow(6, $row)->getValue(); //Departemen
					 $karyawan_divisi = $worksheet->getCellByColumnAndRow(7, $row)->getValue(); //divisi
					 $karyawan_group = $worksheet->getCellByColumnAndRow(8, $row)->getValue(); //group
					 $karyawan_jabatan = $worksheet->getCellByColumnAndRow(9, $row)->getValue(); //jabatan
					 $karyawan_status = $worksheet->getCellByColumnAndRow(10, $row)->getValue(); //status
					 $keterangan_karyawan = $worksheet->getCellByColumnAndRow(19, $row)->getValue(); //keterangan
					 $jam_kerja = $worksheet->getCellByColumnAndRow(21, $row)->getValue(); //jam_kerja
			 
				    $data_table_pop = $this->main->find_table_pop('dbo.dt_karyawan','badgenumber',$badgenumber);
					//var_dump(count($data_table_pop));die();
					if(count($data_table_pop) != 0){
						$where_pop=array("badgenumber" =>$badgenumber);
					//	$temp_data[] = array(
						$data_arr = array(
							'karyawan_departemen'=> $karyawan_departemen,
							'karyawan_divisi' =>$karyawan_divisi,
							'karyawan_group' =>$karyawan_group,
							'karyawan_jabatan' =>$karyawan_jabatan,
							'karyawan_status' =>$karyawan_status,
							'keterangan_karyawan' =>$keterangan_karyawan,
							'jam_kerja' =>$jam_kerja,
						  );
                    // proses update disable kan dahulu
					//	 $up=$this->main->update_pop('dbo.dt_karyawan',$data_arr,$where_pop,null,$set=array()) ;
					$up=true;
						 if($up){
							$message_name .=$karyawan_name.' ok,';
						 }else{
							$message_name .=$karyawan_name.' no,';
						 }
						 
					}else{
						//jika tidak ada di insert
						$message_name .=$karyawan_name.' empty,';
					//	$temp_data[] = array(
					//		'keterangan'=> 'data tidak ada'
					//	  ); 
						//var_dump($data_table_pop);die();
					};
					
					
                  }
			}
			$keterangan=$message_name;
			//$keterangan=$temp_data[2]['keterangan'];
		}else{
			$keterangan="No file";
		}
     

	    $return['isi_file']  = $keterangan;
		$return['namafile'] = isset($_POST['filename']) ? $_POST['filename'] : 'cccc';
	//	$file3=$_FILES['file'];
        //var_dump($file_excel);
		$return['valid'] = true;
		$return['status_code'] = 501;
		$return['message'] = "percobaan upload Excel";
		echo json_encode($return);
	}
	
function report_PO_OK(){
		  $purchase_order_id=$this->uri->segment(5);
		  $format=$this->uri->segment(6);
		  // var_dump($segmen1);die();
	    $user_id = $this->session->userdata('user_id');
       // var_dump($format);die();
	    
        $sp = "dbo.sp_rpt_purchase_order";
        $this->rpc_service->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
        $this->rpc_service->addField('purchase_order_id',$purchase_order_id);
        $this->rpc_service->addField('format',$format);
        $this->rpc_service->addField('temp_folder',sys_get_temp_dir());
        $this->rpc_service->addField('sort','e.item_code asc');  
        $result = $this->rpc_service->resultPrint_pop();
		
		  $alldata=json_decode($result['data']);
		  
	      $dt_header=$alldata->xrow_header;
		  $dt_detil=$alldata->xrow_detail;
		  
		  $sts=$result['no'];
		  $des=$result['des'];
		  $format=$format;
		  
		  // $pdf->Cell($w[6], ($line * $cellHeight2),$dt_detil[0]->r7, 1, 0, 'C');
	// 	   $hobi=explode("#", $dt_detil[0]->r7);
	//	   $name=array($dt_detil[0]->r2);
	//	    array_push($hobi,$dt_detil[0]->r2);
	//	   $arry_nama=count($hobi)-1;
	//	   var_dump($hobi[$arry_nama]);die();
	  
		
		 $nomor_po=$dt_header[0]->purchase_order_no;
		 $po_date=$dt_header[0]->purchase_order_date;
		 $po_type=$dt_header[0]->purchase_order_type;
		 $partner_name=$dt_header[0]->partner_name;
		 $partner_address=$dt_header[0]->partner_address;
			  
		  $data = array(
               "dataku" => array(
                               "sts" => $sts,
                               "format" => $format
                            )
           );
	//	$this->CI->load->library('PdfLibrary');
	   $this->load->library('pdf');
	 
	  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    //    $pdf = new PdfLibrary(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

              // create new PDF document
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('https://popstar.com');
        $pdf->SetTitle('Purchase Order');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
       // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetMargins('3', '3', '1','5');
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        // $pdf->SetFont('times', 'BI', '12');
        $pdf->SetFont('times', '', '12');
        // ---------------------------------------------------------

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // add a page
        $pdf->AddPage('P', 'A4');
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        ////Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        // $pdf->SetFont('helvetica', 'B', 22);
        // $pdf->Cell(190, 0, "POP STAR, PT", 0, 1, 'C', 0, '', 1);
        // $pdf->Ln();

        // $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 4, 'color' => array(255, 0, 0)));
        //untuk line
        // $style = array('width' => 0.8, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 12, 200, 12, $style);

        $style2 = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 13, 200, 13, $style2);

        // QRCODE,Q : QR-CODE Better error correction
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
		
		$pdf->SetFont('helvetica', '', 20);
       // $pdf->write2DBarcode($nomor_po, 'QRCODE,Q', 175, 20, 20, 20, $style, '');
        $pdf->Cell(200, 0, "PURCHASE ORDER", 0, 1, 'C', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
	    $pdf->SetFont('helvetica', 'I', 11);
        $pdf->Ln(2);
		$pdf->Cell(160, 0, "POPSTAR, PT", 0, 1, 'L', 0, '', 1);
		
		$pdf->SetFont('helvetica', 'I', 10);
		$pdf->Cell(160, 0, "Jl.Nanjung KM.3 No.99, Lagadar, Margaasih, Kab.Bandung", 0, 1, 'L', 0, '', 1);
		$pdf->Cell(160, 0, "Bandung", 0, 1, 'L', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
        $pdf->Ln(3);
		$pdf->SetFont('helvetica', '', 11);
		
		$pdf->MultiCell(30, 5, "PO No", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $nomor_po, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Date", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_date, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Type", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_type, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(10);
		$pdf->SetFont('helvetica', 'B', 11);
		$pdf->MultiCell(30, 5, "SUPPLIER", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $partner_name, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 11);
		$pdf->MultiCell(30, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, $partner_address, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(15);
		// set text shadow effect
      //  $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
		// Set some content to print
		//  <tr style="background-color:gray;color:white;">
       //   $html ='<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
       //       <tr style="font-size:9;border: 0.5px solid gray;text-align: center;font-weight: bold">
       //           <td>Item Code</td>
       //           <td>Item Name</td>
       //           <td>Satuan</td>
       //   		  <td>Qty</td>
		//		  <td>Unit Price</td>
       //   		  <td>Amount</td>
		//		  <td>Memo</td>
       //       </tr>
       //       <tr  style="font-size:9;border: 0.5px solid gray;">
       //           <td>1</td>
       //           <td>Divyasundar</td>
       //   		<td>001</td>
       //   		<td>Pune</td>
       //       </tr>
       //   
       //        </table>';
       //    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
         // Print text using writeHTMLCell()
		 
	
		
		
		//------------ Kolom tabel -------------
		// var_dump($dt_detil);die();
		$pdf->SetFont('helvetica', 'b', 8);
		$w = array(45, 55, 15, 15, 20, 20,30);
        $header = array('Item Code', 'Item Name', 'Satuan', 'Qty', 'Unit Price', 'Amount','Memo');
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $pdf->Cell($w[$i], 8, $header[$i], 1, 0, 'C', 0);
        }
		
		$pdf->Ln();
        // Color and font restoration
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        // Data
        $pdf->SetFont('helvetica', '', '8');
        $fill = 0;
        $i = "A";
        $x = 1;
        $y = 5;
		  if (count($dt_detil) == 0) {
            $pdf->Cell(240, 10, "No Data", 0, 1, 'C');
        } else {
			  $brs = 0;
              $max = 40;
		  for ($i = 0; $i < count($dt_detil); $i++){
				$cellWidth = 55; //lebar sel
                $cellHeight = 1; //tinggi sel satu baris normal
                $cellWidth_code = 45;
                $cellWidth_note = 20;
                $Line_code = 0;
                $ln = array();
				if ($pdf->GetStringWidth($dt_detil[$i]->r1) < $cellWidth_code) {
                    //jika tidak, maka tidak melakukan apa-apa
                    $line = 1;
                    array_push($ln, '1');
                }else{
					$textLength = strlen($dt_detil[$i]->r1);    //total panjang teks
                    $errMargin = 5;        //margin kesalahan lebar sel, untuk jaga-jaga
                    $startChar = 0;        //posisi awal karakter untuk setiap baris
                    $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                    $textArray = array();    //untuk menampung data untuk setiap baris
                    $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)
					while ($startChar < $textLength) { //perulangan sampai akhir teks
                        //perulangan sampai karakter maksimum tercapai
                        while (
                            $pdf->GetStringWidth($tmpString) < ($cellWidth_code - $errMargin) &&
                            ($startChar + $maxChar) < $textLength
                        ) {
                            $maxChar++;
                            $tmpString = substr($dt_detil[$i]->r1, $startChar, $maxChar);
                        }
                        //pindahkan ke baris berikutnya
                        $startChar = $startChar + $maxChar;
                        //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                        array_push($textArray, $tmpString);
                        //reset variabel penampung
                        $maxChar = 0;
                        $tmpString = '';
                    }
					//dapatkan jumlah baris
                    $line = count($textArray);
                    array_push($ln, $line);
				}
				
				// cek data 
				
			  if ($pdf->GetStringWidth($dt_detil[$i]->r2) < $cellWidth) {
                    //jika tidak, maka tidak melakukan apa-apa
                    $line = 1;
                    array_push($ln, '1');
                } else {
                    //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
                    //dengan memisahkan teks agar sesuai dengan lebar sel
                    //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel

                    $textLength = strlen($dt_detil[$i]->r2);    //total panjang teks
                    // $errMargin = 5;
                    $errMargin = 2;        //margin kesalahan lebar sel, untuk jaga-jaga
                    $startChar = 0;        //posisi awal karakter untuk setiap baris
                    $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                    $textArray = array();    //untuk menampung data untuk setiap baris
                    $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)
                    while ($startChar < $textLength) { //perulangan sampai akhir teks
                        //perulangan sampai karakter maksimum tercapai
                        while (
                            $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
                            ($startChar + $maxChar) < $textLength
                        ) {
                            $maxChar++;
                            $tmpString = substr($dt_detil[$i]->r2, $startChar, $maxChar);
                        }
                        //pindahkan ke baris berikutnya
                        $startChar = $startChar + $maxChar;
                        //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                        array_push($textArray, $tmpString);
                        //reset variabel penampung
                        $maxChar = 0;
                        $tmpString = '';
                    }
                    //dapatkan jumlah baris
                    $line = count($textArray);
                    array_push($ln, $line);
                }
				
				 if ($pdf->GetStringWidth($dt_detil[$i]->r6) < $cellWidth_note) {
                    //jika tidak, maka tidak melakukan apa-apa
                    $line = 1;
                    array_push($ln, '1');
                } else {
                    //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
                    //dengan memisahkan teks agar sesuai dengan lebar sel
                    //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel

                    $textLength2 = strlen($dt_detil[$i]->r6);    //total panjang teks
                    $errMargin = 2;        //margin kesalahan lebar sel, untuk jaga-jaga
                    $startChar2 = 0;        //posisi awal karakter untuk setiap baris
                    $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                    $textArray2 = array();    //untuk menampung data untuk setiap baris
                    $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)
                    while ($startChar2 < $textLength2) { //perulangan sampai akhir teks
                        //perulangan sampai karakter maksimum tercapai
                        while (
                            $pdf->GetStringWidth($tmpString) < ($cellWidth_note - $errMargin) &&
                            ($startChar2 + $maxChar) < $textLength2
                        ) {
                            $maxChar++;
                            $tmpString = substr($dt_detil[$i]->r6, $startChar2, $maxChar);
                        }
                        //pindahkan ke baris berikutnya
                        $startChar2 = $startChar2 + $maxChar;
                        //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                        array_push($textArray2, $tmpString);
                        //reset variabel penampung
                        $maxChar = 0;
                        $tmpString = '';
                    }
                    //dapatkan jumlah baris
                    $line = count($textArray2);
                    array_push($ln, $line);
                }
				
				 $line = max($ln);

                //  $y = $y + $line;
                //Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, 
                //$link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
                // $pdf->Cell($w[0], ($line * $cellHeight), $x++, 1, 0, 'C', true); //sesuaikan ketinggian dengan jumlah garis

                //$cellHeight2 = 4.55;
                $cellHeight2 = 6.7;
                $cellHeight = $line * $cellHeight2;
                $pdf->SetFillColor(255, 255, 255);
                $baris = $line * $cellHeight2;
                //$pdf->Cell($w[0], ($line * $cellHeight2), $x++, 1, 0, 'C', true); //======= Untuk nomor
                // $pdf->MultiCell(35, $cellHeight, $row->item_code, 1, 'L');
                // $pdf->MultiCell($cellWidth_code, $cellHeight, $row->item_code, 1, 'L');
                // $pdf->Cell($w[1], ($line * $cellHeight2), $row->item_code, 1, 0);
                //  $pdf->MultiCell($cellWidth, $baris, $row->item_code, 1, 'L');
                //$pdf->Cell($w[2], ($line * $cellHeight), $row->item_name, 'LR', 0, 'L', false);
                //memanfaatkan MultiCell sebagai ganti Cell
                //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
                //ingat posisi x dan y sebelum menulis MultiCell
                $xPos = $pdf->GetX();
                $yPos = $pdf->GetY();
                $cellHeight = $line * $cellHeight2;
                $pdf->MultiCell($cellWidth_code, $cellHeight, $dt_detil[$i]->r1, 1, 'L');
                $pdf->SetXY($xPos + $cellWidth_code, $yPos);
				
				$xPos = $pdf->GetX();
                $yPos = $pdf->GetY();
                $cellHeight = $line * $cellHeight2;
                $pdf->MultiCell($cellWidth, $cellHeight, $dt_detil[$i]->r2, 1, 'L');
                $pdf->SetXY($xPos + $cellWidth, $yPos);
				
				 $pdf->Cell($w[2], ($line * $cellHeight2), $dt_detil[$i]->r3, 1, 0, 'C');
				 $pdf->Cell($w[3], ($line * $cellHeight2), $dt_detil[$i]->r4, 1, 0, 'C');
				 $pdf->Cell($w[4], ($line * $cellHeight2), $dt_detil[$i]->r5, 1, 0, 'C');
			     $pdf->Cell($w[5], ($line * $cellHeight2), $dt_detil[$i]->r6, 1, 0, 'C');
				  
				//$xPos = $pdf->GetX();
                //$yPos = $pdf->GetY();
                //$cellHeight = $line * $cellHeight2;
                //$pdf->MultiCell($cellWidth_note, $cellHeight, $dt_detil[$i]->r6, 1, 'L');
                //$pdf->SetXY($xPos + $cellWidth_note, $yPos);
	     		
				//========== Membaca Memo
				  if (isset($dt_detil[0]->r7)){
				     // $pdf->Cell($w[6], ($line * $cellHeight2),$dt_detil[0]->r7, 1, 0, 'C');
					 //$hobi=explode(",", $text);
					  $pdf->Cell($w[6], ($line * $cellHeight2),'', 1, 0, 'C');
                      $hobi=explode("#", $dt_detil[0]->r7);
					  for ($x=0;$x < count($hobi); $x++){
						   $pdf->Ln();
						   $pdf->Cell($cellWidth_code, ($line * $cellHeight2), '', 1, 0, 'C');
				           $pdf->Cell($cellWidth, ($line * $cellHeight2), $hobi[$x], 1, 0, 'L');
				           $pdf->Cell($w[4], ($line * $cellHeight2), '', 1, 0, 'C');
			               $pdf->Cell($w[5], ($line * $cellHeight2), '', 1, 0, 'C');
						   $pdf->Cell($w[3], ($line * $cellHeight2), '', 1, 0, 'C');
				           $pdf->Cell($w[4], ($line * $cellHeight2), '', 1, 0, 'C');
			               $pdf->Cell($w[5], ($line * $cellHeight2), '', 1, 0, 'C');
						   
					  };
					 
			         // var_dump($dt_detil[0]->r7);die(); 
		         }else{
			        // var_dump("Ora Ono");die(); 
					 $pdf->Cell($w[6], ($line * $cellHeight2),'', 1, 0, 'C');
		          }
				  //============================
                $pdf->Ln();
			
              }
			  
		}
		
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(20, 5, "Remarks", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, '', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln();
		$pdf->SetFont('helvetica', 'I', 8);
		$pdf->Cell(120, 0, "Please send back Purchase Order(PO) with Invoice", 0, 1, 'L', 0, '', 1);
         
		$pdf->Ln(4);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
			
		$pdf->Ln();
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Don't Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(15, 5, "Reason", 0, 'C', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ':', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(8);
		
		//$pdf->SetMargins('10', '8', '1');
		$pdf->MultiCell(50, 5, "Signed", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 5, "Checked", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 5, "Approved", 1, 'C', 0, 0, '130', '', true);
		$pdf->Ln();
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '130', '', true);
		 $time = time();
        $sFilePath = md5($time) . '.pdf';

        // Clean any content of the output buffer
        //ob_end_clean(); //jika di aktifkan maka tidak bisa di lihat variabel contohnya untuk var dum

        //Close and output PDF document
        // $pdf->Output($sFilePath); 
        $pdf->Output($sFilePath, 'I');
	  }
	  
	  
	 function print_purchase_order_ok() {
   	//  $purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
    //  $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
    //  $user_id = $this->session->userdata('user_id');
		 
		 // ==== Gabung antara name dan memo =========
		  $purchase_order_id=$this->uri->segment(5);
		  $format=$this->uri->segment(6);
		  // var_dump($segmen1);die();
	      $user_id = $this->session->userdata('user_id');
       // var_dump($format);die();
	    
        $sp = "dbo.sp_rpt_purchase_order";
        $this->rpc_service->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
        $this->rpc_service->addField('purchase_order_id',$purchase_order_id);
        $this->rpc_service->addField('format',$format);
        $this->rpc_service->addField('temp_folder',sys_get_temp_dir());
        $this->rpc_service->addField('sort','e.item_code asc');  
        $result = $this->rpc_service->resultPrint_pop();
		
		  $alldata=json_decode($result['data']);
		  
	      $dt_header=$alldata->xrow_header;
		  $dt_detil=$alldata->xrow_detail;
		  
		  $sts=$result['no'];
		  $des=$result['des'];
		  $format=$format;
		  
		  // $pdf->Cell($w[6], ($line * $cellHeight2),$dt_detil[0]->r7, 1, 0, 'C');
	// 	   $hobi=explode("#", $dt_detil[0]->r7);
	//	   $name=array($dt_detil[0]->r2);
	//	    array_push($hobi,$dt_detil[0]->r2);
	//	   $arry_nama=count($hobi)-1;
	//	   var_dump($hobi[$arry_nama]);die();
	  
		
		 $nomor_po=$dt_header[0]->purchase_order_no;
		 $po_date=$dt_header[0]->purchase_order_date;
		 $po_type=$dt_header[0]->purchase_order_type;
		 $partner_name=$dt_header[0]->partner_name;
		 $partner_address=$dt_header[0]->partner_address;
			  
		  $data = array(
               "dataku" => array(
                               "sts" => $sts,
                               "format" => $format
                            )
           );
	//	$this->CI->load->library('PdfLibrary');
	   $this->load->library('pdf');
	 
	  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    //    $pdf = new PdfLibrary(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

              // create new PDF document
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('https://popstar.com');
        $pdf->SetTitle('Purchase Order');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
       // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetMargins('3', '3', '1','5');
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        // $pdf->SetFont('times', 'BI', '12');
        $pdf->SetFont('times', '', '12');
        // ---------------------------------------------------------

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // add a page
        $pdf->AddPage('P', 'A4');
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        ////Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        // $pdf->SetFont('helvetica', 'B', 22);
        // $pdf->Cell(190, 0, "POP STAR, PT", 0, 1, 'C', 0, '', 1);
        // $pdf->Ln();

        // $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 4, 'color' => array(255, 0, 0)));
        //untuk line
        // $style = array('width' => 0.8, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 12, 200, 12, $style);

        $style2 = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 13, 200, 13, $style2);

        // QRCODE,Q : QR-CODE Better error correction
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
		
		$pdf->SetFont('helvetica', '', 20);
       // $pdf->write2DBarcode($nomor_po, 'QRCODE,Q', 175, 20, 20, 20, $style, '');
        $pdf->Cell(200, 0, "PURCHASE ORDER", 0, 1, 'C', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
	    $pdf->SetFont('helvetica', 'I', 11);
        $pdf->Ln(2);
		$pdf->Cell(160, 0, "POPSTAR, PT", 0, 1, 'L', 0, '', 1);
		
		$pdf->SetFont('helvetica', 'I', 10);
		$pdf->Cell(160, 0, "Jl.Nanjung KM.3 No.99, Lagadar, Margaasih, Kab.Bandung", 0, 1, 'L', 0, '', 1);
		$pdf->Cell(160, 0, "Bandung", 0, 1, 'L', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
        $pdf->Ln(3);
		$pdf->SetFont('helvetica', '', 11);
		
		$pdf->MultiCell(30, 5, "PO No", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $nomor_po, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Date", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_date, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Type", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_type, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(10);
		$pdf->SetFont('helvetica', 'B', 11);
		$pdf->MultiCell(30, 5, "SUPPLIER", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $partner_name, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 11);
		$pdf->MultiCell(30, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, $partner_address, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(15);
		// set text shadow effect
      //  $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
		// Set some content to print
		//  <tr style="background-color:gray;color:white;">
       //   $html ='<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
       //       <tr style="font-size:9;border: 0.5px solid gray;text-align: center;font-weight: bold">
       //           <td>Item Code</td>
       //           <td>Item Name</td>
       //           <td>Satuan</td>
       //   		  <td>Qty</td>
		//		  <td>Unit Price</td>
       //   		  <td>Amount</td>
		//		  <td>Memo</td>
       //       </tr>
       //       <tr  style="font-size:9;border: 0.5px solid gray;">
       //           <td>1</td>
       //           <td>Divyasundar</td>
       //   		<td>001</td>
       //   		<td>Pune</td>
       //       </tr>
       //   
       //        </table>';
       //    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
         // Print text using writeHTMLCell()
		 
	
		
		
		//------------ Kolom tabel -------------
		// var_dump($dt_detil);die();
		$pdf->SetFont('helvetica', 'b', 8);
		$w = array(45, 55, 15, 15, 20, 20,30);
        $header = array('Item Code', 'Item Name','Style', 'Satuan', 'Qty', 'Unit Price', 'Amount','Memo');
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $pdf->Cell($w[$i], 8, $header[$i], 1, 0, 'C', 0);
        }
		
		$pdf->Ln();
        // Color and font restoration
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        // Data
        $pdf->SetFont('helvetica', '', '8');
        $fill = 0;
        $i = "A";
        $x = 1;
        $y = 5;
		  if (count($dt_detil) == 0) {
            $pdf->Cell(240, 10, "No Data", 0, 1, 'C');
        } else {
			  $brs = 0;
              $max = 40;
		  for ($i = 0; $i < count($dt_detil); $i++){
				$cellWidth = 55; //lebar sel
                $cellHeight = 1; //tinggi sel satu baris normal
                $cellWidth_code = 45;
                $cellWidth_note = 20;
                $Line_code = 0;
                $ln = array();
				if ($pdf->GetStringWidth($dt_detil[$i]->r1) < $cellWidth_code) {
                    //jika tidak, maka tidak melakukan apa-apa
                    $line = 1;
                    array_push($ln, '1');
                }else{
					$textLength = strlen($dt_detil[$i]->r1);    //total panjang teks
                    $errMargin = 5;        //margin kesalahan lebar sel, untuk jaga-jaga
                    $startChar = 0;        //posisi awal karakter untuk setiap baris
                    $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                    $textArray = array();    //untuk menampung data untuk setiap baris
                    $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)
					while ($startChar < $textLength) { //perulangan sampai akhir teks
                        //perulangan sampai karakter maksimum tercapai
                        while (
                            $pdf->GetStringWidth($tmpString) < ($cellWidth_code - $errMargin) &&
                            ($startChar + $maxChar) < $textLength
                        ) {
                            $maxChar++;
                            $tmpString = substr($dt_detil[$i]->r1, $startChar, $maxChar);
                        }
                        //pindahkan ke baris berikutnya
                        $startChar = $startChar + $maxChar;
                        //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                        array_push($textArray, $tmpString);
                        //reset variabel penampung
                        $maxChar = 0;
                        $tmpString = '';
                    }
					//dapatkan jumlah baris
                    $line = count($textArray);
                    array_push($ln, $line);
				}
				
				// ========= cek data ===============
				//$name=$dt_detil[0]->r7;
					  if (isset($dt_detil[0]->r7)){
						//  $name=$dt_detil[$i]->r2."#".$dt_detil[0]->r7;
						   $name=$dt_detil[0]->r7;
					  }else{
						  $name='';
					  }
				
				// ===================================
			//  if ($pdf->GetStringWidth($dt_detil[$i]->r2) < $cellWidth) {
				 if ($pdf->GetStringWidth($name) < $cellWidth) {
                    //jika tidak, maka tidak melakukan apa-apa
                    $line = 1;
                    array_push($ln, '1');
                } else {
                    //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
                    //dengan memisahkan teks agar sesuai dengan lebar sel
                    //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel

                    $textLength = strlen($name);  
                    //$textLength = strlen($dt_detil[$i]->r2);    //total panjang teks
                    // $errMargin = 5;
                    $errMargin = 2;        //margin kesalahan lebar sel, untuk jaga-jaga
                    $startChar = 0;        //posisi awal karakter untuk setiap baris
                    $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                    $textArray = array();    //untuk menampung data untuk setiap baris
                    $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)
					
			        $memo=explode("#", $name);
					//var_dump($memo);die();
				     for ($m=0; $m<count($memo);$m++){
						   while (
                                $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
                                ($startChar + $maxChar) < $textLength
                            ) {
                                $maxChar++;
				     			 $tmpString = substr($memo[$m], $startChar, $maxChar);
                               // $tmpString = substr($dt_detil[$i]->r2, $startChar, $maxChar);
                            }
                            //pindahkan ke baris berikutnya
                            $startChar = $startChar + $maxChar;
                            //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                            array_push($textArray, $tmpString);
                            //reset variabel penampung
                            $maxChar = 0;
                            $tmpString = '';
					      
					}
					//dapatkan jumlah baris
                      $line = count($textArray);
                      array_push($ln, $line);
					
                //   while ($startChar < $textLength) { //perulangan sampai akhir teks
                //       //perulangan sampai karakter maksimum tercapai
                //       while (
                //           $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
                //           ($startChar + $maxChar) < $textLength
                //       ) {
                //           $maxChar++;
				//			 $tmpString = substr($name, $startChar, $maxChar);
                //          // $tmpString = substr($dt_detil[$i]->r2, $startChar, $maxChar);
                //       }
                //       //pindahkan ke baris berikutnya
                //       $startChar = $startChar + $maxChar;
                //       //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                //       array_push($textArray, $tmpString);
                //       //reset variabel penampung
                //       $maxChar = 0;
                //       $tmpString = '';
                //   }
                //   //dapatkan jumlah baris
                //   $line = count($textArray);
                //   array_push($ln, $line);
                }
				
				 if ($pdf->GetStringWidth($dt_detil[$i]->r6) < $cellWidth_note) {
                    //jika tidak, maka tidak melakukan apa-apa
                    $line = 1;
                    array_push($ln, '1');
                } else {
                    //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
                    //dengan memisahkan teks agar sesuai dengan lebar sel
                    //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel

                    $textLength2 = strlen($dt_detil[$i]->r6);    //total panjang teks
                    $errMargin = 2;        //margin kesalahan lebar sel, untuk jaga-jaga
                    $startChar2 = 0;        //posisi awal karakter untuk setiap baris
                    $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                    $textArray2 = array();    //untuk menampung data untuk setiap baris
                    $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)
                    while ($startChar2 < $textLength2) { //perulangan sampai akhir teks
                        //perulangan sampai karakter maksimum tercapai
                        while (
                            $pdf->GetStringWidth($tmpString) < ($cellWidth_note - $errMargin) &&
                            ($startChar2 + $maxChar) < $textLength2
                        ) {
                            $maxChar++;
                            $tmpString = substr($dt_detil[$i]->r6, $startChar2, $maxChar);
                        }
                        //pindahkan ke baris berikutnya
                        $startChar2 = $startChar2 + $maxChar;
                        //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                        array_push($textArray2, $tmpString);
                        //reset variabel penampung
                        $maxChar = 0;
                        $tmpString = '';
                    }
                    //dapatkan jumlah baris
                    $line = count($textArray2);
                    array_push($ln, $line);
                }
				
				 $line = max($ln);

                //  $y = $y + $line;
                //Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, 
                //$link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
                // $pdf->Cell($w[0], ($line * $cellHeight), $x++, 1, 0, 'C', true); //sesuaikan ketinggian dengan jumlah garis

                //$cellHeight2 = 4.55;
                $cellHeight2 = 6.7;
                $cellHeight = $line * $cellHeight2;
                $pdf->SetFillColor(255, 255, 255);
                $baris = $line * $cellHeight2;
                //$pdf->Cell($w[0], ($line * $cellHeight2), $x++, 1, 0, 'C', true); //======= Untuk nomor
                // $pdf->MultiCell(35, $cellHeight, $row->item_code, 1, 'L');
                // $pdf->MultiCell($cellWidth_code, $cellHeight, $row->item_code, 1, 'L');
                // $pdf->Cell($w[1], ($line * $cellHeight2), $row->item_code, 1, 0);
                //  $pdf->MultiCell($cellWidth, $baris, $row->item_code, 1, 'L');
                //$pdf->Cell($w[2], ($line * $cellHeight), $row->item_name, 'LR', 0, 'L', false);
                //memanfaatkan MultiCell sebagai ganti Cell
                //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
                //ingat posisi x dan y sebelum menulis MultiCell
                $xPos = $pdf->GetX();
                $yPos = $pdf->GetY();
                $cellHeight = $line * $cellHeight2;
                $pdf->MultiCell($cellWidth_code, $cellHeight, $dt_detil[$i]->r1, 1, 'L');
                $pdf->SetXY($xPos + $cellWidth_code, $yPos);
				
				$xPos = $pdf->GetX();
                $yPos = $pdf->GetY();
                $cellHeight = $line * $cellHeight2;
              //  $pdf->MultiCell($cellWidth, $cellHeight, $dt_detil[$i]->r2, 1, 'L');
			     $pdf->MultiCell($cellWidth, $cellHeight, $name, 1, 'L');
				 $pdf->SetXY($xPos + $cellWidth, $yPos);
					
				//$pdf->Ln();	
				// $memo=explode("#", $name);
				////  for ($m=0; $m<count($memo);$m++){
				//	// $pdf->Cell($cellWidth, ($line * $cellHeight2),'bdfdfggggggggggggggggg', 0, 0, 'L');
				//	 $pdf->Cell($cellWidth,5,'bdfdfggggggggggggggggg', 0, 0, 'L');
				//	//	 $pdf->MultiCell($cellWidth, ($line * $cellHeight2), "dfmb", 1, 'L'); 
				// // }
			  
				
				
				 $pdf->Cell($w[2], ($line * $cellHeight2), $dt_detil[$i]->r3, 1, 0, 'C');
				 $pdf->Cell($w[3], ($line * $cellHeight2), $dt_detil[$i]->r4, 1, 0, 'C');
				 $pdf->Cell($w[4], ($line * $cellHeight2), $dt_detil[$i]->r5, 1, 0, 'C');
			     $pdf->Cell($w[5], ($line * $cellHeight2), $dt_detil[$i]->r6, 1, 0, 'C');
				  
				//$xPos = $pdf->GetX();
                //$yPos = $pdf->GetY();
                //$cellHeight = $line * $cellHeight2;
                //$pdf->MultiCell($cellWidth_note, $cellHeight, $dt_detil[$i]->r6, 1, 'L');
                //$pdf->SetXY($xPos + $cellWidth_note, $yPos);
	     		
				//========== Membaca Memo ================
			  if (isset($dt_detil[0]->r7)){
			     // $pdf->Cell($w[6], ($line * $cellHeight2),$dt_detil[0]->r7, 1, 0, 'C');
				 //$hobi=explode(",", $text);
				  $pdf->Cell($w[6], ($line * $cellHeight2),'', 1, 0, 'C');
                //  $hobi=explode("#", $dt_detil[0]->r7);
				//  for ($x=0;$x < count($hobi); $x++){
				//	   $pdf->Ln();
				//	   $pdf->Cell($cellWidth_code, ($line * $cellHeight2), '', 1, 0, 'C');
			    //       $pdf->Cell($cellWidth, ($line * $cellHeight2), $hobi[$x], 1, 0, 'L');
			    //       $pdf->Cell($w[4], ($line * $cellHeight2), '', 1, 0, 'C');
		        //       $pdf->Cell($w[5], ($line * $cellHeight2), '', 1, 0, 'C');
				//	     $pdf->Cell($w[3], ($line * $cellHeight2), '', 1, 0, 'C');
			    //       $pdf->Cell($w[4], ($line * $cellHeight2), '', 1, 0, 'C');
		        //       $pdf->Cell($w[5], ($line * $cellHeight2), '', 1, 0, 'C');
				//	   
				//  };
				 
		         // var_dump($dt_detil[0]->r7);die(); 
		     }else{
		        // var_dump("Ora Ono");die(); 
				 $pdf->Cell($w[6], ($line * $cellHeight2),'', 1, 0, 'C');
		      }
				  //============================
                $pdf->Ln();
			
              }
			  
		}
		
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(20, 5, "Remarks", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, '', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln();
		$pdf->SetFont('helvetica', 'I', 8);
		$pdf->Cell(120, 0, "Please send back Purchase Order(PO) with Invoice", 0, 1, 'L', 0, '', 1);
         
		$pdf->Ln(4);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
			
		$pdf->Ln();
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Don't Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(15, 5, "Reason", 0, 'C', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ':', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(8);
		
		//$pdf->SetMargins('10', '8', '1');
		$pdf->MultiCell(50, 5, "Signed", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 5, "Checked", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 5, "Approved", 1, 'C', 0, 0, '130', '', true);
		$pdf->Ln();
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '130', '', true);
		 $time = time();
        $sFilePath = md5($time) . '.pdf';

        // Clean any content of the output buffer
        //ob_end_clean(); //jika di aktifkan maka tidak bisa di lihat variabel contohnya untuk var dum

        //Close and output PDF document
        // $pdf->Output($sFilePath); 
        $pdf->Output($sFilePath, 'D');
	  }
	  
	function print_purchase_order() {
		   //  $purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
    //  $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
    //  $user_id = $this->session->userdata('user_id');
	
		 // ==== Gabung antara name dan memo =========
		  $purchase_order_id=$this->uri->segment(5);
		  $format=$this->uri->segment(6);
		  // var_dump($segmen1);die();
	      $user_id = $this->session->userdata('user_id');
       // var_dump($format);die();
	    
        $sp = "dbo.sp_rpt_purchase_order";
        $this->rpc_service->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
        $this->rpc_service->addField('purchase_order_id',$purchase_order_id);
        $this->rpc_service->addField('format',$format);
        $this->rpc_service->addField('temp_folder',sys_get_temp_dir());
        $this->rpc_service->addField('sort','e.item_code asc');  
        $result = $this->rpc_service->resultPrint_pop();
		
		  $alldata=json_decode($result['data']);
		  
	      $dt_header=$alldata->xrow_header;
		  $dt_detil=$alldata->xrow_detail;
		  
		  $sts=$result['no'];
		  $des=$result['des'];
		  $format=$format;
		  
		  // $pdf->Cell($w[6], ($line * $cellHeight2),$dt_detil[0]->r7, 1, 0, 'C');
	// 	   $hobi=explode("#", $dt_detil[0]->r7);
	//	   $name=array($dt_detil[0]->r2);
	//	    array_push($hobi,$dt_detil[0]->r2);
	//	   $arry_nama=count($hobi)-1;
	    //   var_dump($dt_detil);die();
	  
		
		 $nomor_po=$dt_header[0]->purchase_order_no;
		 $po_date=$dt_header[0]->purchase_order_date;
		 $po_type=$dt_header[0]->purchase_order_type;
		 $partner_name=$dt_header[0]->partner_name;
		 $partner_address=$dt_header[0]->partner_address;
	    $qrcode= 'POPSTAR,PT Number:'.$nomor_po .' Date:'.$po_date;
		  $data = array(
               "dataku" => array(
                               "sts" => $sts,
                               "format" => $format
                            )
           );
	//	$this->CI->load->library('PdfLibrary');
	   $this->load->library('pdf');
	  
		 
      //  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		 $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    //    $pdf = new PdfLibrary(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

              // create new PDF document
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('https://popstar.com');
        $pdf->SetTitle('Purchase Order '.$nomor_po);
        $pdf->SetSubject('Report generated by system SIPOP');
        $pdf->SetKeywords('TCPDF, PDF, Codeigniter');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
       // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetMargins('6', '3', '6','4');
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        // $pdf->SetFont('times', 'BI', '12');
        $pdf->SetFont('times', '', '12');
        // ---------------------------------------------------------

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

        // add a page
        $pdf->AddPage('P', 'A4');
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        ////Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        // $pdf->SetFont('helvetica', 'B', 22);
        // $pdf->Cell(190, 0, "POP STAR, PT", 0, 1, 'C', 0, '', 1);
        // $pdf->Ln();

        // $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 4, 'color' => array(255, 0, 0)));
        //untuk line
        // $style = array('width' => 0.8, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 12, 200, 12, $style);

        $style2 = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 13, 200, 13, $style2);

        // QRCODE,Q : QR-CODE Better error correction
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
		
		$pdf->SetFont('helvetica', '', 20);
        $pdf->write2DBarcode($qrcode, 'QRCODE,Q', 175, 20, 23, 23, $style, '');
		$pdf->Ln(6);
        $pdf->Cell(200, 0, "PURCHASE ORDER", 0, 1, 'C', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
	    $pdf->SetFont('helvetica', 'I', 11);
        $pdf->Ln(2);
		$pdf->Cell(160, 0, "POPSTAR, PT", 0, 1, 'L', 0, '', 1);
		
		$pdf->SetFont('helvetica', 'I', 10);
		$pdf->Cell(160, 0, "Jl.Nanjung KM.3 No.99, Lagadar, Margaasih, Kab.Bandung", 0, 1, 'L', 0, '', 1);
		$pdf->Cell(160, 0, "Bandung", 0, 1, 'L', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
        $pdf->Ln(3);
		$pdf->SetFont('helvetica', '', 11);
		
		$pdf->MultiCell(30, 5, "PO No", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $nomor_po, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Date", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_date, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Type", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_type, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(10);
		$pdf->SetFont('helvetica', 'B', 11);
		$pdf->MultiCell(30, 5, "SUPPLIER", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $partner_name, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 11);
		$pdf->MultiCell(30, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, $partner_address, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(15);
		
		  $html ='';
		  $baris ='';
		  $atas='';
		   //border: 0.5px solid gray;
          $atas .='<table cellspacing="0" cellpadding="4" border="1" style="border-color:gray;">
		          <tr style="font-size:9;text-align: center;font-weight: bold;">
                  <td>Item Code</td>
                  <td>Item Name</td>
				  <td>Style</td>
                  <td>Satuan</td>
          		  <td>Qty</td>
				  <td>Unit Price</td>
          		  <td>Amount</td>
				  <td>Memo</td>
              </tr>';
			//  ["rid"]=> int(5902) 
			   $this->load->model('main');
			   // var_dump($dt_detil);die();
			     $total=0;
			    for ($i = 0; $i < count($dt_detil); $i++){
					  $total= $total+ $dt_detil[$i]->r6;
					  
				 $data_table_pop = $this->main->find_table_pop('dbo.view_po_detail_pop','purchase_order_id',$dt_detil[$i]->rid);
					// var_dump($data_table_pop);die();
			        //foreach($dt_detil as $key=>$value){
		   	        $baris .='<tr style="font-size:8;border: 0.5px solid gray;">
                     <td>'.$dt_detil[$i]->r1.'</td>';
			 if (count($data_table_pop) !=0){
				      $baris .='<td>'.$dt_detil[$i]->r2.'';
					  $baris .='<br /><br /><table cellspacing="0" cellpadding="0" border="0" style="font-size:8;">';
					  $komposisi=explode("#", $data_table_pop[$i]['po_composition']);
				     //  var_dump($komposisi);die();
					  $baris .='<tr style="font-size:8;font-weight: bold">';
					  $baris .='<td>Komposisi :</td>';
                      $baris .='</tr>';						  
			          for ($x = 0; $x < count($komposisi); $x++){
			                $baris .='<tr style="font-size:8;border: 0.5px solid gray;">';
			         		$baris .='<td>'.$komposisi[$x].'</td>';
			         		$baris .='</tr>';	
			              } 
					   
				      $intruction=explode("#", $data_table_pop[$i]['po_intruction']);
					  $baris .='<tr style="font-size:8;font-weight: bold">';
					
					  $baris .='<td>Intruction :</td>';
                      $baris .='</tr>';	
			          for ($x = 0; $x < count($intruction); $x++){
			                $baris .='<tr style="font-size:8;border: 0.5px solid gray;">
			         		         <td>'.$intruction[$x].'</td>
			         		         </tr>';
			              } 
				  
                      $baris .='</table><br />';
				   
			
			          $baris .='</td>
					 <td><table cellspacing="0" cellpadding="0" border="0" style="font-size:8;">';
					 $style=explode("#", $data_table_pop[$i]['po_style']);
					   for ($x = 0; $x < count($style); $x++){
			                $baris .='<tr style="font-size:8;border: 0.5px solid gray;">
			         		         <td>'.$style[$x].'</td>
			         		         </tr>';
			              } 
					 
			        $baris .='</table></td>';
				 }else{
					   $baris .='<td>'.$dt_detil[$i]->r2.'</td>';
					    $baris .='<td></td>';
				 }
			$baris .='<td style="text-align: center;">'.$dt_detil[$i]->r3.'</td>
					 <td style="text-align: center;">'.$this->mainconfig->get_decimal_format($dt_detil[$i]->r4,0,true).'</td>
					 <td style="text-align: center;">'.$this->mainconfig->get_decimal_format($dt_detil[$i]->r5,0,true).'</td>
					 <td>'.$this->mainconfig->get_decimal_format($dt_detil[$i]->r6,0,true).'</td>';
					 
			 if (isset($dt_detil[$i]->r7)){
			    $baris .='<td>'.$dt_detil[$i]->r7.'</td>';
			 }else{
				  $baris .='<td></td>';
			 }
			$baris .='</tr>';
			     };
		   $html .='<tr>
				        <td colspan="6" style="font-size:9;font-weight: bold;text-align: Right">Total</td>
						 <td colspan="2" style="font-size:9;font-weight: bold">'.$this->mainconfig->get_decimal_format($total,0,true).'</td>
											
						</tr>';
           $html .='</table>';
		   
		   $pdf->writeHTML($atas.$baris.$html, true, 0, true, 0);
			           
		//$pdf->AddPage();
		//$pdf->Ln();
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(20, 5, "Remarks", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, '', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln();
		$pdf->SetFont('helvetica', 'I', 8);
		$pdf->Cell(120, 0, "Please send back Purchase Order(PO) with Invoice", 0, 1, 'L', 0, '', 1);
         
		$pdf->Ln(4);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
			
		$pdf->Ln();
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Don't Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(15, 5, "Reason", 0, 'C', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ':', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(8);
		
		//$pdf->SetMargins('10', '8', '1');
		$pdf->MultiCell(50, 5, "Signed", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 5, "Checked", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 5, "Approved", 1, 'C', 0, 0, '130', '', true);
		$pdf->Ln();
		$pdf->MultiCell(50, 23, "", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 23, "", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 23, "", 1, 'C', 0, 0, '130', '', true);
		
	//	$pdf->SetFont('helvetica', '', 6);
		//$PgNo= "This is the page " . $pdf->getAliasNumPage() . " of " . $pdf->getAliasNbPages();
	//	$pdf->Cell(0, 10, $PgNo, 0, false, 'C', 0, '', 0, false, 'T', 'M');
		
		date_default_timezone_set('Asia/Jakarta');
		 $time = date('d-m-Y h:i:s'); //.time();
       // $sFilePath = md5($time) . '.pdf';
          $sFilePath ='REPORT_PURCHASE_ORDER_'.$time.'.pdf';
        // Clean any content of the output buffer
        //ob_end_clean(); //jika di aktifkan maka tidak bisa di lihat variabel contohnya untuk var dum

        //Close and output PDF document
        // $pdf->Output($sFilePath); 
		//gNo= "This is the page " . $pdf->getAliasNumPage() . " of " . $pdf->getAliasNbPages();
		//$pdf->Cell(0, 10, $PgNo, 0, false, 'C', 0, '', 0, false, 'T', 'M');
		//$pdf->getPage();
        $pdf->Output($sFilePath, 'I');
		   
	   }
 function print_purchase_order_1() {
   	//  $purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
    //  $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
    //  $user_id = $this->session->userdata('user_id');
	
		 // ==== Gabung antara name dan memo =========
		  $purchase_order_id=$this->uri->segment(5);
		  $format=$this->uri->segment(6);
		  // var_dump($segmen1);die();
	      $user_id = $this->session->userdata('user_id');
       // var_dump($format);die();
	    
        $sp = "dbo.sp_rpt_purchase_order";
        $this->rpc_service->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
        $this->rpc_service->addField('purchase_order_id',$purchase_order_id);
        $this->rpc_service->addField('format',$format);
        $this->rpc_service->addField('temp_folder',sys_get_temp_dir());
        $this->rpc_service->addField('sort','e.item_code asc');  
        $result = $this->rpc_service->resultPrint_pop();
		
		  $alldata=json_decode($result['data']);
		  
	      $dt_header=$alldata->xrow_header;
		  $dt_detil=$alldata->xrow_detail;
		  
		  $sts=$result['no'];
		  $des=$result['des'];
		  $format=$format;
		  
		  // $pdf->Cell($w[6], ($line * $cellHeight2),$dt_detil[0]->r7, 1, 0, 'C');
	// 	   $hobi=explode("#", $dt_detil[0]->r7);
	//	   $name=array($dt_detil[0]->r2);
	//	    array_push($hobi,$dt_detil[0]->r2);
	//	   $arry_nama=count($hobi)-1;
		   var_dump($hobi[$arry_nama]);die();
	  
		
		 $nomor_po=$dt_header[0]->purchase_order_no;
		 $po_date=$dt_header[0]->purchase_order_date;
		 $po_type=$dt_header[0]->purchase_order_type;
		 $partner_name=$dt_header[0]->partner_name;
		 $partner_address=$dt_header[0]->partner_address;
	    $qrcode= 'POPSTAR,PT Number:'.$nomor_po .' Date:'.$po_date;
		  $data = array(
               "dataku" => array(
                               "sts" => $sts,
                               "format" => $format
                            )
           );
	//	$this->CI->load->library('PdfLibrary');
	   $this->load->library('pdf');
	  
		 
      //  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		 $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    //    $pdf = new PdfLibrary(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

              // create new PDF document
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('https://popstar.com');
        $pdf->SetTitle('Purchase Order');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
       // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetMargins('3', '3', '1','5');
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        // $pdf->SetFont('times', 'BI', '12');
        $pdf->SetFont('times', '', '12');
        // ---------------------------------------------------------

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

        // add a page
        $pdf->AddPage('P', 'A4');
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        ////Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        // $pdf->SetFont('helvetica', 'B', 22);
        // $pdf->Cell(190, 0, "POP STAR, PT", 0, 1, 'C', 0, '', 1);
        // $pdf->Ln();

        // $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 4, 'color' => array(255, 0, 0)));
        //untuk line
        // $style = array('width' => 0.8, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 12, 200, 12, $style);

        $style2 = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 13, 200, 13, $style2);

        // QRCODE,Q : QR-CODE Better error correction
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
		
		$pdf->SetFont('helvetica', '', 20);
        $pdf->write2DBarcode($qrcode, 'QRCODE,Q', 175, 20, 30, 30, $style, '');
        $pdf->Cell(200, 0, "PURCHASE ORDER", 0, 1, 'C', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
	    $pdf->SetFont('helvetica', 'I', 11);
        $pdf->Ln(2);
		$pdf->Cell(160, 0, "POPSTAR, PT", 0, 1, 'L', 0, '', 1);
		
		$pdf->SetFont('helvetica', 'I', 10);
		$pdf->Cell(160, 0, "Jl.Nanjung KM.3 No.99, Lagadar, Margaasih, Kab.Bandung", 0, 1, 'L', 0, '', 1);
		$pdf->Cell(160, 0, "Bandung", 0, 1, 'L', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
        $pdf->Ln(3);
		$pdf->SetFont('helvetica', '', 11);
		
		$pdf->MultiCell(30, 5, "PO No", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $nomor_po, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Date", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_date, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Type", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_type, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(10);
		$pdf->SetFont('helvetica', 'B', 11);
		$pdf->MultiCell(30, 5, "SUPPLIER", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $partner_name, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 11);
		$pdf->MultiCell(30, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, $partner_address, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(15);
		// set text shadow effect
      //  $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
		// Set some content to print
		//  <tr style="background-color:gray;color:white;">
		 // $this->load->library('mainconfig');   
		  $html ='';
		  $baris ='';
		  $atas='';
		  
          $atas .='<table cellspacing="0" cellpadding="4" border="1" style="border-color:gray;">
              <tr style="font-size:9;border: 0.5px solid gray;text-align: center;font-weight: bold">
                  <td>Item Code</td>
                  <td>Item Name</td>
                  <td>Satuan</td>
          		  <td>Qty</td>
				  <td>Unit Price</td>
          		  <td>Amount</td>
				  <td>Memo</td>
              </tr>';
			  $total=0;
			   for ($i = 0; $i < count($dt_detil); $i++){
				    $total= $total+ $dt_detil[$i]->r6;
				    if (isset($dt_detil[$i]->r7)){
						  $name=$dt_detil[$i]->r2."<br />".$dt_detil[$i]->r7;
				       // $name=$dt_detil[$i]->r7;
				    }else{
		               $name='';
			        }
				//$html .='<h3>';	
			$baris .='<tr style="font-size:9;border: 0.5px solid gray;">
                     <td>'.$dt_detil[$i]->r1.'</td>';
					 
            $baris .='<td>'.$dt_detil[$i]->r2.'';
			  if (isset($dt_detil[$i]->r7)){	
                  $baris .='<br /><br /><table cellspacing="0" cellpadding="0" border="0" style="font-size:8;">';
			      $hobi=explode("#", $dt_detil[0]->r7);
				     for ($x = 0; $x < count($hobi); $x++){
			               $baris .='<tr>
			         		        <td>'.$hobi[$x].'</td>
			         		        </tr>';
			                 } 
				      $baris .='</table><br /></td>';
					  
			      }else{
				      $baris .='</td>';  
			      }
				  
            	$baris .='<td style="text-align: center">'.$dt_detil[$i]->r3.'</td>
          		          <td style="text-align: center">'. $this->mainconfig->get_decimal_format($dt_detil[$i]->r4,0,true).'</td>
					      <td style="text-align: center">'. $this->mainconfig->get_decimal_format($dt_detil[$i]->r5,0,true).'</td>
					      <td>'. $this->mainconfig->get_decimal_format($dt_detil[$i]->r6,0,true).'</td>
					      <td></td>
                          </tr><h3>';
			        }
			   
			   
		        $html .='<tr>
				        <td colspan="5" style="text-align: Right">Total</td>
						 <td colspan="2">'.$this->mainconfig->get_decimal_format($total,0,true).'</td>
											
						</tr>';
               $html .='</table>';
			   
			 //---------- Create Page break ----------------
			   $delimiter = '<h3>';
	            
              // $html      = file_get_contents('./test.html');
			//   $html      = file_get_contents($html);
			//  $pdf->setY(-30);
			//  $pdf->Line(10,$pdf->GetY(),200,$pdf->GetY());
                 $chunks    = explode($delimiter, $baris);
                $cnt       = count($chunks);
			 //   var_dump($cnt);die();
               // $pdf->writeHTMLCell(0, 0, '', '', $atas.$chunks[0].$html, 0, 1, 0, true, '', true);
            for ($k = 0; $k < $cnt; $k++) {
                   $pdf->writeHTML($atas.$chunks[$k].$html, true, 0, true, 0);
				  // $pdf->writeHTMLCell(0, 0, '', '', $atas.$chunks[$k].$html, 0, 1, 0, true, '', true);
		//  
              if ($k < $cnt - 1) {
                     $pdf->AddPage();
                   }
              }
              // 
              // // Reset pointer to the last page
           //    $pdf->lastPage();
              // 
              // // Close and output PDF document
              // $pdf->Output('test.pdf', 'I');	

            //---------- Create Page break ----------------			   
			   
             // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
         // Print text using writeHTMLCell()
		 
	
		
		
		//------------ Kolom tabel -------------
	
		
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(20, 5, "Remarks", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, '', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln();
		$pdf->SetFont('helvetica', 'I', 8);
		$pdf->Cell(120, 0, "Please send back Purchase Order(PO) with Invoice", 0, 1, 'L', 0, '', 1);
         
		$pdf->Ln(4);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
			
		$pdf->Ln();
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Don't Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(15, 5, "Reason", 0, 'C', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ':', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(8);
		
		//$pdf->SetMargins('10', '8', '1');
		$pdf->MultiCell(50, 5, "Signed", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 5, "Checked", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 5, "Approved", 1, 'C', 0, 0, '130', '', true);
		$pdf->Ln();
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '130', '', true);
		
	//	$pdf->SetFont('helvetica', '', 6);
		//$PgNo= "This is the page " . $pdf->getAliasNumPage() . " of " . $pdf->getAliasNbPages();
	//	$pdf->Cell(0, 10, $PgNo, 0, false, 'C', 0, '', 0, false, 'T', 'M');
		
		date_default_timezone_set('Asia/Jakarta');
		 $time = date('d-m-Y h:i:s'); //.time();
       // $sFilePath = md5($time) . '.pdf';
          $sFilePath ='REPORT_PURCHASE_ORDER_'.$time.'.pdf';
        // Clean any content of the output buffer
        //ob_end_clean(); //jika di aktifkan maka tidak bisa di lihat variabel contohnya untuk var dum

        //Close and output PDF document
        // $pdf->Output($sFilePath); 
		//gNo= "This is the page " . $pdf->getAliasNumPage() . " of " . $pdf->getAliasNbPages();
		//$pdf->Cell(0, 10, $PgNo, 0, false, 'C', 0, '', 0, false, 'T', 'M');
		//$pdf->getPage();
        $pdf->Output($sFilePath, 'I');
	  }
	  
 function print_purchase_order_MANTAP() {
   	//  $purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : false;
    //  $format = isset($_POST['format']) ? $_POST['format'] : 'pdf';
    //  $user_id = $this->session->userdata('user_id');
	
		 // ==== Gabung antara name dan memo =========
		  $purchase_order_id=$this->uri->segment(5);
		  $format=$this->uri->segment(6);
		  // var_dump($segmen1);die();
	      $user_id = $this->session->userdata('user_id');
       // var_dump($format);die();
	    
        $sp = "dbo.sp_rpt_purchase_order";
        $this->rpc_service->setSP(array("sp"=>$sp,"mode"=>"2","debug"=>"1"));
        $this->rpc_service->addField('purchase_order_id',$purchase_order_id);
        $this->rpc_service->addField('format',$format);
        $this->rpc_service->addField('temp_folder',sys_get_temp_dir());
        $this->rpc_service->addField('sort','e.item_code asc');  
        $result = $this->rpc_service->resultPrint_pop();
		
		  $alldata=json_decode($result['data']);
		  
	      $dt_header=$alldata->xrow_header;
		  $dt_detil=$alldata->xrow_detail;
		  
		  $sts=$result['no'];
		  $des=$result['des'];
		  $format=$format;
		  
		  // $pdf->Cell($w[6], ($line * $cellHeight2),$dt_detil[0]->r7, 1, 0, 'C');
	// 	   $hobi=explode("#", $dt_detil[0]->r7);
	//	   $name=array($dt_detil[0]->r2);
	//	    array_push($hobi,$dt_detil[0]->r2);
	//	   $arry_nama=count($hobi)-1;
	//	   var_dump($hobi[$arry_nama]);die();
	  
		
		 $nomor_po=$dt_header[0]->purchase_order_no;
		 $po_date=$dt_header[0]->purchase_order_date;
		 $po_type=$dt_header[0]->purchase_order_type;
		 $partner_name=$dt_header[0]->partner_name;
		 $partner_address=$dt_header[0]->partner_address;
	    $qrcode= 'POPSTAR,PT Number:'.$nomor_po .' Date:'.$po_date;
		  $data = array(
               "dataku" => array(
                               "sts" => $sts,
                               "format" => $format
                            )
           );
	//	$this->CI->load->library('PdfLibrary');
	   $this->load->library('pdf');
	  
		 
      //  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		 $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    //    $pdf = new PdfLibrary(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

              // create new PDF document
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('https://popstar.com');
        $pdf->SetTitle('Purchase Order');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
       // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          $pdf->SetMargins('3', '3', '1','5');
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        // $pdf->SetFont('times', 'BI', '12');
        $pdf->SetFont('times', '', '12');
        // ---------------------------------------------------------

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

        // add a page
        $pdf->AddPage('P', 'A4');
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        ////Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        // $pdf->SetFont('helvetica', 'B', 22);
        // $pdf->Cell(190, 0, "POP STAR, PT", 0, 1, 'C', 0, '', 1);
        // $pdf->Ln();

        // $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 4, 'color' => array(255, 0, 0)));
        //untuk line
        // $style = array('width' => 0.8, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 12, 200, 12, $style);

        $style2 = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $pdf->Line(5, 13, 200, 13, $style2);

        // QRCODE,Q : QR-CODE Better error correction
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
		
		$pdf->SetFont('helvetica', '', 20);
        $pdf->write2DBarcode($qrcode, 'QRCODE,Q', 175, 20, 30, 30, $style, '');
        $pdf->Cell(200, 0, "PURCHASE ORDER", 0, 1, 'C', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
	    $pdf->SetFont('helvetica', 'I', 11);
        $pdf->Ln(2);
		$pdf->Cell(160, 0, "POPSTAR, PT", 0, 1, 'L', 0, '', 1);
		
		$pdf->SetFont('helvetica', 'I', 10);
		$pdf->Cell(160, 0, "Jl.Nanjung KM.3 No.99, Lagadar, Margaasih, Kab.Bandung", 0, 1, 'L', 0, '', 1);
		$pdf->Cell(160, 0, "Bandung", 0, 1, 'L', 0, '', 1);
       // $pdf->Line(35, 36, 160, 36, $style2);
        $pdf->Ln(3);
		$pdf->SetFont('helvetica', '', 11);
		
		$pdf->MultiCell(30, 5, "PO No", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $nomor_po, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Date", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_date, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		
		$pdf->MultiCell(30, 5, "PO Type", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $po_type, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(10);
		$pdf->SetFont('helvetica', 'B', 11);
		$pdf->MultiCell(30, 5, "SUPPLIER", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(70, 5, $partner_name, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 11);
		$pdf->MultiCell(30, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, "", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, $partner_address, 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(15);
		// set text shadow effect
      //  $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
		// Set some content to print
		//  <tr style="background-color:gray;color:white;">
		 // $this->load->library('mainconfig');   
		  $html ='';
		
          $html .='<table cellspacing="0" cellpadding="4" border="1" style="border-color:gray;">
              <tr style="font-size:9;border: 0.5px solid gray;text-align: center;font-weight: bold">
                  <td>Item Code</td>
                  <td>Item Name</td>
                  <td>Satuan</td>
          		  <td>Qty</td>
				  <td>Unit Price</td>
          		  <td>Amount</td>
				  <td>Memo</td>
              </tr>';
			  $total=0;
			   for ($i = 0; $i < count($dt_detil); $i++){
				    $total= $total+ $dt_detil[$i]->r6;
				    if (isset($dt_detil[$i]->r7)){
						  $name=$dt_detil[$i]->r2."<br />".$dt_detil[$i]->r7;
				       // $name=$dt_detil[$i]->r7;
				    }else{
		               $name='';
			        }
				//$html .='<h3>';	
			$html .='<tr style="font-size:9;border: 0.5px solid gray;">
                     <td><h4>'.$dt_detil[$i]->r1.'</h4></td>';
					 
            $html .='<td>'.$dt_detil[$i]->r2.'';
			  if (isset($dt_detil[$i]->r7)){	
               			  
		      $html .='<br /><br /><table cellspacing="0" cellpadding="0" border="0" style="font-size:8;">';
			    $hobi=explode("#", $dt_detil[0]->r7);
				  for ($x = 0; $x < count($hobi); $x++){
			          $html .='<tr>
			         		   <td>'.$hobi[$x].'</td>
			         		 </tr>';
			          } 
				  
                  $html .='</table><br /></td>';
			   }else{
				 $html .='</td>';  
			   }
          	$html .='<td style="text-align: center">'.$dt_detil[$i]->r3.'</td>
          		     <td style="text-align: center">'. $this->mainconfig->get_decimal_format($dt_detil[$i]->r4,0,true).'</td>
					 <td style="text-align: center">'. $this->mainconfig->get_decimal_format($dt_detil[$i]->r5,0,true).'</td>
					 <td>'. $this->mainconfig->get_decimal_format($dt_detil[$i]->r6,0,true).'</td>
					  <td></td>
                     </tr>';
			   }
		        $html .='<tr>
				        <td colspan="5" style="text-align: Right">Total</td>
						 <td colspan="2">'.$this->mainconfig->get_decimal_format($total,0,true).'</td>
											
						</tr>';
               $html .='</table>';
			   
			 //---------- Create Page break ----------------
	//		   $delimiter = '<h3>';
              // $html      = file_get_contents('./test.html');
			//   $html      = file_get_contents($html);
			  
      //         $chunks    = explode($delimiter, $html);
     //          $cnt       = count($chunks);
			//   var_dump($chunks);die();
      //          $pdf->writeHTMLCell(0, 0, '', '', $delimiter .$chunks[2], 0, 1, 0, true, '', true);
      //      for ($k = 0; $k < $cnt; $k++) {
      //           // $pdf->writeHTML($delimiter . $chunks[$k], true, 0, true, 0);
		//		   $pdf->writeHTMLCell(0, 0, '', '', $chunks[$k], 0, 1, 0, true, '', true);
		//  
      //        if ($k < $cnt - 1) {
      //               $pdf->AddPage();
      //             }
      //      }
              // 
              // // Reset pointer to the last page
             //  $pdf->lastPage();
              // 
              // // Close and output PDF document
              // $pdf->Output('test.pdf', 'I');	

            //---------- Create Page break ----------------			   
			   
              $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
         // Print text using writeHTMLCell()
		 
	
		
		
		//------------ Kolom tabel -------------
	
		
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(20, 5, "Remarks", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(150, 5, '', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln();
		$pdf->SetFont('helvetica', 'I', 8);
		$pdf->Cell(120, 0, "Please send back Purchase Order(PO) with Invoice", 0, 1, 'L', 0, '', 1);
         
		$pdf->Ln(4);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
			
		$pdf->Ln();
		$pdf->SetFont('helvetica', '', 8);
		$pdf->MultiCell(30, 5, "We Don't Agree", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ":", 0, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(5, 4, '', 1, 'L', 0, 0, '', '', true);
		$pdf->MultiCell(15, 5, "Reason", 0, 'C', 0, 0, '', '', true);
		$pdf->MultiCell(5, 5, ':', 0, 'L', 0, 0, '', '', true);
		$pdf->Ln(8);
		
		//$pdf->SetMargins('10', '8', '1');
		$pdf->MultiCell(50, 5, "Signed", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 5, "Checked", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 5, "Approved", 1, 'C', 0, 0, '130', '', true);
		$pdf->Ln();
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '30', '', true);
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '80', '', true);
		$pdf->MultiCell(50, 25, "", 1, 'C', 0, 0, '130', '', true);
		
	//	$pdf->SetFont('helvetica', '', 6);
		//$PgNo= "This is the page " . $pdf->getAliasNumPage() . " of " . $pdf->getAliasNbPages();
	//	$pdf->Cell(0, 10, $PgNo, 0, false, 'C', 0, '', 0, false, 'T', 'M');
		
		date_default_timezone_set('Asia/Jakarta');
		 $time = date('d-m-Y h:i:s'); //.time();
       // $sFilePath = md5($time) . '.pdf';
          $sFilePath ='REPORT_PURCHASE_ORDER_'.$time.'.pdf';
        // Clean any content of the output buffer
        //ob_end_clean(); //jika di aktifkan maka tidak bisa di lihat variabel contohnya untuk var dum

        //Close and output PDF document
        // $pdf->Output($sFilePath); 
		//gNo= "This is the page " . $pdf->getAliasNumPage() . " of " . $pdf->getAliasNbPages();
		//$pdf->Cell(0, 10, $PgNo, 0, false, 'C', 0, '', 0, false, 'T', 'M');
		//$pdf->getPage();
        $pdf->Output($sFilePath, 'I');
	  }
	  

}

?>