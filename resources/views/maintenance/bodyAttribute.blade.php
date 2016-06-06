@extends('layout.maintenanceLayout')

@section('title')
Body Attributes
@endsection

@section('content')
	
<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:40px;">
<!--            <div class="row">-->
                <div class="col s6 push-s1" style="margin-top:-15px;">
                    <h2 class="blue-text">Body Attributes</h2>
                </div>

                <div class="col s3 offset-s3">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalvitstatsAdd">
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
                                        <button class="buttonUpdate btn"  name="" id="{{ $bodyAttribute->intBodyAttributeID }}" href="#modalvitstatsEdit" >
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for="{{ $bodyAttribute->intBodyAttributeID }}"></label>
                                    </td>
									
                                    <td>
                                        <button class="buttonDelete btn red" id="{{ $bodyAttribute->intBodyAttributeID }}" href="#modalvitstatsDelete">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>

									<td id = "id{{ $bodyAttribute->intBodyAttributeID }}">{{ $bodyAttribute->intBodyAttributeID }}</td>

									<td id = "name{{ $bodyAttribute->intBodyAttributeID }}">{{ $bodyAttribute->strBodyAttributeName }}</td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>

<!-- Modal BA ADD -->

<div id="modalvitstatsAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Body Attributes</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intVitalStatisticsID" type="text" class="validate" name = "vitalStatisticsID" disabled>
								<label for="intVitalStatisticsID">Body Attribute ID</label>
							</div>
						</div>
            		</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strVitalStatistics" type="text" class="validate" name = "vitalStatistics" required="" aria-required="true">
								<label for="strArmedServiceDesc">Body Attribute Type</label> 
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
<!-- MODAL BA EDIT -->
<div id="modalvitstatsEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Body Attributes</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "vitalStatisticsID" readonly required="" aria-required="true" value = " ">
								<label for="editID">Body Attribute ID</label>
							</div>
						</div>
            		</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "vitalStatistics" required="" aria-required="true" value = " ">
								<label for="editname">Body Attribute Type</label> 
							</div>
						</div>
            		</div>
						
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
			
			
			
    	</div>
    		</div>
</div>
<!----------------------------modal delete Body Attributes ------------------------------>

<div id="modalvitstatsDelete" class="modal bottom-sheet" style="height: 250px !important; overflow:hidden;">
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
            null
            ] ,  
            "pageLength":5,
            "lengthMenu": [5,10,15,20]
        });
 
		$("#btnAddSave").click(function(){
          if ($('#strVitalStatistics').val().trim()){
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
					vitalStatistics: $('#strVitalStatistics').val(),
				},
				success: function(data){
					var toastContent = $('<span>Record Added.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                    window.location.href = "{{action('BodyAttributeController@index')}}";
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
				},
				success: function(data){
					 window.location.href = "{{action('BodyAttributeController@index')}}";
					var toastContent = $('<span>Record Updated.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                   
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
        
        $("#btnDelete").click(function(){
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
                success: function(data){
                    var toastContent = $('<span>Record Deleted.</span>');
                    Materialize.toast(toastContent, 1500, 'green', 'edit');
                     window.location.href = "{{action('BodyAttributeController@index')}}";
                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500, 'edit');

                }

            });//ajax
        });
        
        $('#dataTable').on('click', '.buttonUpdate', function(){
            $('#modalvitstatsEdit').openModal();
            var itemID = "id" + this.id;
			var itemName = "name" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
        });

        $('#dataTable').on('click', '.buttonDelete', function(){
            $('#modalvitstatsDelete').openModal();
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
	});//document ready
</script>

@stop