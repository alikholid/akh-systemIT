<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Assets extends CI_Controller { 

	function __construct(){ 
		parent::__construct(); 
		
		$this->data_request = $_REQUEST;
		
		$module = $this->router->module;
		$directory = $this->router->directory;
		$class = $this->router->class;
		$method = $this->router->method;
		$directory = trim(str_replace('../modules/'.$module ,'',str_replace('/controllers/','',$directory)),'/');
		
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
	
	function assets_table(){
		$view = 'view_data_assets';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r6']['hidden'] = true;
		$get_field['r7']['hidden'] = true;
		$get_field['r8']['hidden'] = true;
		$get_field['r9']['hidden'] = true;
		$get_field['r10']['hidden'] = true;
		
		return $get_field;
	}
   
   function incoming_table(){
		$view = 'view_data_assets_incoming';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r15']['hidden'] = true;
		
		$get_field['r6']['footer'] = 'Total Incoming :';
		$get_field['r7']['footer'] = 'sum';
		$get_field['r8']['footer'] = 'sum';
		$get_field['r9']['footer'] = 'sum';
		
		return $get_field;
	}
   
   function outgoing_table(){
		$view = 'view_data_assets_outgoing';
		$get_field = $this->ecc_library->get_field($view);
		
		$get_field['r1']['hidden'] = true;
		$get_field['r13']['hidden'] = true;
		
		$get_field['r6']['footer'] = 'Total Outgoing :';
		$get_field['r7']['footer'] = 'sum';
		
		return $get_field;
	}
	
	function index(){
		$this->load->model('main');
		$component['loadlayout'] = true;
		$component['view_load'] = 'general/assets/view';
		$component['load_js'][] = 'general/assets/view';
		
		$component['page_title'] = "Assets";
		$dashboard_table = array();
		
		
		$field_asset = $this->assets_table();
		$field_incoming = $this->incoming_table();
		$field_outgoing = $this->outgoing_table();
		
		$dashboard_table['field_asset'] = $field_asset;
		$dashboard_table['field_asset_loaddata'] = 'loaddata_assets';
		
		$dashboard_table['field_incoming'] = $field_incoming;
		$dashboard_table['field_incoming_loaddata'] = 'loaddata_incoming';
		
		$dashboard_table['field_outgoing'] = $field_outgoing;
		$dashboard_table['field_outgoing_loaddata'] = 'loaddata_outgoing';
		
		$component['dashboard_table'] = $dashboard_table;
		
		$this->authentication->ajaxlayout($component);
	}
	
	function loaddata_assets(){
		
		$this->authentication->plainlayout();
		
		$item_category_id = isset($_REQUEST['item_category_id']) ? is_numeric($_REQUEST['item_category_id']) ? $_REQUEST['item_category_id']  : -1 : -1;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_data_assets';
		$field = $this->assets_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		$extra_param['where']['0']['field'] = 'r10';
		$extra_param['where']['0']['data'] = $item_category_id;
		$extra_param['methodid'] = $methodid;
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
   
   function loaddata_incoming(){
		
		$this->authentication->plainlayout();
		
		$item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : false;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_data_assets_incoming';
		$field = $this->incoming_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		if($item_id){
			$extra_param['where']['0']['field'] = 'r15';
			$extra_param['where']['0']['data'] = $item_id;
		}
		$extra_param['methodid'] = $methodid;
		$extra_param['footer_data'] = true;
		$extra_param['sp_sum'] = 'dbo.sp_assets_incoming_sum';
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
   
   function loaddata_outgoing(){
		
		$this->authentication->plainlayout();
		
		$item_id = isset($_REQUEST['item_id']) ? $_REQUEST['item_id'] : false;
		$methodid = isset($_REQUEST['methodid']) ? is_numeric($_REQUEST['methodid']) ? $_REQUEST['methodid']  : -1 : -1;
		
		$view = 'view_data_assets_outgoing';
		$field = $this->outgoing_table();
		
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";
		
		$extra_param = array();
		if($item_id){
			$extra_param['where']['0']['field'] = 'r13';
			$extra_param['where']['0']['data'] = $item_id;
		}
		$extra_param['methodid'] = $methodid;
		$extra_param['footer_data'] = true;
		$extra_param['sp_sum'] = 'dbo.sp_assets_outgoing_sum';
		
		$loaddata = $this->ecc_library->get_field_data($view,$field,$extra_param);
			
		echo $loaddata;
	}
	
	function print_assets(){
		
		$field = $this->incoming_table();
		
		$item_category_id = isset($_REQUEST['item_category_id']) ?  $_REQUEST['item_category_id'] : '';
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page 
        $rows = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid 
        $sidx = isset($_POST['sidx'])?$_POST['sidx']:'r1'; // get index row - i.e. user click to sort 
        $sord = isset($_POST['sord'])?$_POST['sord']:'0'; // get the direction 
		$search = isset($_REQUEST['_search'])?$_REQUEST['_search']:false; 
		$filterRules =  isset($_POST['filters'])?$_POST['filters']:false;
				
		$limit =  $rows;
		$offset =  $rows * ($page - 1);
		
		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();
		
		if($sord == 'asc'){
			$sord = 1;
		} else {
			$sord = 2;
		}
		
		$sort =	$sidx. '='.$sord;	
						
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";	
				
		$sp = "dbo.sp_rpt_assets";		
		
		$this->rpc_service_portal->setSP(array("sp"=> $sp,"mode"=> $print == 1 ? "2" : "1","debug"=>"1"));
				
		$this->rpc_service_portal->addField('item_category_id',$item_category_id);
		$this->rpc_service_portal->addField('format',$format);
		$this->rpc_service_portal->addField('temp_folder',sys_get_temp_dir());
		$this->rpc_service_portal->addField('sort',$sort);
		$this->rpc_service_portal->addField('limit',$limit);
		$this->rpc_service_portal->addField('offset',$offset);
		
		
		$this->rpc_service_portal->setWhere($search,$filterRules,$field);

		$result = $this->rpc_service_portal->resultPrint2();
		echo json_encode($result);

	}
	
	function print_incoming(){
		
		$field = $this->incoming_table();
		
		$item_id = isset($_REQUEST['item_id']) ?  $_REQUEST['item_id'] : 0;
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page 
        $rows = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid 
        $sidx = isset($_POST['sidx'])?$_POST['sidx']:'r1'; // get index row - i.e. user click to sort 
        $sord = isset($_POST['sord'])?$_POST['sord']:'0'; // get the direction 
		$search = isset($_REQUEST['_search'])?$_REQUEST['_search']:false; 
		$filterRules =  isset($_POST['filters'])?$_POST['filters']:false;
			
		$limit =  $rows;
		$offset =  $rows * ($page - 1);
		
		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();
		
		if($sord == 'asc'){
			$sord = 1;
		} else {
			$sord = 2;
		}
		
		$sort =	$sidx. '='.$sord;	
						
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";	
		
		if($item_id == 0){
			$sp = "dbo.sp_rpt_rekap_detail_pemasukan_all";	
		} else {
			$sp = "dbo.sp_rpt_rekap_detail_pemasukan";	
		}
			
		
		$this->rpc_service_portal->setSP(array("sp"=> $sp,"mode"=> $print == 1 ? "2" : "1","debug"=>"1"));
				
		$this->rpc_service_portal->addField('item_id',$item_id);
		$this->rpc_service_portal->addField('format',$format);
		$this->rpc_service_portal->addField('temp_folder',sys_get_temp_dir());
		$this->rpc_service_portal->addField('sort',$sort);
		$this->rpc_service_portal->addField('limit',$limit);
		$this->rpc_service_portal->addField('offset',$offset);
		
		
		$this->rpc_service_portal->setWhere($search,$filterRules,$field);

		$result = $this->rpc_service_portal->resultPrint2();
		echo json_encode($result);

	}
	
	function print_outgoing(){
		
		$field = $this->outgoing_table();
		
		$item_id = isset($_REQUEST['item_id']) ?  $_REQUEST['item_id'] : '';
		$print = isset($_REQUEST['print']) ? $_REQUEST['print'] : 0;
		$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xlsx';
		$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page 
        $rows = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid 
        $sidx = isset($_POST['sidx'])?$_POST['sidx']:'r1'; // get index row - i.e. user click to sort 
        $sord = isset($_POST['sord'])?$_POST['sord']:'0'; // get the direction 
		$search = isset($_REQUEST['_search'])?$_REQUEST['_search']:false; 
		$filterRules =  isset($_POST['filters'])?$_POST['filters']:false;
				
		$limit =  $rows;
		$offset =  $rows * ($page - 1);
		
		$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : array();
		
		if($sord == 'asc'){
			$sord = 1;
		} else {
			$sord = 2;
		}
		
		$sort =	$sidx. '='.$sord;	
						
		$return = array();
		$return['valid'] = false;
		$return['message'] = "Internal Server Error";	
		
		if($item_id == 0){
			$sp = "dbo.sp_rpt_rekap_detail_pengeluaran_all";	
		} else {
			$sp = "dbo.sp_rpt_rekap_detail_pengeluaran";		
		}
		
			
		
		$this->rpc_service_portal->setSP(array("sp"=> $sp,"mode"=> $print == 1 ? "2" : "1","debug"=>"1"));
				
		$this->rpc_service_portal->addField('item_id',$item_id);
		$this->rpc_service_portal->addField('format',$format);
		$this->rpc_service_portal->addField('temp_folder',sys_get_temp_dir());
		$this->rpc_service_portal->addField('sort',$sort);
		$this->rpc_service_portal->addField('limit',$limit);
		$this->rpc_service_portal->addField('offset',$offset);
		
		
		$this->rpc_service_portal->setWhere($search,$filterRules,$field);

		$result = $this->rpc_service_portal->resultPrint2();
		echo json_encode($result);

	}
}

?>