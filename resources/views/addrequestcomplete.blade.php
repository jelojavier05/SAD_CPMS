@extends('layout.maintenanceLayout')

@section('title')
Add Request Completion
@endsection

@section('content')

<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Guards</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s8 push-s3" style="margin-top:-4%">
    <ul class="collection with-header">
	    <li class="collection-header">
	    	<div class="row">
	    		<div class="col s1">
	    			<div style="font-weight:bold;"><h5>Client:</div>
	    		</div>

	    		<div class="col s3">
	    			<div><h5>LandBank</h5></div>
	    		</div>

	    		<div class="col s4">
	    			<div style="font-weight:bold;"><h5>Number of Guards:</div>
	    		</div>

	    		<div class="col s2">
	    			<div><h5>10</h5></div>
	    		</div>
	    	</div>
	    </li>

	    <li class="collection-item">
	    	<table class="striped white" style="border-radius:10px;" id="tableConfirmedGuards">
                    	   <thead>
                            <tr>
                                <th style="width:50px;" class="grey lighten-1 "></th>                                
                                <th class="grey lighten-1 ">Guard License</th>
                                <th class="grey lighten-1 ">Name</th>
                                <th class="grey lighten-1 ">Gender</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        	@foreach ($requestInformation->guards as $value)
                            <tr>
							
								<td><button class="btn blue darken-4 buttonGuardDetails" id = '{{$value->intGuardID}}'><i class="material-icons">chevron_right</i></button></td>
								<td>{{$value->strLicenseNumber}}</td>
								<td>{{$value->strFirstName}} {{$value->strLastName}}</td>
								<td>{{$value->strGender}}</td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
	    </li>
    </ul>
    </div>
</div>

<!--modal guard details-->
<div id="modalGuardDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:500px !important; border-radius:10px;">      
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
								First Name:<div style="font-weight:normal;" id = 'firstName'>&nbsp;&nbsp;&nbsp;</div>
							</div>
							
							<div class="col s4">	
								Middle Name:<div style="font-weight:normal;" id = 'middleName'>&nbsp;&nbsp;&nbsp;</div>
							</div>
							
							<div class="col s4">	
								Last Name:<div style="font-weight:normal;" id = 'lastName'>&nbsp;&nbsp;&nbsp;</div>
							</div>
														
						</div>
						
						<div class="row">
							<div class="col s12">
								Address:<div style="font-weight:normal;" id = 'addressGuard'>&nbsp;&nbsp;&nbsp;</div>
							</div>																					
						</div>
						
						<div class="row">
							<div class="col s6">
								Place of Birth:<div style="font-weight:normal;" id = 'placeOfBirth'>&nbsp;&nbsp;&nbsp;</div>
							</div>
							
							<div class="col s6">
								Age:<div style="font-weight:normal;" id = 'age'>&nbsp;&nbsp;&nbsp;</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								Contact Number (Mobile):<div style="font-weight:normal;" id = 'mobileNumber'>&nbsp;&nbsp;&nbsp;</div>
							</div>
							
							<div class="col s6">
								Contact Number (Landline):<div style="font-weight:normal;" id = 'landlineNumber'>&nbsp;&nbsp;&nbsp;</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								Gender:<div style="font-weight:normal;" id = 'gender'>&nbsp;&nbsp;&nbsp;</div>
							</div>
							
							<div class="col s6">
								Civil Status:<div style="font-weight:normal;" id = 'civilStatus'>&nbsp;&nbsp;&nbsp;</div>
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

@stop


@section('script')
<script>
$("#tableConfirmedGuards").DataTable({             
 "columns": [     
 {"orderable": false},
 null,
 null,
 null,
 ] ,  
 "pageLength":5,
 "lengthMenu": [5,10,15,20],		
});

 $('#tableConfirmedGuards').on('click', '.buttonGuardDetails', function(){
	 $.ajax({
            type: "GET",
            url: "/getInformation?guardID=" + this.id,
            success: function(data){

                var dob = new Date(data.dateBirthday);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                var bodyAttributesGuard = data.bodyAttributesGuard;
                var bodyAttributes = data.bodyAttributes;
                var armedService = data.armedService;
                var governmentExamGuard = data.governmentExamGuard;
                var governmentExam = data.governmentExam;

                $('#firstName').text(data.strFirstName);
                $('#middleName').text(data.strMiddleName);
                $('#lastName').text(data.strLastName);
                $('#licenseNumber').text(data.licenseNumber.strLicenseNumber);
                $('#addressGuard').text(data.address.strAddress + ' ' + data.address.strCityName + ', ' + data.address.strProvinceName);
                $('#age').text(age);
                $('#gender').text(data.strGender);
                $('#placeOfBirth').text(data.strPlaceBirth);
                $('#mobileNumber').text(data.strContactNumberMobile);
                $('#landlineNumber').text(data.strContactNumberLandline);
                $('#civilStatus').text(data.strCivilStatus);
            }
         
        });//ajax

	$('#modalGuardDetails').openModal(); 
 });
	
$("#btnProceed").click(function(){

	swal({   title: "Confirm Password",
			text: "Please Enter Password",
			type: "input",
			inputType: "password",
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "slide-from-top",
			inputPlaceholder: "Enter Password"
            })
});
</script>
@stop