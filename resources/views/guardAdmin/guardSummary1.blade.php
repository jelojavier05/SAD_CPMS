@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection

@section('content')
<body onload="window.location='#acctscroll';">
<div class="row">
	<div class="col s12 push-s2">
		<nav>
			<div class="nav-wrapper blue darken-3">
				<div class="row">	
					<div class="col s12 offset-s1">
						<a href="{{URL::route('personaldata')}}" class="breadcrumb ci">Personal Data</a>
						<a href="{{URL::route('educationalbackground')}}" class="breadcrumb ci">Educational Background</a>
						<a href="{{URL::route('sgbackground')}}" class="breadcrumb ci">SG Background</a>
						<a href="{{URL::route('requirement')}}" class="breadcrumb ci">Requirements</a>
						<a href="{{URL::route('account')}}" class="breadcrumb ci">Account</a>
						<a href="{{URL::route('guardSummary')}}" class="breadcrumb ci">Summary</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>


<div class="row">
	<div class="col s5 push-s4" style="margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1 ci animated slideInDown"  style="border: 1px solid black; border-radius:5px;">
			<div class="row">
					<div class="col l12 offset-l2">
						
						 <legend><h4>Summary of Account</h4></legend>
				
					</div>
			</div>
				<div class="row">
					<div class="col s10 push-s1" style="overflow:scroll; overflow-x:hidden; height: 400px;">
						<ul class="collection with-header" id="collectionActive">
							<li class="collection-header" style=""><h5 style="font-weight:bold;">Account</h5></li>          	          		 
							<li class="collection-item" style="font-weight:bold; ">Username:<div style="font-weight:normal;" id = "username">&nbsp;&nbsp;&nbsp;</div>
							</li>		  		  	  
		  
							<li class="collection-item" style="font-weight:bold; ">Password:<div style="font-weight:normal;" id = "password">&nbsp;&nbsp;&nbsp;</div>
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
					
									<div class='col s4' style="font-weight:bold;">
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
								<li class="collection-item" style="font-weight:bold;" id = 'bodyAttribute{{$value->intBodyAttributeID}}'>{{$value->strBodyAttributeName}} - </li>
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
								<li></li>
							</div>
						</ul>
					</div>
				</div>
		</div>
		<div id="acctscroll">
			<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left animated slideInDown" href="#" id = "backSgSummary">Back</button>
			<button style="margin-top:20px;" class=" z-depth-2 btn-large green right" id = "btnSave">Save</button>
		</div>
	</div>
</div>
</body>

@stop

@section('script')
<script>
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "{{action('PersonalDataController@get')}}",
        success: function(data){

            if (data){
                var provinceID = data.province;
                var license = data.license;
                var address = data.address + " " + data.city.name + ", " + data.province.name;
                
                //text
                $('#firstName').text(data.firstName);
                $('#middleName').text(data.middleName);
                $('#lastName').text(data.lastName);
                $('#address').text(address);
                $('#age').text(getAge(data.dateOfbirth));
                $('#mobileNumber').text(data.contactCp);
                $('#gender').text(data.gender);
                $('#placeOfBirth').text(data.placeofbirth);
                $('#civilStatus').text(data.civilStatus);
                $('#landlineNumber').text(data.contactLandline);
                $('#licenseNumber').text(license.licenseNumber);
                
                //bodyattribute
                var bodyAttribute = data.bodyAttribute;
                for (intLoop = 0; intLoop < bodyAttribute.length; intLoop ++){
                	var str = $('#bodyAttribute' + bodyAttribute[intLoop].intBodyAttributeID).text() + ' ';
                	str += bodyAttribute[intLoop].strValue + " " + bodyAttribute[intLoop].measurement;

                    $('#bodyAttribute' + bodyAttribute[intLoop].intBodyAttributeID)
                        .text(str);
                }
            }else{

            }

        }
    }); //get personal data
    
    $.ajax({

        type: "GET",
        url: "{{action('SGBackgroundController@getGovernmentExam')}}",
        success: function(data){
            if (data){
                for (intLoop = 0; intLoop < data.length; intLoop ++){
                    $('#governmentExam' + data[intLoop].id).text(data[intLoop].name + " - " + data[intLoop].rating);
                }
            }else{

            }
        }
    }); //get govermentExam

    $.ajax({

        type: "GET",
        url: "{{action('SGBackgroundController@getArmedService')}}",
        success: function(data){
            if (data){

                $('#armedService').text(data.name + " - " + data.rankname);
            }else{

            }
        }
    }); //get armed service
    
    $.ajax({

        type: "GET",
        url: "{{action('AccountController@get')}}",
        success: function(data){
            if (data){

                $('#username').text(data.username);
                $('#password').text(data.password);
            }else{

            }
        }
    }); //get armed service
    
    $('#backSgSummary').click(function(){
        window.location.href = '{{ URL::to("/guard/registration/account") }}';
    });
    
    $('#btnSave').click(function(){
        $.ajax({

            type: "POST",
            url: "{{action('GuardRegistrationSummaryController@insert')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                swal({
						title: "Success!",
						text: "Guard has been registered!",
						type: "success"
					},
					function(){
					window.location.href = '{{ URL::to("/dashboardadmin") }}';
				});
            },
            error: function(data){
                swal("Oops!", "Please Check All Inputs", "warning");
            }
        });//ajax
    });
    
    function getAge(date){
        var year = date.substring(0,4);
        var month = date.substring(5,7);
        var day = date.substring(8,10);
        
        var birthday = month + "-" + day + "-" + year;
        
        var dateBirthday = new Date(birthday);
        var today = new Date();
        var age = Math.floor((today-dateBirthday) / (365.25 * 24 * 60 * 60 * 1000));
        
        return age;
    }
});

</script>
@stop