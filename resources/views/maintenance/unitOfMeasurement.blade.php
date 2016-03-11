@extends('layout.maintenanceLayout')

@section('title')
Unit of Measurement
@endsection

@section('content')

<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">
			<div class="col s6 offset-s3">
				<div class="flow-text">
					<h1 class="colortitle blue-text text-darken-3">Unit of Measurement</h1>
				</div>
			</div>
			<div class="col s2">
				<button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modaluomAdd"><i class="material-icons left">add</i> ADD</button></br></br>
</div></div>

<!-- TABLE -->

	 <div class="row">
        
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top:-20px;">
					
				<table class="highlight white" style="border-radius: 10px; margin-top: -8%" id="dataTable">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modaluomAdd">
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
              			<th data-field="name">Name</th>
						
						
                    </tr>
			</thead>
            
           <tbody>
			   @foreach ($unitOfMeasurements as $unitOfMeasurement)
          			<tr>
						
						
						<td> 
						  <div class="switch" style="margin-right: -80px;">
							<label>
							  Deactivate
							  @if ($unitOfMeasurement->boolFlag==1)
							  	<input type="checkbox" checked class = "checkboxFlag" id = "{{ $unitOfMeasurement->intUnitOfMeasurementID }}">
							  @else
							  	<input type="checkbox" class = "checkboxFlag" id = "{{ $unitOfMeasurement->intUnitOfMeasurementID }}">
							  @endif
							  <span class="lever"></span>
							  Activate
							</label>
						  </div>
						</td>
						
            			<td><button class="buttonUpdate btn  modal-trigger"  name="unitOfMeasurement" id = "{{ $unitOfMeasurement->intUnitOfMeasurementID }}" href="#modaluomEdit" style="margin-left:70px;"><i class="material-icons">edit</i></button>
            			<label for="{{ $unitOfMeasurement->intUnitOfMeasurementID }}"></label> </td>
						
						<td><button class="buttonDelete btn red" style="margin-left:-180px;"><i class="material-icons">delete</i></button></td>

						<td id = "id{{ $unitOfMeasurement->intUnitOfMeasurementID }}">{{ $unitOfMeasurement->intUnitOfMeasurementID }}</td>
            			<td id = "name{{ $unitOfMeasurement->intUnitOfMeasurementID }}">{{ $unitOfMeasurement->strUnitOfMeasurement }}</td>
						
            				
          			</tr>
          		@endforeach
          
        </tbody>
				</table>
				
				</div>
				<!-- Pagination -->
				
			</div>
				
			
			
			</br></br></br></br></br>

</div>
				


<!-- Modal Unit of Measurement ADD -->

<div id="modaluomAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Unit of Measurement</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intUnitOfMeasurementID" type="text" class="validate" name = "unitOfMeasurementID" disabled>
									<label for="intUnitOfMeasurementID">Unit of Measurement ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strUnitOfMeasurementDesc" type="text" class="validate" name = "unitOfMeasurementName" required="" aria-required="true">
									<label for="strUnitOfMeasurementDesc">Unit of Measurement Type</label> 
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

<!-- MODAL Unit of Measurement EDIT -->
<div id="modaluomEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Unit of Measurement</h2></div>
        	<div class="modal-content">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate"  name = "unitOfMeasurementID" readonly required="" aria-required="true" value = "test">
									<label for="editID">Unit of Measurement ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "unitOfMeasurement" required="" aria-required="true" value = "test">
									<label for="editname">Unit of Measurement Type</label> 
							</div>
						</div>
					</div>
					
						
      
	<!-- Modal Button Save -->
				<input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
		<div class="modal-footer">
			
			
			<button class="btn waves-effect waves-light" type="submit" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
    	</div>
    		
</div>
</div>
	

	
	
	

@stop

@section('script')


<script type="text/javascript">
$(document).ready(function(){
    
	
			
	$(function(){

		$(".buttonDelete").click(function(){
            if(confirm('Are you sure you want to delete the record?')){

                $.ajax({

                    type: "POST",
                    url: "{{action('UnitOfMeasurementController@deleteUnitOfMeasurement')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        unitOfMeasurementID: this.id

                    },
                    success: function(data){
                        var toastContent = $('<span>Record Deleted.</span>');
                        Materialize.toast(toastContent, 1500, 'edit');
                         window.location.href = "{{action('TypeOfGunController@index')}}";
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

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();

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
				url: "{{action('UnitOfMeasurementController@flagUnitOfMeasurement')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					unitOfMeasurementID: this.id,
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
		
	$('#dataTable').DataTable({
     "columns": [
            { "orderable": false },
            { "orderable": false },
            { "orderable": false },
            null,
            null
            ] ,  
		    
			"pageLength":5
		});
    });
 

		$("#btnAddSave").click(function(){

			$.ajax({
				
				type: "POST",
				url: "{{action('UnitOfMeasurementController@addUnitOfMeasurement')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					unitOfMeasurement: $('#strUnitOfMeasurementDesc').val(),
				},
				success: function(data){
					var toastContent = $('<span>Record Added.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                    window.location.href = "{{action('UnitOfMeasurementController@index')}}";
				},
				error: function(data){
					var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                    
				}


			});//ajax

		});//button add clicked
        
        $("#btnUpdate").click(function(){

			$.ajax({
				
				type: "POST",
				url: "{{action('UnitOfMeasurementController@updateUnitOfMeasurement')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					unitOfMeasurementID: $('#editID').val(),
                    unitOfMeasurement: $('#editname').val(),
				},
				success: function(data){
					var toastContent = $('<span>Record Updated.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                    window.location.href = "{{action('UnitOfMeasurementController@index')}}";
				},
				error: function(data){
					var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                    
				}


			});//ajax

		});//button add clicked
        
	});//document ready
</script>
@stop
	
