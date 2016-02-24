@extends('layout.maintenanceLayout')

@section('content')
	<h1>Unit Of Measurement</h1>
	<!-- insert -->
	<form action = "{{ route('unitOfMeasurementAdd') }} " method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type = "text" name = "unitOfMeasurementID" placeholder = "ID" readonly>
		<input type = "text" name = "unitOfMeasurement" placeholder = "Unit Of Measurement">
		<input type = "submit" value = "Save">
	</form>
	<!-- update -->
	<form action = "{{ route('unitOfMeasurementUpdate') }}" method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input id = "editID" type = "text" name = "unitOfMeasurementID" placeholder = "ID" readonly>
		<input id = "editname" type = "text" name = "unitOfMeasurement" placeholder = "Unit Of Measurement">
		<input id = "submit" type = "submit" value = "Save">
	</form>


	<table>
		<tr>
			<td></td>
			<td>ID</td>
			<td>Unit Of Measurement</td>
			
		</tr>

	@foreach ($unitOfMeasurements as $unitOfMeasurement)
		<tr>
			<td> <input type = "radio" name = "unitOfMeasurement" id = "{{ $unitOfMeasurement->intUnitOfMeasurementID }}" 
				onclick = "radioClicked('{{$unitOfMeasurement->intUnitOfMeasurementID}}', '{{$unitOfMeasurement->strUnitOfMeasurement}}')"> </td>
			<td>{{ $unitOfMeasurement->intUnitOfMeasurementID }}</td>
			<td>{{ $unitOfMeasurement->strUnitOfMeasurement }}</td>
		</tr>
	@endforeach
	</table>

	<button id = "btnAdd" name = "btnAdd">Add</button>
	<button id = "btnEdit"name = "btnEdit" onclick = "editButton(this.id)" disabled>Edit</button>
	<button id = "btnDelete" name = "btnDelete" disabled>Delete</button>

@stop

@section('script')
	<script src="/javascript/maintenance/unitOfMeasurement.js"></script>
@stop