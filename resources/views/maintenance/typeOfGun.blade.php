@extends('layout.maintenanceLayout')

@section('title')
Type of Gun
@endsection

@section('content')
<div class="row">
    <div class="row">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>  
        <div class="row"></div>  
    <div class="row">
 
    <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h2 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Gun Type</h2>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-5%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modaltypeofgunAdd">
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
                                <th>Name</th>
								<th>Description</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($typeOfGuns as $typeOfGun)
                                <tr>
                                    
									<td> 
										<div class="switch" style="margin-right: -80px;">
											<label>
												
												@if ($typeOfGun->boolFlag==1)
													<input type="checkbox" checked class = "checkboxFlag" id = "{{ $typeOfGun->intTypeOfGunID }}">
												@else
													<input type="checkbox" class = "checkboxFlag" id = "{{ $typeOfGun->intTypeOfGunID }}">
												@endif
												<span class="lever"></span>
												
											</label>
										</div>
                            		</td>
									
									
									
									<td>
										<button class="buttonUpdate btn"  name="typeofGun" id="{{ $typeOfGun->intTypeOfGunID }}" style="margin-left:20px;">
											<i class="material-icons">edit</i>
										</button>
										<label for="{{ $typeOfGun->intTypeOfGunID }}"></label> 
                            		</td>

                                    <td>
                                        <button class="buttonDelete btn red" id="{{ $typeOfGun->intTypeOfGunID }}" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{ $typeOfGun->intTypeOfGunID }}">{{ $typeOfGun->intTypeOfGunID }}</td>
                            
									<td id = "name{{ $typeOfGun->intTypeOfGunID }}">{{ $typeOfGun->strTypeOfGun }}</td>
                            
									<td id = "description{{ $typeOfGun->intTypeOfGunID }}">{{ $typeOfGun->strDescription }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>

<!-- Modal guntype ADD -->

<div id="modaltypeofgunAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Type of Gun</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intTypeOfGunID" type="text" class="validate" name = "typeOfGunID" disabled>
								<label for="">Type of Gun ID</label>
							</div>
						</div>
        			</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strTypeOfGun" type="text" class="validate" name = "typeOfGun" required="" aria-required="true">
								<label for="">Type of Gun</label> 
							</div>
						</div>
        			</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strTypeOfGunDescription" type="text" class="validate"  name = "typeOfGunDescription" required="" aria-required="true">
								<label for="strTypeOfGunDescription">Description</label> 
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
<!-- MODAL guntype EDIT -->
<div id="modalguntypeEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Type of Gun</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "typeOfGunID" readonly required="" aria-required="true" value = "test">
								<label for="editID">Type of Gun ID</label>
							</div>
						</div>
        			</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "typeOfGun" required="" aria-required="true" value = "test">
								<label for="editname">Type of Gun</label> 
							</div>
						</div>
        			</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editdescription" type="text" class="validate"  name = "typeOfGunDescription" required="" aria-required="true" value = "test">
								<label for="strTypeOfGunDescription">Description</label> 
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
<!----------------------------modal delete guntype ------------------------------>

<div id="modalguntypeDelete" class="modal bottom-sheet" style="height: 250px !important; overflow:hidden;">
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
           if ($('#strTypeOfGun').val().trim() && $('#strTypeOfGunDescription').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('TypeOfGunController@addTypeOfGun')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					typeOfGun: $('#strTypeOfGun').val(),
					typeOfGunDescription: $('#strTypeOfGunDescription').val(),
				},
				success: function(data){
//					var toastContent = $('<span>Record Added.</span>');
//                    Materialize.toast(toastContent, 1500,'green', 'edit');
                    refreshTextfield();
                    refreshTable();
                    $('#modaltypeofgunAdd').closeModal();
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
				url: "{{action('TypeOfGunController@updateTypeOfGun')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					typeOfGunID: $('#editID').val(),
                    typeOfGun: $('#editname').val(),
                    typeOfGunDescription: $('#editdescription').val(),
					
				},
				success: function(data){
//					var toastContent = $('<span>Record Updated.</span>');
//                    Materialize.toast(toastContent, 1500,'green','edit');
                    $('#modalguntypeEdit').closeModal();
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
                url: "{{action('TypeOfGunController@deleteTypeOfGun')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    typeOfGunID: deleteID.value

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
            $('#modalguntypeEdit').openModal();
            var itemID = "id" + this.id;
			var itemName = "name" + this.id;
			var itemDescription = "description" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
			document.getElementById('editdescription').value = $("#"+itemDescription).html();

        });
            
//        $('#dataTable').on('click', '.buttonDelete', function(){
//            $('#modalguntypeDelete').openModal();
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
				url: "{{action('TypeOfGunController@flagTypeOfGun')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					typeOfGunID: this.id,
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
                url: '{{ URL::to("/maintenance/typeOfGun/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 

                    $.each(data, function(index, element) {
                        var flag = data[index].boolFlag;

                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intTypeOfGunID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intTypeOfGunID+'"><span class="lever"></span></label></div>';
                        }

                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" name="" id="' +data[index].intTypeOfGunID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intTypeOfGunID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intTypeOfGunID + '">' + data[index].intTypeOfGunID +'</h>',
                            '<h id = "name' +data[index].intTypeOfGunID + '">' + data[index].strTypeOfGun +'</h>',
                            '<h id = "description' +data[index].intTypeOfGunID + '">' + data[index].strDescription +'</h>']).draw();
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
            document.getElementById('strTypeOfGun').value = "";
            document.getElementById('strTypeOfGunDescription').value = "";   
        }

	});//document ready

</script>
@stop