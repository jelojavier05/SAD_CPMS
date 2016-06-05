@extends('layout.maintenanceLayout')

@section('title')
Requirements
@endsection

@section('content')

<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">
			<div class="col s5 offset-s3">
				<div class="flow-text">
					<h1 class="colortitle blue-text text-darken-3">Requirements</h1>
				</div>
			</div>
			<div class="col s2 offset-s1">
				<button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalrequirementsAdd"><i class="material-icons left">add</i> ADD</button></br></br>
</div></div>

<!-- TABLE -->

	 <div class="row">
        
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top:-20px;">
					
				<table class="highlight white" style="border-radius: 10px; margin-top: -8%" id="dataTable">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalrequirementsAdd">
      							<i class="material-icons">add</i>
    						</button>

  						</div>
					</div>
           	<thead>
                    <tr>
						<th></th>
                        <th></th>
                        <th></th>
              			<th data-field="id">ID</th>
              			<th data-field="name">Name</th>
						<th data-field="name">Description</th>
						
                    </tr>
			</thead>
            
           <tbody>
			   @foreach ($requirements as $requirement)
          			<tr>
						
						<td> 
						  <div class="switch" style="margin-right: -80px;">
							<label>
							  Deactivate
							  @if ($requirement->boolFlag==1)
							  	<input type="checkbox" checked class = "checkboxFlag" id = "{{ $requirement->intRequirementID }}">
							  @else
							  	<input type="checkbox" class = "checkboxFlag" id = "{{ $requirement->intRequirementID }}">
							  @endif
							  <span class="lever"></span>
							  Activate
							</label>
						  </div>
						</td>
                        
            			<td><button class="buttonUpdate btn modal-trigger"  name="" id = "{{ $requirement->intRequirementsID }}" 
            				href="#modalrequirementsEdit" style="margin-right: -40px;margin-left:50px;"><i class="material-icons">edit</i></button>
            			<label for="{{ $requirement->intRequirementsID }}"></label> </td>
                        
                        <td><button class="btn red"><i class="material-icons">delete</i></button></td>
                        
						<td id = "id{{ $requirement->intRequirementsID }}">{{ $requirement->intRequirementsID }}</td>
            			<td id = "name{{ $requirement->intRequirementsID }}">{{ $requirement->strRequirements }}</td>
						<td id = "description{{ $requirement->intRequirementsID }}">{{ $requirement->strDescription }}</td>
            				
          			</tr>
          		@endforeach
          
        </tbody>
				</table>
				
				</div>
				<!-- Pagination -->
				
			</div>
				
			
			
			</br></br></br></br></br>

</div>
				


<!-- Modal Requirements ADD -->

<div id="modalrequirementsAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Requirement</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('requirementsAdd') }}" method = "post">
							
								<input  id="" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="" type="text" class="validate" name = "requirementsID" disabled>
									<label for="">Requirement ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="" type="text" class="validate" name = "requirements" required="" aria-required="true">
									<label for="">Requirement Name</label> 
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="" type="text" class="validate"  name = "requirementsDescription" required="" aria-required="true">
										<label for="">Description</label> 
								</div>
							</div>
						</div>
						
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			<button class="btn waves-effect waves-light" type="submit" name="action" style="margin-right: 30px;">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
				</form>
		</div>

<!-- MODAL Requirements EDIT -->
<div id="modalrequirementsEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Requirement</h2></div>
        	<div class="modal-content">
					<input  id="" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate"  name = "requirementsID" readonly required="" aria-required="true" value = "test">
									<label for="editID">Requirement ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "requirements" required="" aria-required="true" value = "test">
									<label for="editname">Requirement Name</label> 
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="editdescription" type="text" class="validate"  name = "requirementsDescription" required="" aria-required="true" value = "test">
										<label for="editDescription">Description</label> 
								</div>
							</div>
					</div>
						
      
	<!-- Modal Button Save -->
		<input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
		<div class="modal-footer">
			
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
    	</div>
    		</div>
</div>
</div>

@stop

@section('script')

<script type="text/javascript">
	$(function(){
		$("#dataTable").DataTable({
             "columns": [
            { "orderable": false },
            { "orderable": false },
            { "orderable": false },
            null,
            null,
            null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5
            

		});
		

		$(".buttonUpdate").click(function(){

			var itemID = "id" + this.id;
			var itemName = "name" + this.id;
			var itemDescription = "description" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
			document.getElementById('editdescription').value = $("#"+itemDescription).html();

		});

	});
	
	$(function(){
		$("#btnUpdate").click(function(){
          if ($('#editname').val().trim() && $('#editdescription').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('RequirementsController@updateRequirements')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					requirementsID: $('#editID').val(),
                    requirements: $('#editname').val(),
					requirementsDescription: $('#editdescription').val()
				},
				success: function(data){
					window.location.href = "{{action('RequirementsController@index')}}";
					var toastContent = $('<span>Record Updated.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                   
				},
				error: function(data){
					var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                    
				}


			});//ajax
              }else{
                var toastContent = $('<span>Please Check Your Input. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }

		});//button add clicked
	});
</script>
@stop
