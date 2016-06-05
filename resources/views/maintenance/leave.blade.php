@extends('layout.maintenanceLayout')

@section('title')
Leave
@endsection

@section('content')

	

<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:40px;">
            <div class="row">
                <div class="col s4 push-s1">
                    <h2 class="blue-text">Leave</h2>
                </div>

                <div class="col s3 offset-s4">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalleaveAdd">
                        <i class="material-icons left">add</i> ADD
                    </button>
                </div>
            </div>
        
            <div class="row">
                <div class="col s12">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
                                <th style="width:160px;"></th>
                                <th style="width:50px;"></th>
								<th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Leave Type</th>
                                <th>Default Leave</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($leaves as $leave)
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
									
									
									
									<td>
                                        <button class="buttonUpdate btn modal-trigger"  name="" id="{{$leave->intLeaveID}}" href="#modalleaveEdit" >
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for="edit"></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red modal-trigger" id="{{$leave->intLeaveID}}" href="#modalleaveDelete">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{ $leave->intLeaveID }}">{{ $leave->intLeaveID }}</td>
									<td id = "name{{ $leave->intLeaveID }}">{{ $leave->strLeaveType }}</td>
									<td id = "description{{ $leave->intLeaveID }}">{{ $leave->intDefaultLeave }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
<!---------- modal delete leave--------------------------------->
<div id="modalleaveDelete" class="modal bottom-sheet" style="height: 250px !important; overflow:hidden;">
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

		$(".buttonDelete").click(function(){
            document.getElementById('deleteID').value =this.id;
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
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
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

		});//button update clicked
        
        $("#btnDelete").click(function(){
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
                        leaveID: deleteID.value 

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
		});//button add clicked
        
        

	});//document ready


</script>

@stop