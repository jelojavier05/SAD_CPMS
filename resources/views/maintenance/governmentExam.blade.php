@extends('layout.maintenanceLayout')

@section('title')
Government Exam
@endsection

@section('content')


<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">
			<div class="col s5 offset-s3">
				<div class="flow-text">
					<h1 class="colortitle blue-text text-darken-3">Government Exam</h1>
				</div>
			</div>
			<div class="col s2 offset-s1">
				<button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large waves-effect waves-light 
				green hide-on-med-and-down modal-trigger" href="#modalgovexamAdd"><i class="material-icons left">add</i> ADD</button></br></br>
</div></div>

<!-- TABLE -->

	 <div class="row">
        
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top:-20px;">
					
				<table class="highlight white" style="border-radius: 10px; margin-top: -8%" id = "dataTable">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalgovexamAdd">
      							<i class="material-icons">add</i>
    						</button>

  						</div>
					</div>
           	<thead>
                    <tr>
						<th></th> 
              			<th data-field="id">ID</th>
              			<th data-field="name">Name</th>
						<th data-field="name">Description</th>
						
                    </tr>
			</thead>
            
           <tbody>
			   
          			<tr>
						@foreach ($governmentExams as $governmentExam)
            			 <td><button class="buttonUpdate btn large modal-trigger"  name="governmentExam" id = "{{ $governmentExam->intGovernmentExamID }}" 
            				href="#modalgovexamEdit" style="margin-left: 40px;">Update</button>
            			<label for="{{ $governmentExam->intGovernmentExamID }}"></label> </td> 
<!--
						<td>
							<button class="btn waves-effect waves-light red" 
							onclick = "deleteConfirmation()">Delete
							</button>
						</td>
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
						<td id = "id{{ $governmentExam->intGovernmentExamID }}">{{ $governmentExam->intGovernmentExamID }}</td>
            			<td id = "name{{ $governmentExam->intGovernmentExamID }}">{{ $governmentExam->strGovernmentExam }}</td>
						<td id = "description{{ $governmentExam->intGovernmentExamID }}">{{ $governmentExam->strDescription }}</td>
            				
          			</tr>
          		@endforeach
          
        </tbody>
				</table>
				
				</div>
				
			</div>
				
			
			
			</br></br></br></br></br>

</div>
				


<!-- Modal Government Exam ADD -->

<div id="modalgovexamAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Government Exam</h2></div>
        	<div class="modal-content">
				<!-- <form action = "{{ route('governmentExamAdd') }}" method = "post"> -->
							
								<input  id="intGovernmentExamID" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intGovernmentExamID" type="text" class="validate" name = "governmentExamID" disabled>
									<label for="intGovernmentExamID">Government Exam ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strGovernmentExamAdd" type="text" class="validate" name = "governmentExamName" required="" aria-required="true">
									<label for="strGovernmentExamAdd">Government Exam Type</label> 
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="strGovernmentExamDescAdd" type="text" class="validate"  name = "governmentExamDescription" required="" aria-required="true">
										<label for="strGovernmentExamDescAdd">Description</label> 
								</div>
							</div>
						</div>
						
	<!-- Modal Button Save -->
				
		<div class="modal-footer">
			<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
    			<i class="material-icons right">send</i>
  			</button>
    	</div>
    		</div>
				<!-- </form> -->
		</div>

<!-- MODAL Government Exam EDIT -->
<div id="modalgovexamEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Government Exam</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('governmentExamUpdate') }}" method = "post">
					<input  id="intGovernmentExamID" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate"  name = "governmentExamID" readonly required="" aria-required="true" value = "test">
									<label for="editID">Government Exam ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "governmentExam" required="" aria-required="true" value = "test">
									<label for="editname">Government Exam Type</label> 
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col s5">
								<div class="input-field">
									<input id="editdescription" type="text" class="validate"  name = "governmentExamDescription" required="" aria-required="true" value = "test">
										<label for="editDescription">Description</label> 
								</div>
							</div>
					</div>
						
      
	<!-- Modal Button Save -->
		<input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
		<div class="modal-footer">
			<button formaction = "{{ route('governmentExamDelete') }}" class="btn waves-effect waves-light red" style="margin-right: 30px;"
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
	$(function(){
		$("#dataTable").DataTable({
			"lengthChange": false,
			"pageLength":5,
			"columns":[
			{"searchable": false},
			null,
			null,
			null
			
			]

		});

		// $("#dataTable").DataTable();


		$(".buttonUpdate").click(function(){

			var itemID = "id" + this.id;
			var itemName = "name" + this.id;
			var itemDescription = "description" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();
			document.getElementById('editdescription').value = $("#"+itemDescription).html();

		});

		

	});

	$(document).ready(function(){
		$("#btnAddSave").click(function(){
			
			$.ajax({

				url: "{{ action('GovernmentExamController@addGovernmentExam') }}",
				type: "POST",
				data: {
					governmentExamName: $('#strGovernmentExamAdd').val(),
					governmentExamDescription: $('#strGovernmentExamDescAdd').val(),
				},
				success: function(data){
					alert("success");
				},
				error: function(xhr){
					alert("failed");
				}


			});//ajax

		});//button clicked

	});//document ready
</script>
@stop
