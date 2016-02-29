@extends('layout.maintenanceLayout')

@section('title')
Requirements
@endsection

@section('content')

<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">
			<div class="col s5 offset-s3">
				<div class="flow-text">
					<h1 class="colortitle blue-text text-darken-3">Requirements</h1>
				</div>
			</div>
			<div class="col s2 offset-s1">
				<button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalrequirementsAdd"><i class="material-icons left">add</i> ADD</button></br></br>
</div></div>

<!-- TABLE -->

	 <div class="row">
        
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%;">
					
				<table class="highlight white" style="border-radius: 10px; margin-top: -8%">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalrequirementsAdd">
      							<i class="material-icons">add</i>
    						</button>

  						</div>
					</div>
           	<thead>
                    <tr>
						<th></th>
              			<th data-field="id">ID</th>
              			<th data-field="name">Name</th>
						<th data-field="name">Description</th>
						
                    </tr>
			</thead>
            
           <tbody>
			   
          			<tr>
						@foreach ()
            			<td><button class="btn large modal-trigger"  name="" id = "{{  }}" onclick="radioClicked('')" href="#modalrequirementsEdit">Update</button>
            			<label for="{{  }}"></label> </td>
						<td>{{  }}</td>
            			<td>{{  }}</td>
						<td>{{  }}</td>
            				
          			</tr>
          		@endforeach
          
        </tbody>
				</table>
				
				</div>
				<!-- Pagination -->
				<div class="row">
					<div class="col s3 push-s4">
						<div style="position:absolute; margin-top: -115px;">{!!  !!}</div>
					</div></div>
			</div>
				
			
			
			</br></br></br></br></br>

</div>
				


<!-- Modal Requirements ADD -->

<div id="modalrequirementsAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Requirement</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('') }}" method = "post">
							
								<input  id="" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="" type="text" class="validate" name = "" disabled>
									<label for="">Requirement ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="" type="text" class="validate" name = "" required="" aria-required="true">
									<label for="">Requirement Name</label> 
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="" type="text" class="validate"  name = "" required="" aria-required="true">
										<label for="">Description</label> 
								</div>
							</div>
						</div>
						
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			<button class="btn waves-effect waves-light" type="submit" name="action" style="margin-right: 30px;">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
				</form>
		</div>

<!-- MODAL Requirements EDIT -->
<div id="modalrequirementsEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Requirement</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('') }}" method = "post">
					<input  id="" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate"  name = "" readonly required="" aria-required="true" value = "test">
									<label for="editID">Requirement ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "" required="" aria-required="true" value = "test">
									<label for="editname">Requirement Name</label> 
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="editdescription" type="text" class="validate"  name = "" required="" aria-required="true" value = "test">
										<label for="editDescription">Description</label> 
								</div>
							</div>
					</div>
						
      
	<!-- Modal Button Save -->
		<input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
		<div class="modal-footer">
			<button formaction = "{{ route('') }}" class="btn waves-effect waves-light red" style="margin-right: 30px;"
			onclick = "deleteConfirmation()">Delete
    			<i class="material-icons right">stop</i>
  			</button>
			
			<button class="btn waves-effect waves-light" type="submit" name="action1" style="margin-right: 30px;">Update
    			<i class="material-icons right">send</i>
  			</button>
			
    	</div>
    		</div>
				</form>
</div>
</div>

@stop

@section('script')

<script type="text/javascript">
function radioClicked(strID, strName, strDescription){
	document.getElementById('editID').value = strID;
	document.getElementById('editname').value = strName;
	document.getElementById('editdescription').value = strDescription;
}

</script>
@stop