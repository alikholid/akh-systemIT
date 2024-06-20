<div class="row">
	<div class="col-xl-12">     
		<div class="card card-statistics h-100"> 
			<div class="card-body" style="padding: 1.25rem !important">
				<h5 class="card-title form_title_<?php echo $methodid ?>"><?php echo $page_title ?></h5>
				<div class="tab tab-border">
					<ul class="nav nav-tabs form_tab_<?php echo $methodid ?>" role="tablist">
						<li class="nav-item">
							<a class="nav-link active show" id="tab_<?php echo $methodid; ?>_header" data-toggle="tab" href="#content_<?php echo $methodid; ?>_header" role="tab" aria-controls="content_<?php echo $methodid; ?>_header" aria-selected="true">
								Header
							</a>	
						</li>
						
						<li class="nav-item">
							<a class="nav-link" id="tab_<?php echo $methodid; ?>_detail" data-toggle="tab" href="#content_<?php echo $methodid; ?>_detail" role="tab" aria-controls="content_<?php echo $methodid; ?>_detail" aria-selected="true">
								Detail
							</a>	
						</li>
					</ul>
					
					<div class="tab-content">
						<div class="tab_custom_ecc tab-pane fade active show" id="content_<?php echo $methodid; ?>_header" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_header">
							<div class="row">
								<div class="col-xl-12 mb-10 ml-10">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>" action="javascript:post_<?php echo $methodid ?>()">
										<?php 
											$this->ecc_library->form('hidden','',"form_".$methodid,$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
											$this->ecc_library->form('hidden','',"form_".$methodid,'work_order_request_id','');
										?>
										
										<div class="row">
											<div class="col-xl-6">
												<?php 
													$this->ecc_library->form('select','Work Process',"form_".$methodid,'work_process_id','','','work_process_user');
													$this->ecc_library->form('text','Production Request No',"form_".$methodid,'work_order_request_no','','','');
													
												?>
											</div>
											
											<div class="col-xl-6">
												<?php 
													$this->ecc_library->form('select','Production Plan',"form_".$methodid,'work_order_plan_id','','','get_work_order_plan_process',array('extra_param' => array(0 => array('field' => 'work_process_id' ))));
													$this->ecc_library->form('date','Production Request Date',"form_".$methodid,'work_order_request_date','','','');
												?>
											</div>
											
										</div>
									</form>
									
									<div class="ui grid form">
										<div class="row field">
											<div class="twelve wide column">
												<button type="button" class="btn btn-success" onclick="save_<?php echo $methodid ?>()">
													<i class="fa fa-save"></i> Save Header
												</button>
												
												<button type="button" class="btn btn-info" onclick="cancel_<?php echo $methodid ?>()">
													<i class="fa fa-arrow-left"></i> Back
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab_custom_ecc tab-pane fade" id="content_<?php echo $methodid; ?>_detail" role="tabpanel" aria-labelledby="tab_<?php echo $methodid; ?>_detail">
							<div class="row">
								<div class="col-xl-12">
									<form class="ui grid ecc_form" id="form_<?php echo $methodid ?>_detail" action="javascript:add_<?php echo $methodid ?>()">
										<div class="row">
											<div class="col-xl-9">
												<div class="row">
													<div class="col-xl-6">
														<?php
															$this->ecc_library->form('hidden','',"form_".$methodid."_detail",$this->security->get_csrf_token_name(),$this->security->get_csrf_hash());
															$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'work_order_request_id','','','');
															$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'work_order_request_detail_id','','','');
															$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'work_order_plan_id','','','');
															$this->ecc_library->form('hidden','',"form_".$methodid."_detail",'work_process_id','','','');
															$this->ecc_library->form('select','FG',"form_".$methodid."_detail",'work_order_detail_id','','','get_work_order_detail_item',array('extra_param' => array(0 => array('field' => 'work_order_plan_id' ),1 => array('field' => 'work_process_id' ))));
														?>
													</div>
													
													<div class="col-xl-6">
														<?php
															$this->ecc_library->form('select','FG / SFG Process',"form_".$methodid."_detail",'item_id','','','get_item_from_work_order_plan_process',array('extra_param' => array(0 => array('field' => 'work_order_plan_id' ),1 => array('field' => 'work_process_id' ),2 => array('field' => 'work_order_detail_id' ))));
														?>
													</div>
													
													<div class="col-xl-6">
														<?php
															$this->ecc_library->form('select','Bom',"form_".$methodid."_detail",'bom_id','','','get_bom',array('extra_param' => array(0 => array('field' => 'item_id' ))));
														?>
													</div>
													
													<div class="col-xl-6 ">
														<?php
															$this->ecc_library->form('text','Qty Request',"form_".$methodid."_detail",'quantity_request','','','');
														?>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xl-12">
									<h3>List Material</h3>
									<div class="row">
										<div class="col-xl-12 grid_container_<?php echo $methodid ?>_detail">
											<table id="table_<?php echo $methodid ?>_detail"></table>
											<div id="ptable_<?php echo $methodid ?>_detail"></div>                                                     
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xl-12">
									<button type="button" class="btn btn-info" onclick="javascript:add_<?php echo $methodid ?>()">
										Submit Request
									</button>
								</div>
							</div>
							<br>
							<br>
							<div class="row">
								<div class="col-xl-12">
									<h3>List Request</h3>
									<?php 
										$extra_param = array('methodid'=> $methodid,'extra_param' => array(0 => array('field' => 'work_order_request_id','form_id' => 'form_'. $methodid .'_detail_work_order_request_id')));
										$this->ecc_library->jqgrid($methodid."_list", $dashboard_table['field_detail_total'], $dashboard_table['field_detail_total_loaddata'],$extra_param); 
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>   
	</div>
</div>