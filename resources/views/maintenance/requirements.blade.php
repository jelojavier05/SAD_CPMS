@extends('layout.maintenanceLayout')

@section('title')
Requirements
@endsection

@section('content') 

<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Requirements</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
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
                                <th style="width:40px;"></th>
                                <th style="width:100px;"></th>
								<th style="width:40px;"></th>
                                <th>ID</th>
                                <th>Name</th>
								<th>Description</th>
                                <th>For</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($requirements as $requirement)
                                <tr>
                                    
									<td> 
                                    <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            
                                            @if ($requirement->boolFlag==1)
                                                <input type="checkbox" checked class = "checkboxFlag" id = "{{ $requirement->intRequirementsID }}">
                                            @else
                                                <input type="checkbox" class = "checkboxFlag" id = "{{ $requirement->intRequirementsID }}">
                                            @endif
                                            <span class="lever"></span>
                                            
                                        </label>
                                    </div>
                                	</td>
                                
									<td>
                                    <button class="buttonUpdate btn"  name="" id = "{{ $requirement->intRequirementsID }}"  style="margin-right: -40px;margin-left:50px;">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <label for="{{ $requirement->intRequirementsID }}"></label> 
                                	</td>

                                    <td>
                                        <button class="buttonDelete btn red col s12" id="{{ $requirement->intRequirementsID }}">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{ $requirement->intRequirementsID }}">{{ $requirement->intRequirementsID }}</td>
                                
                                	<td id = "name{{ $requirement->intRequirementsID }}">{{ $requirement->strRequirements }}</td>
                                
									<td id = "description{{ $requirement->intRequirementsID }}">{{ $requirement->strDescription }}</td>
                                    
                                    @if ($requirement->intIdentifier == 1)
                                        <td id = "identifier{{ $requirement->intRequirementsID }}">Client</td>
                                    @elseif ($requirement->intIdentifier == 2)
                                        <td id = "identifier{{ $requirement->intRequirementsID }}">Guard</td>
                                    @elseif ($requirement->intIdentifier == 3)
                                        <td id = "identifier{{ $requirement->intRequirementsID }}">Client and Guard</td>
                                    @endif
                                    
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

<div id="modalrequirementsAdd" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:90px !important;  max-height:100% !important; height:400px !important; border-radius:10px;">
        
       	<div class="modal-header">
                <div class="h">
                    <h3><center>Requirements</center></h3>  
				</div>

        </div>
         
        
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
                                               
                                  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
                            				<i class="mdi-editor-format-list-numbered prefix" style="font-size:35px;"></i>
                            				<input id="addRequirementName" type="text" class="validate" name = "requirements" required="" aria-required="true">
										<label for="">Requirements Name</label> 

                                        </div>
                                  </div>
						
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
									  	<div class="row"></div>
                                        <div class="input-field col s12">
											<i class="mdi-editor-format-align-left prefix" style="font-size:35px;"></i>
                            				<input id="addDescription" type="text" class="validate"  name = "requirementsDescription" required="" aria-required="true">
                                            <label for="">Description</label>

                                        </div>
                                  </div>
						
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
									  	<div class="row"></div>
                                        <div class="col s4 offset-s2">
											<p>
											  <input type="checkbox" id="clientcboxadd" />
											  <label for="clientcboxadd">Client</label>
											</p>
										</div>
								
										<div class="col s6">
											<p>
											  <input type="checkbox" id="sgcboxadd" />
											  <label for="sgcboxadd">Security Guard</label>
											</p>
										</div>
                                  </div>
                            
                        </div>
						
    		</div>
				<div class="modal-footer" style="background-color: #00293C;">
            
                     <button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
                       <i class="material-icons right">send</i>
                     </button>
        </div>
