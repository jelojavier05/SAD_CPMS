@extends('layout.maintenanceLayout')

@section('title')
Add Item
@endsection

@section('content')	
	
<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">
			<div class="col s4 offset-s3">
				<div class="flow-text">
					<h1 class="colortitle blue-text text-darken-3">Add Item</h1>
				</div>
			</div>
			<div class="col s3 offset-s2">
				<button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modaladdItemAdd"><i class="material-icons left">add</i> ADD</button></br></br>
</div></div>

<!-- TABLE -->

	 <div class="row">
        
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top: -10px;"><!-- margin-top: -20px-->
					
				<table class="highlight white" style="border-radius: 10px; margin-top: -8%;	" id = "dataTable">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modaladdItemAdd">
      							<i class="material-icons">add</i>
    						</button>

  						</div>
					</div>
           	<thead>
                    <tr>
						
						<th></th>
						<th></th>
						<th></th>
              			<th data-field="id">ID</th>
              			<th data-field="name">Item Name</th>
						<th data-field="number">Description</th>
                    </tr>
			</thead>
            
           <tbody>
			   @foreach ()
          			<tr>
						
            			
						<td> 
						  <div class="switch" style="margin-right: -80px;">
							<label>
							  Deactivate
							  <input type="checkbox">
							  <span class="lever"></span>
							  Activate
							</label>
						  </div>
						</td>
						
						
						
						<td><button class="buttonUpdate btn  modal-trigger"  name="" id="{{  }}" href="#modaladdItemEdit" style="margin-right: -40px;"><i class="material-icons">edit</i></button>
            			<label for="{{ }}"></label>
						</td>
						
						<td><button class="btn red"><i class="material-icons">delete</i></button></td>
						
						<td id = "id{{  }}">{{  }}</td>
            			<td id = "name{{  }}">{{  }}</td>
            			<td id = "description{{  }}">{{  }}</td>	
          			</tr>
          		@endforeach
          
        </tbody>
				</table>
				
				</div>
				<!-- Pagination -->
				<div class="row">
					<div class="col s3 push-s4">
						
					</div></div></div>
				
			
			
			</br></br></br></br></br>

</div>
				


<!-- Modal Add Item ADD -->

<div id="modaladdItemAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Add Item</h2></div>
        	<div class="modal-content">
				<form action = "{{  }}" method = "post">
							
								<input  id="" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="" type="text" class="validate" name = "" disabled>
									<label for="">Item ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="" type="text" class="validate" name = "" required="" aria-required="true">
									<label for="">Item Name</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="" type="text" class="validate"  name = "" required="" aria-required="true">
										<label for="">Description</label> 
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

<!-- MODAL Add Item EDIT -->
<div id="modaladdItemEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Add Item</h2></div>
        	<div class="modal-content">
				<form action = "" method = "post">
					<input  id="" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "" readonly required="" aria-required="true" value = "test">
									<label for="editID">Item ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "" required="" aria-required="true" value = "test">
									<label for="editname">Item Name</label> 
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="editdescription" type="text" class="validate"  name = "" required="" aria-required="true" value = "test">
										<label for="editDescription">Description</label> 
								</div>
							</div>
					</div>
      
	<!-- Modal Button Save -->
				<input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
		<div class="modal-footer">
			
			
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

	$(function(){
		$("#dataTable").DataTable({
             "columns": [
            { "orderable": false },
            { "orderable": false },
            { "orderable": false },
            null,
            null,
            null
            ] ,  
		    "pagingType": "full_numbers",
			"pageLength":5,


		});

		$(".buttonUpdate").click(function(){

			var itemID = "id" + this.id;
			var itemName = "name" + this.id;
			var itemDescription = "description" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
			document.getElementById('editdescription').value = $("#"+itemDescription).html();

		});

	});

	
</script>
@stop