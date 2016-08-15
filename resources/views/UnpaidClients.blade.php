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
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

               
            
            <div class="row">
                <div class="col s12" style="margin-top:10px;">
                    <table class="striped white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width:50px;" class="grey lighten-1"></th>                                
                                <th class="grey lighten-1">Client ID</th>
                                <th class="grey lighten-1">Client Name</th>
								<th class="grey lighten-1">Amount</th>								
                                <th class="grey lighten-1">Due Date</th>								
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                                <tr>
                                    <td>
										<button class="btn blue">PAID</button>
									</td>                                    
                                    <td>1</td>
                                    <td >PUP</td>                                    
									<td>10000</td>
									<td>01/01/2017</td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
            null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			
		});
	
</script>


@stop