</div>
<!-- MODAL requirements EDIT -->
<div id="modalrequirementsEdit" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:90px !important;  max-height:100% !important; height:450px !important; border-radius:10px;">
        
       	<div class="modal-header">
                <div class="h">
                    <h3><center>Requirements</center></h3>  
				</div>

        </div>
         
        
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
                                               
                                <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
                            				<input  id="editID" type="text" class="validate"  name = "requirementsID" readonly required="" aria-required="true" value = "test">
											<label for="editID">Requirements ID</label> 

                                        </div>
                                  </div>  
						
								<div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
											<i class="mdi-social-domain prefix" style="font-size:35px;"></i>
                            				<input id="editname" type="text" class="validate" name = "requirements" required="" aria-required="true" value = "test">
											<label for="editname">Requirements Name</label> 

                                        </div>
                                  </div>
						
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
									  	<div class="row"></div>
                                        <div class="input-field col s12">
											<i class="mdi-social-domain prefix" style="font-size:35px;"></i>
											<input id="editdescription" type="text" class="validate"  name = "requirementsDescription" required="" aria-required="true" value = "test">
											<label for="editDescription">Description</label>

                                        </div>
                                  </div>
						
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
									  	<div class="row"></div>
                                        <div class="col s4 offset-s2">
											<p>
											  <input type="checkbox" id="clientcboxedit" />
											  <label for="clientcboxedit">Client</label>
											</p>
										</div>
								
										<div class="col s6">
											<p>
											  <input type="checkbox" id="sgcboxedit" />
											  <label for="sgcboxedit">Security Guard</label>
											</p>
										</div>
                                  </div>
                            
                        </div>
						
    		</div>
				<div class="modal-footer" style="background-color: #00293C;">
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
			
			
			
    	</div>
