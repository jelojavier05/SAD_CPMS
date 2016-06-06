@extends('layout.maintenanceLayout')

@section('title')
Type of Contract
@endsection

@section('content')	
<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:40px;">
<!--            <div class="row">-->
                <div class="col s6 push-s1" style="margin-top:-15px;">
                    <h2 class="blue-text">Type of Contract</h2>
                </div>

                <div class="col s3 offset-s3">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalcontracttypeAdd">
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
                                <th>Type of Contract</th>
								<th>Description</th>
								<th>Duration</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                           
                                <tr>
                                    
									<td> 
                                        <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            
                                            
                                            <input type="checkbox" checked class = "checkboxFlag" id = "">
                                            
                                            <input type="checkbox" class = "checkboxFlag" id = "" >
                                          
                                            <span class="lever"></span>
                                            
                                        </label>
                                        </div>
                                    </td>
									
									
									
									<td>
                                        <button class="buttonUpdate btn modal-trigger"  name="" id="" href="#modalcontracttypeEdit" >
                                            <i class="material-icons">edit</i>
                                        </button>
                                    <label for=""></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red modal-trigger" id="" href="#modalcontracttypeDelete">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "">test</td>
            						
									<td id = "">test</td>
                                    
                                    <td id = "">test</td>
									
									<td id = "">test</td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
<!--        </br></br></br></br></br>-->
        </div>
    </div>

<!-- Modal contracttype ADD -->

<div id="modalcontracttypeAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Type of Contract</h2></div>
        	<div class="modal-content">
<!--				<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
				<div class="row">
					<div class="col s6">
				
							<div class="row">
								<div class="col s10">
									<div class="input-field">
										<input  id="intContractTypeID" type="text" class="validate" name = "contractTypeID" disabled>
											<label for="intContractTypeID">Type of Contract ID</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input id="strContractTypeAdd" type="text" class="validate" name = "contractTypeName" required="" aria-required="true">
											<label for="strContractTypeAdd">Type of Contract</label> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input id="strContractTypeDescAdd" type="text" class="validate"  name = "contractTypeDescription" required="" aria-required="true">
										<label for="strContractTypeDescAdd">Description</label> 
									</div>
								</div>
							</div>
					</div>
					<div class="col s6">
							<div class="row">
								<div class="col s8">
									<div class="input-field">
										<input id="intDuration" type="text" class="validate" pattern="[0-9]{0,}" name = "" required="" aria-required="true">
										<label for="">Duration</label> 
									</div>
								</div>
							</div>
					</div>
				</div>
						
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
		</div>
<!-- MODAL contracttype EDIT -->
<div id="modalcontracttypeEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Type of Contract</h2></div>
        	<div class="modal-content">
<!--				<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
					
				<div class="row">
					<div class="col s6">
				
							<div class="row">
								<div class="col s8">
									<div class="input-field">
										<input  id="editID" type="text" class="validate" name = "contractTypeID" readonly required="" aria-required="true" value = " ">
											<label for="editID">Type of Contract ID</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input id="editname" type="text" class="validate" name = "contractTypeName" required="" aria-required="true" value = " ">
											<label for="editname">Type of Contract</label> 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input id="editdescription" type="text" class="validate"  name = "contractTypeDescription" required="" aria-required="true" value = " ">
										<label for="editDescription">Description</label> 
									</div>
								</div>
							</div>
					</div>
					<div class="col s6">
							<div class="row">
								<div class="col s8">
									<div class="input-field">
										<input id="editDefault" type="text" class="validate" pattern="[0-9]{0,}" name = "" required="" aria-required="true" value = "test">
										<label for="">Duration</label> 
									</div>
								</div>
							</div>
					</div>
				</div>
						
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
			
			
			
    	</div>
    		</div>
</div>
<!----------------------------modal delete contracttype ------------------------------>

<div id="modalcontracttypeDelete" class="modal bottom-sheet" style="height: 250px !important; overflow:hidden;">
            <div class="modal-header blue"><h2 class="white-text">Delete</h2></div>
<!--            <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
            <div class="modal-content">

                <div class="row">
                    <div class="col s12">
                        <h3 class="center">Confirm Delete</h3>
                    </div>
                </div>
                <input type="hidden" name="idDelete" id = "deleteID">
                <div class="row">
                    <div class="col s3 push-s5">
                        <button class=" btn waves-effect waves-light red large" name="action" style="margin-left: 20px;" id = "btnDelete">
                            <i class="material-icons left">delete</i>Delete
                        </button>

                    </div>	
                </div>

            </div>
</div>
@stop

@section('script')
    <script type="text/javascript">
		$(document).ready(function(){

            $("#dataTable").DataTable({
                 "columns": [
                { "orderable": false },
                { "orderable": false },
                { "orderable": false },
                null,
                null,
                null,
				null
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
		});
	</script>
@stop
		