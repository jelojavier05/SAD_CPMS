@extends('layout.maintenanceLayout')

@section('title')
Rank
@endsection

@section('content')

<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
            <div class="col s7 push-s1">
                <h3 class="blue-text">Rank</h3>
            </div>
            
            <div class="col s3 offset-s2">
                <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalrankAdd">
                    <i class="material-icons left">add</i> ADD
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Armed Service</th>
                                <th>Rank</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                           
                                <tr>
                                    <td> 
                                        <div class="switch" style="margin-right: -80px;">
                                        <label>
                                                <input type="checkbox" class = "checkboxFlag" id = "">                        
                                            <span class="lever"></span>
                                        </label>
                                        </div>
                                    </td>

                                    <td>
                                        <button class="buttonUpdate btn"name="" id="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <label for=""></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red" id="" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "">1</td>
                                    <td id = "">Philippine National Police</td>
									<td>test1</td>
                                    
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal BA ADD -->

<div id="modalrankAdd" class="modal modal-fixed-footer" style="overflow:hidden; width: 500px !important; height:400px !important; margin-top:50px;  border-radius:10px;">
        <div class="modal-header"><h4>Rank</h4></div>
        	<div class="modal-content">
				

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intRankID" type="text" class="validate" name = "" disabled>
								<label for="intRankID">Rank ID</label>
							</div>
						</div>
            		</div>
					
					<div class="row">
						<div class = "col 9">    
							<select  class="browser-default" id = "addArmedService">
								<option disabled selected value = "0">Armed Service</option>
								
                                    <option id = "" value = "">Test1</option>
									<option id = "" value = "">Test2</option>
                                
							</select>
						</div>
					</div>
					
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="addRank" type="text" class="validate" name = "" required="" aria-required="true">
								<label for="addRank">Rank</label> 
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
<!-- MODAL BA EDIT -->
<div id="modalrankEdit" class="modal modal-fixed-footer" style="overflow:hidden; width: 500px !important; height:400px !important; margin-top:50px;  border-radius:10px;">
	<div class="modal-header"><h4>Rank</h4></div>
        	<div class="modal-content">
				
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "" readonly required="" aria-required="true" value = " ">
								<label for="editID">Rank ID</label>
							</div>
						</div>
            		</div>
				
					<div class="row">
						<div class = "col 9">    
							<select  class="browser-default" id = "editRank">
								<option disabled selected value = "0">Armed Service</option>
								
                                    <option id = ""  value = "">Test1</option>
                                
							</select>
						</div>
					</div>
				
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "" required="" aria-required="true" value = " ">
								<label for="editname">Rank</label> 
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