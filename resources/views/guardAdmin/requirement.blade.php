@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection

@section('content')

<div class="row">
	<div class="col s12 push-s2">
		<nav>
			<div class="nav-wrapper blue darken-1">
				<div class="row">	
					<div class="col s12 offset-s1">
						<a href="{{URL::route('personaldata')}}" class="breadcrumb ci">Personal Data</a>
						<a href="{{URL::route('educationalbackground')}}" class="breadcrumb ci">Educational Background</a>
						<a href="{{URL::route('sgbackground')}}" class="breadcrumb ci">SG Background</a>
						<a href="{{URL::route('requirement')}}" class="breadcrumb ci">Requirements</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col s6 push-s4" style="margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1 ci animated slideInLeft" style="border: 1px solid black; border-radius:5px;">
			<div class="row">
					<div class="col l12 offset-l4">
						
						 <legend><h4>Requirements</h4></legend>
				
					</div>
			</div>
			<div class="row">
				
				<div class="col s6 push-s1">
					
					<div class="col s9">
<!--
						<div class="file-field input-field">
						  <div class="btn blue green darken-2">
							<span>Photo</span>
							<input type="file">
						  </div>
						  <div class="file-path-wrapper col s7">
							<input class="file-path validate" type="text">
						  </div>
						</div>
-->
						
<!--
						<div id="picUpload" class="dropzone">
      						<div class="dz-default dz-message">Drag your Picture Here</div>
						</div>
-->
						<form action="{{ url('user/upload')}}" class="dropzone" id="my-awesome-dropzone">
							<div class="dz-default dz-message">Drag your Picture Here</div>
						</form>
						
					</div>
				</div>
				
				
				
				<div class="col s6">
				    @foreach($requirements as $requirement) 
                       <div class="col s12" style="margin:1%;">
                            <input type="checkbox" id="requirements{{$requirement->intRequirementsID}}" value = "{{$requirement->intRequirementsID}}"/>
                            <label for="requirements{{$requirement->intRequirementsID}}" class="black-text">{{$requirement->strRequirements}}</label></br>
                       </div>
                    @endforeach
				</div>
			</div>
		</div>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left animated slideInLeft" id = "backRequirement">Back</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right animated slideInLeft" id = "nextRequirement">Next</button>
	</div>
</div>
@stop

@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        
        var requirement = [];
        
        $.ajax({

            type: "GET",
            url: "{{action('RequirementController@get')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                
                if (data){
                    
                    console.log(data);
                    
                    for (intLoop = 0; intLoop < data.length; intLoop ++){
                        $("#requirements" + data[intLoop]).attr( "checked", true );        
                    }
                }else{
                    //wala
                }
            }
        }); //
        
        $('#backRequirement').click(function(){
            window.location.href = '{{ URL::to("/guard/registration/sgbackground") }}';
        });
        
        $('#nextRequirement').click(function(){
            getCheckedRequirement();
            sendData();
            window.location.href = '{{ URL::to("/guard/registration/account") }}';
        });
        
        function getCheckedRequirement(){
            $.ajax({

                type: "GET",
                url: "{{action('RequirementsController@getRequirement')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: { 
                    
                },
                success: function(data){
                    var intCounter = 0;
                    
                    for(intLoop = 0; intLoop < data.length; intLoop ++){
                        if (data[intLoop]['boolFlag'] == 1 && data[intLoop]['intIdentifier'] >= 2){
                            var reqID = 'requirements' + data[intLoop]['intRequirementsID'];
                            if ($('#' + reqID).is(':checked')){
                                requirement[intCounter] = data[intLoop]['intRequirementsID'];
                                intCounter++;
                            }
                        }
                    }  
                    
                    console.log(requirement);
                },
                
                error: function(data){
                    
                }, async:false 
                
            });//ajax
        }
        
        function sendData(){
            
            $.ajax({

                type: "POST",
                url: "{{action('RequirementController@post')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    requirement:requirement
                },
                success: function(data){

                },
                error: function(data){
                    confirm('error send data');
                }
            });//ajax
        }
        
    });
        
</script>

<script>
//	$("div#my-awesome-dropzone").dropzone({ url: "/file/post" });


//$(document).ready(function () {
//    Dropzone.autoDiscover = false;
//    $("#picUpload").dropzone({
//        url: "",
//        addRemoveLinks: true,
//        success: function (file, response) {
//            var imgName = response;
//            file.previewElement.classList.add("dz-success");
//            console.log("Successfully uploaded :" + imgName);
//        },
//        error: function (file, response) {
//            file.previewElement.classList.add("dz-error");
//        }
//    });
//});

</script>

@stop