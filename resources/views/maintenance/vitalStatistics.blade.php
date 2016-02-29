@extends('layout.maintenanceLayout')

@section('title')
Vital Statistics
@endsection

@section('content')


<!-- ADD EDIT DELETE BUTTON-->
	<div class="row">
    	<div class="col s12">
			<div class="col s4 offset-s3">
				<div class="flow-text">
					<h1 class="colortitle blue-text text-darken-3">Vital Statistics</h1>
				</div>
			</div>
			<div class="col s3 offset-s2">
				<button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalvitalstatisticsAdd"><i class="material-icons">add</i> ADD</button></br></br>
</div></div>


<!-- TABLE -->

	 <div class="row">
        
        	<div class="col s10 push-s2">
            	<div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%;">
					
				<table class="highlight white" style="border-radius: 10px; margin-top: -8%">
                	<div class="right-align">
                 		<div class="fixed-action-btn horizontal click-to-toggle">
    						<button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalvitalstatisticsAdd">
      							<i class="material-icons">add</i>
    						</button>

  						</div>
					</div>
           	<thead>
                    <tr>
						<th></th>
              			<th data-field="id">ID</th>
              			<th data-field="name">Name</th>
						
                    </tr>
			</thead>
            
           <tbody>
			   
          			<tr>
						@foreach ($vitalStatistics as $vitalStatistic)
            			<td><button class="btn large modal-trigger"  name="vitalStatistic" id="{{ $vitalStatistic->intVitalStatisticsID }}" 
            				onclick="radioClicked('{{$vitalStatistic->intVitalStatisticsID}}', '{{$vitalStatistic->strVitalStatisticsName}}')" 
            				href="#modalvitalstatisticsEdit">Update</button>
            			<label for="{{ $vitalStatistic->intVitalStatisticsID }}"></label> </td>
						<td>{{ $vitalStatistic->intVitalStatisticsID }}</td>
            			<td>{{ $vitalStatistic->strVitalStatisticsName }}</td>
            				
          			</tr>
          		@endforeach
          
        </tbody>
				</table>
				
				</div>
				</div>

				
			
			
			</br></br></br></br></br>

</div>
				


<!-- Modal Armed Service ADD -->

<div id="modalvitalstatisticsAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header"><h2>Vital Statistics</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('vitalStatisticsAdd') }}" method = "post">
							
				<input  id="intVitalStatisticsID" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intVitalStatisticsID" type="text" class="validate" name = "vitalStatisticsID" disabled>
									<label for="intVitalStatisticsID">Vital Statistic ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="strArmedServiceDesc" type="text" class="validate" name = "vitalStatistics" required="" aria-required="true">
									<label for="strArmedServiceDesc">Vital Statistic Type</label> 
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
<div id="modalvitalstatisticsEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
	<div class="modal-header"><h2>Vital Statistics</h2></div>
        	<div class="modal-content">
				<form action = "{{ route('vitalStatisticsUpdate') }}" method = "post">
					<input  id="intArmedServiceID" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "vitalStatisticsID" readonly required="" aria-required="true" value = "test">
									<label for="editID">Vital Statistic ID</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "vitalStatistics" required="" aria-required="true" value = "test">
									<label for="editname">Vital Statistic Type</label> 
							</div>
						</div>
					</div>
						
      
	<!-- Modal Button Save -->
				
				<input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
		<div class="modal-footer">
			<button formaction = "{{ route('vitalStatisticsDelete') }}" class="btn waves-effect waves-light red" style="margin-right: 30px;"
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
function radioClicked(strID, strName){
	
	document.getElementById('editID').value = strID;
	document.getElementById('editname').value = strName;

}

</script>

@stop