@extends('layout.maintenanceLayout')

@section('content')
	
	<h1>Armed Service</h1>
	<form action = "{{ route('armedServiceUpdate') }}" method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input id = "editID" type = "text" name = "armedServiceID" placeholder = "ID" readonly>
		<input id = "editname" type = "text" name = "armedServiceName" placeholder = "Armed Service Name">
		<textarea id = "editdescription" name = "armedServiceDescription" placeholder = "Description"></textarea>
		<input id = "submit" type = "submit" value = "Save">
	</form>

	<table>
		<tr>
			<td></td>
			<td>ID</td>
			<td>Armed Service</td>
			<td>Description</td>
		</tr>
	@foreach ($armedServices as $armedService)
		<tr>
			<td> <input type = "radio" name = "armedService" id = "{{ $armedService->intArmedServiceID }}" 
				onclick = "radioClicked('{{$armedService->intArmedServiceID}}', '{{$armedService->strArmedServiceName}}',
				'{{$armedService->strDescription}}')"> </td>
			<td>{{ $armedService->intArmedServiceID }}</td>
			<td>{{ $armedService->strArmedServiceName }}</td>
			<td>{{ $armedService->strDescription }}</td>
			<td>
			</td>
		</tr>
	@endforeach

	
	</table>

	<button id="btnAdd">ADD</button>
	

  <div id="myModal" class="modal">
  <div class="modal-content">
    
	<form action = "{{ route('armedServiceAdd') }}" method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input id = "ID" type = "text" name = "armedServiceID" placeholder = "ID" readonly>
		<input id = "name" type = "text" name = "armedServiceName" placeholder = "Armed Service Name">
		<textarea id = "description" name = "armedServiceDescription" placeholder = "Description"></textarea>
		<input id = "submit" type = "submit"  value = "Save">
	</form>
	<div class="closepos"><span class="close">x<span></div>
  </div>

</div>
	<button id = "btnEdit"name = "btnEdit" onclick = "editButton(this.id)" disabled>Edit</button>
	<button id = "btnDelete" name = "btnDelete" disabled>Delete</button>
	<div id="myModal1" class="modal">
		<div class="modal-content">
	<form action = "{{ route('armedServiceUpdate') }}" method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input id = "editID" type = "text" name = "armedServiceID" placeholder = "ID" readonly>
		<input id = "editname" type = "text" name = "armedServiceName" placeholder = "Armed Service Name">
		<textarea id = "editdescription" name = "armedServiceDescription" placeholder = "Description"></textarea>
		<input id = "submit" type = "submit" value = "Save">
	</form>
	
	
	@parent
		<p>This is appended to the master sidebar.</p>

@stop

@section('script')
<script>// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("btnAdd");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script src = "/javascript/maintenance/armedService.js"></script>
@stop