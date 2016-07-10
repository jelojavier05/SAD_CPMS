@extends('layout.maintenanceLayout')

@section('title')
Government Exam
@endsection

@section('content')

<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
<!--            <div class="row">-->
                <div class="col s6 push-s1">
                    <h2 class="blue-text">Government Exam</h2>
                </div>

                <div class="col s3 offset-s3">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalgovexamAdd">
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
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($governmentExams as $governmentExam)
                                <tr>
                                    
									<td> 
                                    <div class="switch" style="margin-right: 20px;">
                                        <label>
                                            
                                            @if ($governmentExam->boolFlag==1)
                                                <input type="checkbox" checked class = "checkboxFlag" id = "{{ $governmentExam->intGovernmentExamID }}">
                                            @else
                                                <input type="checkbox" class = "checkboxFlag" id = "{{ $governmentExam->intGovernmentExamID }}">
                                            @endif
                                            <span class="lever"></span>
                                            
                                        </label>
                                    </div>
                                </td>
                                
                                
									
									
									
									<td>
                                        <button class="buttonUpdate btn"  name="" id="{{ $governmentExam->intGovernmentExamID }}" >
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for="{{ $governmentExam->intGovernmentExamID }}"></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red" id="{{ $governmentExam->intGovernmentExamID }}">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{ $governmentExam->intGovernmentExamID }}">{{ $governmentExam->intGovernmentExamID }}</td>
                                	<td id = "name{{ $governmentExam->intGovernmentExamID }}">{{ $governmentExam->strGovernmentExam }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>

<!-- Modal govexam ADD -->

<div id="modalgovexamAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Government Exam</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intGovernmentExamID" type="text" class="validate" name = "governmentExamID" disabled>
								<label for="intGovernmentExamID">Government Exam ID</label>
							</div>
						</div>
            		</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strGovernmentExamAdd" type="text" class="validate" name = "governmentExamName" required="" aria-required="true">
								<label for="strGovernmentExamAdd">Government Exam Type</label> 
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
<!-- MODAL govexam EDIT -->
<div id="modalgovexamEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Government Exam</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate"  name = "governmentExamID" readonly required="" aria-required="true" value = "test">
								<label for="editID">Government Exam ID</label>
							</div>
						</div>
            		</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "governmentExam" required="" aria-required="true" value = "test">
								<label for="editname">Government Exam Type</label> 
							</div>
						</div>
            		</div>
						
	<!-- Modal Button Save -->
				
		
    		</div>
		<div class="modal-footer" style="background-color:#01579b !important;">
			
			<button class="btn waves-effect waves-light btnUpdate" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
    	</div>
</div>
<!----------------------------modal delete nature of business ------------------------------>

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
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
 
		$("#btnAddSave").click(function(){
            if ($('#strGovernmentExamAdd').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('GovernmentExamController@addGovernmentExam')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					governmentExamName: $('#strGovernmentExamAdd').val(),
				},
				success: function(data){
					$('#modalgovexamAdd').closeModal();
                    swal("Success!", "Record has been Added!", "success");
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
        
        $("#btnUpdate").click(function(){
             if ($('#editID').val().trim() && $('#editname').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('GovernmentExamController@updateGovernmentExam')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					governmentExamID: $('#editID').val(),
                    governmentExamName: $('#editname').val(),
				},
				success: function(data){
//					var toastContent = $('<span>Record Updated.</span>');
//                    Materialize.toast(toastContent, 1500,'green','edit');
                    $('#modalgovexamEdit').closeModal();
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
    
        $('#dataTable').on('click', '.buttonUpdate', function(){
            $('#modalgovexamEdit').openModal();
            var itemID = "id" + this.id;
			var itemName = "name" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();

        });
		
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
                url: "{{action('GovernmentExamController@deleteGovernmentExam')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    governmentExamID: deleteID.value

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
				url: "{{action('GovernmentExamController@flagGovernmentExam')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					governmentExamID: this.id,
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
                url: '{{ URL::to("/maintenance/governmentExam/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 

                    $.each(data, function(index, element) {
                        var flag = data[index].boolFlag;

                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intGovernmentExamID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intGovernmentExamID+'"><span class="lever"></span></label></div>';
                        }

                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" name="" id="' +data[index].intGovernmentExamID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intGovernmentExamID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intGovernmentExamID + '">' + data[index].intGovernmentExamID +'</h>',
                            '<h id = "name' +data[index].intGovernmentExamID + '">' + data[index].strGovernmentExam +'</h>']).draw();
                    });//foreach

                    refreshTextfield();

                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                }
            });
                
        }
            
        function refreshTextfield(){
            document.getElementById('strGovernmentExamAdd').value = "";

        }
        
    });//document.ready

	
	
</script>



@stop
