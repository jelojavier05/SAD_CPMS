@extends('layout.maintenanceLayout')


@section('content')
	<h1>Vital Statistics</h1>
	<form action = "{{ route('vitalStatisticsAdd') }} " method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type = "text" name = "vitalStatisticsID" placeholder = "ID" readonly>
		<input type = "text" name = "vitalStatistics" placeholder = "Vital Statistics">
		<input type = "submit" value = "Add">
	</form>

	<table>
		<tr>
			<td>ID</td>
			<td>Vital Statistics</td>
			<td>Action</td>
		</tr>

	@foreach ($vitalStatistics as $vitalStatistic)
		<tr>
			<td>{{ $vitalStatistic->intVitalStatisticsID }}</td>
			<td>{{ $vitalStatistic->strVitalStatisticsName }}</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
	@endforeach
	</table>
@stop