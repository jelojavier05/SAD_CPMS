@extends('layout.maintenanceLayout')

@section('content')
	<h1>Unit Of Measurement</h1>
	<form action = "{{ route('unitOfMeasurementAdd') }} " method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type = "text" name = "unitOfMeasurementID" placeholder = "ID" readonly>
		<input type = "text" name = "unitOfMeasurement" placeholder = "Unit Of Measurement">
		<input type = "submit" value = "Add">
	</form>

	<table>
		<tr>
			<td>ID</td>
			<td>Unit Of Measurement</td>
			<td>Action</td>
		</tr>

	@foreach ($unitOfMeasurements as $unitOfMeasurement)
		<tr>
			<td>{{ $unitOfMeasurement->intUnitOfMeasurementID }}</td>
			<td>{{ $unitOfMeasurement->strUnitOfMeasurement }}</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
	@endforeach
	</table>
@stop