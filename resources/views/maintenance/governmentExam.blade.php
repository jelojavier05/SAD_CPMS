@extends('layout.maintenanceLayout')

@section('content')
	<h1>Government Exam</h1>
	<form action = "{{ route('governmentExamAdd') }} " method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type = "text" name = "governmentExamID" placeholder = "ID" readonly>
		<input type = "text" name = "governmentExamName" placeholder = "Government Exam Name">
		<input type = "submit" value = "Add">
	</form>

	<table>
		<tr>
			<td>ID</td>
			<td>Government Exam</td>
			<td>Action</td>
		</tr>

	@foreach ($governmentExams as $governmentExam)
		<tr>
			<td>{{ $governmentExam->intGovernmentExamID }}</td>
			<td>{{ $governmentExam->strGovernmentExam }}</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
	@endforeach
	</table>
@stop