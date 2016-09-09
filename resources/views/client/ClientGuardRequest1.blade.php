@extends('client.ClientDashboard')
@section('title')
Client Request of Guard
@endsection

@section('content')

<!-- Table Start -->
	<div class="row" style="margin-top:-30px;">
	  	<div class="row"> 
		    <div class="row">
				<div class="col s5 push-s3" style="margin-left:-2%">
			       <h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Guard</h3>
			    </div>
		    </div>
		</div>
	    <div class="col s12 push-s1" style="margin-top:-4%">
	        <div class="container white lighten-2 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;">
				<div class="row">	
					<div class="col s2 offset-s6">
						<button style="margin-top: 30px;" id="btnAdd" class=" tooltipped z-depth-1 btn green" data-position="bottom" data-delay="50" data-tooltip="Guard Details">
							<i class="material-icons">add</i>
						</button>
					</div>

					<div class="col s2">
						<button style="margin-top: 30px;" id="btnReplace" class="tooltipped z-depth-1 btn blue" data-position="bottom" data-delay="50" data-tooltip="Replace Guards">
							<i class="material-icons">swap_horiz</i>
						</button>
					</div>

					<div class="col s2">
						<button style="margin-top: 30px;" id="btnRemove" class="tooltipped z-depth-1 btn red" data-position="bottom" data-delay="50" data-tooltip="Remove Guards">
							<i class="material-icons">close</i>
						</button>
					</div>
				</div>
	            
	            <div class="row">
	                <div class="col s12" style="margin-top:-20px;">
	                    <table class="striped white" style="border-radius:10px;" id="dataTable">
	                        <thead>
	                            <tr>                                
	                                <th style="width:50px;" class="blue darken-3 white-text"></th>
																	<th style="width:50px;" class="blue darken-3 white-text"></th>
	                                <th class="blue darken-3 white-text">License Number</th>
	                                <th class="blue darken-3 white-text">Name</th>
	                                <th class="blue darken-3 white-text">Gender</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<!-- Table End -->


<!--modal guard add request-->
	<div id="modalguardAdd" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:425px !important; border-radius:10px;">      
		<div class="modal-header">
			<div class="h">
				<h3><center>Request Additional Guards</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				<div class="col s10 push-s1" style="margin-top:-30px;">      
					<div class="row"></div>  
					<div class="input-field col s12">
						<i class="material-icons prefix" style="font-size:35px;">accessibility</i>
						<input id="addNumberOfGuards" type="number" class="validate" required="" aria-required="true" min="1" value="1">
						<label for="addNumberOfGuards">Number of Guards</label> 
					</div>
				</div>
				<div class="col s10 push-s1" style="margin-top:-30px;">      
					<div class="row"></div>
					<div class="row"></div>
					 <div class="input-field col s12">
						 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
						 <textarea  class="materialize-textarea" id="addReason" type="text"  placeholder=" "></textarea>
						 <label for="addReason">Reason</label> 
					 </div>
				</div>
				
				<div class="col s10 push-s2">
					<div class='row'></div>
					<input class="filled-in" type="checkbox" id="checkAdd" value = ""><label for="checkAdd">I Agree to the Terms and Conditions</label>
				</div>
				
			</div>
		</div>
		<div class="modal-footer" style="background-color: #00293C;">
			<button class="btn large waves-effect waves-light" style="margin-right: 30px;" id = "btnAddRequest">Send
				<i class="material-icons right">send</i>
			</button>
		</div>	
	</div>
<!--modal guard add request end-->


