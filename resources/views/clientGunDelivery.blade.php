@extends('layout.maintenanceLayout')

@section('title')
Delivery
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2">
		
		<div class ="col s5" style=" margin-top:38px;">
			<div class="col s12">
				<div class="container-fluid grey lighten-5 z-depth-2" style="border-radius:5px; border: 1px solid black;">
					<h4 class = "blue white-text" style="margin-top:0px;">Summary</h4>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable">

									<thead>
										<tr>
											
											<th>License No</th>
											<th>Name</th>
											<th>Type of Gun</th>
										</tr>
									</thead>

									<tbody>                        
											<tr>                                    
																													

												<td>2013-12345-MN-0</td>

												<td>M4A1</td>
												
												<td>Rifle</td>

												
											</tr>
										
											<tr>                                    
																													

												<td>2014-01231-MN-0</td>

												<td>Arctic Warfare Magnum</td>

												<td>Rifle</td>
												
											</tr>
											
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col s7">
			<div class="col s12" style=" margin-left:10px; margin-top: 6%;">
				<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px; padding-bottom:1%;" id="personaldata">
					<h4 class = "blue white-text" style="margin-top:0px;">Delivery</h4>
					<div class = "row">
						<div class="col s10 push-s1">
							<form>

								<div class="input-field col s3 offset-s9 pull-s9">
									<input  id="deliveryID" type="text" class="validate blue-text" readonly required="" aria-required="true" value = "1">
									<label for="deliveryID">Delivery ID</label>
								</div>

								<div class = "input-field col s6 offset-s6 pull-s6">    
								   <select  id = "" name = "" >
									   <option disabled selected>Choose an option</option>
										  <option id = "1" >Test1</option>
										  <option id = "2" >Test2</option>
								   </select>
								   <label>Client</label>
								</div>


								<div class="input-field col s6">
									<input  id="dateReleased" type="date" class="datepicker"  required="" aria-required="true">
									<label class="active" data-error="Incorrect" for="dateReleased">Date Released</label>
								</div>

								<div class="input-field col s6">
									<input placeholder=" " id="releasedBy" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
									<label for="releasedBy"  data-error="Incorrect">Released By</label>
								</div>

								<div class="input-field col s6">
									<input placeholder=" " id="deliveredBy" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
									<label for="deliveredBy"  data-error="Incorrect">Delivered By</label>
								</div>

								<div class="input-field col s6">
									<input placeholder=" " id="contactDeliver" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
									<label data-error="Incorrect" for="contactDeliver">Contact Number (Delivery)</label>
								</div>

							</form>

						</div>
					</div>	
					
				</div>
			</div>
		</div>
	</div>
		<div class=" col s5 push-s4">
				<a class="btn-large blue waves-effect z-depth-2 left" id="" style="margin-top:20px;" href="/gunDeliveryCart">Cancel</a>
				<a class="btn-large green waves-effect z-depth-2 right" id="" style="margin-top:20px;" href="#">Save</a>
		</div>
</div>

@stop

@section('script')


<script type="text/javascript">
	$(document).ready(function(){
        $("#dataTable").DataTable({
                 "columns": [
                null,
				null,
				null
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
	});
</script>
@stop