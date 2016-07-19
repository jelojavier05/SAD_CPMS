@extends('layout.maintenanceLayout')

@section('title')
Nature of Business
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
    
                   <h2 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Nature of Business</h2>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-5%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
                    <button style="margin-top:30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalnobAdd">
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
								<th>Rate</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($natureOfBusinesses as $natureOfBusiness)
                                <tr>
                                    
									<td> 
									  <div class="switch" style="margin-right: -80px;">
										<label>
										  
										  @if ($natureOfBusiness->boolFlag==1)
											<input type="checkbox" checked class = "checkboxFlag" id = "{{ $natureOfBusiness->intNatureOfBusinessID }}">
										  @else
											<input type="checkbox" class = "checkboxFlag" id = "{{ $natureOfBusiness->intNatureOfBusinessID }}">
										  @endif
										  <span class="lever"></span>
										  
										</label>
									  </div>
									</td>
									
									
									
									<td>
                                        <button class="buttonUpdate btn"  name="" id="{{$natureOfBusiness->intNatureOfBusinessID}}">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for="{{ $natureOfBusiness->intNatureOfBusinessID }}"></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red" id="{{ $natureOfBusiness->intNatureOfBusinessID }}" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{$natureOfBusiness->intNatureOfBusinessID}}">{{ $natureOfBusiness->intNatureOfBusinessID }}</td>
            						<td id = "name{{$natureOfBusiness->intNatureOfBusinessID}}">{{ $natureOfBusiness->strNatureOfBusiness }}</td>
									<td id = "rate{{ $natureOfBusiness->intNatureOfBusinessID }}">{{ $natureOfBusiness->deciRate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>

<!-- Modal nob ADD -->

<div id="modalnobAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Nature of Business</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="" type="text" class="validate" name = "natureOfBusinessID" disabled>
									<label for="">Nature of Business ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strNatureOfBusiness" type="text" class="validate" name = "natureOfBusiness" required="" aria-required="true">
									<label for="">Nature of Business</label> 
							</div>
						</div>
					</div>
				
					<div class = "row">
						<div class="input-field col s5">
							<input  id="deciRate" maxlength="6" type="text" class="validate" pattern="[0-9.]{3,}" required="" aria-required="true">
							<label data-error="Incorrect" for="deciRate">Rate</label>

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
<!-- MODAL nob EDIT -->
<div id="modalnobEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Nature of Business</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "natureOfBusinessID" readonly required="" aria-required="true" value = "test">
								<label for="editID">Nature of Business ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "natureOfBusiness" required="" aria-required="true" value = "test">
								<label for="editname">Nature of Business</label> 
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="input-field col s5">
							<input  id="editRate" maxlength="6" type="text" class="validate" pattern="[0-9.]{3,}" required="" value = " "aria-required="true">
							<label data-error="Incorrect" for="editRate">Rate</label>

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
</div>

<input type="hidden" name="idDelete" id = "deleteID">
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#dataTable").DataTable({
             "columns": [
            {"searchable": false},
			{"searchable": false},
			{"searchable": false},
            null,
            null,
			null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
			"lengthMenu": [5,10,15,20]


		});

		$("#btnAddSave").click(function(){
           if ($('#strNatureOfBusiness').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('NatureOfBusinessController@addNatureOfBusiness')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					natureOfBusiness: $('#strNatureOfBusiness').val(),
                    deciRate: $('#deciRate').val()
				},
				success: function(data){
					
                    refreshTable();
                    $('#modalnobAdd').closeModal();
					swal("Success!", "Record has been Added!", "success");
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
             if ($('#editID').val().trim() && $('#editname').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('NatureOfBusinessController@updateNatureOfBusiness')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					natureOfBusinessID: $('#editID').val(),
                    natureOfBusiness: $('#editname').val(),
                    deciRate: $('#editRate').val()
					
				},
				success: function(data){
//					var toastContent = $('<span>Record Updated.</span>');
//                    Materialize.toast(toastContent, 1500,'green','edit');
                    $('#modalnobEdit').closeModal();
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
                        url: "{{action('NatureOfBusinessController@deleteNatureOfBusiness')}}",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {
                            natureOfBusinessID: deleteID.value

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
            $('#modalnobEdit').openModal();
            var itemID = "id" + this.id;
			var itemName = "name" + this.id;
            var itemRate = "rate" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
            document.getElementById('editRate').value = $("#"+itemRate).html();

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
				url: "{{action('NatureOfBusinessController@flagNatureOfBusiness')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					natureOfBusinessID: this.id,
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
                url: '{{ URL::to("/maintenance/NatureOfBusiness/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 

                    $.each(data, function(index, element) {
                        var flag = data[index].boolFlag;

                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intNatureOfBusinessID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intNatureOfBusinessID+'"><span class="lever"></span></label></div>';
                        }

                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" name="" id="' +data[index].intNatureOfBusinessID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intNatureOfBusinessID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intNatureOfBusinessID + '">' + data[index].intNatureOfBusinessID +'</h>',
                            '<h id = "name' +data[index].intNatureOfBusinessID + '">' + data[index].strNatureOfBusiness +'</h>',
                            '<h id = "rate' +data[index].intNatureOfBusinessID + '">' + data[index].deciRate +'</h>'
                        ]).draw();
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
            
            document.getElementById('strNatureOfBusiness').value = "";
            document.getElementById('deciRate').value = "";
        }

	});//document ready
</script>

@stop