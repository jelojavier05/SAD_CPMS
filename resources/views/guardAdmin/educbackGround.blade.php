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
						<a href="#personaldata" class="breadcrumb">Personal Data</a>
						<a href="#" class="breadcrumb">Educational Background</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

<!----------------------------------------------PAGES-------------------------------------->
<!-------------------------------------Educational Background Page Start---------------------------------->
<div class="row">
	<div class="col s8 push-s3" style="margin-left:10px;">
		 
							<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
									<legend><h4>Educational Background</h4></legend>
									<table class="highlight white" height="100%" width="100%" style="border:1 px solid black; ">
										<thead>
												<tr>


													<th>Level</th>
													<th>Name of School</th>
													<th>Degree/Course</th>
													<th>Year Graduated(if graduated)</th>
													<th>Inclusive Dates of Attendance</th>
													<th>Scholarship/Academic Honors Received</th>

												</tr>
										</thead>

										 <tbody>

													<tr>

														<td>
															<p>Primary</p>
														</td>


														<td> 

														   <input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
													</div>
														</td>


														<td>
															<input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
														</td>

														<td>
															<input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
														</td>

														<td><label>From</label>
															<select>
												  <option value="" disabled selected>----</option>
												<option value="1">2015</option>
												 <option value="2">2014</option>
												 <option value="3">2013</option>
												 <option value="4">2012</option>
												 <option value="5">2010</option>
												 <option value="6">2009</option>
												 <option value="7">2008</option>
												 <option value="8">2007</option>
												 <option value="9">2006</option>
												  <option value="1">2005</option>
												 <option value="2">2004</option>
												 <option value="3">2003</option>
												 <option value="4">2002</option>
												 <option value="5">2001</option>
												 <option value="6">2000</option>
												 <option value="7">1999</option>
												 <option value="8">1998</option>
												 <option value="9">1997</option>
													 <option value="10">1996</option>
													 <option value="11">1995</option>
													 <option value="12">1994</option>
													 <option value="13">1993</option>
													 <option value="14">1992</option>
													 <option value="15">1991</option>
													 <option value="16">1990</option>
													 <option value="17">1989</option>
													 <option value="18">1988</option>
													 <option value="19">1987</option>
													 <option value="20">1986</option>
													 <option value="21">1985</option>
													 <option value="22">1984</option>
												  <option value="23">1983</option>
												  <option value="24">1982</option>
												  <option value="25">1981</option>
												  <option value="26">1980</option>
												 <option value="27">1979</option>
												  <option value="28">1978</option>
												   <option value="29">1977</option>
												  <option value="30">1976</option>
												  <option value="31">1975</option>
												  <option value="32">1974</option>
												  <option value="33">1973</option>
												  <option value="34">1972</option>
												  <option value="35">1971</option>


											 </select>

											 <label></label>

											  <select>
												  <option value="" disabled selected>----</option>  
												  <option value="1">2015</option>
												 <option value="2">2014</option>
												 <option value="3">2013</option>
												 <option value="4">2012</option>
												 <option value="5">2010</option>
												 <option value="6">2009</option>
												 <option value="7">2008</option>
												 <option value="8">2007</option>
												 <option value="9">2006</option>
												  <option value="1">2005</option>
												 <option value="2">2004</option>
												 <option value="3">2003</option>
												 <option value="4">2002</option>
												 <option value="5">2001</option>
												 <option value="6">2000</option>
												 <option value="7">1999</option>
												 <option value="8">1998</option>
												 <option value="9">1997</option>
													 <option value="10">1996</option>
													 <option value="11">1995</option>
													 <option value="12">1994</option>
													 <option value="13">1993</option>
													 <option value="14">1992</option>
													 <option value="15">1991</option>
													 <option value="16">1990</option>
													 <option value="17">1989</option>
													 <option value="18">1988</option>
													 <option value="19">1987</option>
													 <option value="20">1986</option>
													 <option value="21">1985</option>
													 <option value="22">1984</option>
												  <option value="23">1983</option>
												  <option value="24">1982</option>
												  <option value="25">1981</option>
												  <option value="26">1980</option>
												 <option value="27">1979</option>
												  <option value="28">1978</option>
												   <option value="29">1977</option>
												  <option value="30">1976</option>
												  <option value="31">1975</option>
												  <option value="32">1974</option>
												  <option value="33">1973</option>
												  <option value="34">1972</option>
												  <option value="35">1971</option>


											 </select>
														</td>

														<td>
															<input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
														</td>

									</tr>

									<tr>

														<td>
															<p>Secondary</p>
														</td>


														<td> 

														   <input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
													</div>
														</td>


														<td>
															<input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
														</td>

														<td>
															<input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
														</td>

														<td><label>From</label>
															<select>
												  <option value="" disabled selected>----</option>
												<option value="1">2015</option>
												 <option value="2">2014</option>
												 <option value="3">2013</option>
												 <option value="4">2012</option>
												 <option value="5">2010</option>
												 <option value="6">2009</option>
												 <option value="7">2008</option>
												 <option value="8">2007</option>
												 <option value="9">2006</option>
												  <option value="1">2005</option>
												 <option value="2">2004</option>
												 <option value="3">2003</option>
												 <option value="4">2002</option>
												 <option value="5">2001</option>
												 <option value="6">2000</option>
												 <option value="7">1999</option>
												 <option value="8">1998</option>
												 <option value="9">1997</option>
													 <option value="10">1996</option>
													 <option value="11">1995</option>
													 <option value="12">1994</option>
													 <option value="13">1993</option>
													 <option value="14">1992</option>
													 <option value="15">1991</option>
													 <option value="16">1990</option>
													 <option value="17">1989</option>
													 <option value="18">1988</option>
													 <option value="19">1987</option>
													 <option value="20">1986</option>
													 <option value="21">1985</option>
													 <option value="22">1984</option>
												  <option value="23">1983</option>
												  <option value="24">1982</option>
												  <option value="25">1981</option>
												  <option value="26">1980</option>
												 <option value="27">1979</option>
												  <option value="28">1978</option>
												   <option value="29">1977</option>
												  <option value="30">1976</option>
												  <option value="31">1975</option>
												  <option value="32">1974</option>
												  <option value="33">1973</option>
												  <option value="34">1972</option>
												  <option value="35">1971</option>


											 </select>

											 <label></label>

											  <select>
												  <option value="" disabled selected>----</option>  
												  <option value="1">2015</option>
												 <option value="2">2014</option>
												 <option value="3">2013</option>
												 <option value="4">2012</option>
												 <option value="5">2010</option>
												 <option value="6">2009</option>
												 <option value="7">2008</option>
												 <option value="8">2007</option>
												 <option value="9">2006</option>
												  <option value="1">2005</option>
												 <option value="2">2004</option>
												 <option value="3">2003</option>
												 <option value="4">2002</option>
												 <option value="5">2001</option>
												 <option value="6">2000</option>
												 <option value="7">1999</option>
												 <option value="8">1998</option>
												 <option value="9">1997</option>
													 <option value="10">1996</option>
													 <option value="11">1995</option>
													 <option value="12">1994</option>
													 <option value="13">1993</option>
													 <option value="14">1992</option>
													 <option value="15">1991</option>
													 <option value="16">1990</option>
													 <option value="17">1989</option>
													 <option value="18">1988</option>
													 <option value="19">1987</option>
													 <option value="20">1986</option>
													 <option value="21">1985</option>
													 <option value="22">1984</option>
												  <option value="23">1983</option>
												  <option value="24">1982</option>
												  <option value="25">1981</option>
												  <option value="26">1980</option>
												 <option value="27">1979</option>
												  <option value="28">1978</option>
												   <option value="29">1977</option>
												  <option value="30">1976</option>
												  <option value="31">1975</option>
												  <option value="32">1974</option>
												  <option value="33">1973</option>
												  <option value="34">1972</option>
												  <option value="35">1971</option>


											 </select>
														</td>

														<td>
															<input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
														</td>

													</tr>
											<tr>

														<td>
															<p>Tertiary</p>
														</td>


														<td> 

														   <input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
													</div>
														</td>


														<td>
															<input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
														</td>

														<td>
															<input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
														</td>

														<td><label>From</label>
															<select>
												  <option value="" disabled selected>----</option>
												<option value="1">2015</option>
												 <option value="2">2014</option>
												 <option value="3">2013</option>
												 <option value="4">2012</option>
												 <option value="5">2010</option>
												 <option value="6">2009</option>
												 <option value="7">2008</option>
												 <option value="8">2007</option>
												 <option value="9">2006</option>
												  <option value="1">2005</option>
												 <option value="2">2004</option>
												 <option value="3">2003</option>
												 <option value="4">2002</option>
												 <option value="5">2001</option>
												 <option value="6">2000</option>
												 <option value="7">1999</option>
												 <option value="8">1998</option>
												 <option value="9">1997</option>
													 <option value="10">1996</option>
													 <option value="11">1995</option>
													 <option value="12">1994</option>
													 <option value="13">1993</option>
													 <option value="14">1992</option>
													 <option value="15">1991</option>
													 <option value="16">1990</option>
													 <option value="17">1989</option>
													 <option value="18">1988</option>
													 <option value="19">1987</option>
													 <option value="20">1986</option>
													 <option value="21">1985</option>
													 <option value="22">1984</option>
												  <option value="23">1983</option>
												  <option value="24">1982</option>
												  <option value="25">1981</option>
												  <option value="26">1980</option>
												 <option value="27">1979</option>
												  <option value="28">1978</option>
												   <option value="29">1977</option>
												  <option value="30">1976</option>
												  <option value="31">1975</option>
												  <option value="32">1974</option>
												  <option value="33">1973</option>
												  <option value="34">1972</option>
												  <option value="35">1971</option>


											 </select>

											 <label></label>

											  <select>
												  <option value="" disabled selected>----</option>  
												  <option value="1">2015</option>
												 <option value="2">2014</option>
												 <option value="3">2013</option>
												 <option value="4">2012</option>
												 <option value="5">2010</option>
												 <option value="6">2009</option>
												 <option value="7">2008</option>
												 <option value="8">2007</option>
												 <option value="9">2006</option>
												  <option value="1">2005</option>
												 <option value="2">2004</option>
												 <option value="3">2003</option>
												 <option value="4">2002</option>
												 <option value="5">2001</option>
												 <option value="6">2000</option>
												 <option value="7">1999</option>
												 <option value="8">1998</option>
												 <option value="9">1997</option>
													 <option value="10">1996</option>
													 <option value="11">1995</option>
													 <option value="12">1994</option>
													 <option value="13">1993</option>
													 <option value="14">1992</option>
													 <option value="15">1991</option>
													 <option value="16">1990</option>
													 <option value="17">1989</option>
													 <option value="18">1988</option>
													 <option value="19">1987</option>
													 <option value="20">1986</option>
													 <option value="21">1985</option>
													 <option value="22">1984</option>
												  <option value="23">1983</option>
												  <option value="24">1982</option>
												  <option value="25">1981</option>
												  <option value="26">1980</option>
												 <option value="27">1979</option>
												  <option value="28">1978</option>
												   <option value="29">1977</option>
												  <option value="30">1976</option>
												  <option value="31">1975</option>
												  <option value="32">1974</option>
												  <option value="33">1973</option>
												  <option value="34">1972</option>
												  <option value="35">1971</option>


											 </select>
														</td>

														<td>
															<input  id="schoolName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
															<label data-error="Incorrect" for="schoolevel"></label>
														</td>

													</tr>



											
										</tbody>
										
									</table>
									
								</div>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" id = "backEducation">Back</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextEducation">Next</button>
	</div>
</div>

<!-------------------------------------Personal Data Page End---------------------------------->
@stop

@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        
        $('#backEducation').click(function(){
            window.location.href = '{{ URL::to("/guardRegistration/personalData") }}';
        });
        
        $('#nextEducation').click(function(){
            window.location.href = '{{ URL::to("/guardRegistration/sgBackground") }}';
        });
        
    });
        
</script>

@stop