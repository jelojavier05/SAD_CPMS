@extends('layout.maintenanceLayout')

@section('title')
Unit of Measurement
@endsection

@section('content')	
<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:40px;">
            <div class="col s6" style="margin-top:-15px;">
                <h3 class="blue-text">Unit of Measurement</h3>
            </div>
            
            <div class="col s3 offset-s3">
                <button style="margin-top: 20px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modaluomAdd">
                    <i class="material-icons left">add</i> ADD
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:-5px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr >
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Body Attribute</th>
								<th>Unit of Measurement</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                           
                                <tr>
                                    <td> 
                                        <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            
                                                <input type="checkbox" checked class = "checkboxFlag" id = "">
                                            
                                            <span class="lever"></span>
                                        </label>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <button class="buttonUpdate btn modal-trigger" href="#modaluomEdit" id="" >
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <label for=""></label>
                                    </td>
                                    
                                    <td>
                                        <button class="buttonDelete btn red" id="">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    
                                    <td id = "">test1</td>
                                    <td id = "">Test1</td>
									<td>test1</td>
                                    
                                </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-----------------------------------------------------------modal start-------------------------->
<div id="modaluomAdd" class="modal modal-fixed-footer" style="overflow:hidden; width: 500px !important; height:420px !important;">
    <div class="modal-header">
        <h3>Unit of Measurement</h3>
    </div>
    
    <div class="modal-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
     
		<div class="row">
        <div class = "col 9 push-s1">    
            <select  class="browser-default" id = "addSelectProvince">
                <option disabled selected value = "0">Choose Body Attribute</option>
               
                    <option id = "" value = "">test1</option>
                
            </select>
        </div>
		</div>
        
        <div class="row">
            <div class="col s10 push-s1">
                <div class="input-field">
                    <input id="addBodyAttribute" type="text" class="validate" required="" aria-required="true">
                    <label for="">Body Attribute</label> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer" style="background-color:#01579b !important;">
        <button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>

<div id="modaluomEdit" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:420px !important;">
    <div class="modal-header">
        <h3>Unit of Measurement</h3>
    </div>
    
    <div class="modal-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="row">
            <div class="col s3 push-s1">
                <div class="input-field">
                    <input  id="editID" type="text" class="validate blue-text" name = "cityID" readonly required="" aria-required="true" value = "1">
                    <label for="editID">ID</label>
                </div>
            </div>
		</div>
        
		<div class="row">
			<div class = "col s5 push-s1">    
				<select  class="browser-default" id = "editUom" >
					<option disabled>Choose Body Attribute</option>
					
						<option id = "" value = "">Test1</option>
					
				</select>
			</div>
		</div>
		
        
        <div class="row">
            <div class="col s10 push-s1">
                <div class="input-field">
                    <input id="editname" type="text" class="validate" name = "city" required="" aria-required="true" value = "Height">
                    <label for="editname">Unit Of Measurement</label> 
                </div>
            </div>
        </div>
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