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
	<div class="col s10 push-s2" style="margin-left:10px;">
		
				                <div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
									<legend><h4>Armed Services</h4></legend>
                                    <div class="row" style="margin:5%;">
					
					                   <div class="row">
                                            <div class="input-field col s5">
                                                <select id = "" name = "strTypeOfGun">
                                                    <option disabled selected   >Choose armed services if any</option>
<!--                                                    
                                                        <option>test</option>

                                                </select>
                                                <label>Armed Service</label>
                                            </div>
                                        </div>
					
<!--
				                    </div>
				
				                    <div class="row" style="margin:5%;">
-->
					                   <div class="input-field col s6">
                                            
                                            <input  id="rank" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true" >
                                            <label data-error="Incorrect" for="rank">Rank</label>

					                   </div>
					
					                   <div class="input-field col s6">
                        
                                            <input  id="armedServiceYear" type="date" class="datepicker"  required="" aria-required="true">
                                            <label class="active" data-error="Incorrect" for="armedServiceYear">Armed Service Year</label>

					                   </div>
<!--
				                    </div>
                
                                    <div class="row" style="margin:5%;">
-->
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
                    
                                        
<!--
				                    </div>

                                    <div class="row" style="margin:5%;">
-->
				
					                   <div class="input-field col s12">
                                            <p>Government Exam:</p>
										   		<table class="highlight white">
										   			<thead>
														<tr>
															<th></th>
                                                            <th>Name</th>
															<th>Ratings</th>
															<th>Date Taken</th>
														</tr>
													</thead>
													
													<tbody>
                                                            <tr>
                                                                <td>
                                                                    <div>


                                                                        <input type="checkbox" id="" />
      																	<label for=""></label>


                                                                    </div>
                                                                </td>

                                                                <td>

                                                                </td>

                                                                <td>
                                                                    <div>
                                                                        <input size="9" id="rating" type="text" class="validate" pattern="[A-za-z0-9 ]{1,}" required="" aria-required="true">
                                                                        <label data-error="Incorrect" for="rating"></label>

                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div>
                                                                        <input id="dateTaken" type="date" class="validate"  required="" aria-required="true">
                                                                        <label data-error="Incorrect" for="dateTaken"></label>

                                                                    </div>
                                                                </td>
                                                            </tr>

													</tbody>
										   		</table>

					
					
				                        </div>

										
										
					
				                    </div>
				
				 					<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#">Back</button>
									<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" href="#">Next</button>
                                </div>
	</div>
</div>
		</div>
	</div>
<!-------------------------------------Personal Data Page End---------------------------------->

@stop