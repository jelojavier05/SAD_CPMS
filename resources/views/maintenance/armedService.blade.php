@extends('layout.maintenanceLayout')

@section('title')
Armed Service
@endsection

@section('content')

<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">	
			<div class="col s4 offset-s3">
				<h1 class="colortitle">Armed Service</h1>
			</div>
			<div class="col s3 offset-s2">
				<button style="margin-top: 60px;" id="btnAdd" class="btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalarmedserviceAdd"><i class="material-icons">add</i> ADD</button></br></br>
	</div></div>

<!-- TABLE -->

	 <div class="row">
        <div class="container">
        	<div class="col s10 push-s2">
            	<div class="scroll">
					
				<table class="highlight white" style="margin-top: -10px;">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalarmedserviceAdd">
      							<i class="material-icons">add</i>
    						</button>
<!--
    							<ul>
      						<li><button class="btn-floating green modal-trigger hide-on-large-only" href="#modalleaveAdd" id="btnsmallAdd"><i class="material-icons">add</i></button></li>
      						<li><button class="btn-floating blue modal-trigger hide-on-large-only" href="#modalleaveEdit" id="btnsmallEdit" disabled onclick = "editButton(this.id)"><i class="material-icons">settings</i></button></li>
      						<li><button class="btn-floating red darken-4 hide-on-large-only" id="btnsmallDelete" disabled><i class="material-icons">delete</i></button></li>
      
    							</ul>
-->
  						</div>
					</div>
           	<thead>
                    <tr>
						<th></th>
              			<th data-field="id">ID</th>
              			<th data-field="name">Armed Service</th>
						<th data-field="number">Description</th>
                    </tr>
			</thead>
            
           <tbody>
			   
          			<tr>
						@foreach ($armedServices as $armedService)
            			<td><button class="btn large modal-trigger"  name="armedService" id="{{ $armedService->intArmedServiceID }}" 
            				onclick="radioClicked('{{$armedService->intArmedServiceID}}', '{{$armedService->strArmedServiceName}}',
				'{{$armedService->strDescription}}')" href="#modalarmedserviceEdit">Update</button>
            			<label for="{{ $armedService->intArmedServiceID }}"></label> </td>
						<td>{{ $armedService->intArmedServiceID }}</td>
            			<td>{{ $armedService->strArmedServiceName }}</td>
            			<td>{{ $armedService->strDescription }}</td>	
          			</tr>
          		@endforeach
          
        </tbody>
				</table>
				
				</div>
				
			<center><div class="white">{!! $armedServices->render() !!}</div></center>
			</div>
			</br></br></br></br></br>

			</div>
			</div>


<!-- Modal Armed Service ADD -->

<div id="modalarmedserviceAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Armed Service</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('armedServiceAdd') }}" method = "post">
							
								<input  id="intArmedServiceID" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intArmedServiceID" type="text" class="validate" name = "armedServiceID" disabled>
									<label for="intArmedServiceID">Armed Service ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strArmedServiceDesc" type="text" class="validate" name = "armedServiceName" required="" aria-required="true">
									<label for="strArmedServiceDesc">Armed Service Type</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="strArmedServiceDesc" type="text" class="validate"  name = "armedServiceDescription" required="" aria-required="true">
										<label for="strArmedServiceDesc">Description</label> 
								</div>
							</div>
						</div>
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			<button class="btn waves-effect waves-light" type="submit" name="action" style="margin-right: 30px;">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
				</form>
		</div>

<!-- MODAL Armed Service EDIT -->
<div id="modalarmedserviceEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Armed Service</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('armedServiceUpdate') }}" method = "post">
					<input  id="intArmedServiceID" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "armedServiceID" readonly required="" aria-required="true" value = "test">
									<label for="editID">Armed Service ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "armedServiceName" required="" aria-required="true" value = "test">
									<label for="editname">Armed Service Type</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="editDescription" type="text" class="validate"  name = "armedServiceDescription" required="" aria-required="true" value = "test">
										<label for="editDescription">Description</label> 
								</div>
							</div>
					</div>
      
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			<button class="btn waves-effect waves-light red" style="margin-right: 30px;">Delete
    			<i class="material-icons right">stop</i>
  			</button>
			
			<button class="btn waves-effect waves-light" type="submit" name="action1" style="margin-right: 30px;">Update
    			<i class="material-icons right">send</i>
  			</button>
			
    	</div>
    		</div>
				</form>
</div>
</div>
	
<!--
	<h1>Armed Service</h1>
	<form action = "{{ route('armedServiceUpdate') }}" method = "post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input id = "editID" type = "text" name = "armedServiceID" placeholder = "ID" readonly>
		<input id = "editname" type = "text" name = "armedServiceName" placeholder = "Armed Service Name">
		<textarea id = "editdescription" name = "armedServiceDescription" placeholder = "Description"></textarea>
		<input id = "submit" type = "submit" value = "Save">
	</form>
-->

<!--
	<table>
		<tr>
			<td></td>
			<td>ID</td>
			<td>Armed Service</td>
			<td>Description</td>
		</tr>
-->
	
<!--
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
-->


	
<!--
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
-->
	
	
	

@stop

@section('script')


<script src = "/javascript/maintenance/armedService.js"></script>
@stop