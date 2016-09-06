@extends('layout.maintenanceLayout')

@section('title')
Leave
@endsection

@section('content')

	

<div class="row" style="margin-top:-30px;">


<div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
        <h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Leave</h3>
      </div>
    
    </div>
   
</div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalleaveAdd">
                        <i class="material-icons left">add</i> ADD
                    </button>
                </div>
<!--            </div>-->
        
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="striped white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
                                <th style="width:50px;" class="blue darken-3 white-text"></th>
                                <th style="width:50px;" class="blue darken-3 white-text">Actions</th>
								<th style="width:50px;" class="blue darken-3 white-text"></th>
                                <th class="blue darken-3 white-text">ID</th>
                                <th class="blue darken-3 white-text">Leave Type</th>
                                <th class="blue darken-3 white-text">Number Of Days</th>                             
                                <th class="blue darken-3 white-text">Notification Period</th>
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
                                        <button class="buttonUpdate btn col s12"  name="" id="{{$leave->intLeaveID}}"  >
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for="edit"></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red col s12" id="{{$leave->intLeaveID}}" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{ $leave->intLeaveID }}">{{ $leave->intLeaveID }}</td>
									<td id = "name{{ $leave->intLeaveID }}">{{ $leave->strLeaveType }}</td>
									<td id = "daysDuration{{ $leave->intLeaveID }}">{{ $leave->intLeaveCount }}</td>                       
                                    <td id = "daysBeforeLeave{{ $leave->intLeaveID }}">{{ $leave->intNotificationPeriod }}</td>
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

<div id="modalleaveAdd" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40%; !important; margin-top:50px !important;  max-height:100% !important; height:400px !important; border-radius:10px;">
    <div class="modal-header">
        <div class="h">
            <h3><center>Leave</center></h3>  
		</div>

	</div>
	<div class="modal-content">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">             
                <div class="row"></div>              
				<div class="input-field col s12">
					<i class="mdi-maps-directions-walk prefix" style="font-size:35px;"></i>
                	<input id="strLeaveType" type="text" class="validate" name = "leaveType" required="" aria-required="true">
					<label for="strLeaveType">Leave Type</label>
				</div>
             </div>
					
					  
			<div class="col s10 push-s1" style="margin-top:-30px;"> 
				<div class="row"></div>							
				<div class="row"></div>                            
				<div class="input-field col s12">							
					<i class="mdi-image-timelapse prefix" style="font-size:35px;"></i>                            	
					<input id="intLeaveCount" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true">                                
					<label for="intLeaveCount">Number of Days Allowed</label>                                 
				</div>                            
			</div>
                
			<div class="col s10 push-s1" style="margin-top:-30px;">          
				<div class="row"></div>							
				<div class="row"></div>                            
				<div class="input-field col s12">							
					<i class="mdi-action-today prefix" style="font-size:35px;"></i>                            	
					<input id="intNotificationPeriod" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true">                                
					<label for="intNotificationPeriod">Notification Period</label> 								    
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
<!-- MODAL LEAVE EDIT -->
<div id="modalleaveEdit" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40%; !important; margin-top:30px !important;  max-height:100% !important; height:480px !important; border-radius:10px;">
	<div class="modal-header">
                <div class="h">
                    <h3><center>Leave</center></h3>  
				</div>

        	</div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						                                                                                 
						<div class="col s10 push-s1" style="margin-top:-30px;">                                                              
							<div class="row"></div>                              
							<div class="input-field col s12">							
								<input  id="editID" type="text" class="validate" name = "editLeaveID" readonly required="" aria-required="true" value = "test">								
								<label for="editID">Leave ID</label> 								                                
							</div>                            
						</div>
														
						<div class="col s10 push-s1" style="margin-top:-30px;">                              					
							<div class="row"></div>							
							<div class="row"></div>                            
							<div class="input-field col s12">							
								<i class="mdi-action-tab prefix" style="font-size:35px;"></i>                            	
								<input id="editname" type="text" class="validate" name = "editLeaveType" required="" aria-required="true" value = "test">								
								<label for="editname">Leave Type</label>                                 
							</div>                            
						</div>
														
						<div class="col s10 push-s1" style="margin-top:-30px;">                                           
							<div class="row"></div>							
							<div class="row"></div>                            
							<div class="input-field col s12">							
								<i class="mdi-action-tab prefix" style="font-size:35px;"></i>                            	
								<input id="editLeaveCount" type="text" class="validate" pattern="[0-9]{0,}" name = "editDefaultLeave" required="" aria-required="true" value = "test">								
								<label for="editLeaveCount">Number of Days Allowed</label>                                 
							</div>                            
						</div>
                           
														
						<div class="col s10 push-s1" style="margin-top:-30px;">                                                      
							<div class="row"></div>							
							<div class="row"></div>                            
							<div class="input-field col s12">							
								<i class="mdi-action-tab prefix" style="font-size:35px;"></i>                            	
								<input id="editNotificationPeriod" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true" value = "test">								
								<label for="editNotificationPeriod">Notification Period</label>                                 
							</div>                            
						</div>
                            
                     		
				</div>
	<!-- Modal Button Save -->
				
		
    		</div>
		<div class="modal-footer" style="background-color:#00293C !important;">
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
			</button>
			
    	</div>