<!--modal guard details-->
	<div id="modalguardDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:500px !important; border-radius:10px;">      
		<div class="modal-header">
			<div class="h">
				<h3><center>Guard Details</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				
				<div class="col s12" style="margin-top:-30px;">      
					<ul class="collection with-header" id="collectionActive" >
						<div >
								
						<li class="collection-item" style="font-weight:bold;">
							<div class="row">
								<div class="col s4">	
									First Name:<div style="font-weight:normal;" id = 'strFirstName'>&nbsp;&nbsp;&nbsp;</div>
								</div>
								
								<div class="col s4">	
									Middle Name:<div style="font-weight:normal;" id = 'strMiddleName'>&nbsp;&nbsp;&nbsp;</div>
								</div>
								
								<div class="col s4">	
									Last Name:<div style="font-weight:normal;" id = 'strLastName'>&nbsp;&nbsp;&nbsp;</div>
								</div>
															
							</div>
							
							<div class="row">
								<div class="col s12">
									Address:<div style="font-weight:normal;" id = 'strAddress'>&nbsp;&nbsp;&nbsp;</div>
								</div>																					
							</div>
							
							<div class="row">
								<div class="col s6">
									Place of Birth:<div style="font-weight:normal;" id = 'strPlaceBirth'>&nbsp;&nbsp;&nbsp;</div>
								</div>
								
								<div class="col s6">
									Age:<div style="font-weight:normal;" id = 'intAge'>&nbsp;&nbsp;&nbsp;</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col s6">
									Contact Number (Mobile):<div style="font-weight:normal;" id = 'strContactNumberMobile'>&nbsp;&nbsp;&nbsp;</div>
								</div>
								
								<div class="col s6">
									Contact Number (Landline):<div style="font-weight:normal;" id = 'strContactNumberLandline'>&nbsp;&nbsp;&nbsp;</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col s6">
									Gender:<div style="font-weight:normal;" id = 'strGender'>&nbsp;&nbsp;&nbsp;</div>
								</div>
								
								<div class="col s6">
									Civil Status:<div style="font-weight:normal;" id = 'strCivilStatus'>&nbsp;&nbsp;&nbsp;</div>
								</div>
							</div>
							
						</li>
	                                      
					</div>
					</ul>
				</div>
				
			</div>
		</div>
		<div class="modal-footer" style="background-color: #00293C;">
			<button class="btn large green  modal-close" name="action" style="margin-right: 30px;" id = "">OK		
			</button>
		</div>	
	</div>
<!--modal guard details end-->


<!--modal guard swap request-->
	<div id="modalguardSwap" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:360px !important; border-radius:10px;">      
		<div class="modal-header">
			<div class="h">
				<h3><center>Guard Replacement</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				
				<div class="col s10 push-s1" style="margin-top:-30px;">      
					
					<div class="row"></div>
					 <div class="input-field col s12">
						 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
						 <textarea  class="materialize-textarea" id="strSwapReason" type="text"  placeholder=" "></textarea>
						 <label for="input_text">Reason</label> 
						 
					 </div>
				</div>
				
				<div class="col s10 push-s2">
					<div class='row'></div>
					<input class="filled-in" type="checkbox" id="checkSwap" value = ""><label for="checkSwap">I Agree to the Terms and Conditions</label>
				</div>
				
			</div>
		</div>
		<div class="modal-footer" style="background-color: #00293C;">
			<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSwapGuard">Send
				<i class="material-icons right">send</i>
			</button>
		</div>	
	</div>
<!--modal guard swap request end-->


<!--modal guard removal request-->
	<div id="modalguardDelete" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:360px !important; border-radius:10px;">      
		<div class="modal-header">
			<div class="h">
				<h3><center>Guard Removal</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				
				<div class="col s10 push-s1" style="margin-top:-30px;">      
					
					<div class="row"></div>
					 <div class="input-field col s12">
						 <i class="material-icons prefix" style="font-size:35px;">announcement</i>
						 <textarea  class="materialize-textarea" id="strRemoveReason" type="text"  placeholder=" "></textarea>
						 <label for="input_text">Reason</label> 
						 
					 </div>
				</div>
				
				<div class="col s10 push-s2">
					<div class='row'></div>
					<input class="filled-in" type="checkbox" id="checkRemove" value = ""><label for="checkRemove">I Agree to the Terms and Conditions</label>
				</div>
				
			</div>
		</div>
		<div class="modal-footer" style="background-color: #00293C;">
			<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnRemoveGuard">Send
				<i class="material-icons right">send</i>
			</button>
		</div>	
	</div>
