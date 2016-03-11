@extends('layout.maintenanceLayout')

@section('title')
Leave
@endsection

@section('content')

	

<!-- ADD EDIT DELETE BUTTON-->
		<div class="row">
			<div class="col s12">	
				<div class="col s3 offset-s3">
					<h1 class="colortitle blue-text text-darken-3">Leave</h1>
				</div>
				<div class="col s3 offset-s3">
					<button style="margin-top: 30px;" id="btnAdd" class="z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalleaveAdd"><i class="material-icons left">add</i>ADD</button></br></br>
				</div>

		</div>
	

<!-- TABLE -->

	 <div class="row">
     
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top:-10px;">	
				<table class="highlight white" style=" border-radius: 10px; margin-top: -8%;" id="dataTable">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalleaveAdd">
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
              			<th data-field="name">Leave Type</th>
						<th data-field="name">Default Leave</th>
                    </tr>
			</thead>
            
           <tbody>
			   @foreach ($leaves as $leave)
          			<tr>
						
            			<td> 
						  <div class="switch" style="margin-right: -80px;">
							<label>
							  Deactivate
							  @if ($leave->boolFlag==1)
							  	<input type="checkbox" checked class = "checkboxFlag" id = "{{ $leave->intLeaveID }}">
							  @else
							  	<input type="checkbox" class = "checkboxFlag" id = "{{ $leave->intLeaveID }}">
							  @endif
							  <span class="lever"></span>
							  Activate
							</label>
						  </div>
						</td>
						
						
						<td><button class="buttonUpdate btn modal-trigger"  name="leave" id="{{ $leave->intLeaveID }}" 
            				 href="#modalleaveEdit" style="margin-right: -40px; margin-left:40px;"><i class="material-icons">edit</i></button>
            			<label for="{{ $leave->intLeaveID }}"></label> </td>
					

						<td><button class="buttonDelete btn red" id="{{ $leave->intLeaveID }}" ><i class="material-icons">delete</i></button></td>
						
						<td id = "id{{ $leave->intLeaveID }}">{{ $leave->intLeaveID }}</td>
            			<td id = "name{{ $leave->intLeaveID }}">{{ $leave->strLeaveType }}</td>
            			<td id = "description{{ $leave->intLeaveID }}">{{ $leave->intDefaultLeave }}</td>
          			</tr>
          		@endforeach
          
        </tbody>
				
					</table>
				
				</div>
				
				</div>
			
			</br></br></br></br></br>
			
			

			
		
    </div>

<!-- Modal Leave ADD -->

<div id="modalleaveAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Leave</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intLeaveID" type="text" class="validate" name = "leaveID" disabled>
									<label for="intLeaveID">Leave ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strLeaveType" type="text" class="validate" name = "leaveType" required="" aria-required="true">
									<label for="strLeaveType">Leave Type</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="intDefaultLeave" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true">
										<label for="intDefaultLeave">DefaultLeave</label> 
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
<!-- MODAL LEAVE EDIT -->
<div id="modalleaveEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Leave</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "editLeaveID" readonly required="" aria-required="true" value = "test">
									<label for="intLeaveID">Leave ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "editLeaveType" required="" aria-required="true" value = "test">
									<label for="strLeaveType">Leave Type</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="editDefault" type="text" class="validate" pattern="[0-9]{0,}" name = "editDefaultLeave" required="" aria-required="true" value = "test">
										<label for="intDefaultLeave">DefaultLeave</label> 
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
</div>

	
	


@stop

@section('script')
<script type="text/javascript">
	$(function(){

		$(".buttonDelete").click(function(){
            if(confirm('Are you sure you want to delete the record?')){

                $.ajax({

                    type: "POST",
                    url: "{{action('LeaveController@deleteLeave')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        leaveID: this.id

                    },
                    success: function(data){
                        var toastContent = $('<span>Record Deleted.</span>');
                        Materialize.toast(toastContent, 1500, 'edit');
                        window.location.href = "{{action('LeaveController@index')}}";
                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occur. </span>');
                        Materialize.toast(toastContent, 1500, 'edit');

                    }

                });//ajax
            }
        });
        
		$(".buttonUpdate").click(function(){
			var itemID = "id" + this.id;
			var itemName = "name" + this.id;
			var itemDescription = "description" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
			document.getElementById('editDefault').value = $("#"+itemDescription).html();

		});

		$(".checkboxFlag").click(function(){
            
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
				url: "{{action('LeaveController@flagLeave')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					leaveID: this.id,
                    flag: flag
				},
				success: function(data){
					
				},
				error: function(data){
					var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500, 'edit');
                    
				}

			});//ajax
             
        });//checkbox clicked

	});

	$(document).ready(function(){
		
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
 

		$("#btnAddSave").click(function(){
            if ($('#strLeaveType').val().trim() && $('#intDefaultLeave').val().trim() && $('#intDefaultLeave').val() > 0){
                $.ajax({

                    type: "POST",
                    url: "{{action('LeaveController@addLeave')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        leaveType: $('#strLeaveType').val(),
                        defaultLeave: $('#intDefaultLeave').val(),
                    },
                    success: function(data){
                        var toastContent = $('<span>Record Added.</span>');
                        Materialize.toast(toastContent, 1500,'green', 'edit');
                        window.location.href = "{{action('LeaveController@index')}}";
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
        
        $("#btnUpdate").click(function(){
        if ($('#editname').val().trim() && $('#editDefault').val().trim() && $('#editDefault').val() > 0){
			$.ajax({
				
				type: "POST",
				url: "{{action('LeaveController@updateLeave')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					editLeaveID: $('#editID').val(),
                    editLeaveType: $('#editname').val(),
					editDefaultLeave: $('#editDefault').val(),
				},
				success: function(data){
					var toastContent = $('<span>Record Updated.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                    window.location.href = "{{action('LeaveController@index')}}";
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
        
        

	});//document ready


</script>

@stop