@extends('layout.maintenanceLayout')

@section('title')
Province
@endsection

@section('content')

<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
<!--            <div class="row">-->
                <div class="col s7 push-s1">
                    <h2 class="blue-text">Province</h2>
                </div>

                <div class="col s3 offset-s2">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalprovinceAdd">
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
                                <th>Name</th>
								
                                
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
                                        <button class="buttonUpdate btn modal-trigger"  name="" id="" href="#modalprovinceEdit">
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
            						
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>
	
<!-- Modal province ADD -->

<div id="modalprovinceAdd" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:420px !important;">
        <div class="modal-header"><h2>Province</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col s4 push-s1">
							<div class="input-field">
								<input  id="" type="text" class="validate" name = "provinceID" disabled>
									<label for="">Province ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s10 push-s1">
							<div class="input-field">
								<input id="strProvince" type="text" class="validate" name = "province" required="" aria-required="true">
									<label for="">Province</label> 
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

<!-- MODAL province EDIT -->
<div id="modalprovinceEdit" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:420px !important;">
	<div class="modal-header"><h2>Province</h2></div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="row">
						<div class="col s3 push-s1">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "provinceID" readonly required="" aria-required="true" value = "test">
								<label for="editID">Province ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s10 push-s1">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "province" required="" aria-required="true" value = "test">
								<label for="editname">Province</label> 
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
            null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
			"lengthMenu": [5,10,15,20]


		});
	});
</script>
@stop