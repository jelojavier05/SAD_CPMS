@extends('layout.maintenanceLayout')

@section('title')
Unit of Measurement
@endsection

@section('content')	
<div class="row">
     <div class="row"> 
        <div class="row"></div>  
    <div class="row">
 
    <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h2 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Unit of Measurement</h2>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-5%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
                <button style="margin-top: 20px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modaluomAdd">
                    <i class="material-icons left">add</i> ADD
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:-5px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr >
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th>ID</th>
								<th>Unit of Measurement</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                           @foreach ($measurements as $measurement)
                                <tr>
                                    <td> 
                                        <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            @if ($measurement->boolFlag==1)
                                                <input type="checkbox" checked class = "checkboxFlag" id = "{{ $measurement->intMeasurementID }}">
                                            @else
                                                <input type="checkbox" class = "checkboxFlag" id = "{{ $measurement->intMeasurementID }}" >
                                            @endif
                                            <span class="lever"></span>
                                        </label>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <button class="buttonUpdate btn" id="{{ $measurement->intMeasurementID }}" >
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <label for="{{ $measurement->intMeasurementID }}"></label>
                                    </td>
                                    
                                    <td>
                                        <button class="buttonDelete btn red" id="{{ $measurement->intMeasurementID }}">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    
                                    <td id = "id{{ $measurement->intMeasurementID }}">{{ $measurement->intMeasurementID }}</td>
                                    <td id = "name{{ $measurement->intMeasurementID }}">{{ $measurement->strMeasurement }}</td>
                                    
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-----------------------------------------------------------modal start-------------------------->
<div id="modaluomAdd" class="modal modal-fixed-footer" style="overflow:hidden; width: 400px !important; height:250px !important; margin-top:100px; border-radius:10px;">
    <div class="modal-header">
        <h4>Unit of Measurement</h4>
    </div>
    
    <div class="modal-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
     
        
        <div class="row">
            <div class="col s10 push-s1">
                <div class="input-field">
                    <input id="addMeasurement" type="text" class="validate" required="" aria-required="true">
                    <label for="">Unit of Measurement</label> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer" style="background-color:#01579b !important;">
        <button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
<!-----------------------------------------------------------modal start-------------------------->
<div id="modaluomEdit" class="modal modal-fixed-footer" style="overflow:hidden; width: 400px !important; height:350px !important; margin-top:100px; border-radius:10px;">
    <div class="modal-header">
        <h4>Unit of Measurement</h4>
    </div>
    
    <div class="modal-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="row">
            <div class="col s3 push-s1">
                <div class="input-field">
                    <input  id="editID" type="text" class="validate blue-text" name = "cityID" readonly required="" aria-required="true" value = "1">
                    <label for="editID">ID</label>
                </div>
            </div>
		</div>
		
        <div class="row">
            <div class="col s10 push-s1">
                <div class="input-field">
                    <input id="editname" type="text" class="validate" name = "city" required="" aria-required="true" value = "Height">
                    <label for="editname">Unit Of Measurement</label> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer" style="background-color:#01579b !important;">
        <button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
<!-----------------------------------------------------------modal end-------------------------->

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
            null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
        
        $('#btnAddSave').click(function(){
            if ($('#addMeasurement').val().trim()){
                $.ajax({

                    type: "POST",
                    url: "{{action('UnitOfMeasurementController@create')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        measurement: $('#addMeasurement').val(),
                    },
                    success: function(data){
                        refreshTable();
                        $('#addMeasurement').val('');
                        $('#modaluomAdd').closeModal();
                        swal("Success!", "Record has been Added!", "success");
                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occured. </span>');
                        Materialize.toast(toastContent, 1500,'red', 'edit');
                    }
                });//ajax
            }else{
                
            }
        });
        
        $('#btnUpdate').click(function(){
            if ($('#editID').val().trim() && $('#editname').val().trim()){
                $.ajax({

                    type: "POST",
                    url: "{{action('UnitOfMeasurementController@update')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        measurementID: $('#editID').val(),
                        measurement: $('#editname').val(),
                    },
                    success: function(data){
                        $('#modaluomEdit').closeModal();
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
        });
        
        $('#dataTable').on('click', '.buttonUpdate', function(){
            $('#modaluomEdit').openModal();
            var itemID = "id" + this.id;
            var itemName = "name" + this.id;
            
            document.getElementById('editID').value = $("#"+itemID).html();
            document.getElementById('editname').value = $("#"+itemName).html();

        });
        
        $('#dataTable').on('click', '.buttonDelete', function(){

			var id =this.id;  
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
                        url: "{{action('UnitOfMeasurementController@delete')}}",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {
                            measurementID: id
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
                url: "{{action('UnitOfMeasurementController@flag')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    id: this.id,
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
                url: '{{ URL::to("/maintenance/unitOfMeasurement/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 

                    $.each(data, function(index, element) {
                        var flag = data[index].boolFlag;

                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intMeasurementID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intMeasurementID+'"><span class="lever"></span></label></div>';
                        }

                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" name="" id="' +data[index].intMeasurementID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intMeasurementID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intMeasurementID + '">' + data[index].intMeasurementID +'</h>',
                            '<h id = "name' +data[index].intMeasurementID + '">' + data[index].strMeasurement +'</h>']).draw();
                    });//foreach

                    refreshTextfield();

                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                     console.log(data);
                }
            });//ajax

        }//refresh table
	});
</script>
@stop