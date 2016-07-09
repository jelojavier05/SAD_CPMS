@extends('layout.maintenanceLayout')

@section('title')
Delivery
@endsection

@section('content')	
<div class="row">
    <div class="col s8 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:40px;">
            <div class="col s6" style="margin-top:-15px;">
                <h3 class="blue-text">Delivery</h3>
            </div>
            
            <div class="col s3 offset-s3">
                <a style="margin-top: 20px;" id="" class=" z-depth-2 btn-large blue" href="/gunDeliveryCart">
                    Deliver
                </a>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:0px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Client</th>
								<th>Date Released</th>
								<th style="width:50px;"></th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                           
                                <tr>
                                    
                                    <td>
                                        <button class="buttonDelete btn red" id="">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    
                                    <td id = "">1</td>
                                    <td id = "">Test1</td>
									<td>test1</td>
									
									<td>
                                        <button class=" btn blue" id="">
                                            MORE
                                        </button>
                                    </td>
                                    
                                </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
	
<div class ="col s4" style="overflow:scroll; overflow-x:hidden; height:500px; margin-top:40px;">
    <div class="col s12">
        <div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:15px;">
            <div class="blue darken-1 white-text" style="position:fixed; z-index:100; width:395px; height: 38px; font-size:30px;">Details</div>
				<div class="row">
				    <div class="col s12" style="margin-top:5px;">
							  <div class="card grey darken-1">
									<div class="card-content">
								<!--------------------Released By:--------------->		
										<div>
											<span class = "card-title white-text">Released By:</span>
										</div>

										<div>
											<p>Rodrigo Duterte</p>
										</div>
								<!-------------------Delivered By:------------------->		
										<div>
											<span class = "card-title white-text">Delivered By:</span>
										</div>

										<div>
											<p>Leni Robredo</p>
										</div>

								<!------------------Contact Number------------------>

										<div>
											<span class = "card-title white-text">Contact No.:</span>
										</div>

										<div>
											<p>09123456789</p>
										</div>
										
								<!------------------Items------------------>

										<div>
											<span class = "card-title white-text">Items:</span>
										</div>
										
										<table>
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
				</div>	
    </div>

</div>
@stop
	
@section('script')


<script type="text/javascript">
	$(document).ready(function(){
        $("#dataTable").DataTable({
                 "columns": [
                { "orderable": false },
                null,
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