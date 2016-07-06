@extends('layout.maintenanceLayout')

@section('title')
Guard
@endsection

@section('content')

<div class="row">
    <div class="col s8 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:50px;">
<!--            <div class="row">-->
                <div class="col s6">
                    <h3 class="blue-text">Security Guard</h3>
                </div>

                <div class="col s3 offset-s3">
					<a style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="/guard/registration/personalData">
                        <i class="material-icons left">add</i> ADD
                    </a>
                </div>
<!--            </div>-->
        
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
								<th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Name</th>
								<th>Gender</th>
								
                                
                            </tr>
                        </thead>

                        <tbody>
                            
                                <tr>
                                    

                                    <td>
                                        <button class="buttonDelete btn blue "  id="">
                                            MORE
                                        </button>
                                    </td>
                                    <td id = "">1</td>
                                	<td id = "">Mang Jose</td>
									<td id = "">Male</td>
                                	
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>
    
    
<!------------------------containerMoreDetails----------------------------------->
<div class ="col s4" style="overflow:scroll; overflow-x:hidden; height:500px; margin-top:30px;">
    <div class="col s12">
        <div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:15px;">
            <div class="blue darken-1 white-text" style="position:fixed; z-index:100; width:395px; height: 38px; font-size:30px;">Details</div>
				<div class="row">
				    <div class="col s12">
							  <div class="card grey darken-1">
									<div class="card-content">
								<!--------------------License Number--------------->		
										<div>
											<span class = "card-title white-text">Address:</span>
										</div>

										<div>
											<p>123 Hello St. Hi Village Bangkal, Makati, Metro Manila</p>
										</div>
								<!-------------------Date Issued------------------->		
										<div>
											<span class = "card-title white-text">Age:</span>
										</div>

										<div>
											<p>25</p>
										</div>

								<!------------------Date Expired------------------>

										<div>
											<span class = "card-title white-text">Gender:</span>
										</div>

										<div>
											<p>Male</p>
										</div>
                                <!--------------------------------------------------->
                                        
                                        <div>
											<span class = "card-title white-text">Place of Birth:</span>
										</div>

										<div>
											<p>123 Hello St. Hi Village Bangkal, Makati, Metro Manila</p>
										</div>
                                        
                                <!--------------------------------------------------->
                                        
                                        <div>
											<span class = "card-title white-text">Contact Number (Mobile):</span>
										</div>

										<div>
											<p>09123456789</p>
										</div>
                                        
                                <!--------------------------------------------------->
                                        
                                        <div>
											<span class = "card-title white-text">Contact Number (Landline):</span>
										</div>

										<div>
											<p>1234567</p>
										</div>
                                        
                                <!--------------------------------------------------->
                                        
                                        <div>
											<span class = "card-title white-text">Civil Status:</span>
										</div>

										<div>
											<p>Married</p>
										</div>
                                        
                                <!--------------------------------------------------->
                                        
                                        <div>
											<span class = "card-title white-text">Body Attributes:</span>
										</div>

										<div>
											<p>Height:</p><p class="white-text">174</p>
                                            </br>
										</div>
                                    
                                <!--------------------------------------------------->

										<div>
											<p>Weight:</p><p class="white-text">91</p>
										    </br>
                                        </div>
                        
                                <!--------------------------------------------------->

										<div>
											<p>Wingspan:</p><p class="white-text">190</p>
										    </br>
                                        </div>
                    
                                
                                <!--------------------------------------------------->

										<div>
											<span class = "card-title white-text">Armed Services:</span>
										</div>

										<div>
											<p>• Marine Army</p>
                                            <p>• Philippine National Police</p>
                                            <p>• Reserve Officers' Training Corps</p>
										</div>
                    
                    
                    
                    
                                <!--------------------------------------------------->

										<div>
											<span class = "card-title white-text">Government Exams:</span>
										</div>

										<div>
											<p>• Fire Officer Examination</p>
                                            <p>• Penology Officer Examination</p>
                                            <p>• Police Officer Examination</p>
                                            <p>• Career Service Sub-professional Examination</p>
										</div>
                                        

                                        
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
				null
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
	});
</script>
@stop