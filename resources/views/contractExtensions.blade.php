@extends('layout.maintenanceLayout')

@section('title')
Contract Extensions
@endsection

@section('content')
<div class="row" style="margin-top:-30px;">        
	<div class="row">         
		<div class="row"> 
			<div class="col s5 push-s3" style="margin-left:-2%">    
				<h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Contract Extensions</h3>
			</div>    
		</div>   
	</div>
 
	<div class="col s12 push-s1" style="margin-top:-4%">
		<div class="container white lighten-2 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%; padding-top:1%;">
			<div class="row">
				<div class="col s12" style="margin-top:-5px;">
					<table class="striped white" style="border-radius:10px;" id="tblContractExtensions">
						<thead>
							<tr>
								<th class="grey lighten-1 "></th>
                                <th class="grey lighten-1 "></th>								
                                <th class="grey lighten-1 ">Client Name</th>
								<th class="grey lighten-1 ">Date End</th>
								<th class="grey lighten-1 ">Person In Charge</th>
							</tr>
						</thead>
                        
						<tbody>
                            <tr>
								<td><button class="btn col s12 waves-effect green btnExtend">Extend</button></td>
								<td><button class="btn col s12 waves-effect red btnEnd">End</button></td>
								<td>ChinaBank</td>
								<td>12/12/12</td>
								<td>Chun Li</td>
							</tr>
														
	
						</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal extend contract-->
<div id="modalExtend" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:630px; margin-top:-50px;">
	<div class="modal-header">
		<div class="h">
			<h3><center>Contract Extension</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="">
					<li class="collection-header">
						<h5 style="font-weight:bold;">Current Contract Details</h5>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s6">
								<div style="font-weight:bold;">Type of Contract</div>
								<div id="">Contract 1</div>
							</div>
							
							<div class='col s6'>
								<div style="font-weight:bold;">Duration(Months)</div>
								<div id="">12</div>
							</div>														
						</div>
						
						<div class="row">
							<div class="col s6">
								<div style="font-weight:bold;">Start Date</div>
								<div id="">10/10/15</div>
							</div>
							
							<div class="col s6">
								<div style="font-weight:bold;">End Date</div>
								<div id="">10/10/16</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								<div style="font-weight:bold;">Operating Time(Hours)</div>
								<div id="">12</div>
							</div>
							
							<div class="col s6">
								<div style="font-weight:bold;">Rate per Hour</div>
								<div id="">120.00</div>
							</div>
						</div>
					</li>
					<li class="collection-item">
						<h5 style="font-weight:bold;">Set New Rate Per Hour (Optional)</h5>
						<div class="row">
							<div class="input-field col s6">																	
								<input placeholder=""  id="" type="text" class="validate" pattern="[0-9., ]{2,}">	
								<label data-error="Incorrect" class="active" style="color:#64b5f6;"  for="">New Rate Per Hour</label>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
    <!-- button -->
	<div class="modal-footer ci" style="background-color: #00293C;">
		<button class="btn blue waves-effect btnProceed" name="" id = "" style="margin-right: 30px;">Proceed</button>
	</div>
</div>
<!--modal extend contract end-->

<!--modal client login-->
<div id="modalLogin" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:320px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Login</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input id="" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Username</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strNew" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Password</label> 
				</div>
			</div>
				
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect green" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">OK
		</button>
	</div>	
</div>
<!--modal client login end-->
@stop

@section('script')
<script>
$(document).ready(function(){
	$("#tblContractExtensions").DataTable({             
	 "columns": [     
	 {"orderable": false},
	 {"orderable": false},	 
	 null,
	 null,
	 null
	 ] ,  
	 "pageLength":5,
	 "lengthMenu": [5,10,15,20],		
	});
	
	$('.btnExtend').click(function(){
		$('#modalExtend').openModal();	
	});
	
	$('.btnEnd').click(function(){
		swal({   title: "Are you sure?",
			  	 text: "Contract Will not be Extended",
			     type: "warning",
			     showCancelButton: true,
			     confirmButtonColor: "#DD6B55",
			     confirmButtonText: "Yes",
			     closeOnConfirm: false
			 },
			     function(){
//			      swal("Deleted!", "Record has been deleted.", "success");
		});
	});
	
    $('.btnProceed').click(function(){
		$('#modalExtend').closeModal();
		$('#modalLogin').openModal();
		
	});
});
</script>
@stop