<!--modal guard removal request end-->
    
@stop

@section('script')
<!-- Request Add Guard Start-->
	<script>
		$(document).ready(function(){
			$('#btnAddRequest').click(function(){
				if (checkInput() && !hasAddRequest() && $('#checkAdd').is(':checked')){
					send();
				}
			});

			function checkInput(){
				var numberGuard = $('#addNumberOfGuards').val();
				var reason = $('#addReason').val().trim();
				if(numberGuard <= 0 || reason == '' || numberGuard > 50){
					swal("Error!", "Please check your input.", "error");
					return false;
				}else{
					return true;
				}
			}

			function hasAddRequest(){
				var checker;
				$.ajax({
			        type: "GET",
			        url: "{{action('ClientGuardRequestController@hasAddRequest')}}",
			        success: function(data){
			        	checker = data;
			        },
			        error: function(data){
			        	var toastContent = $('<span>Error Database.</span>');
						Materialize.toast(toastContent, 1500,'red', 'edit');
			        },async:false
			    });//ajax

			    if (checker){
			    	swal("Error!", "You still have pending request.", "error");
			    }
				return checker;
			}

			function send(){
				var numberGuard = $('#addNumberOfGuards').val();
				var reason = $('#addReason').val().trim();

				$.ajax({
			        type: "POST",
			        url: "{{action('ClientGuardRequestController@addGuard')}}",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: {
			            numberGuard: numberGuard,
			            reason: reason
			        },
			        success: function(data){
			        	swal("Success!", "Request has been sent. Wait for the response.", "success");
			        },
			        error: function(){
			        	var toastContent = $('<span>Error Database.</span>');
						Materialize.toast(toastContent, 1500,'red', 'edit');
			        }
			    });//ajax
			}
		});
	</script>
<!-- Request Add Guard End-->

