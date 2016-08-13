@extends('client.ClientDashboard')
@section('title')
CGR
@endsection


@section('content')

 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-1%; margin-top:-40px;">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">CGR Machines</h3>
                </div>
    
    </div>
   
    

<!--cgr table-->

<div class="row">
	<div class="col s8 push-s3" style="margin-top:-20px;">
		
		<ul class="tabs" style="">
        	<li style="color:white"class="tab col l3"><a href="#message" class="active"><button class="btn green buttonAdd" id="btnSaveMachine" >Add this machine</button></a></li>
        </ul>	
		<!-- table message -->
		<div id="message">
			<div class="container-fluid grey lighten-2">	
				<table class="striped" id="dataTable">
					<thead>
						<tr>							
							<th class="grey lighten-1" style="width: 30px;"></th>
							<th class="grey lighten-1" style="width: 30px;"></th>
							<th class="grey lighten-1">MAC Address</th>
							<th class="grey lighten-1">Description</th>
							
						</tr>
					</thead>

					<tbody>
						<tr>							
							<td><center><button class="btn blue buttonEdit" id=""><i class="material-icons">edit</i></button></center></td>
							<td><center><button class="btn red buttonDelete" id=""><i class="material-icons">delete</i></button></center></td>
							<td>00-21-5C-0B-B4-F9</td>
							<td>PC 1 Barracks</td>							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!--cgr table End-->

<!--modal edit description-->

<div id="modaledit" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:120px !important;  max-height:100% !important; height:250px !important; border-radius:10px;">
	<div class="modal-header">
                <div class="h">
                    <h3><center>Edit Description</center></h3>  
				</div>

    </div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">                                                                               	
								 <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">insert_comment</i>
                            				<input id="\" type="text" class="validate" name = "\" required="" aria-required="true" value = "test">
											<label for="">Description</label> 

                                        </div>
                                  </div>
                            
                     </div>
						

				
		
    		</div>
    	<!-- Modal Button Save -->
		<div class="modal-footer" style="background-color: #00293C;">
            
                     <button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnUpdate">Update
                       <i class="material-icons right">send</i>
                     </button>
        </div>
</div>

<!--modal edit description end-->

<!--modal add cgr machine-->

<!--
<div id="modaladdCGRmachine" class="modal modal-fixed-footer ci" style="overflow:hidden; width:30% !important; margin-top:120px !important;  max-height:100% !important; height:250px !important; border-radius:10px;">
	<div class="modal-header">
                <div class="h">
                    <h3><center>Warning</center></h3>  
				</div>

    </div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">                                                                               	
								 <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="row">
											<center><h4>Are you sure?</h4></center> 

                                        </div>
                                  </div>
                            
                     </div>
						

				
		
    		</div>
    	 Modal Button Save 
		<div class="modal-footer" style="background-color: #00293C;">
            			
					<button class="btn red large waves-effect waves-light modal-close" name="action" style="margin-right: 30px;" id = "">NO     
                     </button>
					
                     <button class="btn green large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSaveMachine">YES     
                     </button>
        </div>
</div>
-->

<!--modal add cgr machine end-->

@stop

@section('script')
<script>
$("#dataTable").DataTable({
             "columns": [         			
			{"orderable": false},
			{"orderable": false},
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			"bFilter" : false
		});
	
$('#dataTable').on('click', '.buttonEdit', function(){
            $('#modaledit').openModal();            

        });
	
$('#dataTable').on('click', '.buttonDelete', function(){
              
            swal({   title: "Are you sure?",   
                text: "Record will be deleted!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                closeOnConfirm: false 
            });
	   });
	
	
$('#btnSaveMachine').click(function(){
	   
			swal({
				title: "Confirm Password",
				text: "Please Enter Password",
				type: "input",
				inputType: "password",
				showCancelButton: true,
				closeOnConfirm: false,
				animation: "slide-from-top",
				inputPlaceholder: "Enter Password"
			}, 
				 function(inputValue) {
				if (inputValue === false) return false;
				if (inputValue === "") {
					swal.showInputError("Check Input!");
					return false
				}
 
});
				
		
    });
</script>

@stop