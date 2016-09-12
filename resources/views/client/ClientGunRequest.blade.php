@extends('client.ClientDashboard')
@section('title')
Client Request of Gun
@endsection

@section('content')

<div class="row" style="margin-top:-30px;">
     <div class="col s12 l5 push-l3">
            <h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Guns</h3>
     </div>
     <div class="row"></div>
    <div class="row"></div>
    <div class="col s12 l12 push-l1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;">
                <div class="col s6 l4 offset-l9">
                        <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalgunAdd">
                            <i class="material-icons left">add</i>ADD
                        </button>
                </div>
            <div class="row"></div>
            <div class="row">
                <div class="col s12 l12">
                    <table class="striped white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>                                
                                <th class="blue darken-3 white-text"></th>
								<th class="blue darken-3 white-text"></th>
                                <th class="blue darken-3 white-text"></th>
                                <th class="blue darken-3 white-text">License Number</th>
                                <th class="blue darken-3 white-text">Serial Number</th>
                                <th class="blue darken-3 white-text">Name</th>
                               
                            </tr>
                        </thead>
                        
                        <tbody>
								<td><button data-position="bottom" data-delay="50" data-tooltip="Gun Details" class="tooltipped buttonMore btn col s12" id=""><i class="material-icons">security</i></button>
								</td>
								
								<td><button data-position="bottom" data-delay="50" data-tooltip="Replace Gun" class="tooltipped buttonSwap btn blue col s12" id=""><i class="material-icons">swap_horiz</i></button>
								</td>
								
								<td><button data-position="bottom" data-delay="50" data-tooltip="Return Gun" class="tooltipped buttonReturn btn red col s12" id=""><i class="material-icons">assignment_return</i></button>
								</td>
							
								<td>123-321-123</td>
								<td>456-654-456</td>
                                <td>Fire Seven</td>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--modal gun add request-->
<div id="modalgunAdd" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:425px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Request Additional Guns</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">security</i>
					<input id="" type="number" class="validate" name = "" required="" aria-required="true" min="1" value="1">
					<label for="">Number of Guns</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>
				 <div class="input-field col s12">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <textarea  class="materialize-textarea" id="" type="text"  ></textarea>
					 <label for="input_text">Reason</label> 
					 
				 </div>
			</div>
			
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">Send
			<i class="material-icons right">send</i>
		</button>
	</div>	
</div>
<!--modal gun add request end-->


<!--modal gun details-->
<div id="modalgunDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:450px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Gun Details</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			
			<div class="col s12" style="margin-top:-30px;">      
				<ul class="collection with-header" id="collectionActive" >
					<div >
							
					<li class="collection-item" style="font-weight:bold;">
						
						<div class="row">
							<div class="col s6">
								Type of Gun:<div style="font-weight:normal;" id = 'strPlaceBirth'>&nbsp;&nbsp;&nbsp;Pistol</div>
							</div>
							
							<div class="col s6">
								Serial Number:<div style="font-weight:normal;" id = 'intAge'>&nbsp;&nbsp;&nbsp;456-654-456</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								Name:<div style="font-weight:normal;" id = 'strPlaceBirth'>&nbsp;&nbsp;&nbsp;Fire-Seven</div>
							</div>
							
							<div class="col s6">
								Manufacturer:<div style="font-weight:normal;" id = 'intAge'>&nbsp;&nbsp;&nbsp;Fire-Seven</div>
							</div>
						</div>																		
						
					</li>
					
					<li class="collection-item grey lighten-1" style="font-weight:bold;">
						<div class="row">
							<div class="col s12">	
								License Number:<div style="font-weight:normal;" id = 'strFirstName'>&nbsp;&nbsp;&nbsp;123-321-123</div>
							</div>														
														
						</div>	
						
						<div class="row">
							<div class="col s6">	
								Date Issued:<div style="font-weight:normal;" id = 'strMiddleName'>&nbsp;&nbsp;&nbsp;12/25/2015</div>
							</div>
							
							<div class="col s6">	
								Date Expired:<div style="font-weight:normal;" id = 'strLastName'>&nbsp;&nbsp;&nbsp;12/25/2017</div>
							</div>
						</div>
					</li>
                                      
				</div>
				</ul>
			</div>
			
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large green  modal-close" name="action" style="margin-right: 30px;" id = "">OK		
		</button>
	</div>	
</div>
<!--modal gun details end-->


<!--modal gun swap request-->
<div id="modalgunSwap" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:360px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Gun Replacement</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				
				<div class="row"></div>
				 <div class="input-field col s12">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <textarea  class="materialize-textarea" id="" type="text"  placeholder=" "></textarea>
					 <label for="input_text">Reason</label> 
					 
				 </div>
			</div>
			
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">Send
			<i class="material-icons right">send</i>
		</button>
	</div>	
</div>
<!--modal gun swap request end-->


<!--modal gun removal request-->
<div id="modalgunDelete" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:360px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Gun Removal</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				
				<div class="row"></div>
				 <div class="input-field col s12">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <textarea  class="materialize-textarea" id="" type="text"  placeholder=" "></textarea>
					 <label for="input_text">Reason</label> 
					 
				 </div>
			</div>
			
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">Send
			<i class="material-icons right">send</i>
		</button>
	</div>	
</div>
<!--modal gun removal request end-->


<script>
    $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
	
	$("#dataTable").DataTable({
         "columns": [
		{"searchable": false},
		{"searchable": false},
		{"searchable": false},
        null,
        null,
		null
        ] ,  
		"pageLength":5,
		"lengthMenu": [5,10,15,20],
		
	});
	
	 $('#dataTable').on('click', '.buttonSwap', function(){
        $('#modalgunSwap').openModal();            
    });
	
	$('#dataTable').on('click', '.buttonReturn', function(){
        $('#modalgunDelete').openModal();            
    });
	
	$('#dataTable').on('click', '.buttonMore', function(){		
		$('#modalgunDetails').openModal();
	});
</script>

@stop