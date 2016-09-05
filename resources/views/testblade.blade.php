@extends('layout.maintenanceLayout')

@section('title')
Test
@endsection

@section('content')

<div class="row">
    <div class="col s8 push-s3" style="margin-left:10px;">
        <div class="container-fluid grey lighten-4 z-depth-1 ci animated slideInLeft" style="border: 1px solid black; border-radius:5px;">
           <div class="row">
					<div class="col l12 offset-l4">
						
						 <legend><h4>Armed Services</h4></legend>
				
					</div>
			</div>
			
            <div class="row">		
				<div class="col s10 push-s1">
                    <div class = "input-field col s4 offset-s8 pull-s8">    
                        <select id = "armedService" >
                            <option disabled selected value = "0">Choose armed services if any</option>
                            @foreach($armedservices as $armedservice)
                                <option id = "option{{$armedservice->intArmedServiceID}}" value = "{{$armedservice->intArmedServiceID}}">{{$armedservice->strArmedServiceName}}</option>
                            @endforeach
                        </select>
						<label data-error="Incorrect" for="armedService">Armed Service</label>
                    </div>
                     <div class="input-field col s6">
                        <select id = "armedServiceRank">
                            <option value="" disabled selected>Choose Rank</option>  
                        </select>
                        <label data-error="Incorrect" for="armedServiceRank">Rank</label>
                    </div>
					<div class="input-field col s6">
                        <select id = "armedServiceYear">
                            <option value="" disabled selected>----</option>  
                        </select>
                        <label data-error="Incorrect" for="armedServiceYear">Year</label>
                    </div>
						
                    
                    <div class="input-field col s6">
                        <input class="with-gap" name="radio" type="radio" id="dischargedHonorably" value = "Honorably"/>
                        <label for="dischargedHonorably">Discharged Honorably</label>
                        <input class="with-gap" name="radio" type="radio" id="dischargedDishonorably"  value="Dishonorably"/>
                        <label for="dischargedDishonorably">Discharged Dishonorably</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder = " " id="reason" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true" >
                        <label data-error="Incorrect" for="reason">Reason</label>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
 
<!--gov exam	-->

<div class ="row">
    <div class = "col s8 push-s3" style="margin-left:10px;">
        <div class="container-fluid grey lighten-4 z-depth-1 ci animated slideInLeft" style="border: 1px solid black; border-radius:5px;">
              <div class="row">
					<div class="col l12 offset-l4">
						
						 <legend><h4>Government Exam</h4></legend>
				
					</div>
			</div>
			
			<button style="margin-top:-10%; margin-left:700px;" class="z-depth-1 btn green modal-trigger" href="#modalgovexamAdd">
            <i class="material-icons left">add</i> ADD
            </button>
            <table class="striped white" id = "dataTable">
                <thead>
                    <tr>
						<th style="width:50px;"></th>
                        <th style="width:50px;"></th>
                        <th>Name</th>
                        <th>Ratings</th>
                        <th>Date Taken</th>
                    </tr>
                </thead>
                <tbody> 

                </tbody>
            </table>
        </div>
        <button style="margin-top:20px;" class=" z-depth-2 btn-large blue left animated slideInLeft" id="backArmed">Back</button>
        <button style="margin-top:20px;" class=" z-depth-2 btn-large blue right animated slideInLeft" id = "nextArmed">Next</button>
    </div>
</div>
	
@stop

@section('script')

<script>
$('.datepicker').pickadate({
    selectMonths: true, 
    selectYears: 15 
  });
</script>

@stop