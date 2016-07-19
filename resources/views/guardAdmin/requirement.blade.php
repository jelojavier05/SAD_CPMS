@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style="margin-left:10px;">
		<nav>
			<div class="nav-wrapper blue">
				<div class="row">	
					<div class="col s12">
						<a href="{{URL::route('personaldata')}}" class="breadcrumb">Personal Data</a>
						<a href="{{URL::route('educationalbackground')}}" class="breadcrumb">Educational Background</a>
						<a href="{{URL::route('sgbackground')}}" class="breadcrumb">SG Background</a>
						<a href="{{URL::route('requirement')}}" class="breadcrumb">Requirements</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>
<!----------------------------------------------PAGES-------------------------------------->
<div class="row">
	<div class="col s6 push-s4" style="margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
			<legend><h4>Requirements</h4></legend></br>
			<div class="row">
				
				<div class="col s6">
					<div class="col s11 push-s1">	
						<img class="materialboxed circle hoverable" width="150px;" height="150px;" src="{!! URL::asset('../Materialize/images/avatar5.png') !!}"/>
					</div>
					<div class="col s12">
						<div class="file-field input-field">
						  <div class="btn blue">
							<span>File</span>
							<input type="file">
						  </div>
						  <div class="file-path-wrapper col s5">
							<input class="file-path validate" type="text">
						  </div>
						</div>
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
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" id = "backRequirement">Back</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextRequirement">Next</button>
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
                    requirement = [];
                    for(intLoop = 0; intLoop < data.length; intLoop ++){
                        if (data[intLoop]['boolFlag'] == 1 && data[intLoop]['intIdentifier'] >= 2){
                            var reqID = 'requirements' + data[intLoop]['intRequirementsID'];
                            if ($('#' + reqID).is(':checked')){
                                requirement[intCounter] = data[intLoop]['intRequirementsID'];
                                intCounter++;
                            }
                        }
                    }  
                },
                
                error: function(data){
                    
                }
                
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

@stop