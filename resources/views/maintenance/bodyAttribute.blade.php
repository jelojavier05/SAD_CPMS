@extends('layout.maintenanceLayout')

@section('title')
Body Attributes
@endsection

@section('content')
	
<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 pull-s2" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Body Attributes</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalvitstatsAdd">
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
                                <th style="width:50px;" class="blue darken-3 white-text"></th>
								<th style="width:50px;" class="blue darken-3 white-text"></th>
                                <th class="blue darken-3 white-text">ID</th>
                                <th class="blue darken-3 white-text">Name</th>
								<th class="blue darken-3 white-text">Unit of Measurement</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bodyAttributes as $bodyAttribute)
                                <tr>
                                    
									<td> 
                                    <div class="switch" style="margin-right: -80px;">
                                        <label>
                                           
                                            @if ($bodyAttribute->boolFlag==1)
                                                <input type="checkbox" checked class = "checkboxFlag" id = "{{ $bodyAttribute->intBodyAttributeID }}">
                                            @else
                                                <input type="checkbox" class = "checkboxFlag" id = "{{ $bodyAttribute->intBodyAttributeID }}">
                                            @endif
                                            <span class="lever"></span>
                                            
                                        </label>
                                    </div>
                                	</td>
									
									<td>
                                        <button class="buttonUpdate btn col s12"  name="" id="{{ $bodyAttribute->intBodyAttributeID }}" href="#modalvitstatsEdit" >
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for="{{ $bodyAttribute->intBodyAttributeID }}"></label>
                                    </td>
									
                                    <td>
                                        <button class="buttonDelete btn red col s12" id="{{ $bodyAttribute->intBodyAttributeID }}" href="#modalvitstatsDelete">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>

									<td id = "id{{ $bodyAttribute->intBodyAttributeID }}">{{ $bodyAttribute->intBodyAttributeID }}</td>

									<td id = "name{{ $bodyAttribute->intBodyAttributeID }}">{{ $bodyAttribute->strBodyAttributeName }}</td>
                                    <input type="hidden" id = "measurementID{{ $bodyAttribute->intBodyAttributeID }}" value = "{{ $bodyAttribute->Measurement->intMeasurementID }}" >
                                    <td id = "uom{{ $bodyAttribute->intBodyAttributeID }}" value = "{{ $bodyAttribute->Measurement->intMeasurementID }}">{{ $bodyAttribute->Measurement->strMeasurement }} </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>

<!-- Modal BA ADD -->

<div id="modalvitstatsAdd" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:100px !important;  max-height:100% !important; height:300px !important; border-radius:10px;">
        
       	<div class="modal-header">
                <div class="h">
                    <h3><center>Body Attributes</center></h3>  
				</div>

        </div>
         
        
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
                                               
                                  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
                            				<select  class="browser-default" id = "addMeasurement">
                                                <option disabled selected value = "0">Unit of Measurement</option>
                                                @foreach ($measurements as $measurement)
                                                    <option id = "{{$measurement->intMeasurementID}}" value = "{{$measurement->intMeasurementID}}">{{$measurement->strMeasurement}}</option>
                                                @endforeach
                                            </select> 

                                        </div>
                                  </div>
						
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
									  	<div class="row"></div>
                                        <div class="input-field col s12">
											<i class="mdi-maps-local-library prefix" style="font-size:35px;"></i>
                            				<input id="addBodyAttribute" type="text" class="validate" name = "vitalStatistics" required="" aria-required="true">
                                        	<label for="strArmedServiceDesc">Body Attribute Type</label>

                                        </div>
                                  </div>
                            
                        </div>
						
    		</div>
    
    
    	<!-- Modal Button Save -->
			<div class="modal-footer" style="background-color: #00293C;">
            
                     <button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
                       <i class="material-icons right">send</i>
                     </button>
            </div>
</div>
<!-- MODAL BA EDIT -->
<div id="modalvitstatsEdit" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:400px !important; border-radius:10px;">
	<div class="modal-header">
                <div class="h">
                    <h3><center>Body Attributes</center></h3>  
				</div>

    </div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
                                               
                                <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
                            				<input  id="editID" type="text" class="validate" name = "vitalStatisticsID" readonly required="" aria-required="true" value = " ">
											<label for="editID">Body Attribute ID</label>

                                        </div>
                                  </div>  
								  
								<div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
                            				<select  class="browser-default" id = "editMeasurement">
												<option disabled selected value = "0">Unit of Measurement</option>
													@foreach ($measurements as $measurement)
                                    			<option id = "measurement{{$measurement->intMeasurementID}}"    value = "{{$measurement->intMeasurementID}}">{{$measurement->strMeasurement}}</option>
                                					@endforeach
											</select> 

                                        </div>
                                  </div>
						
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
									  	<div class="row"></div>
                                        <div class="input-field col s12">
											<i class="mdi-maps-local-library prefix" style="font-size:35px;"></i>
                            				<input id="editname" type="text" class="validate" name = "vitalStatistics" required="" aria-required="true" value = " ">
								<label for="editname">Body Attribute Type</label>

                                        </div>
                                  </div>
                            
                        </div>
						
	<!-- Modal Button Save -->
				
		
    		</div>
		<div class="modal-footer" style="background-color:#00293C; !important;">
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
			
			
			
    	</div>
