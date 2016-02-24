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
	<form action = "{{ route('governmentExamUpdate') }}" method = "post">
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
			<td> <input type = "radio" name = "unitOfMeasurement" id = "{{ $unitOfMeasurement->intGovernmentExamID }}" 
				onclick = "radioClicked('{{$unitOfMeasurement->intUnitOfMeasurementID}}', '{{$unitOfMeasurement->strUnitOfMeasurement}}')"> </td>
			<td>{{ $unitOfMeasurement->intUnitOfMeasurementID }}</td>
			<td>{{ $unitOfMeasurement->strUnitOfMeasurement }}</td>
		</tr>
	@endforeach
	</table>
@stop