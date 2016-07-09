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
					</div>
				</div>
			</div>
		</nav>
	</div>
</div><!--breadcrumbs-->

<div class="row">
    <div class="col s8 push-s3" style="margin-left:10px;">
        <div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
            <legend><h4>Educational Background</h4></legend>
            <table class="highlight white" height="100%" width="100%" style="border:1 px solid black; ">
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Name of School</th>
                        <th>Inclusive Dates of Attendance</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <p>Primary</p>
                        </td>
                        <td> 
                            <input  id="schoolNamePrimary" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
                            <label data-error="Incorrect" for="schoolevel"></label>
                        </td>

                        <td>
                            <label>From</label>
                            <select id="fromPrimary">
                                <option value="" disabled selected>----</option>
                            </select>   

                            <select id="toPrimary">
                                <option value="" disabled selected>----</option>  
                                
                            </select>
                        </td>
                        
                    </tr>
                    
                    <tr>
                        <td>
                            <p>Secondary</p>
                        </td>   
                        <td> 
                            <input  id="schoolNameSecondary" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
                            <label data-error="Incorrect" for="schoolevel"></label>
                        </td>

                        <td>
                            <label>From</label>
                            <select id="fromSecondary">
                                <option value="" disabled selected>----</option>
                                
                            </select>
                            <label></label>
                            <select id = "toSecondary">
                                <option value="" disabled selected>----</option>  
                                
                            </select>
                        </td>
                    </tr>
                    
                    <tr>

                    <td>
                        <p>Tertiary</p>
                    </td>

                    <td> 
                        <input  id="schoolNameTertiary" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
                        <label data-error="Incorrect" for="schoolevel"></label>
                    </td>

                    <td>
                        <label>From</label>
                        <select id = "fromTertiary">
                            <option value="" disabled selected>----</option>
                           
                        </select>

                        <label></label>

                        <select id = "toTertiary">
                            <option value="" disabled selected>----</option>  
                            
                        </select>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
        
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" id = "backEducation">Back</button>
        
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextEducation">Next</button>
        
	</div>
</div>
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('select').material_select();
        var $fromPrimary = $("#fromPrimary");
        var $toPrimary = $("#toPrimary");
        var $fromSecondary = $("#fromSecondary");
        var $toSecondary = $("#toSecondary");
        var $fromTertiary = $("#fromTertiary");
        var $toTertiary = $("#toTertiary");
        
        for(intLoop = (new Date).getFullYear(); intLoop >= 1980; intLoop --){
            
            $fromPrimary.append(
                $("<option></option>")
                .attr("id",intLoop)
                .text(intLoop)
            );
            
            $toPrimary.append(
                $("<option></option>")
                .attr("id",intLoop)
                .text(intLoop)
            );
            $fromSecondary.append(
                $("<option></option>")
                .attr("id",intLoop)
                .text(intLoop)
            );
            $toSecondary.append(
                $("<option></option>")
                .attr("id",intLoop)
                .text(intLoop)
            );
            $fromTertiary.append(
                $("<option></option>")
                .attr("id",intLoop)
                .text(intLoop)
            );
            $toTertiary.append(
                $("<option></option>")
                .attr("id",intLoop)
                .text(intLoop)
            );
            
        }
        
        
        
        $('#backEducation').click(function(){
            window.location.href = '{{ URL::to("/guard/registration/personaldata") }}';
        });
        
        $('#nextEducation').click(function(){
            sendData();
            //window.location.href = '{{ URL::to("/guard/registration/sgBackground") }}';
            
        });
        
        function sendData(){
            var fromPrimary = $('#fromPrimary').children(":selected").attr("id");
            var toPrimary = $('#toPrimary').children(":selected").attr("id");
            var fromSecondary = $('#fromSecondary').children(":selected").attr("id");
            var toSecondary = $('#toSecondary').children(":selected").attr("id");
            var fromTertiary = $('#fromTertiary').children(":selected").attr("id");
            var toTertiary = $('#toTertiary').children(":selected").attr("id");
            
            $.ajax({

                type: "POST",
                url: "{{action('GuardRegistrationController@educationalBackgroundSession')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    
                    schoolNamePrimary: $('#schoolNamePrimary').val(),
                    fromPrimary:fromPrimary,
                    toPrimary:toPrimary,
                    schoolNameSecondary:$('#schoolNameSecondary').val(),
                    fromSecondary:fromSecondary,
                    toSecondary:toSecondary,                    
                    schoolNameTertiary:$('#schoolNameTertiary').val(),
                    fromTertiary:fromTertiary,
                    toTertiary:toTertiary,
                },
                success: function(data){
                    
                },
                error: function(data){
                    
                }
            });//ajax
        }
        
    });    
</script>
@stop