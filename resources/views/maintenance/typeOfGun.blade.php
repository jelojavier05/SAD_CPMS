@extends('layout.maintenanceLayout')

@section('title')
Type of Gun
@endsection

@section('content')

	<!-- ADD EDIT DELETE BUTTON-->
		<div class="row">
			<div class="col s12">	
				<div class="col s4 offset-s3">
					<h1 class="colortitle blue-text text-darken-3">Type of Gun</h1>
				</div>
				<div class="col s2 offset-s2">
					<button style="margin-top: 30px;" id="btnAdd" class="z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalguntypeAdd"><i class="material-icons left">add</i> ADD</button></br></br>
				</div>

</div></div>

<!-- TABLE -->

	 <div class="row">
        
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top:-20px;">
					
				<table class="highlight white" style="border-radius: 10px; margin-top: -8%;" id="dataTable">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalguntypeAdd">
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
              			<th data-field="name">Gun</th>
              			<th data-field="number">Description</th>
						
                    </tr>
			</thead>
            
           <tbody>
			   @foreach ($typeOfGuns as $typeOfGun)
          			<tr>
						
						
						<td> 
						  <div class="switch" style="margin-right: -80px;">
							<label>
							  Deactivate
							  @if ($typeOfGun->boolFlag==1)
							  	<input type="checkbox" checked class = "checkboxFlag" id = "{{ $typeOfGun->intTypeOfGunID }}">
							  @else
							  	<input type="checkbox" class = "checkboxFlag" id = "{{ $typeOfGun->intTypeOfGunID }}">
							  @endif
							  <span class="lever"></span>
							  Activate
							</label>
						  </div>
						</td>
						
            			<td><button class="buttonUpdate btn modal-trigger"  name="typeofGun" id="{{ $typeOfGun->intTypeOfGunID }}" 
            				 href="#modalguntypeEdit" style="margin-left:20px;"><i class="material-icons">edit</i></button>
            			<label for="{{ $typeOfGun->intTypeOfGunID }}"></label> </td>
						
						<td><button class="buttonDelete btn red" style="margin-left:-90px;" id="{{ $typeOfGun->intTypeOfGunID }}"><i class="material-icons">delete</i></button></td>
						

						<td id = "id{{ $typeOfGun->intTypeOfGunID }}">{{ $typeOfGun->intTypeOfGunID }}</td>
						<td id = "name{{ $typeOfGun->intTypeOfGunID }}">{{ $typeOfGun->strTypeOfGun }}</td>
            			<td id = "description{{ $typeOfGun->intTypeOfGunID }}">{{ $typeOfGun->strDescription }}</td>	
          			</tr>
          		@endforeach
          
        </tbody>
				</table>
				
				</div>
				<!-- Pagination -->
				</div>
				
			
			
			</br></br></br></br></br>

</div>
				


<!-- Modal Type of Gun ADD -->

<div id="modalguntypeAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
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
						</div></div>	
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
				
		</div>

<!-- MODAL Type of Gun EDIT -->
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
						</div>	</div>
						
      
	<!-- Modal Button Save -->
				<input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
		<div class="modal-footer">
			
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
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
            if(confirm('Are you sure you want to delete the record?')){

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
                        typeOfGunID: this.id

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
			var itemDescription = "description" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
			document.getElementById('editdescription').value = $("#"+itemDescription).html();

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
            null,
            null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
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
					var toastContent = $('<span>Record Added.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                    window.location.href = "{{action('TypeOfGunController@index')}}";
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
					var toastContent = $('<span>Record Updated.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                    window.location.href = "{{action('TypeOfGunController@index')}}";
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
        
        

	});//document ready

</script>
@stop