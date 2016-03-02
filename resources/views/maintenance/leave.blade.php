@extends('layout.maintenanceLayout')

@section('title')
Leave
@endsection

@section('content')

	

<!-- ADD EDIT DELETE BUTTON-->
		<div class="row">
			<div class="col s12">	
				<div class="col s3 offset-s3">
					<h1 class="colortitle blue-text text-darken-3">Leave</h1>
				</div>
				<div class="col s3 offset-s3">
					<button style="margin-top: 30px;" id="btnAdd" class="z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalleaveAdd"><i class="material-icons left">add</i>ADD</button></br></br>
				</div>

		</div>
	

<!-- TABLE -->

	 <div class="row">
     
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%;">	
				<table class="highlight white" style=" border-radius: 10px; margin-top: -8%">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalleaveAdd">
      							<i class="material-icons">add</i>
    						</button>

  						</div>
					</div>
           	<thead>
                    <tr>
						<th></th>
						<th></th>
						<th></th>
              			<th data-field="id">ID</th>
              			<th data-field="name">Leave Type</th>
						<th data-field="number">Default Leave</th>
                    </tr>
			</thead>
            
           <tbody>
			   
          			<tr>
						@foreach ($leaves as $leave)
            			<td><button class="btn large modal-trigger"  name="leave" id="{{ $leave->intLeaveID }}" 
            				onclick="radioClicked('{{$leave->intLeaveID}}','{{$leave->strLeaveType}}',
							'{{$leave->intDefaultLeave}}')" href="#modalleaveEdit">Update</button>
            			<label for="{{ $leave->intLeaveID }}"></label> </td>
						<td>
							<button class="btn waves-effect waves-light red" style="margin-right: 10px;"
							onclick = "deleteConfirmation()">Delete
							</button>
						</td>
						<td><!-- Switch -->
						  <div class="switch">
							<label>
							  Off
							  <input type="checkbox">
							  <span class="lever"></span>
							  On
							</label>
						  </div>
						</td>
						<td>{{ $leave->intLeaveID }}</td>
            			<td>{{ $leave->strLeaveType }}</td>
            			<td>{{ $leave->intDefaultLeave }}</td>
						<td></td>
          			</tr>
          		@endforeach
          
        </tbody>
				
					</table>
				
				</div>
				
				<!-- Pagination -->
				<div class="row">
					<div class="col s3 push-s4">
						<div  style="position:absolute; margin-top:-115px;">{!! $leaves->render() !!}</div>
				</div></div></div>
			
			</br></br></br></br></br>
			
			

			
		
    </div>

<!-- Modal Leave ADD -->

<div id="modalleaveAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Leave</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('leaveAdd') }} " method = "post">
							
								<input  id="intLeaveID" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intLeaveID" type="text" class="validate" name = "leaveID" disabled>
									<label for="intLeaveID">Leave ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strLeaveType" type="text" class="validate" name = "leaveType" required="" aria-required="true">
									<label for="strLeaveType">Leave Type</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="intDefaultLeave" type="text" class="validate" pattern="[0-9]{0,}" name = "defaultLeave" required="" aria-required="true">
										<label for="intDefaultLeave">DefaultLeave</label> 
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
<!-- MODAL LEAVE EDIT -->
<div id="modalleaveEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Leave</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('leaveUpdate') }}" method = "post">
					<input  id="intLeaveID" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "editLeaveID" readonly required="" aria-required="true" value = "test">
									<label for="intLeaveID">Leave ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "editLeaveType" required="" aria-required="true" value = "test">
									<label for="strLeaveType">Leave Type</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="editDefault" type="text" class="validate" pattern="[0-9]{0,}" name = "editDefaultLeave" required="" aria-required="true" value = "test">
										<label for="intDefaultLeave">DefaultLeave</label> 
								</div>
							</div>
					</div>
      	<input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			
			
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

	function radioClicked(strID, strName, strCount){
		document.getElementById('editID').value = strID;
		document.getElementById('editname').value = strName;
		document.getElementById('editDefault').value = strCount;
	}

	</script>
@stop