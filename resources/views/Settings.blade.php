@extends('layout.maintenanceLayout')

@section('title')
    Admin Settings
@endsection

@section('content')

<div class="row"></div>
<div class="row"></div>
<div class="row">

<div id="General" class="ci col s8 push-s3" style="margin-top:2px;">
    <ul class="collection with-header" id="collectionActive" >
        <li class="collection-header">
            <h4 style="font-weight:bold;">General Settings</h4>
        </li>
        
        <div class="col s12"> 
            <div class="col s6">
                <li class="collection-item" style="font-weight:bold;">                   
                    <div class="input-field col s12">
						<input placeholder=" " id="strAdminName1" type="text" class="validate" name = "" required="" aria-required="true">
						<label class="active" for="strAdminName1">Administrator Name</label> 
					</div>	
                
                
          <div class="input-field col s12">
						<input placeholder=" " id="strCompanyName1" type="text" class="validate" name = "" required="" aria-required="true">
						<label class="active" for="strCompanyName1">Organization/System Name</label> 
					</div>

					<div class="input-field col s12">
						<input placeholder=" " id="strAddress" type="text" class="validate" name = "" required="" aria-required="true">
						<label class="active" for="strAddress">Address</label> 
					</div>	
          
          <div class="input-field col s12">
						<input placeholder=" " id="strContactNumber" type="text" class="validate" name = "" required="" aria-required="true">
						<label class="active" for="strContactNumber">Contact Number</label> 
					</div>	      

                
<!--
                    <div class="file-field input-field col s12">
					  <label class="active">System Logo</label>
						<div class="row"></div>
					  <div class="btn blue">
						<span>File</span>
						<input type="file">
					  </div>
					  <div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					  </div>
						
					</div>
-->
                </li>
                  
            </div>
            
            <div class="col s6">                        
   				<h5 style="font-weight:bold;">Administrator Account:</h5>
                <div class="row"> 
                    <div class="col s12">
                    	
							<li class="collection-item">
								<div class="input-field col s12">
									<input placeholder=" " id="strUsername" type="text" class="validate" name = "" required="" aria-required="true">
									<label class="active" for="strUsername">Username</label> 
								</div>							
														
								<div class="input-field col s12">
									<input placeholder=" " id="strPassword" type="password" class='validate' name="" required="" aria-required="true">
									<label class='active' for="strPassword">Password</label>
								</div>
								
								<div class="input-field col s12">
									<input placeholder=" " id="strConfirm" type="password" class='validate' name="" required="" aria-required="true">
									<label class='active' for="strConfirm">Confirm Password</label>
								</div>
							</li>
						                 
                    </div>
                </div>								                                                            
            </div>
			<center><button class="btn blue btnSave">Save Changes</button></center>
        </div>
		
        <li class="collection-header">
           <p style="color:white">.</p>
        </li>
    </ul>
</div>        
</div>

@stop

@section('script')
<script>

$.ajax({
	type: "GET",
	url: "{{action('UtilitiesController@getUtilities')}}",
	success: function(data){
		$('#strAdminName1').val(data.strAdminName);
		$('#strCompanyName1').val(data.strCompanyName);
		$('#strAddress').val(data.strAddress);
		$('#strContactNumber').val(data.strContactNumber);
	},
	error: function(data){
		var toastContent = $('<span>Error Database.</span>');
		Materialize.toast(toastContent, 1500,'red', 'edit');
	}
});//ajax

$('.btnSave').click(function(){
	
	swal({   title: "Are you sure?",  
		  text: "Your Changes will be saved",   
		  type: "warning",   
		  showCancelButton: true,   
		  confirmButtonColor: "green",   
		  confirmButtonText: "Save Changes",   
		  closeOnConfirm: false }, 
		 function(){  
		 	if (checkInput()){
		 	 sendData();
		 	}
	});
});

function checkInput(){
	var checker = true;

	if ($('#strAdminName1').val().trim() == "" || $('#strCompanyName1').val().trim() == "" || $('#strAddress').val().trim() == "" || $('#strContactNumber').val().trim() == "" || $('#strUsername').val().trim() == "" || $('#strPassword').val().trim() == "" || $('#strPassword').val().trim() != $('#strConfirm').val().trim()){
		checker = false;
		var toastContent = $('<span>Check Input. </span>');
		Materialize.toast(toastContent, 1500,'red', 'edit');

	}

	return checker;
}

function sendData(){
	$.ajax({
		type: "POST",
		url: "{{action('UtilitiesController@update')}}",
		beforeSend: function (xhr) {
			var token = $('meta[name="csrf_token"]').attr('content');
			if (token) {
				return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			}
		},
		data: {
			strAdminName: $('#strAdminName1').val().trim(),
			strCompanyName: $('#strCompanyName1').val().trim(),
			strAddress: $('#strAddress').val().trim(),
			strContactNumber: $('#strContactNumber').val().trim(),
			strUsername: $('#strUsername').val(),
			strPassword: $('#strPassword').val()
		},
		success: function(data){
			swal({
						title: "Success!",
						text: "Changes Applied",
						type: "success"
					},
					function(){
					window.location.href = '{{ URL::to("/settings") }}';
				});

		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//ajax 		
}
</script>

@stop