</div>

<div id="modalleaveDelete" class="modal bottom-sheet ci" style="height: 250px !important; overflow:hidden;">
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
            null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
         });   
 
		$("#btnAddSave").click(function(){
            if ($('#strLeaveType').val().trim() && $('#intLeaveCount').val().trim() > 0 && $('#intNotificationPeriod').val().trim() >= 0){
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
                        strLeaveType: $('#strLeaveType').val(),
                        intLeaveCount: $('#intLeaveCount').val(),
                        intNotificationPeriod: $('#intNotificationPeriod').val()
                    },
                    success: function(data){
						$('#modalleaveAdd').closeModal();
						swal("Success!", "Record has been Added!", "success");
						refreshTable();
						refreshTextfield();
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
            if ($('#editname').val().trim() && $('#editLeaveCount').val().trim() > 0 && $('#editNotificationPeriod').val().trim() >= 0){
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
					editID: $('#editID').val(),
                    editname: $('#editname').val(),
                    editLeaveCount: $('#editLeaveCount').val(),
                    editNotificationPeriod: $('#editNotificationPeriod').val(),
					
				},
				success: function(data){
//					var toastContent = $('<span>Record Updated.</span>');
//                    Materialize.toast(toastContent, 1500,'green','edit');
                    $('#modalleaveEdit').closeModal();
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
        
        $('#dataTable').on('click', '.buttonUpdate', function(){
            $('#modalleaveEdit').openModal();
            var itemID = "id" + this.id;
            var itemName = "name" + this.id;
            var daysDuration = "daysDuration" + this.id;
            var daysBeforeLeave = "daysBeforeLeave" + this.id;

            document.getElementById('editID').value = $("#"+itemID).html();
            document.getElementById('editname').value = $("#"+itemName).html();
            document.getElementById('editLeaveCount').value = $("#"+daysDuration).html();
            document.getElementById('editNotificationPeriod').value = $("#"+daysBeforeLeave).html();

        });

//        $('#dataTable').on('click', '.buttonDelete', function(){
//            $('#modalleaveDelete').openModal();
//            document.getElementById('deleteID').value =this.id;
//        });

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
        
        function refreshTable(){
            var dataTable = $('#dataTable').DataTable();
            dataTable.clear().draw(); //clear all the row
            $.ajax({ 
                type: 'GET', 
                url: '{{ URL::to("/maintenance/leave/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 

                    $.each(data, function(index, element) {
                        var flag = data[index].boolFlag;

                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intLeaveID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intLeaveID+'"><span class="lever"></span></label></div>';
                        }

                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" name="" id="' +data[index].intLeaveID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intLeaveID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intLeaveID + '">' + data[index].intLeaveID +'</h>',
                            '<h id = "name' +data[index].intLeaveID + '">' + data[index].strLeaveType +'</h>',
                            '<h id = "daysDuration' +data[index].intLeaveID + '">' + data[index].intLeaveCount +'</h>',
                            '<h id = "daysBeforeLeave' +data[index].intLeaveID + '">' + data[index].intNotificationPeriod +'</h>'
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
            document.getElementById('strLeaveType').value = "";
            document.getElementById('intLeaveCount').value = "";			
			document.getElementById('intNotificationPeriod').value = "";
        }

	});//document ready


</script>

@stop