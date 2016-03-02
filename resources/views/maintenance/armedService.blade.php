@extends('layout.maintenanceLayout')

@section('title')
Armed Service
@endsection

@section('content')	
	
<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">
			<div class="col s4 offset-s3">
				<div class="flow-text">
					<h1 class="colortitle blue-text text-darken-3">Armed Service</h1>
				</div>
			</div>
			<div class="col s3 offset-s2">
				<button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalarmedserviceAdd"><i class="material-icons left">add</i> ADD</button></br></br>
</div></div>

<!-- TABLE -->

	 <div class="row">
        
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%;">
					
				<table class="highlight white" style="border-radius: 10px; margin-top: -8%">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalarmedserviceAdd">
      							<i class="material-icons">add</i>
    						</button>

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
            			<td><button class="buttonUpdate btn large modal-trigger"  name="armedService" id="{{ $armedService->intArmedServiceID }}" 
            				onclick="radioClicked('{{$armedService->intArmedServiceID}}', '{{$armedService->strArmedServiceName}}',
						'{{$armedService->strDescription}}')" href="#modalarmedserviceEdit" style="margin-left: 70px;">Update</button>
            			<label for="{{ $armedService->intArmedServiceID }}"></label> </td>
						
<!--
						<td> Switch 
						  <div class="switch" style="margin-right: 20px;">
							<label>
							  Off
							  <input type="checkbox">
							  <span class="lever"></span>
							  On
							</label>
						  </div>
						</td>
-->
						<td>{{ $armedService->intArmedServiceID }}</td>
            			<td>{{ $armedService->strArmedServiceName }}</td>
            			<td>{{ $armedService->strDescription }}</td>	
          			</tr>
          		@endforeach
          
        </tbody>
				</table>
				
				</div>
				<!-- Pagination -->
				<div class="row">
					<div class="col s3 push-s4">
						<div  style="position:absolute; margin-top: -115px;">{!! $armedServices->render() !!}</div>
					</div></div></div>
				
			
			
			</br></br></br></br></br>

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
									<input id="editdescription" type="text" class="validate"  name = "armedServiceDescription" required="" aria-required="true" value = "test">
										<label for="editDescription">Description</label> 
								</div>
							</div>
					</div>
      
	<!-- Modal Button Save -->
				<input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
		<div class="modal-footer">
			<button formaction = "{{ route('armedServiceDelete') }}"class="btn waves-effect waves-light red" style="margin-right: 30px;"
			onclick = "deleteConfirmation()">Delete
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
	

	
	
	

@stop

@section('script')


<script type="text/javascript">
function radioClicked(strID, strName, strDescription){
	
	document.getElementById('editID').value = strID;
	document.getElementById('editname').value = strName;
	document.getElementById('editdescription').value = strDescription;
}

</script>
@stop