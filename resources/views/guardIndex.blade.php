@extends('layout.maintenanceLayout')

@section('title')
Guard
@endsection

@section('content')


    <div class="row">
			<div class="col s12">	
				<div class="col s3 offset-s3">
					<h1 class="colortitle blue-text text-darken-3">Guards</h1>
				</div>
        <div class="col s3 offset-s3">
					<a style="margin-top: 30px;" id="btnAdd" class="z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="/guardForm"><i class="material-icons left">add</i>ADD</a></br></br>
				</div>
				

		</div>
    
    <!-- TABLE -->

	 <div class="row"> 
     
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top:55px;">	
				<table class="highlight white" style=" border-radius: 10px; margin-top: -8%" id="dataTable">
                	<div class="right-align">
                 		

  						</div>
					</div>
	                  	<thead>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th data-field="id">ID</th>
								<th data-field="name">Leave Type</th>
								<th data-field="name">Default Leave</th>
							</tr>
						</thead>
            
           				<tbody>
			   
          			<tr>
						
						
						<td> 
						  <div class="switch" style="margin-right: -80px;">
							<label>
							  Deactivate
							 
							  	<input type="checkbox" checked class = "checkboxFlag" id = "">
							 
							  	<input type="checkbox" class = "checkboxFlag" id = "">
							  
							  <span class="lever"></span>
							  Activate
							</label>
						  </div>
						</td>
						
						
            			<td><button class="buttonUpdate btn modal-trigger"  name="vitalStatistic" id="" href="#" style="margin-right:80px;"><i class="material-icons">edit</i></button>
            			<label for=""></label> </td>

						<td><button class="buttonDelete btn red" style="margin-left:-200px;" id=""><i class="material-icons" >delete</i></button></td>
						
						<td></td>
						<td></td>
            				
          			</tr>

          
        				</tbody>
				
					</table>
				
				</div>
				
				</div>
			
			</br></br></br></br></br>
			
			

			
		
    </div>
@stop