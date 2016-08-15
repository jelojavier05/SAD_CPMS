@extends('CGR.CGRMain')
@section('title')
Receiving Delivery
@endsection

@section('content')

<div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:7%">Receiving Delivery</h3>
                </div>
    
    </div>
<div class="row">
    <div class="col l12">
            <div class="col l10 offset-l2" style="max-height:690px">
        
                 <table class="centered" id="dataTable">
                        <thead>
                          <tr>
                              
                              <th data-field="status">Delivery ID</th>                              
                              <th data-field="status">Delivery Date</th>
							  <th data-field="guard">Delivery Person/s</th>
							  <th>Contact Number</th>
                              <th data-field="guard"></th>                
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            
                            <td>0001</td>
							<td>02/05/16</td>
                            <td>Rustom Cister</td>							
                            <td>09123456789</td>
							<td> 
                                 <button class="btn waves-effect waves-light blue darken-4 buttonVerify" type="button" name="action" href="">Verify
                                 
                                            </button>       
                            </td>
                          </tr> 
                            
                            
                            
                         
                        </tbody>
                    </table>
      
        
        
            
        
            </div>
    </div>




</div>

<!--
<div id="verifybtn" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:10% !important;  max-height:100% !important; height:50% !important; border-radius:10px;">
        
        
            <div class="modal-header">
                <div class="h">
                    <h3><center>Receiving Account Form</center></h3>  
				</div>

            </div>
        
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="row">
                                    <div class="col s10 push-s1">
                                                <div class="input-field col s12">
														 <i class="mdi-action-account-circle prefix" style="font-size:35px;"></i>
                                                        <input id="strNatureOfBusiness" type="text" class="validate" name = "natureOfBusiness" required="" aria-required="true" pattern="([A-z0-9 '.-]){2,}">
                                                            <label for="">Username:</label> 
                                                </div>
                                    </div>
                           
                                  
                                  <div class="col s10 push-s1">       
                                                <div class="input-field col s12">
                                                    <i class="mdi-action-lock-outline prefix" style="font-size:35px;"></i>
                                                    <input  id="deciRate" maxlength="6" type="text" class="validate" pattern="[0-9.]{3,}" required="" aria-required="true">
                                                    <label data-error="Incorrect" for="deciRate">Password</label>

                                                </div>
                                  </div>
                        
                                    
                                  <div class="col s10 push-s1">      
                                                <div class="input-field col s12">
                                                    <i class="mdi-hardware-security prefix" style="font-size:35px;"></i>
                                                    <input  id="deciRate" maxlength="6" type="text" class="validate" pattern="[0-9.]{3,}" required="" aria-required="true">
                                                    <label data-error="Incorrect" for="deciRate">Security Code</label>

                                                </div>
                                  </div>
                            
                        </div>
                        <div class="row">
                                <div class="col l12 push-l4">
                            
                            
                             <button class="btn large waves-effect green darken-4 waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Log In
                               <i class="material-icons right">send</i>
                             </button>
                        
                                    
                            </div>
                        </div>
	
    		 
                					
	 Modal Button Save 
 
        </div>
    
      
  
    <div class="modal-footer" style="background-color: #00293C;">
            
    </div>
</div>
-->

<!--modal view delivery details-->

<div id="modalDeliveryDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:570px; margin-top:-30px;">
    <div class="modal-header">
                <div class="h">
                    <h3><center>Delivery</center></h3>  
				</div>

            </div>
    <div class="modal-content">
        <div class="row">
            <div class="col s12">
                <ul class="collection with-header" id="collectionActive">
                <li class="collection-header" ><h4 style="font-weight:bold;">Items</h4></li>
                <div>
                    
                    <li class="collection-item" style="font-weight:bold;">
                        <div style="font-weight:normal;">
							<div class='row'>
								<div class="col s12">
									<table class="" style="font-family:Myriad Pro" id = 'itemsTable'>
										<thead>
										<tr>
											<th class="grey lighten-1"></th>
											<th class="grey lighten-1">Serial Number</th>
											<th class="grey lighten-1">Name</th>
											<th class="grey lighten-1">Type of Gun</th>
											<th class="grey lighten-1">Rounds</th>
										</tr>
										</thead>

										<tbody>
											<tr>
												<td><input type="checkbox" id="test1" />
												<label for="test1"></label></td>
												<td>123</td>
												<td>M4A1</td>
												<td>Rifle</td>
												<td>90</td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
                        </div>
                    </li>
                </div>
                </ul>
            </div>
        </div>
		<div class="row"></div>
    </div>
    
    <div class="modal-footer ci" style="background-color: #00293C;">
        <div id = "buttons" >	
            <button class="btn green waves-effect waves-light" name="" style="margin-right: 30px;" id = "btnReceive">OK
            </button>

        </div>
        
        
    </div>
</div>

<!--modal view delivery details end-->
 


@stop

@section('script')
<script>
$("#dataTable").DataTable({
             "columns": [         					
			null,
			null,
			null,
			null,
			{"orderable": false}
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			"bFilter" : false
		});
	
$("#itemsTable").DataTable({
             "columns": [         					
			{"orderable": false},
			null,
			null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			"bFilter" : false
		});
	
$('#dataTable').on('click', '.buttonVerify', function(){
            $('#modalDeliveryDetails').openModal();            

        });
	
//$('#btnReceive').click(function(){
//	   
//			swal({
//				title: "Confirm Password",
//				text: "Please Enter Password",
//				type: "input",
//				inputType: "password",
//				showCancelButton: true,
//				closeOnConfirm: false,
//				animation: "slide-from-top",
//				inputPlaceholder: "Enter Password"
//			}, 
//				 function(inputValue) {
//				if (inputValue === false) return false;
//				if (inputValue === "") {
//					swal.showInputError("Check Input!");
//					return false
//				}
// 
//});
//				
//		
//    });
	
$('#btnReceive').click(function(){
	   
			swal({
				title: "Warning!",
				text: "Some items were not selected",
				type: "input",				
				showCancelButton: true,
				closeOnConfirm: false,
				animation: "slide-from-top",
				inputPlaceholder: "Enter Reason here"
			}, 
				 function(inputValue) {
				if (inputValue === false) return false;
				if (inputValue === "") {
					swal.showInputError("Check Input!");
					return false
				}
 
});
				
		
    });


	
	
//$('#btnReceive').click(function(){
//	sweetAlert("Oops...", "Some Items were not selected!", "error");   
//			
//	});
</script>

@stop