@extends('layout.maintenanceLayout')

@section('title')
Gun
@endsection

@section('content')
	

<!-- ADD EDIT DELETE BUTTON-->
		<div class="row">
			<div class="col s12">	
				<div class="col s3 offset-s3">
					<h1 class="colortitle blue-text text-darken-3">Gun</h1>
				</div>
				<div class="col s3 offset-s3">
					<button style="margin-top: 30px;" id="btnAdd" class="z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modaladdgunAdd" ><i class="material-icons left">add</i>ADD</button></br></br>
				</div>

		</div>
	

<!-- TABLE -->

     
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top:-10px;">	
				<table class="highlight white" style=" border-radius: 10px; margin-top: -8%" id="dataTable">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modaladdgunAdd">
      							<i class="material-icons">add</i>
    						</button>

  						</div>
					</div>
           	<thead>
                    <tr>
						
						
                        <th></th>
						<th></th>
						<th></th>
              			
              			<th data-field="name">Serial No.</th>
						<th data-field="name">Gun Name</th>
                        <th data-field="name">Gun Type</th>
                        <th data-field="name">License Status</th>
                        
                    </tr>
			</thead>
            
           <tbody>
			   @foreach ($guns as $gun)
          			<tr>
						
            			<td> 
						  <div class="switch" style="margin-right: -80px;">
							<label>
							  Deactivate
							  @if ($gun->boolFlag==1)
							  	<input type="checkbox" checked class = "checkboxFlag" id = "{{ $gun->intGunID }}">
							  @else
							  	<input type="checkbox" class = "checkboxFlag" id = "{{ $gun->intGunID }}">
							  @endif
							  <span class="lever"></span>
							  Activate
							</label>
						  </div>
						</td>
						
						
						<td><button class="buttonUpdate btn modal-trigger"  name="" id="{{ $gun->intGunID }}" 
            				 href="#modaladdgunEdit" style="margin-right: -20px; margin-left:30px;"><i class="material-icons">edit</i></button>
            			<label for="{{ $gun->intGunID }}"></label> </td>
					

						<td><button class="btn red"><i class="material-icons">delete</i></button></td>
						
						<td id = "id{{ $gun->intGunID }}">{{ $gun->strSerialNumber }}</td>
            			<td id = "name{{ $gun->intGunID }}">{{ $gun->strGunName  }}</td>
            			<td id = "description{{ $gun->intGunID }}">{{ $gun->strTypeOfGun }}</td>
          			</tr>
          		@endforeach
          
        </tbody>
				
					</table>
				
				</div>
				
				</div>
			
			</br></br></br></br></br>
			
			

			
		
    </div>

<!-- Modal Add Gun ADD -->

<div id="modaladdgunAdd" class="modal modal-fixed-footer" style="overflow:hidden;" >
        <div class="modal-header"><h2>Add Gun</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="containter grey lighten-4">
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="idGunID" type="text" class="validate" name = "" disabled>
									<label for="">Gun ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strSerialNumber" type="text" class="validate" name = "strSerialNumber" required="" aria-required="true">
									<label for="">Serial No.</label> 
							</div>
						</div>
					</div>
				    <div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="strGunName" type="text" class="validate"  name = "strGunName" required="" aria-required="true">
										<label for="">Gun Name</label> 
								</div>
							</div>
				    </div>
                     <div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="strGunMaker" type="text" class="validate"  name = "strGunMaker" required="" aria-required="true">
										<label for="">Gun Maker</label> 
								</div>
							</div>
				    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <select id = "selectTypeGunAdd" name = "strTypeOfGun">
								
                            </select>
                            <label>Gun Type</label>
                        </div>
                    </div>
                </div>

	<!-- Modal Button Save -->
				
		<button class="btn waves-effect waves-light right" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
    			<i class="material-icons right">send</i>
  			</button>
    		</div>
		</div>
