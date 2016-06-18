@extends('layout.maintenanceLayout')

@section('title')
Armed Service
@endsection

@section('content')	
<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:40px;">
<!--            <div class="row">-->
                <div class="col s6 push-s1" style="margin-top:-15px;">
                    <h2 class="blue-text">Armed Service</h2>
                </div>

                <div class="col s3 offset-s3">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalarmedserviceAdd">
                        <i class="material-icons left">add</i> ADD
                    </button>
                </div>
<!--            </div>-->
        
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr >
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
								<th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Name</th>
								<th>Description</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($armedServices as $armedService)
                                <tr>
                                    
									<td> 
                                        <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            
                                            @if ($armedService->boolFlag==1)
                                            <input type="checkbox" checked class = "checkboxFlag" id = "{{ $armedService->intArmedServiceID }}">
                                            @else
                                            <input type="checkbox" class = "checkboxFlag" id = "{{ $armedService->intArmedServiceID }}" >
                                            @endif
                                            <span class="lever"></span>
                                            
                                        </label>
                                        </div>
                                    </td>
									
									
									
									<td>
                                        <button class="buttonUpdate btn"  name="" id="{{ $armedService->intArmedServiceID }}" >
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for="{{ $armedService->intArmedServiceID }}"></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red" id="{{ $armedService->intArmedServiceID }}">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{ $armedService->intArmedServiceID }}">{{ $armedService->intArmedServiceID }}</td>
            						
									<td id = "name{{ $armedService->intArmedServiceID }}">{{ $armedService->strArmedServiceName }}</td>
                                    
                                    <td id = "description{{ $armedService->intArmedServiceID }}">{{ $armedService->strDescription }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>

<!-- Modal armedservice ADD -->

<div id="modalarmedserviceAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Armed Service</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intArmedServiceID" type="text" class="validate" name = "armedServiceID" disabled>
									<label for="intArmedServiceID">Armed Service ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strArmedServiceAdd" type="text" class="validate" name = "armedServiceName" required="" aria-required="true">
									<label for="strArmedServiceAdd">Armed Service Type</label> 
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strArmedServiceDescAdd" type="text" class="validate"  name = "armedServiceDescription" required="" aria-required="true">
								<label for="strArmedServiceDescAdd">Description</label> 
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
<!-- MODAL armedservice EDIT -->
<div id="modalarmedserviceEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Armed Service</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "armedServiceID" readonly required="" aria-required="true" value = " ">
									<label for="editID">Armed Service ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "armedServiceName" required="" aria-required="true" value = " ">
									<label for="editname">Armed Service Type</label> 
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editdescription" type="text" class="validate"  name = "armedServiceDescription" required="" aria-required="true" value = " ">
								<label for="editDescription">Description</label> 
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
<!----------------------------modal delete armedservice ------------------------------>

<div id="modalarmedserviceDelete" class="modal bottom-sheet" style="height: 250px !important; overflow:hidden;">
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
            null
            ] ,  
            "pageLength":5,
            "lengthMenu": [5,10,15,20]
        });

        $("#btnAddSave").click(function(){
          if ($('#strArmedServiceAdd').val().trim() && $('#strArmedServiceDescAdd').val().trim()){
            $.ajax({

                type: "POST",
                url: "{{action('ArmedServiceController@addArmedService')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    armedServiceName: $('#strArmedServiceAdd').val(),
                    armedServiceDescription: $('#strArmedServiceDescAdd').val(),
                },
                success: function(data){
                    
                    refreshTable();
                    refreshTextfield();
                    $('#modalarmedserviceAdd').closeModal();
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

        });//button add clicked

        $("#btnUpdate").click(function(){
             if ($('#editID').val().trim() && $('#editname').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('ArmedServiceController@updateArmedService')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					armedServiceID: $('#editID').val(),
                    armedServiceName: $('#editname').val(),
                    armedServiceDescription: $('#editdescription').val(),
<<<<<<< HEAD
                },
                success: function(data){
                    swal("Success!", "Record has been Updated!", "success");
                    refreshTable();
=======
					
				},
				success: function(data){
//					var toastContent = $('<span>Record Updated.</span>');
//                    Materialize.toast(toastContent, 1500,'green','edit');
>>>>>>> 16af68503b724b64980abefa03e834438cfa06cc
                    $('#modalarmedserviceEdit').closeModal();
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
                url: "{{action('ArmedServiceController@deleteArmedService')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    armedServiceID: deleteID.value

                },
<<<<<<< HEAD
                success: function(data){
                    swal("Success!", "Record has been Deleted!", "success");
                    refreshTable();
                    $('#modalarmedserviceDelete').closeModal();
                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500, 'edit');
                }
=======
                success: function(data) {
					swal("Deleted!", "Record has been successfully deleted!", "success");
>>>>>>> 16af68503b724b64980abefa03e834438cfa06cc

					refreshTable();

				  },
			  	error: function(data) {
					swal("Oops", "We couldn't connect to the server!", "error");
			  	  }

            	});//ajax
			});
          });

        $('#dataTable').on('click', '.buttonUpdate', function(){
            $('#modalarmedserviceEdit').openModal();
            var itemID = "id" + this.id;
            var itemName = "name" + this.id;
            var itemDescription = "description" + this.id;



            document.getElementById('editID').value = $("#"+itemID).html();
            document.getElementById('editname').value = $("#"+itemName).html();
            document.getElementById('editdescription').value = $("#"+itemDescription).html();

        });

//        $('#dataTable').on('click', '.buttonDelete', function(){
//            $('#modalarmedserviceDelete').openModal();
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
                url: "{{action('ArmedServiceController@flagArmedService')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    armedServiceID: this.id,
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
                url: '{{ URL::to("/maintenance/armedservice/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 

                    $.each(data, function(index, element) {
                        var flag = data[index].boolFlag;

                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intArmedServiceID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intArmedServiceID+'"><span class="lever"></span></label></div>';
                        }

                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" name="" id="' +data[index].intArmedServiceID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intArmedServiceID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intArmedServiceID + '">' + data[index].intArmedServiceID +'</h>',
                            '<h id = "name' +data[index].intArmedServiceID + '">' + data[index].strArmedServiceName +'</h>',
                            '<h id = "description' +data[index].intArmedServiceID + '">' + data[index].strDescription +'</h>']).draw();
                    });//foreach

                    refreshTextfield();

                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                     console.log(data);
                }
            });

        }

        function refreshTextfield(){
            document.getElementById('strArmedServiceAdd').value = "";
            document.getElementById('strArmedServiceDescAdd').value = "";   
        }

    });//document ready
</script>
@stop