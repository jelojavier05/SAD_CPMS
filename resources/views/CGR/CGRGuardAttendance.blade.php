@extends('CGR.CGRMain')
@section('title')
Guard Attendance
@endsection

@section('content')

<div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:7%">Security Guard Attendance</h3>
                </div>
    
    </div>
<div class="row">
    <div class="col l12">
            <div class="col l10 offset-l2" style=";max-height:690px">
        
                 <table class="centered" id="dataTable">
                        <thead>
                          <tr>
                              
                              <th data-field="status">Security Guard </th>
                              <th data-field="guard">Picture</th>
                              <th data-field="status">View Profile</th>
                              <th data-field="guard">Action</th>
                              
                              
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            
                            <td>Adrian Flores</td>
                            <td>
                             
                                    <img src="/img/avatar2.png" alt="" class="responsive-img" width="50%" height="40%" >
                                 
                              
                            </td>
                            <td> 
                                        <button class="btn waves-effect waves-light green darken-4" type="button" name="action">PROFILE
                                            <i class="material-icons right">send</i>
                                        </button>
                              
                            </td>
                            <td> 
                                        
                                            <button class="btn waves-effect waves-light blue darken-4 buttonTimeIn" id="" type="button" name="action">TIME-IN
                                 
                                            </button>
                                
                                            <button class="btn waves-effect waves-light red darken-4" type="button" name="action">TIME-OUT
                                                    
                                            </button>

                              
                            </td>
                            
                          </tr> 
                            
                            
                            
                         
                        </tbody>
                    </table>
      
        
        
            
        
            </div>
    </div>




</div>
 
<!-- sg login Start-->
<div id="modalTimeIn" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:320px !important; border-radius:10px;">      
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
					<input id="strCurrent" type="password" class="validate" name = "" required="" aria-required="true">
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
<!-- sg login End -->


@stop

@section('script')
<script>
$("#dataTable").DataTable({
             "columns": [
            null,
			{"orderable": false},
			{"orderable": false},
			{"orderable": false}
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			
		});
	
	$('#dataTable').on('click', '.buttonTimeIn', function(){
            $('#modalTimeIn').openModal();
            

        });
</script>

@stop