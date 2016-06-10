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
						<a class="breadcrumb">Personal Data</a>
						<a class="breadcrumb">Educational Background</a>
						<a class="breadcrumb">Armed Services</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

<!----------------------------------------------PAGES-------------------------------------->
<!-------------------------------------Military Training Page Start---------------------------------->
<div class="row">
	<div class="col s8 push-s3" style="margin-left:10px;">
		
				                <div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
									<legend><h4>Armed Services</h4></legend>
                                    <div class="row" style="margin:5%;">
					
					              <div class="row">
                                      <div class = "col s7">    
                                                <select id = "" name = "strTypeOfGun">
                                                    <option disabled selected   >Choose armed services if any</option>
                                                    @foreach($armedservices as $armedservice)
                                                        <option id = "option{{$armedservice->intArmedServiceID}}">{{$armedservice->strArmedServiceName}}</option>
                                                    @endforeach
										  		</select>
									  </div>
					                   <div class="input-field col s6">
                                            
                                            <input  id="rank" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true" >
                                            <label data-error="Incorrect" for="rank">Rank</label>

					                   </div>
					
					                   <div class="input-field col s6">
                        
                                            <input  id="armedServiceYear" type="date" class="datepicker"  required="" aria-required="true">
                                            <label class="active" data-error="Incorrect" for="armedServiceYear">Armed Service Year</label>

					                   </div>
					                   <div class="input-field col s6">
						                  <input class="with-gap" name="discharge" type="radio" id="dischargedHonorably" />
    											<label for="dischargedHonorably">Discharged Honorably</label>
										  <input class="with-gap" name="discharge" type="radio" id="dischargedDishonorably"  />
    											<label for="dischargedDishonorably">Discharged Dishonorably</label>
					                   </div>
										
									   <div class="input-field col s6">
                                            
                                            <input  id="reason" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
                                            <label data-error="Incorrect" for="reason">Reason</label>

					                   </div>
				
					                   

										
										
					
				                    </div>
                                </div>
                    <button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" id="backArmed">Back</button>
                    <button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextArmed">Next</button>
	</div>
</div>
		</div>
	</div>
<!-------------------------------------Personal Data Page End---------------------------------->

@stop
    

@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        
        $('#backArmed').click(function(){
            window.location.href = '{{ URL::to("/guardRegistration/educationalBackground") }}';
        });
        
        $('#nextArmed').click(function(){
            window.location.href = '{{ URL::to("/guardRegistration/governmentExam") }}';
        });
        
    });
        
</script>

@stop