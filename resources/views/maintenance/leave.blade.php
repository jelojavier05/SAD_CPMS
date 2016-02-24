@extends('layout.maintenanceLayout')

@section('content')
	<h1>Leave</h1>
	<!-- insert -->
	<form action = "{{ route('leaveAdd') }} " method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type = "text" name = "leaveID" placeholder = "ID" readonly>
		<input type = "text" name = "leaveType" placeholder = "Leave Type">
		<input type = "text" name = "defaultLeave" placeholder = "Default Leave">
		<input type = "submit" value = "Save">
	</form>
	<!-- update -->
	<form action = "{{ route('leaveUpdate') }}" method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input id = "editID" type = "text" name = "leaveID" placeholder = "ID" readonly>
		<input id = "editname" type = "text" name = "leaveType" placeholder = "Armed Service Name">
		<input id = "editDefault"type = "text" name = "defaultLeave" placeholder = "Default Leave">
		<input id = "submit" type = "submit" value = "Save">
	</form>

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

	<button id = "btnAdd" name = "btnAdd" >Add</button>
	<button id = "btnEdit" name = "btnEdit" onclick = "editButton(this.id)" disabled>Edit</button>
	<button id = "btnDelete" name = "btnDelete" disabled>Delete</button>


@stop

@section('script')
	<script src = "/javascript/maintenance/leave.js"></script>
@stop