<!-- Request Swap Guard Start -->
	<script>
		$(document).ready(function(){
			var activeGuard;
			var checkedGuard = [];

			$.ajax({
		    type: "GET",
		    url: "{{action('ClientGuardRequestController@getActiveGuard')}}",
		    success: function(data){
		    	activeGuard = data;
		    }//success
			});//get active guard

			$('#btnReplace').click(function(){
				setGuardChecked();
				if (!hasPendingRequest() && hasCheckedGuard()){
					$('#strSwapReason').val('');
					$('#checkSwap').attr('checked', false);
					$('#modalguardSwap').openModal();
				}
			});

			$('#btnSwapGuard').click(function(){

				if (checkInput() && isAgree()){
					var strReason = $('#strSwapReason').val().trim();
					$.ajax({
		        type: "POST",
		        url: "{{action('ClientGuardRequestController@swapGuard')}}",
		        beforeSend: function (xhr) {
		            var token = $('meta[name="csrf_token"]').attr('content');

		            if (token) {
		                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		            }
		        },
		        data: {
		        	arrGuardID: checkedGuard,
		        	reason: strReason
		        },
		        success: function(data){	
		        	swal({
								title: "Success!",
								text: "Request sent. Wait for the admin's response.",
								type: "success"
							},
							function(){
								window.location.href = '{{ URL::to("/clientguardrequest") }}';
							});
		        },
		        error: function(data){
							var toastContent = $('<span>Error Database.</span>');
							Materialize.toast(toastContent, 1500,'red', 'edit');
		        }
		    	});//send swap request
				}
			});

			function hasPendingRequest(){
				var checker;
				$.ajax({
          type: "GET",
          url: "{{action('ClientGuardRequestController@hasGuardRequest')}}",
          success: function(data){
          	checker = data;
          },
          error: function(data){
	 					var toastContent = $('<span>Error Database.</span>');
						Materialize.toast(toastContent, 1500,'red', 'edit');

          },async:false
      	});//ajax

				if (checker){
					var toastContent = $('<span>You still have pending request.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
				}

				return checker;
			}

			function setGuardChecked(){
				checkedGuard = [];
				$.each(activeGuard, function(index, value){
					if ($('#checkbox' + value.intGuardID).is(':checked')){
						checkedGuard.push(value.intGuardID);
					}
				});
			}

			function isAgree(){
				if ($('#checkSwap').is(':checked')){
					return true;
				}else{
					var toastContent = $('<span>Please check the button.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
					return false;
				}
			}

			function hasCheckedGuard(){
				if (checkedGuard.length > 0){
					return true;
				}else{
					var toastContent = $('<span>Please Choose Guard.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
					return false;
				}
			}

		  function checkInput(){
		  	var reason = $('#strSwapReason').val();
		  	var checker;
		  	if (reason == ''){
		  		checker = false;
		  		var toastContent = $('<span>Check your input.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
		  	}else{
		  		checker = true;
		  	}
		  	return checker;
		  }
		});
	</script>
<!-- Request Swap Guard End -->

<!-- Request Remove Guard Start -->
	<script>
		$(document).ready(function(){
			var checkedGuard;
			var activeGuard;
			var countShift;

			$.ajax({
		    type: "GET",
		    url: "{{action('ClientGuardRequestController@getClientShiftCount')}}",
		    success: function(data){
		    	countShift = data;
		    },
		    error: function(data){
					var toastContent = $('<span>Error Database.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
		    }
			});//ajax

			$.ajax({
		    type: "GET",
		    url: "{{action('ClientGuardRequestController@getActiveGuard')}}",
		    success: function(data){
		    	activeGuard = data;
		    }//success
			});//get active guard

			$('#btnRemove').click(function(){
				setGuardChecked();
				if (!hasPendingRequest() && hasCheckedGuard() && isCountGuardEnough()){
					$('#strRemoveReason').val('');
					$('#checkRemove').attr('checked', false);
					$('#modalguardDelete').openModal();
				}
			});

			$('#btnRemoveGuard').click(function(){
				if (checkInput() && isAgree()){
					var strReason = $('#strRemoveReason').val().trim();

					$.ajax({
		        type: "POST",
		        url: "{{action('ClientGuardRequestController@removeGuard')}}",
		        beforeSend: function (xhr) {
		            var token = $('meta[name="csrf_token"]').attr('content');

		            if (token) {
		                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		            }
		        },
		        data: {
		        	arrGuardID: checkedGuard,
		        	reason: strReason
		        },
		        success: function(data){	
		        	swal({
								title: "Success!",
								text: "Request sent. Wait for the admin's response.",
								type: "success"
							},
							function(){
								window.location.href = '{{ URL::to("/clientguardrequest") }}';
							});
		        },
		        error: function(data){
							var toastContent = $('<span>Error Database.</span>');
							Materialize.toast(toastContent, 1500,'red', 'edit');
		        }
		    	});//send swap request
				}else{
					
				}
			});

			function setGuardChecked(){
				checkedGuard = [];
				$.each(activeGuard, function(index, value){
					if ($('#checkbox' + value.intGuardID).is(':checked')){
						checkedGuard.push(value.intGuardID);
					}
				});
			}

			function hasCheckedGuard(){
				if (checkedGuard.length>0){
					return true;
				}else{
					var toastContent = $('<span>Please select guard.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
					return false;
				}
			}

			function checkInput(){
				var reason = $('#strRemoveReason').val().trim();
				if (reason == ''){
					var toastContent = $('<span>Check Input.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
					return false;
				}else{
					return true;
				}
			}

			function isAgree(){
				if ($('#checkRemove').is(':checked')){
							return true;
						}else{
							var toastContent = $('<span>Please check the button.</span>');
							Materialize.toast(toastContent, 1500,'red', 'edit');
							return false;
						}
			}

			function hasPendingRequest(){
				var checker;
				$.ajax({
		      type: "GET",
		      url: "{{action('ClientGuardRequestController@hasGuardRequest')}}",
		      success: function(data){
		      	checker = data;
		      },
		      error: function(data){
							var toastContent = $('<span>Error Database.</span>');
						Materialize.toast(toastContent, 1500,'red', 'edit');

		      },async:false
		  	});//ajax

				if (checker){
					var toastContent = $('<span>You still have pending request.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
				}

				return checker;
			}

			function isCountGuardEnough(){
				var countActive = activeGuard.length;
				var countChecked = checkedGuard.length;
				
				console.log(countActive - countChecked);
				if ((countActive - countChecked) >= countShift){
					return true;
				}else{
					var toastContent = $('<span>Guards will not be enough for the shift.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
					return false;
				}
			}
		});
	</script>
<!-- Request Remove Guard End -->

<!-- Guard Information Start-->
	<script>
		$(document).ready(function(){

			refreshTable();

			$('#dataTable').on('click', '.buttonMore', function(){
				getGuardInformation(this.id);
				$('#modalguardDetails').openModal();
			});

			$('#btnAdd').click(function(){
				$('#modalguardAdd').openModal();
				$('#addNumberOfGuards').val(0);
				$('#addReason').val('');
			});

			function getGuardInformation(id){
				
				$.ajax({
			        type: "GET",
			        url: "/getInformation?guardID=" + id,
			        success: function(data){
			        	var birthday = moment(data.dateBirthday);
			        	var intAge = moment().diff(birthday, 'years');
			        	$('#strFirstName').text(data.strFirstName);
			        	$('#strMiddleName').text(data.strMiddleName);
			        	$('#strLastName').text(data.strLastName);
			        	$('#strAddress').text(data.address.strAddress + ' ' + data.address.strCityName + ', ' + data.address.strProvinceName);
			        	$('#strPlaceBirth').text(data.strPlaceBirth);
			        	$('#intAge').text(intAge);
			        	$('#strContactNumberMobile').text(data.strContactNumberMobile);
			        	$('#strContactNumberLandline').text(data.strContactNumberLandline);
			        	$('#strGender').text(data.strGender);
			        	$('#strCivilStatus').text(data.strCivilStatus);

			        }
			    });//ajax
			}

			function refreshTable(){
				$.ajax({
          type: "GET",
          url: "{{action('ClientGuardRequestController@getActiveGuard')}}",
          success: function(data){
          	var table = $('#dataTable').DataTable();
          	table.clear().draw();
          	$.each(data, function(index, value){
          		
          		var buttonMore = '<button data-position="bottom" data-delay="50" data-tooltip="Guard Details" class="tooltipped buttonMore btn col s12" id="'+value.intGuardID+'"><i class="material-icons">person_outline</i></button>';
          		var checkbox = '<input type="checkbox" id="checkbox'+value.intGuardID+'" value = "'+value.intGuardID+'"><label for="checkbox'+value.intGuardID+'"></label>'
          		var licenseNumber = '<h>'+value.strLicenseNumber+'</h>';
          		var name = '<h>'+value.strFirstName+' '+ value.strLastName +'</h>';
          		var gender = '<h>'+value.strGender+'</h>';
          		
          		table.row.add([
          			buttonMore,
          			checkbox,
          			licenseNumber,
          			name,
          			gender
          		]).draw();
          	});//foreach
          }//success
      	});//ajax
			}
		});
	</script>
<!-- Guard Information End-->

<!-- Others Start -->
	<script>
	    $(document).ready(function(){
	      $('.slider').slider({full_width: true});
	    });
		
		$("#dataTable").DataTable({
	         "columns": [
			{"orderable": false},
			{"orderable": false},
	        null,
	        null,
			null
	        ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			
		});
		
		$('#dataTable').on('click', '.buttonDelete', function(){
	        $('#modalguardDelete').openModal();            
	    });
	</script>
<!-- Others End -->
@stop