<!-- MODAL Add Gun EDIT -->
<div id="modaladdgunEdit" class="modal modal-fixed-footer" >
	 <div class="modal-header"><h2>Add Gun</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="containter grey lighten-4">
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="" type="text" class="validate" name = "" disabled>
									<label for="">Gun ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="" type="text" class="validate" name = "" required="" aria-required="true">
									<label for="">Serial No.</label> 
							</div>
						</div>
					</div>
				    <div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="" type="text" class="validate"  name = "" required="" aria-required="true">
										<label for="">Gun Name</label> 
								</div>
							</div>
				    </div>
                     <div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="" type="text" class="validate"  name = "" required="" aria-required="true">
										<label for="">Gun Maker</label> 
								</div>
							</div>
				    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <select id = "selectTypeGunEdit">
                              <option value="" disabled selected>Choose Gun Type</option>
                            </select>
                            <label>Gun Type</label>
                        </div>
                    </div>
                </div>
                <div class="container grey lighten-4">
                    <div class="row">
							<div class="col s8">
								<div class="input-field">
									<input id="" type="text" class="validate"  name = "" required="" aria-required="true">
										<label for="">License No.</label> 
								</div>
							</div>
                        
                            <div class="col s5">
								<div class="input-field">
									<input id="" type="date" class="validate"  name = "" required="" aria-required="true">
										<label class="active" for="">Date Issued</label> 
								</div>
							</div>
                             
                            <div class="col s5">
								<div class="input-field">
									<input id="" type="date" class="validate"  name = "" required="" aria-required="true">
										<label class='active' for="">Expiration Date</label> 
								</div>
						</div>
				     </div>
                </div>

	<!-- Modal Button Save -->
				
		<button class="btn waves-effect waves-light right" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
    			<i class="material-icons right">send</i>
  			</button>
    		</div>
    		</div>
</div>

@stop

@section('script')
<script type="text/javascript">
	
    $(function(){
        $("#btnAddSave").click(function(){
            if ($('#strSerialNumber').val().trim() && $('#strGunName').val().trim()){
                $.ajax({

                    type: "POST",
                    url: "{{action('GunController@store')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        serialNumber: $('#strSerialNumber').val(),
                        gunName: $('#strGunName').val(),
                        gunMaker: $('#strGunMaker').val(),
                        typeOfGun: $('#selectTypeGunAdd').val(),
                    },
                    success: function(data){
                        var toastContent = $('<span>Record Added.</span>');
                        Materialize.toast(toastContent, 3000,'green', 'edit');
    					window.location.href = "{{action('GunController@index')}}";

                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occured. </span>');
                        Materialize.toast(toastContent, 1500,'red', 'edit');
                        console.log(data);
                    }


                });//ajax
             }else{
                var toastContent = $('<span>Please Check Your Input. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }//validations
        });
        
    });
    
    $(function(){
        $(".buttonUpdate").click(function(){
			var itemID = "id" + this.id;
			var itemName = "name" + this.id;
			var itemDescription = "description" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
			document.getElementById('editDefault').value = $("#"+itemDescription).html();

		});
        
    });//button update clicked
    
    $(function(){
		$("#dataTable").DataTable({
             "columns": [
            { "orderable": false },
            { "orderable": false },
            { "orderable": false },
            null,
            null,
            null
            ] ,  
		    //"pagingType": "full_numbers",
			"pageLength":5
		});
			
	});//data table

    $(function(){
        $.ajax({
            type: "GET",
            url: "{{action('TypeOfGunController@getTypeOfGun')}}",
            dataType: 'json',
            success: function(jsondata){
                var $dropDown = 
                    $("#selectTypeGunAdd")
                        .empty()
                        .html(' ');
                $.each( jsondata, function(index, item) { 
                    $dropDown.append(
                          $("<option></option>")
                            .attr("value",item.intTypeOfGunID)
                            .text(item.strTypeOfGun)
                    );

                });	//for each

                $('select').material_select();

            },//success
            error: function(data){
                Console.log(data);
            }
        });//ajax select
    });//function insert element in option

    $(document).ready(function() {
			$('select').material_select();
		});
</script>

@stop