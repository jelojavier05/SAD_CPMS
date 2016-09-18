@extends('layout.maintenanceLayout')

@section('title')
Guard
@endsection

@section('content')

<div class="row">
    <div class="col s8 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:50px;">
            <div class="col s6">
                <h4 class="blue-text">Security Guard</h4>
            </div>

            <div class="col s3 offset-s3">
                <a style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green " href="/guard/registration/personaldata">
                    <i class="material-icons left">add</i> ADD
                </a>
            </div>
        
            <div class="row">
                <div class="col s12" style="margin-top:-5px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
								<th style="width:50px;"></th>
								<th style="width:50px;"></th>
                                <th>License Number</th>
                                <th>Name</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($guards as $value)
                            <tr>
                                <td>
                                    <button class="buttonUpdate btn" name="" id="">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <label for=""></label>
                                </td>
                                <td>
                                    <button class="buttonMore btn blue"  id="{{$value->intGuardID}}">
                                        MORE
                                    </button>
                                </td>
                                <td id = "">{{$value->GuardLicense->strLicenseNumber}}</td>
                                <td id = "">{{$value->strFirstName}} {{$value->strLastName}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class ="col s4" style=" margin-top:40px; overflow:scroll; overflow-x:hidden; height:500px;">
      <ul class="collection with-header" id="collectionActive">
		  <li class="collection-header" style=""><h5 style="font-weight:bold;">Details</h5></li>          	          		 
			  <li class="collection-item" style="font-weight:bold; ">Client:<div style="font-weight:normal;" id = "clientName">&nbsp;&nbsp;&nbsp;</div>
			  </li>		  		  	  
		  
		  	  <li class="collection-item" style="font-weight:bold; ">Status:<div style="font-weight:normal;" id = "guardStatus">&nbsp;&nbsp;&nbsp;</div>
			  </li>
		  
		  <li class="collection-header"><h5 style="font-weight:bold;">Personal Data</h5></li>
		  	  <li class="collection-item">
		  		<div class='row'>
					<div class='col s4' style="font-weight:bold;">
						First Name:<div style="font-weight:normal;" id = "firstName">&nbsp;&nbsp;&nbsp;</div>
					</div>
					
					<div class='col s4' style="font-weight:bold;">
						Middle Name:<div style="font-weight:normal;" id = "middleName">&nbsp;&nbsp;&nbsp;</div>
					</div>
					
					<div class='col s4' style="font-weight:bold;">
						Last Name:<div style="font-weight:normal;" id = "lastName">&nbsp;&nbsp;&nbsp;</div>
					</div>
				</div>
		  	  </li>
		  
		 	  <li class="collection-item" style="font-weight:bold; ">License Number:<div style="font-weight:normal;" id = "licenseNumber">&nbsp;&nbsp;&nbsp;</div>
			  </li>
		  	
		  	  <li class="collection-item" style="font-weight:bold; ">Address:<div style="font-weight:normal;" id = "address">&nbsp;&nbsp;&nbsp;</div>
			  </li>		  		  	  
		  
		  	  <li class="collection-item" style="font-weight:bold; ">Place of Birth:<div style="font-weight:normal;" id = "placeOfBirth">&nbsp;&nbsp;&nbsp;</div>
			  </li>
		  
		  	  <li class="collection-item">
		  		<div class='row'>
					<div class='col s4' style="font-weight:bold;">
						Age:<div style="font-weight:normal;" id = "age">&nbsp;&nbsp;&nbsp;</div>
					</div>
					
					<div class='col s4' style="font-weight:bold;">
						Gender:<div style="font-weight:normal;" id = "gender">&nbsp;&nbsp;&nbsp;</div>
					</div>
					
					<div class='ol s4' style="font-weight:bold;">
						Civil Status:<div style="font-weight:normal;" id = "civilStatus">&nbsp;&nbsp;&nbsp;</div>
					</div>
				</div>
		  	  </li>
		  
		  	  <li class="collection-item">
		  		<div class='row'>
					<div class='col s6' style="font-weight:bold;">
						Contact Number (Mobile):<div style="font-weight:normal;" id = "mobileNumber">&nbsp;&nbsp;&nbsp;</div>
					</div>
					
					<div class='col s6' style="font-weight:bold;">
						Contact Number (Landline):<div style="font-weight:normal;" id = "landlineNumber">&nbsp;&nbsp;&nbsp;</div>
					</div>										
				</div>
		  	  </li>
		  <li class="collection-header"><h5 style="font-weight:bold;">Body Attributes</h5></li>
		  	 <div> 
		  	 @foreach($bodyAttributes as $value)
		      <li class="collection-item" style="font-weight:bold;" id = 'bodyAttribute{{$value->intBodyAttributeID}}'>{{$value->strBodyAttributeName}}</li>
		      <li class="collection-item" style="font-weight:bold;" id = 'value{{$value->intBodyAttributeID}}'></li>
		  	 @endforeach
			  <li></li>
			 </div>
		  <li class="collection-header"><h5 style="font-weight:bold;">Armed Services</h5></li>
		  	 <div> 
		      <li class="collection-item" style="font-weight:bold;" id = 'armedService'></li>
			  <li></li>
			 </div>
		  <li class="collection-header"><h5 style="font-weight:bold;">Government Exams</h5></li>
		  	 <div> 
		  	 @foreach($governmentExams as $value)
		      <li class="collection-item" style="font-weight:bold;" id = 'governmentExam{{$value->intGovernmentExamID}}'>{{$value->strGovernmentExam}}</li>
		     @endforeach
			 </div>
		</ul>  
    </div>

<div id="modalRequirements" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:330px !important;">
    <div class="modal-header"><h2>Requirements</h2></div>
    
    <div class="modal-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
        <div class="row">
            <div class="col s3">
                <input type="checkbox" id="1" value = ""/>
                <label for="1" class="black-text">test1</label></br>
			
            </div>
			
			<div class="col s3">
                <input type="checkbox" id="2" value = ""/>
                <label for="2" class="black-text">test2</label></br>
			
            </div>
	
			<div class="col s3">
                <input type="checkbox" id="3" value = ""/>
                <label for="3" class="black-text">test3</label></br>
			
            </div>

			<div class="col s3">
                <input type="checkbox" id="4" value = ""/>
                <label for="4" class="black-text">test4</label></br>
			
            </div>

			<div class="col s3">
                <input type="checkbox" id="5" value = ""/>
                <label for="5" class="black-text">test5</label></br>
			
            </div>

        </div>
    </div>
    
    <div class="modal-footer" style="background-color:#01579b !important;">
        <button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
</div>


<!-- Change Detail Start -->
<div id="modalchangeDetails" class="modal modal-fixed-footer ci" style="overflow:hidden; width:800px !important; margin-top:10px !important;  max-height:100% !important; height:550px !important; border-radius:10px;">
	<div class="modal-header">
		<div class="h">
			<h3><center>Edit Details</center></h3>  
		</div>
	</div>
	<div class="modal-content sidenavhover " id="" style="overflow-x:hidden;" >
		<div class="row">
			<div class="col s4" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input placeholder=" " id="strFirstName" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">First Name</label> 
				</div>
			</div>
			<div class="col s4" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input  placeholder=" " id="strMiddleName" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Middle Name</label> 
				</div>
			</div>
			<div class="col s4" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input  placeholder=" " id="strLastName" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Last Name</label> 
				</div>
			</div>
			<div class="col s6">      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">store</i>
					<input placeholder=" " id="strAddress" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Address</label> 
				</div>
			</div>
			<div class="col s3">
				<div class=" input-field col s12">
					<select id = 'selectProvince'>
						
					</select>
				</div>
			</div>
			<div class="col s3">
				<div class=" input-field col s12">
					<select id = 'selectCity'>

					</select>
				</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px; color:#64b5f6;">star</i>
					<input type="date" id="dateOfbirth" class="datepicker"/>
					<label class="active" for="dateOfbirth">Date of Birth</label>
				</div>
			</div>
			<div class="col s6" >      
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">star</i>
					<input placeholder=" " id="strPlaceBirth" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Place of Birth</label> 
				</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size: 35px;">smartphone</i>
					<input placeholder=" " id="strContactNumberMobile" type="text" class="validate" name="" required="" aria-required="true"/>
					<label for="">Contact Number (Mobile)</label>
				</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size: 35px;">phone</i>
					<input placeholder=" " id="strContactNumberLandline" type="text" class="validate" name="" required="" aria-required="true"/>
					<label for="">Contact Number (Landline)</label>
				</div>
			</div>
			<div class="col s4 push-s2">
				<select id="selectCivilStatus">
					<option selected disabled>Civil Status</option>
					<option>Single</option>
					<option>Married</option>
					<option>Widowed</option>									
				</select>
			</div>
			<div class="col s4 push-s2">
				<select id="selectGender" >
					<option selected disabled>Gender</option>
					<option>Male</option>
					<option>Female</option>																			
				</select>
			</div>
			<div class="input-field col s10 push-s1 ci">                    
				<h5>Body Attributes:</h5>					
				<div class="row">						
					<div class="col s12">												
						<table class="striped white ci" id = 'tableBodyAttribute'>								
							<thead>									
								<tr>										
									<th><center>Name</center></th>										
									<th><center>Specification</center></th>                                        
									<th><center>Measurement</center></th>									
								</tr>								
							</thead>								
							<tbody>         
								<tr>
									<td><center>Wingspan</center></td>
									<td><input  id="" type="text" class="validate" pattern="[A-za-z0-9.,' ]{1,}" size="1" required="" aria-required="true">
                                                </center></td>
									<td><center>Inches</center></td>
								</tr>                       
							</tbody>							
						</table>						
					</div>					
				</div>				
			</div> 
		</div>
		<div class="row"></div>
	</div>
	<!-- Modal Button Save -->
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSaveDetails">Save
			<i class="material-icons right">send</i>
		</button>
	</div>	
</div>
<!-- Change Detail End -->

@stop
	
@section('script')


<script type="text/javascript">
	$(document).ready(function(){
        
        
        $("#dataTable").DataTable({
             "columns": [
            { "orderable": false },
            { "orderable": false },
            null,
            null
            ] ,  
            "pageLength":5,
            "lengthMenu": [5,10,15,20]
        });
		
        $('#dataTable').on('click', '.buttonMore', function(){
            $.ajax({

                type: "GET",
                url: "/getInformation?guardID=" + this.id,
                success: function(data){
                    console.log(data);
                    
                    var dob = new Date(data.dateBirthday);
                    var today = new Date();
                    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                    var bodyAttributesGuard = data.bodyAttributesGuard;
                    var bodyAttributes = data.bodyAttributes;
                    var armedService = data.armedService;
                    var governmentExamGuard = data.governmentExamGuard;
                    var governmentExam = data.governmentExam;
                    
                    $('#clientName').text(data.guardClient);
                    $('#guardStatus').text(getGuardStatus(data.guardStatus));
                    $('#firstName').text(data.strFirstName);
                    $('#middleName').text(data.strMiddleName);
                    $('#lastName').text(data.strLastName);
                    $('#licenseNumber').text(data.licenseNumber.strLicenseNumber);
                    $('#address').text(data.address.strAddress + ' ' + data.address.strCityName + ', ' + data.address.strProvinceName);
                    $('#age').text(age);
                    $('#gender').text(data.strGender);
                    $('#placeOfBirth').text(data.strPlaceBirth);
                    $('#mobileNumber').text(data.strContactNumberMobile);
                    $('#landlineNumber').text(data.strContactNumberLandline);
                    $('#civilStatus').text(data.strCivilStatus);
                    

                    if (bodyAttributesGuard){
                        for (intLoop = 0; intLoop < bodyAttributes.length; intLoop ++){
                            $('#bodyAttribute' + bodyAttributes[intLoop].intBodyAttributeID)
                                .text(bodyAttributes[intLoop].strBodyAttributeName);
                            $('#value' + bodyAttributes[intLoop].intBodyAttributeID)
                                .text('N/A');
                            for (intLoop2 = 0; intLoop2 < bodyAttributesGuard.length; intLoop2 ++){
                                if (bodyAttributes[intLoop].intBodyAttributeID == bodyAttributesGuard[intLoop2].intBodyAttributeID){
                                    $('#value' + bodyAttributesGuard[intLoop2].intBodyAttributeID)
                                        .text(bodyAttributesGuard[intLoop2].strValue + ' ' +bodyAttributesGuard[intLoop2].strMeasurement);
                                    break;
                                }    
                            }
                        } //bodyAttribute
                    }else{
                        bodyAttributes.forEach(function(item){
                            $('#bodyAttribute' + item.intBodyAttributeID)
                                .text(item.strBodyAttributeName);
                            $('#value' + item.intBodyAttributeID)
                                .text('N/A');
                        });
                    }//bodyAttribute       
                    
                    if (armedService){
                        $('#armedService').text(armedService.strArmedServiceName + " - " + armedService.strRank);    
                    }else{
                        $('#armedService').text('N/A');    
                    } //armedservice
                    
                    if (governmentExamGuard){
                        for(intLoop = 0; intLoop < governmentExam.length; intLoop ++){
                            var temp = governmentExam[intLoop].strGovernmentExam + ' - ';
                            var checker = true;
                            for (intLoop2 = 0; intLoop2 < governmentExamGuard.length; intLoop2 ++){
                                if (governmentExam[intLoop].intGovernmentExamID == governmentExamGuard[intLoop2].intGovernmentExamID){
                                    temp += governmentExamGuard[intLoop2].strRating;
                                    checker = false;
                                    break;
                                }
                            }
                            
                            if (checker){
                                temp += 'N/A';
                            }
                            
                            $('#governmentExam' + governmentExam[intLoop].intGovernmentExamID).text(temp);
                        }
                    }else{
                        governmentExam.forEach(function(item){
                           $('#governmentExam' + item.intGovernmentExamID).text(item.strGovernmentExam + ' - N/A');
                        });
                    }
                },
                error: function(data){
                    var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');

                }
            });//ajax

        });

        function getGuardStatus(status){
            if (status == 0){
                return 'Waiting';
            }else if (status == 1 || status == 5){
                return 'Pending';
            }else if (status == 2){
                return 'Deployed';
            }else if (status == 3){
                return 'On Leave';
            }else if (status == 4){
                return 'Reliever';
            }
        }
	});
    
    
</script>
@stop

