@extends('layout.maintenanceLayout')

@section('content')
	<h1>Armed Service</h1>
	<form action = "{{ route('armedServiceAdd') }} " method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type = "text" name = "armedServiceID" placeholder = "ID" readonly>
		<input type = "text" name = "armedServiceName" placeholder = "Armed Service Name">
		<textarea  name = "armedServiceDescription" placeholder = "Description"></textarea>
		<input type = "submit" value = "Add">
	</form>

	<table>
		<tr>
			<td>ID</td>
			<td>Armed Service</td>
			<td>Description</td>
			<td>Action</td>
		</tr>
	@foreach ($armedServices as $armedService)
		<tr>
			<td>{{ $armedService->intArmedServiceID }}</td>
			<td>{{ $armedService->strArmedServiceName }}</td>
			<td>{{ $armedService->strDescription }}</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
	@endforeach
	</table>

	
@stop