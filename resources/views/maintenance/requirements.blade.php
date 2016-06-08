@extends('layout.maintenanceLayout')

@section('title')
Requirements
@endsection

@section('content') 

<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
<!--            <div class="row">-->
                <div class="col s6 push-s1" style="margin-top:-15px;">
                    <h2 class="blue-text">Requirements</h2>
                </div>

                <div class="col s3 offset-s3">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalrequirementsAdd">
                        <i class="material-icons left">add</i> ADD
                    </button>
                </div>
<!--            </div>-->
        
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
                                <th style="width:10px;"></th>
                                <th style="width:100px;"></th>
								<th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Name</th>
								<th>Description</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($requirements as $requirement)
                                <tr>
                                    
									<td> 
                                    <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            
                                            @if ($requirement->boolFlag==1)
                                             <input type="checkbox" checked class = "checkboxFlag" id = "{{ $requirement->intRequirementID }}">
                                            @else
                                                <input type="checkbox" class = "checkboxFlag" id = "{{ $requirement->intRequirementID }}">
                                            @endif
                                            <span class="lever"></span>
                                            
                                        </label>
                                    </div>
                                	</td>
                                
                                
									
									
									
									<td>
                                    <button class="buttonUpdate btn modal-trigger"  name="" id = "{{ $requirement->intRequirementsID }}" href="#modalrequirementsEdit" style="margin-right: -40px;margin-left:50px;">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <label for="{{ $requirement->intRequirementsID }}"></label> 
                                	</td>

                                    <td>
                                        <button class="buttonDelete btn red" id="">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{ $requirement->intRequirementsID }}">
                                    {{ $requirement->intRequirementsID }}
                                	</td>
                                
                                	<td id = "name{{ $requirement->intRequirementsID }}">
                                    	{{ $requirement->strRequirements }}
                                	</td>
                                
									<td id = "description{{ $requirement->intRequirementsID }}">
										{{ $requirement->strDescription }}
									</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>

<!-- Modal requirements ADD -->

<div id="modalrequirementsAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Requirements</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="" type="text" class="validate" name = "requirementsID" disabled>
								<label for="">Requirements ID</label>
							</div>
						</div>
            		</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="" type="text" class="validate" name = "requirements" required="" aria-required="true">
								<label for="">Requirements Name</label> 
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
			<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
		</div>
<!-- MODAL requirements EDIT -->
<div id="modalrequirementsEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Government Exam</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate"  name = "requirementsID" readonly required="" aria-required="true" value = "test">
								<label for="editID">Requirements ID</label>
							</div>
						</div>
            		</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "requirements" required="" aria-required="true" value = "test">
								<label for="editname">Requirements Name</label> 
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
				
		<div class="modal-footer">
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
			
			
			
    	</div>
    		</div>
</div>
<!----------------------------modal delete nature of business ------------------------------>

<div id="modalgovexamDelete" class="modal bottom-sheet" style="height: 250px !important; overflow:hidden;">
            <div class="modal-header blue"><h2 class="white-text">Delete</h2></div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-content">

                <div class="row">
                    <div class="col s12">
                        <h3 class="center">Confirm Delete</h3>
                    </div>
                </div>
                <input type="hidden" name="idDelete" id = "deleteID">
                <div class="row">
                    <div class="col s3 push-s5">
                        <button class=" btn waves-effect waves-light red large" name="action" style="margin-left: 20px;" id = "btnDelete">
                            <i class="material-icons left">delete</i>Delete
                        </button>

                    </div>	
                </div>

            </div>
</div>

@stop

@section('script')

<script type="text/javascript">
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
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
            

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
</script>
@stop
