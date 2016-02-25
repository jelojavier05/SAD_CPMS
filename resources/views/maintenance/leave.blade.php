@extends('layout.maintenanceLayout')

@section('content')

<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">	
			<div class="col s3 offset-s3">
				<button id="btnAdd" class="btn-large waves-effect waves-light green hide-on-small-only modal-trigger" href="#modalleaveAdd"><i class="material-icons">add</i> ADD</button></br></br>
			</div>
			<div class="col s3">
				<button id="btnEdit" class="btn-large waves-effect waves-light blue hide-on-small-only modal-trigger" href="#modalleaveEdit" onclick = "editButton(this.id)" disabled><i class="material-icons">settings</i> EDIT</button></br></br>
			</div>
			<div class="col s3">
				<button id="btnDelete" class="btn-large waves-effect waves-light red hide-on-small-only" disabled><i class="material-icons">delete</i> DELETE</button>
			</div>
		</div>
	

<!-- TABLE -->

	 <div class="row">
        <div class="container">
        	<div class="col l12 offset-l1">
            	<div class="scroll">
				<table class="highlight white" style="margin-top: -10px;">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<a class="btn-floating btn-large red hide-on-large-only">
      							<i class="large mdi-navigation-menu"></i>
    						</a>
    							<ul>
      						<li><a class="btn-floating green modal-trigger hide-on-large-only" href="#modalleaveAdd"><i class="material-icons">add</i></a></li>
      						<li><a class="btn-floating blue modal-trigger hide-on-large-only" href="#modalleaveEdit"><i class="material-icons">settings</i></a></li>
      						<li><a class="btn-floating red darken-4 hide-on-large-only"><i class="material-icons">delete</i></a></li>
      
    							</ul>
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
			   @foreach ($leaves as $leave)
          			<tr>
            			<td><input class="with-gap" name="leave" type="radio" id="{{ $leave->intLeaveID }}" onclick="radioClicked('{{$leave->intLeaveID}}','{{$leave->strLeaveType}}','{{$leave->intDefaultLeave}}')" /></td>
						<td>{{ $leave->intLeaveID }}</td>
            			<td>{{ $leave->strLeaveType }}</td>
            			<td>{{ $leave->intDefaultLeave }}</td>
						
      					
          			</tr>
          			@endforeach
			   		
			   
			   		
               
      
          
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

<div id="modalleaveAdd" class="modal">
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
									<input id="intDefaultLeave" type="text" class="validate" name = "defaultLeave" required="" aria-required="true">
										<label for="intDefaultLeave">DefaultLeave</label> 
								</div>
							</div>
						</div>
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			
			<button class="btn waves-effect waves-light modal-close red" style="margin-right: 30px;">Cancel
    			<i class="material-icons right">stop</i>
  			</button>
			<button class="btn waves-effect waves-light" type="submit" name="action" style="margin-right: 30px;">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
				</form>
		</div>
<!-- MODAL LEAVE EDIT -->
<div id="modalleaveEdit" class="modal">
	<div class="modal-header"><h2>Leave</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('leaveUpdate') }}" method = "post">
					<input  id="intLeaveID" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "leaveID" disabled required="" aria-required="true">
									<label for="intLeaveID">Leave ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "leaveType" required="" aria-required="true">
									<label for="strLeaveType">Leave Type</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="editDefault" type="text" class="validate" name = "defaultLeave" required="" aria-required="true">
										<label for="intDefaultLeave">DefaultLeave</label> 
								</div>
							</div>
					</div>
      
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
     		<button class="btn waves-effect waves-light modal-close red" style="margin-right: 30px;">Cancel
    			<i class="material-icons right">stop</i>
  			</button>
			<button class="btn waves-effect waves-light" type="submit" name="action" style="margin-right: 30px;">Save
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