</div>
<!----------------------------modal delete Body Attributes ------------------------------>

<div id="modalvitstatsDelete" class="modal bottom-sheet ci" style="height: 250px !important; overflow:hidden;">
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
            
          if ($('#addBodyAttribute').val().trim() && $('#addMeasurement').val() != 0){
              var measurementID = $('#addMeasurement').val();
              $.ajax({
				
				type: "POST",
				url: "{{action('BodyAttributeController@addBodyAttribute')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					bodyAttribute: $('#addBodyAttribute').val(),
                    measurementID: measurementID
				},
				success: function(data){
                    refreshTable();
                    $('#addBodyAttribute').val('');
                    $('#modalvitstatsAdd').closeModal();
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
             if ($('#editname').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('BodyAttributeController@updateBodyAttribute')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					vitalStatisticsID: $('#editID').val(),
                    vitalStatistics: $('#editname').val(),
                    measurementID: $('#editMeasurement').val()
					
				},
				success: function(data){
//					var toastContent = $('<span>Record Updated.</span>');
//                    Materialize.toast(toastContent, 1500,'green','edit');
                    $('#modalvitstatsEdit').closeModal();
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
                url: "{{action('BodyAttributeController@deleteBodyAttribute')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    vitalStatisticsID: deleteID.value

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
            $('#modalvitstatsEdit').openModal();
            var itemID = "id" + this.id;
			var itemName = "name" + this.id;
            var itemMeasurement = "measurementID" + this.id;
            
			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
            $('#editMeasurement').val($('#'+itemMeasurement).val());
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
				url: "{{action('BodyAttributeController@flagBodyAttribute')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					vitalStatisticsID: this.id,
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
                    url: '{{ URL::to("/maintenance/bodyAttribute/get") }}', 
                    data: { get_param: 'value' },
                    dataType: 'json',
                    success: function (data) { 
                        
                        $.each(data, function(index, element) {
                            var flag = data[index].boolFlag;
                            
                            var measurement = getMeasurement(data[index].intMeasurementID);
                            if (flag){
                                var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intBodyAttributeID+'"><span class="lever"></span></label></div>';
                            }else{
                                var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intBodyAttributeID+'"><span class="lever"></span></label></div>';
                            }
                            
                            dataTable.row.add([
                                checkbox,
                                '<button class="buttonUpdate btn" name="" id="' +data[index].intBodyAttributeID+'" ><i class="material-icons">edit</i></button>',
                                '<button class="buttonDelete btn red" id="'+ data[index].intBodyAttributeID +'"><i class="material-icons">delete</i></button>',
                                '<h id = "id' +data[index].intBodyAttributeID + '">' + data[index].intBodyAttributeID +'</h>',
                                '<h id = "name' +data[index].intBodyAttributeID + '">' + data[index].strBodyAttributeName +'</h>',
                                '<h id = "uom' +data[index].intBodyAttributeID + '" value = "value' +data[index].intMeasurementID + '">' + measurement +'</h>']).draw();
                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'measurementID' + data[index].intBodyAttributeID ,
                                    value: data[index].intMeasurementID
                                }).appendTo('#dataTable');
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
        
        function getMeasurement(measurementID){
            var measurement;
            
            $.each(listMeasurement, function(index, element) {
                if (measurementID == listMeasurement[index].intMeasurementID){
                    measurement = listMeasurement[index].strMeasurement;
                    return false;              
                }
            });//foreach
            return measurement;
        }
        
        function refreshTextfield(){
                document.getElementById('strVitalStatistics').value = "";
            }
        var listMeasurement ;
        $.ajax({    
            type: 'GET', 
            url: '{{ URL::to("/maintenance/unitOfMeasurement/get") }}', 
            data: { get_param: 'value' },
            dataType: 'json',
            success: function (data) { 
                listMeasurement = data;
            },
            error: function(data){

            },async: false
        });
	});//document ready
</script>

@stop