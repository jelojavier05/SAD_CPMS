@extends('client.ClientDashboard')
@section('title')
Client Request of Guard
@endsection

@section('content')

  <div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Guard</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
                <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalguardAdd">
                    <i class="material-icons left">add</i> ADD
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="striped white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>                                
                                <th style="width:50px;" class="blue darken-3 white-text"></th>
								<th style="width:50px;" class="blue darken-3 white-text"></th>
                                <th style="width:50px;" class="blue darken-3 white-text"></th>
                                <th class="blue darken-3 white-text">Guard License</th>
                                <th class="blue darken-3 white-text">Name</th>
                                <th class="blue darken-3 white-text">Gender</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                                <tr>
                                    <td>
										 <button data-position="bottom" data-delay="50" data-tooltip="Guard Details" class="tooltipped buttonMore  btn col s12" name="" id="">
                                            <i class="material-icons">person_outline</i>
                                        </button>
                                        <label for=""></label>
									</td>

                                    <td>
                                        <button data-position="bottom" data-delay="50" data-tooltip="Guard Replacement" class=" tooltipped buttonSwap blue btn col s12" name="" id="">
                                            <i class="material-icons">swap_horiz</i>
                                        </button>
                                        <label for=""></label>
                                    </td>

                                    <td>
                                        <button data-position="bottom" data-delay="50" data-tooltip="Guard Removal" class="tooltipped buttonDelete btn red col s12" id="" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "">2013-01234-MN-0</td>
                                    <td id = "" value = "">Mang Tomas</td>                                    
                                    <td id = "">Male</td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--modal guard add request-->

<div id="modalguardAdd" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:425px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Request Additional Guards</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">accessibility</i>
					<input id="" type="number" class="validate" name = "" required="" aria-required="true" min="1" value="1">
					<label for="">Number of Guards</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>
				 <div class="input-field col s12">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <textarea  class="materialize-textarea" id="strMessageEdit" type="text" length="224" placeholder=" "></textarea>
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

<!--modal guard add request end-->


<!--modal guard details-->

<div id="modalguardDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:500px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Guard Details</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			
			<div class="col s12" style="margin-top:-30px;">      
				<ul class="collection with-header" id="collectionActive" >
					<div >
							
					<li class="collection-item" style="font-weight:bold;">
						<div class="row">
							<div class="col s4">	
								First Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Kobe</div>
							</div>
							
							<div class="col s4">	
								Middle Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Bean</div>
							</div>
							
							<div class="col s4">	
								Last Name:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Bryant</div>
							</div>
														
						</div>
						
						<div class="row">
							<div class="col s12">
								Address:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;123 Hello Street Las Pinas, Metro Manila</div>
							</div>																					
						</div>
						
						<div class="row">
							<div class="col s6">
								Place of Birth:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Makati City</div>
							</div>
							
							<div class="col s6">
								Age:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;25</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								Contact Number (Mobile):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;09123456789</div>
							</div>
							
							<div class="col s6">
								Contact Number (Landline):<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;8123456</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								Gender:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Male</div>
							</div>
							
							<div class="col s6">
								Civil Status:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;Single</div>
							</div>
						</div>
						
					</li>
                                      
				</div>
				</ul>
			</div>
			
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large green waves-effect waves-light modal-close" name="action" style="margin-right: 30px;" id = "">OK		
		</button>
	</div>	
</div>


<!--modal guard details end-->



<!--modal guard swap request-->

<div id="modalguardSwap" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:360px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Guard Replacement</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				
				<div class="row"></div>
				 <div class="input-field col s12">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <textarea  class="materialize-textarea" id="strMessageEdit" type="text" length="224" placeholder=" "></textarea>
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

<!--modal guard swap request end-->

<!--modal guard removal request-->

<div id="modalguardDelete" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:360px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Guard Removal</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				
				<div class="row"></div>
				 <div class="input-field col s12">
					 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
					 <textarea  class="materialize-textarea" id="strMessageEdit" type="text" length="224" placeholder=" "></textarea>
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

<!--modal guard removal request end-->
    
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
            $('#modalguardSwap').openModal();            

        });
	
	$('#dataTable').on('click', '.buttonDelete', function(){
            $('#modalguardDelete').openModal();            

        });
	
	$('#dataTable').on('click', '.buttonMore', function(){
            $('#modalguardDetails').openModal();            

        });
	
</script>

@stop