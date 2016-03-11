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

            			<td><button class="buttonUpdate btn large modal-trigger"  name="leave" id="" 
            				 href="#" style="margin-left:80px;">Update</button>
            			<label for=""></label> </td>
					

						<td>  
						  <div class="switch">
							<label>
							  Off
							  <input type="checkbox">
							  <span class="lever"></span>
							  On
							</label>
						  </div>
						</td>
						<td><button formaction="" class="btn waves-effect waves-light red" 
									onclick="">Delete<i class="material-icons right">delete</i>
							</button>
						</td>

          			</tr>

          
        </tbody>
				
					</table>
				
				</div>
				
				</div>
			
			</br></br></br></br></br>
			
			

			
		
    </div>
@stop