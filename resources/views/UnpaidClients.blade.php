@extends('layout.maintenanceLayout')

@section('title')
Unpaid Clients
@endsection

@section('content')


<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Unpaid Clients</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2" style="padding-left:2%; padding-right:2%;">
<!--            <div class="row">-->
               

               
            
            <div class="row">
                <div class="col s12" style="margin-top:10px;">
                    <table class="striped white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>
                                <th class="grey lighten-1"></th>                                
                                <th class="grey lighten-1">Client ID</th>
                                <th class="grey lighten-1">Client Name</th>																
                            </tr>
                        </thead>
                        
                        <tbody>
                            
							<tr>
								<td>
									<button class="btn blue col s6 btnMore">MORE</button>
								</td>                                    
								<td>1</td>
								<td >PUP</td>                                    									
							</tr>
							
							<tr>
								<td>
									<button class="btn blue col s6 btnMore">MORE</button>
								</td>                                    
								<td>1</td>
								<td >PUP</td>                                    									
							</tr>
							
							<tr>
								<td>
									<button class="btn blue col s6 btnMore">MORE</button>
								</td>                                    
								<td>1</td>
								<td >PUP</td>                                    									
							</tr>
							
							<tr>
								<td>
									<button class="btn blue col s6 btnMore">MORE</button>
								</td>                                    
								<td>1</td>
								<td >PUP</td>                                    									
							</tr>
							
							<tr>
								<td>
									<button class="btn blue col s6 btnMore">MORE</button>
								</td>                                    
								<td>1</td>
								<td >PUP</td>                                    									
							</tr>
							
							<tr>
								<td>
									<button class="btn blue col s6 btnMore">MORE</button>
								</td>                                    
								<td>1</td>
								<td >PUP</td>                                    									
							</tr>
								
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--modal client bills-->
<div id="modalClientBills" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:650px; margin-top:-60px;">
	<div class="modal-header">
		<div class="h">
			<h3><center>Message</center></h3>  
		</div>
    </div>
    <div class="modal-content">
		<div class="row">
			<div class="col s12">
				<div class="row">
					<div class="col s12">
						<ul class="collection with-header">
							<li class="collection-header">
								<h5 style="font-weight:bold;">Payment Options</h5>
								<div>
									<input class="with-gap" name="group1" type="radio" id="test1" value="0" />
									<label for="test1">Cash</label>
								</div>
								<div>
									<input class="with-gap" name="group1" type="radio" id="test2" value="1" />
									<label for="test2">Cheque</label>
								</div>
							</li>
							<div class="payradio animated zoomIn" style="display:none;">
							<li class="collection-item">
								<h5 style="font-weight:bold;">Cheque Details</h5>
								<div class="row">
									<div class="col s12">
										<div class="input-field col s6">
											<input id="" type="text"  name = "" placeholder="e.g.HelloBank">                                
											<label for="">Bank Name</label>                                 
										</div>
										<div class="input-field col s6">
											<input id="" type="date"  name = "" placeholder=" ">                                
											<label class="active" for="">Date</label>                                 
										</div>	
										<div class="input-field col s6">
											<input id="" type="text"  name = "" placeholder="e.g.123-321">                                
											<label for="">Cheque Number</label>                                 
										</div>
										<div class="input-field col s6">
											<input id="" type="text"  name = "" placeholder="e.g.100.00">                                
											<label for="">Amount</label>                                 
										</div>							
									</div>
								</div>
							</li>
							<li class="collection-item"></li>
							</div>

							<li class="collection-item">
								<div class="row">
									<div class="col s12">
										<table class="striped grey lighten-1" id="tblBills" style="width:100%;">
											<h5 style="font-weight:bold;">Unpaid Bills</h5>
											<thead>
												<th></th>
												<th>Date</th>
												<th>Amount</th>
												<th>Due Date</th>							
											</thead>

											<tbody>
												<tr>
													<td>
														<input type="checkbox" class="filled-in" id="testA"/>
														<label for="testA"></label>
													</td>
													<td>12/12/12</td>
													<td>10000.00</td>
													<td>12/20/12</td>
												</tr>

												<tr>
													<td>
														<input type="checkbox" class="filled-in" id="testB"/>
														<label for="testB"></label>
													</td>
													<td>12/12/12</td>
													<td>10000.00</td>
													<td>12/20/12</td>
												</tr>

												<tr>
													<td>
														<input type="checkbox" class="filled-in" id="testC"/>
														<label for="testC"></label>
													</td>
													<td>12/12/12</td>
													<td>10000.00</td>
													<td>12/20/12</td>
												</tr>

												<tr>
													<td>
														<input type="checkbox" class="filled-in" id="testD"/>
														<label for="testD"></label>
													</td>
													<td>12/12/12</td>
													<td>10000.00</td>
													<td>12/20/12</td>
												</tr>

												<tr>
													<td>
														<input type="checkbox" class="filled-in" id="testE"/>
														<label for="testE"></label>
													</td>
													<td>12/12/12</td>
													<td>10000.00</td>
													<td>12/20/12</td>
												</tr>

												<tr>
													<td>
														<input type="checkbox" class="filled-in" id="testF"/>
														<label for="testF"></label>
													</td>
													<td>12/12/12</td>
													<td>10000.00</td>
													<td>12/20/12</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
      </div>
	</div>
	<div class="modal-footer ci" style="background-color: #00293C;">
      <button class="btn blue waves-effect" name="" id = "" style="margin-right: 30px;">PAID
      </button>
    </div>
  </div>
<!--modal client bills end-->


<!-- admin login Start-->
<div id="modalTime" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:320px !important; border-radius:10px;">      
	<div class="modal-header">
		<div class="h">
			<h3><center>Login</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
					<input id="" type="text" class="validate" name = "" required="" aria-required="true">
					<label for="">Username</label> 
				</div>
			</div>
			<div class="col s10 push-s1" style="margin-top:-30px;">      
				<div class="row"></div>
				<div class="row"></div>  
				<div class="input-field col s12">
					<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
					<input id="strNew" type="password" class="validate" name = "" required="" aria-required="true">
					<label for="">Password</label> 
				</div>
			</div>
			
		</div>
	</div>
	<div class="modal-footer" style="background-color: #00293C;">
		<button class="btn large waves-effect waves-light green" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">OK
		</button>
	</div>	
</div>
<!-- admin login End -->

@stop

@section('script')
<script>

$("#dataTable").DataTable({
             "columns": [
            {"searchable": false},			
            null,
            null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			
		});
	
</script>

<script>
$(document).ready(function(){
	$("#tblBills").DataTable({
		"columns": [
			{ "orderable": false },
			null,
			null,
			null
		] ,  
		"pageLength":5,
		"bLengthChange": false,
		"bFilter": false
	});		
	
	 $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="1"){           
            $(".payradio").show();
        }
		 else{
			 $(".payradio").hide();
		 }
	 });
	
	$('.btnMore').click(function(){
		$("#modalClientBills").openModal();
	});
			 
});
</script>


@stop