@extends('layout.maintenanceLayout')

@section('title')
City
@endsection

@section('content')

<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
<!--            <div class="row">-->
                <div class="col s7 push-s1">
                    <h2 class="blue-text">City</h2>
                </div>

                <div class="col s3 offset-s2">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalcityAdd">
                        <i class="material-icons left">add</i> ADD
                    </button>
                </div>
<!--            </div>-->
        
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
								<th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Province</th>
								<th>City</th>
								
                                
                            </tr>
                        </thead>

                        <tbody>
                            
                                <tr>
                                    
									<td> 
									  <div class="switch" style="margin-right: -80px;">
										<label>
										  
										 
											<input type="checkbox" checked class = "checkboxFlag" id = "">
										  
											<input type="checkbox" class = "checkboxFlag" id = "">
										  
										  <span class="lever"></span>
										  
										</label>
									  </div>
									</td>
									
									
									
									<td>
                                        <button class="buttonUpdate btn modal-trigger"  name="" id="" href="#modalcityEdit">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for=""></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red" id="" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "">Test</td>
									<td id = "">Test</td>
									<td id = "">Test</td>
            						
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>

<!-- Modal city ADD -->

<div id="modalcityAdd" class="modal modal-fixed-footer" style="overflow:hidden; width: 500px !important; height:420px !important;">
        <div class="modal-header"><h2>City</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s4 push-s1">
							<div class="input-field">
								<input  id="" type="text" class="validate" name = "provinceID" disabled>
									<label for="">City ID</label>
							</div>
						</div>
						
						
					</div>
				
					<div class = "col s10 push-s1 selectheight">    
					   <select  class="browser-default" id = "" name = "" >
						   <option disabled selected>Choose Province</option>
							  <option id = "1" >Test1</option>
							  <option id = "2">Test2</option>
							  <option id = "3">Test3</option>
							  <option id = "4">Test4</option>
							  <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>

					   </select>
					</div>
					
					<div class="row">
						<div class="col s10 push-s1">
							<div class="input-field">
								<input id="strCity" type="text" class="validate" name = "city" required="" aria-required="true">
									<label for="">City</label> 
							</div>
						</div>
					</div>
				
						
	<!-- Modal Button Save -->
				
		
    		</div>
		<div class="modal-footer" style="background-color:#01579b !important;">
			<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
</div>

<!-- MODAL city EDIT -->
<div id="modalcityEdit" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:420px !important;">
	<div class="modal-header"><h2>Province</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s3 push-s1">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "cityID" readonly required="" aria-required="true" value = "1">
								<label for="editID">City ID</label>
							</div>
						</div>
					</div>
				
					<div class = "col s10 push-s1 selectheight">    
					   <select  class="browser-default selection" id = "" name = "" >
						   <option disabled>Choose Province</option>
							  <option id = "1" >Test1</option>
							  <option id = "2">Test2</option>
							  <option id = "3">Test3</option>
							  <option id = "4" selected>Metro Manila</option>
							  <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>
						   <option id = "5">Test5</option>

					   </select>
					</div>
				
					<div class="row">
						<div class="col s10 push-s1">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "city" required="" aria-required="true" value = "Manila City">
								<label for="editname">City</label> 
							</div>
						</div>
					</div>
				
					
						
	<!-- Modal Button Save -->
				
		
    		</div>
		<div class="modal-footer" style="background-color:#01579b !important;">
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
			
			
			
    	</div>
</div>

@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#dataTable").DataTable({
             "columns": [
            {"searchable": false},
			{"searchable": false},
			{"searchable": false},
            null,
            null,
			null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
			"lengthMenu": [5,10,15,20]


		});
	});
</script>
@stop