</div>
<!----------------------------modal delete requirements ------------------------------>
<div id="modalrequirementsDelete" class="modal bottom-sheet ci" style="height: 250px !important; overflow:hidden;">
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
	$(document).ready(function(){
		$("#btnAddSave").click(function(){
            var checkboxIdentifier;
            if ($('#clientcboxadd').is(":checked")){
                checkboxIdentifier = 1;
            }else if ($('#sgcboxadd').is(":checked")){
                checkboxIdentifier = 2
            }else{
                
            }
            
            if ($('#clientcboxadd').is(":checked") && $('#sgcboxadd').is(":checked")){
                checkboxIdentifier = 3;
            }
            
            if ($('#addRequirementName').val().trim() && $('#addDescription').val().trim()){
                $.ajax({

                    type: "POST",
                    url: "{{action('RequirementsController@addRequirements')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        requirements: $('#addRequirementName').val(),
                        requirementsDescription: $('#addDescription').val(),
                        identifier: checkboxIdentifier
                    },
                    success: function(data){
//                        var toastContent = $('<span>Record Added.</span>');
//                        Materialize.toast(toastContent, 1500,'green', 'edit');
                        refreshTable();
                        refreshTextfield();
                        $('#modalrequirementsAdd').closeModal();
						swal("Success!", "Record has been Added!", "success");
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
            
        });// button add clicked
        
        $("#btnUpdate").click(function(){
             if ($('#editname').val().trim() && $('#editdescription').val().trim()){
              var checkboxIdentifier;
            if ($('#clientcboxedit').is(":checked")){
                checkboxIdentifier = 1;
            }else if ($('#sgcboxedit').is(":checked")){
                checkboxIdentifier = 2
            }else{
                
            }
            
            if ($('#clientcboxedit').is(":checked") && $('#sgcboxedit').is(":checked")){
                checkboxIdentifier = 3;
            }
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
                    requirementsDescription: $('#editdescription').val(),
                    identifier: checkboxIdentifier
					
				},
				success: function(data){
//					var toastContent = $('<span>Record Updated.</span>');
//                    Materialize.toast(toastContent, 1500,'green','edit');
                    $('#modalrequirementsEdit').closeModal();
                    swal("Success!", "Record has been Updated!", "success");
                    refreshTable();
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
        
 		  $('#dataTable').on('click', '.buttonDelete', function(){

			document.getElementById('deleteID').value =this.id;  
            swal({   title: "Are you sure?",   
				  	 text: "Record will be deleted!",   
				     type: "warning",   
				     showCancelButton: true,   
				     confirmButtonColor: "#DD6B55",   
				     confirmButtonText: "Yes, delete it!",   
				     closeOnConfirm: false 
				 }, 
				 function(){
					$.ajax({

                type: "POST",
                url: "{{action('RequirementsController@deleteRequirements')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    requirementsID: deleteID.value

                },
                success: function(data) {
					swal("Deleted!", "Record has been successfully deleted!", "success");

					refreshTable();

				  },
			  	error: function(data) {
					swal("Oops", "We couldn't connect to the server!", "error");
			  	  }

            	});//ajax
			});
          });
        
        $("#dataTable").DataTable({
             "columns": [
            { "orderable": false },
            { "orderable": false },
            { "orderable": false },
            null,
            null,
            null,
            null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
            

		});
        
        $('#dataTable').on('click', '.checkboxFlag', function(){
                var $this = $(this);
                var flag;
                // $this will contain a reference to the checkbox   
                if ($this.is(':checked')) {
                    flag = 1;
                } else {
                    flag = 0;
                }
                 
                $.ajax({
                    type: "POST",
                    url: "{{action('RequirementsController@flagRequirements')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        requirementID: this.id,
                        flag: flag
                    },
                    success: function(data){
                        var toastContent = $('<span>Status Changed.</span>');
                        Materialize.toast(toastContent, 1500,'green', 'edit');
                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occur. </span>');
                        Materialize.toast(toastContent, 1500, 'edit');
                    }
                });//ajax
            });
        
        $('#dataTable').on('click', '.buttonUpdate', function(){
            $('#modalrequirementsEdit').openModal();
            var itemID = "id" + this.id;
            var itemName = "name" + this.id;
            var itemDescription = "description" + this.id;
            var identifier = "identifier" + this.id;
            var identifierValue = $("#" + identifier).html();
            
            if (identifierValue == "Client"){
                $('#clientcboxedit').prop('checked', true);
                $('#sgcboxedit').prop('checked', false);
                
            }else if (identifierValue == "Guard"){
                $('#sgcboxedit').prop('checked', true);
                $('#clientcboxedit').prop('checked', false);
                
            }else if (identifierValue == "Client and Guard"){
                $('#sgcboxedit').prop('checked', true);
                $('#clientcboxedit').prop('checked', true);      
            }
          
            
            document.getElementById('editID').value = $("#"+itemID).html();
            document.getElementById('editname').value = $("#"+itemName).html();
            document.getElementById('editdescription').value = $("#"+itemDescription).html();   
            
        });
        
//        $('#dataTable').on('click', '.buttonDelete', function(){
//            $('#modalrequirementsDelete').openModal();
//            document.getElementById('deleteID').value =this.id;
//        });
        
        function refreshTable(){
            var dataTable = $('#dataTable').DataTable();
            dataTable.clear().draw(); //clear all the row
            $.ajax({ 
                type: 'GET', 
                url: '{{ URL::to("/maintenance/requirements/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 

                    $.each(data, function(index, element) {
                        var flag = data[index].boolFlag;
                        
                        
                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intRequirementsID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intRequirementsID+'"><span class="lever"></span></label></div>';
                        }
                        
                        var identifier = data[index].intIdentifier;
                        
                        if (identifier == 1){
                            var tableIdentifier = 'Client';
                        }else if (identifier == 2){
                            var tableIdentifier = 'Guard';
                        }else if (identifier == 3){
                            var tableIdentifier = 'Client and Guard';
                        }

                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" name="" id="' +data[index].intRequirementsID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intRequirementsID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intRequirementsID + '">' + data[index].intRequirementsID +'</h>',
                            '<h id = "name' +data[index].intRequirementsID + '">' + data[index].strRequirements +'</h>',
                            '<h id = "description' +data[index].intRequirementsID + '">' + data[index].strDescription +'</h>',
                            '<h id = "identifier' +data[index].intRequirementsID + '">' + tableIdentifier + '</h>'
                        ]).draw();
                    });//foreach

                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                     console.log(data);
                }
            });

        }

        function refreshTextfield(){
            document.getElementById('addRequirementName').value = "";
            document.getElementById('addDescription').value = "";   
            $('#clientcboxadd').attr('checked', false);
            $('#sgcboxadd').attr('checked', false);
        }

            
        
        $('#clientcboxedit').click(function(){
            if ($('#clientcboxedit').attr('checked')){
                $('#clientcboxedit').attr('checked');
            }else{
                $('#clientcboxedit').attr('checked', true);
            }
        });
        
        $('#sgcboxedit').click(function(){
            if ($('#sgcboxedit').attr('checked')){
                $('#sgcboxedit').attr('checked', false);
            }else{
                $('#sgcboxedit').attr('checked', true);
            }
        });
	});
</script>
@stop
