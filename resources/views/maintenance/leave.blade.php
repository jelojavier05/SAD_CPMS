@extends('layout.maintenanceLayout')

@section('title')
Leave
@endsection

@section('content')

	

<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
<!--            <div class="row">-->
                <div class="col s4 push-s1" style="margin-top:-15px;">
                    <h2 class="blue-text">Leave</h2>
                </div>

                <div class="col s3 offset-s4">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalleaveAdd">
                        <i class="material-icons left">add</i> ADD
                    </button>
                </div>
<!--            </div>-->
        
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
								<th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Leave Type</th>
                                <th>Number Of Days</th>
                                <th>Number Of Request</th>
                                <th>Notification Period</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($leaves as $leave)
                                <tr>
                                    
									<td> 
									  <div class="switch" style="margin-right: -80px;">
										<label>
										  
										  @if ($leave->boolFlag==1)
											<input type="checkbox" checked class = "checkboxFlag" id = "{{ $leave->intLeaveID }}">
										  @else
											<input type="checkbox" class = "checkboxFlag" id = "{{ $leave->intLeaveID }}">
										  @endif
										  <span class="lever"></span>
										  
										</label>
									  </div>
									</td>
									
									
									
									<td>
                                        <button class="buttonUpdate btn "  name="" id="{{$leave->intLeaveID}}"  >
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for="edit"></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red " id="{{$leave->intLeaveID}}" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{ $leave->intLeaveID }}">{{ $leave->intLeaveID }}</td>
									<td id = "name{{ $leave->intLeaveID }}">{{ $leave->strLeaveType }}</td>
									<td id = "daysDuration{{ $leave->intLeaveID }}">{{ $leave->intDaysDuration }}</td>
                                    <td id = "countLeave{{ $leave->intLeaveID }}">{{ $leave->intCountLeave }}</td>
                                    <td id = "daysBeforeLeave{{ $leave->intLeaveID }}">{{ $leave->intDaysBeforeLeave }}</td>
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
						<div class="col s6">
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input  id="intLeaveID" type="text" class="validate" name = "leaveID" disabled>
											<label for="intLeaveID">Leave ID</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input id="strLeaveType" type="text" class="validate" name = "leaveType" required="" aria-required="true">
											<label for="strLeaveType">Leave Type</label> 
									</div>
								</div>
							</div>
								<div class="row">
									<div class="col s12">
										<div class="input-field">
											<input id="intNumberOfDays" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true">
												<label for="intNumberOfDays">Number of Days Allowed</label> 
										</div>
									</div>
								</div>
						</div>
						
						<div class ="col s6">
							
							<div class="row">
									<div class="col s12">
										<div class="input-field">
											<input id="intNumberOfRequest" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true">
												<label for="intNumberOfRequest">Number of Requests Allowed</label> 
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col s12">
										<div class="input-field">
											<input id="intNotificationPeriod" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true">
												<label for="intNotificationPeriod">Notification Period</label> 
										</div>
									</div>
							</div>
						</div>
				</div>
	<!-- Modal Button Save -->
				
		
    		</div>
				<div class="modal-footer" style="background-color:#01579b !important;">
				<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
					<i class="material-icons right">send</i>
				</button>
				</div>
		</div>
<!-- MODAL LEAVE EDIT -->
<div id="modalleaveEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Leave</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s6">
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input  id="editID" type="text" class="validate" name = "editLeaveID" readonly required="" aria-required="true" value = "test">
											<label for="intLeaveID">Leave ID</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input id="editname" type="text" class="validate" name = "editLeaveType" required="" aria-required="true" value = "test">
											<label for="strLeaveType">Leave Type</label> 
									</div>
								</div>
							</div>
							<div class="row">
									<div class="col s12">
										<div class="input-field">
											<input id="editDaysDuration" type="text" class="validate" pattern="[0-9]{0,}" name = "editDefaultLeave" required="" aria-required="true" value = "test">
												<label for="intDefaultLeave">Number of Days Allowed</label> 
										</div>
									</div>
							</div>
						</div>
						
						<div class ="col s6">
							<div class="row">
									<div class="col s12">
										<div class="input-field">
											<input id="editNumberOfRequest" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true" value = "test">
												<label for="editNumberOfRequest">Number of Requests Allowed</label> 
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col s12">
										<div class="input-field">
											<input id="editNotificationPeriod" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true" value = "test">
												<label for="editNotificationPeriod">Notification Period</label> 
										</div>
									</div>
							</div>
						</div>
				</div>
	<!-- Modal Button Save -->
				
		
    		</div>
		<div class="modal-footer" style="background-color:#01579b !important;">
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
			</button>
			
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
	$(document).ready(function(){
		
		$("#dataTable").DataTable({
             "columns": [
            { "orderable": false },
            { "orderable": false },
            { "orderable": false },
            null,
            null,
            null,
            null,
            null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
         });   
 
		$("#btnAddSave").click(function(){
            if ($('#strLeaveType').val().trim() && $('#intNumberOfDays').val().trim() > 0 && $('#intNumberOfRequest').val().trim() > 0 && $('#intNotificationPeriod').val().trim() > 0){
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
                        daysDuration: $('#intNumberOfDays').val(),
                        countLeave: $('#intNumberOfRequest').val(),
                        daysBeforeLeave: $('#intNotificationPeriod').val()
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
            if ($('#editname').val().trim() && $('#editDaysDuration').val().trim() > 0 && $('#editNumberOfRequest').val().trim() > 0 && $('#editNotificationPeriod').val().trim() > 0){
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
                        editname: $('#editname').val(),
                        editDaysDuration: $('#editDaysDuration').val(),
                        editNumberOfRequest: $('#editNumberOfRequest').val(),
                        editNotificationPeriod: $('#editNotificationPeriod').val(),
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
        
        $('#dataTable').on('click', '.buttonUpdate', function(){
            $('#modalleaveEdit').openModal();
            var itemID = "id" + this.id;
            var itemName = "name" + this.id;
            var daysDuration = "daysDuration" + this.id;
            var countLeave = "countLeave" + this.id;
            var daysBeforeLeave = "daysBeforeLeave" + this.id;
                

            document.getElementById('editID').value = $("#"+itemID).html();
            document.getElementById('editname').value = $("#"+itemName).html();
            document.getElementById('editDaysDuration').value = $("#"+daysDuration).html();
            document.getElementById('editNumberOfRequest').value = $("#"+countLeave).html();
            document.getElementById('editNotificationPeriod').value = $("#"+daysBeforeLeave).html();

        });

        $('#dataTable').on('click', '.buttonDelete', function(){
            $('#modalleaveDelete').openModal();
            document.getElementById('deleteID').value =this.id;
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
					var toastContent = $('<span>Status Changed.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
				},
				error: function(data){
					var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500, 'edit');
                    
				}

			});//ajax
        });

	});//document ready


</script>

@stop