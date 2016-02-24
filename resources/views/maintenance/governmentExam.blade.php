@extends('layout.maintenanceLayout')

@section('content')
	<h1>Government Exam</h1>
	<!-- insert -->
	<form action = "{{ route('governmentExamAdd') }} " method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type = "text" name = "governmentExamID" placeholder = "ID" readonly>
		<input type = "text" name = "governmentExamName" placeholder = "Government Exam Name">
		<input type = "submit" value = "Save" >
	</form>
	<!-- update -->
	<form action = "{{ route('governmentExamUpdate') }}" method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input id = "editID" type = "text" name = "governmentExamID" placeholder = "ID" readonly>
		<input id = "editname" type = "text" name = "governmentExam" placeholder = "Armed Service Name">
		<input id = "submit" type = "submit" value = "Save">
	</form>

	<table>
		<tr>
			<td>ID</td>
			<td>Government Exam</td>
		</tr>

	@foreach ($governmentExams as $governmentExam)
		<tr>
			<td> <input type = "radio" name = "governmentExam" id = "{{ $governmentExam->intGovernmentExamID }}" 
				onclick = "radioClicked('{{$governmentExam->intGovernmentExamID}}', '{{$governmentExam->strGovernmentExam}}')"> </td>
			<td>{{ $governmentExam->intGovernmentExamID }}</td>
			<td>{{ $governmentExam->strGovernmentExam }}</td>
		</tr>
	@endforeach
	</table>

	<button id = "btnAdd" name = "btnAdd">Add</button>
	<button id = "btnEdit"name = "btnEdit" onclick = "editButton(this.id)" disabled>Edit</button>
	<button id = "btnDelete" name = "btnDelete" disabled>Delete</button>
@stop

@section('script')
	<script src = "/javascript/maintenance/governmentExam.js"></script>
@stop