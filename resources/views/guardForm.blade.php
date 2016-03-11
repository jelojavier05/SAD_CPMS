@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection

@section('content')


<div class="row">
                <div class="col s12 push-s1">
                    <div class="container white z-depth-2" style="border-radius: 15px; padding:3%;">
                       
			
				             <legend><h4>Personal Data</h4></legend>
				                <div class="container-fluid grey lighten-4" style="border: 1px solid black;">
                                     
                                    <div class="row" style="margin:5%;">
					
                    
                                        <div class="input-field col s4">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input  id="firstName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
                                                            <label data-error="Incorrect" for="firstName">First Name</label>

                                        </div>
					
                                        <div class="input-field col s4">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input  id="middleName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
                                                            <label data-error="Incorrect" for="middleName">Middle Name</label>

                                        </div>
					
                                        <div class="input-field col s4">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input  id="lastName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
                                                            <label data-error="Incorrect" for="lastName">Last Name</label>

                                        </div>
					
<!--
				                    </div>
				
				
				
				
				
				                    <div class="row" style="margin:5%;">
-->
					                    <div class="input-field col s6">
                                            <i class="material-icons prefix">home</i>
                                            <input  id="address" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">

                                            <label data-error="Incorrect" for="address">Address</label>

					                   </div>
					
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">home</i>
                                            <input  id="provaddress" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">
										    <label data-error="Incorrect" for="provaddress">Provincial Address</label>

					                    </div>
<!--
				                    </div>
				
				                    <div class="row" style="margin:5%;">
-->
					
                                        <div class="input-field col s6">
                                            <input  id="dateOfbirth" type="date" class="datepicker"  required="" aria-required="true">
                                            <label class="active" data-error="Incorrect" for="dateOfbirth">Date of Birth</label>

					                    </div>
                    
                    
                                        <div class="input-field col s6">
						                      <input  id="placeofbirth" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">
										      <label data-error="Incorrect" for="placeofbirth">Place of Birth</label>

					                    </div>
					
					
<!--
				                    </div>
				
				
				                    <div class="row" style="margin:5%;">
-->
					                   <div class="input-field col s6">
                                            <i class="material-icons prefix">smartphone</i>
                                            <input  id="contactCp" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
                                            <label data-error="Incorrect" for="contactCp">Contact Number (Mobile)</label>

					                   </div>
					                   <div class="input-field col s6">
                                            <i class="material-icons prefix">phone</i>
                                            <input  id="contactLandline" maxlength="10" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
                                            <label data-error="Incorrect" for="contactLandline">Contact Number (Landline)</label>

					                   </div>
<!--
				                    </div>
                    
                                    <div class="row" style="margin:5%;">
-->
					
                    
					                   <div class="input-field col s4">
                                              <input  id="citizenship" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
                                              <label data-error="Incorrect" for="citizenship">Citizenship</label>

					                   </div>
					
					                   <div class="input-field col s4">
                                              <input  id="civilStatus" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
                                              <label data-error="Incorrect" for="civilStatus">Civil Status</label>

					                   </div>
					
					                   <div class="input-field col s4">
                        
                                             <select>
                                                  <option value="" disabled selected>Choose</option>
                                                  <option value="1">Male</option>
                                                  <option value="2">Female</option>
                                             </select>
                                            <label>Sex</label>
					                   </div>
					
				                    </div>
                                </div>  
                <!-- Personal Data End == educ bg start -->  
                            
                            
                        
                        <legend><h4>Educational Background</h4></legend>
                            <div class="container-fluid grey lighten-4" style="border: 1px solid black;">

                                <table class="highlight white" height="100%" width="100%">
                                    
                                </table>
                        
                            </div>
                            
                           
                
                            
                               
                               
                 <!-- Educational Background End -->
                        
                            <legend><h4>Military Training (If Any)</h4></legend>
				                <div class="container-fluid grey lighten-4" style="border: 1px solid black;">
                                    <div class="row" style="margin:5%;">
					
					                   <div class="input-field col s12">
                                            <p>Armed Services:</br>
                                                <input type="checkbox" id="pa" />
                                                <label for="pa">PA</label></br>



                                                <input type="checkbox" id="pn" />
                                                <label for="pn">PN</label></br>



                                                <input type="checkbox" id="paf" />
                                                 <label for="paf">PAF</label></br>



                                                  <input type="checkbox" id="pnp" />
                                                  <label for="pnp">PNP</label></br>



                                                  <input type="checkbox" id="rotc" />
                                                  <label for="rotc">ROTC</label></br>
                                            </p>

					                   </div>
					
<!--
				                    </div>
				
				                    <div class="row" style="margin:5%;">
-->
					                   <div class="input-field col s6">
                                            
                                            <input  id="rank" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
                                            <label data-error="Incorrect" for="rank">Rank</label>

					                   </div>
					
					                   <div class="input-field col s6">
                        
                                            <input  id="armedServiceYear" class="datepicker"  required="" aria-required="true">
                                            <label data-error="Incorrect" for="armedServiceYear">Armed Service Year</label>

					                   </div>
<!--
				                    </div>
                
                                    <div class="row" style="margin:5%;">
-->
					                   <div class="input-field col s6">
						                  <input  id="dischargeHonor" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
										  <label data-error="Incorrect" for="dischargeHonor">Discharged Honorably</label>

					                   </div>
                    
                                        <div class="input-field col s6">
						                  <input  id="dischargeDishonor" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
										  <label data-error="Incorrect" for="dischargeDishonor">Discharged Dishonorably</label>

					                    </div>
					
					
<!--
				                    </div>

                                    <div class="row" style="margin:5%;">
-->
				
					                   <div class="input-field col s12">
                                            <p>Government Exam:</br>
                                              <input type="checkbox" id="exam1" />
                                              <label for="exam1">Exam 1</label></br>
                       
                                              <input type="checkbox" id="exam2" />
                                              <label for="exam2">Exam 2</label></br>
                       
                                              <input type="checkbox" id="exam3" />
                                              <label for="exam3">Exam 3</label></br>
                       
                                              <input type="checkbox" id="exam4" />
                                              <label for="exam4">Exam 4</label></br>
                       
                                              <input type="checkbox" id="exam5" />
                                              <label for="exam5">Exam 5</label></br>
                                            </p>

<!--
					                   </div>
					
                                       <div class="row" style="margin:5%;">
-->
					                       <div class="input-field col s6">
                                              <input  id="rating" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
                                              <label data-error="Incorrect" for="rating">Rating</label>

					                   </div>
                    
                                            <div class="input-field col s6">
                        
                                            <input  id="dateTaken" class="datepicker"  required="" aria-required="true">
                                            <label data-error="Incorrect" for="dateTaken">Date Taken</label>

					                       </div>
					
					
				                        </div>
					
				                    </div>
				
				 <button class="btn waves-effect waves-light right" type="submit" name="action1" style="margin-right: 30px;">Save
    			     <i class="material-icons right">send</i>
  			     </button>
                                </div>
				
				
				
            </div>
        </div>
    </div>
@stop
@section('script')
<script>
    
    $(document).ready(function() {
    $('select').material_select();
  });
        
  
    
    
   
</script>

@stop