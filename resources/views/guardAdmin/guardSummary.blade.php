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
						<a href="{{URL::route('personalDataBC')}}" class="breadcrumb">Personal Data</a>
						<a href="{{URL::route('educationalBackgroundBC')}}" class="breadcrumb">Educational Background</a>
						<a href="{{URL::route('sgBackground')}}" class="breadcrumb">SG Background</a>
						<a href="{{URL::route('requirement')}}" class="breadcrumb">Requirements</a>
						<a href="{{URL::route('account')}}" class="breadcrumb">Account</a>
						<a href="{{URL::route('guardSummary')}}" class="breadcrumb">Summary</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

<!----------------------------------------------PAGES-------------------------------------->

<div class="row">
	<div class="col s5 push-s4" style="margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
			<center><legend><h4>Summary</h4></legend></center></br>
				<div class="row">
					<div class="col s10 push-s1 card blue lighten-1" style="overflow:scroll; overflow-x:hidden; height: 400px;">
						<div class="card-content">
							
								<!-------------------------------------------------->

										<div>
											<span class = "card-title black-text" style="font-weight:bold;">Personal Data:</span>
										</div>

                                <!--------------------------------------------------->
							
								<!-------------------------------------------------->

										<div>
											<p style="color: #eeeeee; font-size: 20px;">First Name:</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">Juan</p>
										</div>
                                <!--------------------------------------------------->
							
								<!-------------------------------------------------->

										<div>
											<p style="color: #eeeeee; font-size: 20px;">Middle Name:</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">Ewan</p>
										</div>
                                <!--------------------------------------------------->
							
								<!-------------------------------------------------->

										<div>
											<p style="color: #eeeeee; font-size: 20px;">Last Name:</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">Dela Cruz</p>
										</div>
                                <!--------------------------------------------------->
							
								<!-------------------------------------------------->

										<div>
											<p style="color: #eeeeee; font-size: 20px;">License Number:</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">2013-12345-MN-0</p>
										</div>
                                <!--------------------------------------------------->
							
							
							
							
							
								<!--------------------License Number--------------->		
										<div>
											<p style="color: #eeeeee; font-size: 20px;">Address:</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">123 Hello St. Hi Village Bangkal, Makati, Metro Manila</p>
										</div>
								<!-------------------Date Issued------------------->		
										<div>
											<p style="color: #eeeeee; font-size: 20px;">Age:</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">25</p>
										</div>

								<!------------------Date Expired------------------>

										<div>
											<p style="color: #eeeeee; font-size: 20px;">Gender:</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">Male</p>
										</div>
                                <!--------------------------------------------------->
                                        
                                        <div>
											<p style="color: #eeeeee; font-size: 20px;">Place of Birth:</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">123 Hello St. Hi Village Bangkal, Makati, Metro Manila</p>
										</div>
                                        
                                <!--------------------------------------------------->
                                        
                                        <div>
											<p style="color: #eeeeee; font-size: 20px;">Contact Nummber (Mobile):</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">09123456789</p>
										</div>
                                        
                                <!--------------------------------------------------->
                                        
                                        <div>
											<p style="color: #eeeeee; font-size: 20px;">Contact Nummber (Landline):</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">1234567</p>
										</div>
                                        
                                <!--------------------------------------------------->
                                        
                                        <div>
											<p style="color: #eeeeee; font-size: 20px;">Civil Status:</p>
										</div>

										<div>
											<p style="color:#212121; font-size: 18px;">Married</p>
										</div>
                                        
                               <!-------------------------------------------------->

										<div>
											<span class = "card-title black-text" style="font-weight:bold;">Body Attributes:</span>
										</div>

                                <!--------------------------------------------------->

										<div>
											<p style="color: #eeeeee; font-size: 20px;">Height:</p>
											
											<p style="color:#212121; font-size: 18px;">174cm</p>
                                            </br>
										</div>
                                    
                                <!--------------------------------------------------->

										<div>
											<p style="color: #eeeeee; font-size: 20px;">Weight:</p>
											
											<p style="color:#212121; font-size: 18px;">91kg</p>
                                            </br>
										</div>
                        
                                <!--------------------------------------------------->

										<div>
											<p style="color: #eeeeee; font-size: 20px;">Wingspan:</p>
											
											<p style="color:#212121; font-size: 18px;">194cm</p>
                                            </br>
										</div>
                    
                                
                                <!-------------------------------------------------->

										<div>
											<span class = "card-title black-text" style="font-weight:bold;">Armed Services:</span>
										</div>

                                <!--------------------------------------------------->

										<div>
											<p style="color:#eeeeee; font-size: 18px;">• Marine Army</p>
                                            <p style="color:#eeeeee; font-size: 18px;">• Philippine National Police</p>
                                            <p style="color:#eeeeee; font-size: 18px;">• Reserve Officers' Training Corps</p>
										</div>
                    
                    
                    
                    
                                <!-------------------------------------------------->

										<div>
											<span class = "card-title black-text" style="font-weight:bold;">Government Exams:</span>
										</div>

										<div>
											<p style="color:#eeeeee; font-size: 18px;">• Fire Officer Examination</p>
                                            <p style="color:#eeeeee; font-size: 18px;">• Penology Officer Examination</p>
                                            <p style="color:#eeeeee; font-size: 18px;">• Police Officer Examination</p>
                                            <p style="color:#eeeeee; font-size: 18px;">• Career Service Sub-professional Examination</p>
										</div>
						</div>
					</div>
				</div>
		</div>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" href="#" id = "backSgSummary">Back</button>
		<button style="margin-top:20px;" class=" z-depth-2 btn-large green right animated infinite flash" id = "btnSave">Save</button>
	</div>
</div>

@stop

@section('script')
<script>

$('#backSgSummary').click(function(){
            window.location.href = '{{ URL::to("/guard/registration/account") }}';
        });
</script>
@stop