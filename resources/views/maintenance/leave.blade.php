@extends('layout.maintenanceLayout')

@section('title')
Leave
@endsection

@section('content')

<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">	
			<div class="col s3 offset-s3">
				<h1 class="colortitle">Leave</h1>
			</div>
			<div class="col s3 offset-s3">
				<button id="btnAdd" class="btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalleaveAdd"><i class="material-icons">add</i> ADD</button></br></br>
			</div>
<!--
			<div class="col s3">
				<button id="btnEdit" class="btn-large waves-effect waves-light blue hide-on-med-and-down modal-trigger" href="#modalleaveEdit" onclick = "editButton(this.id)" disabled><i class="material-icons">settings</i> EDIT</button></br></br>
			</div>
			<div class="col s3">
				<button id="btnDelete" class="btn-large waves-effect waves-light red hide-on-med-and-down" disabled><i class="material-icons">delete</i> DELETE</button>
			</div>
-->
		</div>
	

<!-- TABLE -->

	 <div class="row">
        <div class="container">
        	<div class="col s10 push-s2">
            	<div class="scroll">
					
				<table class="highlight white" style="margin-top: -10px;">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalleaveAdd">
      							<i class="material-icons">add</i>
    						</button>
<!--
    							<ul>
      						<li><button class="btn-floating green modal-trigger hide-on-large-only" href="#modalleaveAdd" id="btnsmallAdd"><i class="material-icons">add</i></button></li>
      						<li><button class="btn-floating blue modal-trigger hide-on-large-only" href="#modalleaveEdit" id="btnsmallEdit" disabled onclick = "editButton(this.id)"><i class="material-icons">settings</i></button></li>
      						<li><button class="btn-floating red darken-4 hide-on-large-only" id="btnsmallDelete" disabled><i class="material-icons">delete</i></button></li>
      
    							</ul>
-->
  						</div>
					</div>
           	<thead>
                    <tr>
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
						<td>{{ $leave->intLeaveID }}</td>
            			<td>{{ $leave->strLeaveType }}</td>
            			<td>{{ $leave->intDefaultLeave }}</td>	
          			</tr>
          		@endforeach
          {!! $leaves->render() !!}
        </tbody>
				</table></div>
			</div>
			</br></br></br></br></br>
			
			<!-- Pagination -->
<!--
			<center>
				<ul class="pagination">
					<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
					<li class="active"><a href="#!">1</a></li>
					<li class="waves-effect"><a href="#!">2</a></li>
					<li class="waves-effect"><a href="#!">3</a></li>
					<li class="waves-effect"><a href="#!">4</a></li>
					<li class="waves-effect"><a href="#!">5</a></li>
					<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
				</ul>
			</center>
-->
			
		</div> 
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
      
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			<button class="btn waves-effect waves-light red" style="margin-right: 30px;">Delete
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

	<!-- insert -->
<!--
	<form action = "{{ route('leaveAdd') }} " method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type = "text" name = "leaveID" placeholder = "ID" readonly>
		<input type = "text" name = "leaveType" placeholder = "Leave Type">
		<input type = "text" name = "defaultLeave" placeholder = "Default Leave">
		<input type = "submit" value = "Save">
	</form>
-->
	<!-- update -->
<!--
	<form action = "{{ route('leaveUpdate') }}" method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input id = "editID" type = "text" name = "leaveID" placeholder = "ID" readonly>
		<input id = "editname" type = "text" name = "leaveType" placeholder = "Armed Service Name">
		<input id = "editDefault"type = "text" name = "defaultLeave" placeholder = "Default Leave">
		<input id = "submit" type = "submit" value = "Save">
	</form>
-->

<!--
	<table>
		<tr>
			<td></td>
			<td>ID</td>
			<td>Leave Type</td>
			<td>Default Leave</td>
			
		</tr>

	@foreach ($leaves as $leave)
		<tr>
			<td> <input type = "radio" name = "leave" id = "{{ $leave->intLeaveID }}" 
				onclick = "radioClicked('{{$leave->intLeaveID}}', '{{$leave->strLeaveType}}',
				'{{$leave->intDefaultLeave}}')"> </td>
			<td>{{ $leave->intLeaveID }}</td>
			<td>{{ $leave->strLeaveType }}</td>
			<td>{{ $leave->intDefaultLeave }}</td>
		</tr>
	@endforeach
	</table>
-->

<!--
	<button id = "btnAdd" name = "btnAdd" >Add</button>
	<button id = "btnEdit" name = "btnEdit" onclick = "editButton(this.id)" disabled>Edit</button>
	<button id = "btnDelete" name = "btnDelete" disabled>Delete</button>
-->
	


@stop

@section('script')
	<script src = "/javascript/maintenance/leave.js"></script>
@stop