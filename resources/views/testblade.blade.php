@extends('layout.maintenanceLayout')

@section('title')
Test
@endsection

@section('content')
<div class="row">
	<div class="col s10 offset-s2">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header">
					<li class="collection-header">
						<h5 style="font-weight:bold;">Hello HHAHAHAHAH</h5>
						<div>
							<input class="with-gap" name="group1" type="radio" id="test1" value="0" />
							<label for="test1">Cash</label>
						</div>
						<div>
							<input class="with-gap" name="group1" type="radio" id="test2" value="1" />
							<label for="test2">Cheque</label>
						</div>
					</li>
					<div class="payradio animated zoomIn" style="display:none;">
					<li class="collection-item">
						<h5 style="font-weight:bold;">Cheque Details</h5>
						<div class="row">
							<div class="col s12">
								<div class="input-field col s4">
									<input id="" type="text"  name = "" placeholder="e.g.HelloBank">                                
									<label for="">Bank Name</label>                                 
								</div>
								<div class="input-field col s4">
									<input id="" type="date"  name = "" placeholder=" ">                                
									<label class="active" for="">Date</label>                                 
								</div>								
							</div>
						</div>
						
						<div class="row">
							<div class="col s12">
								<div class="input-field col s4">
									<input id="" type="text"  name = "" placeholder="e.g.123-321">                                
									<label for="">Cheque Number</label>                                 
								</div>
								<div class="input-field col s4">
									<input id="" type="text"  name = "" placeholder="e.g.100.00">                                
									<label for="">Amount</label>                                 
								</div>								
							</div>
						</div>
					</li>
					<li class="collection-item"></li>
					</div>
					
					<li class="collection-item">
						<table class="striped grey lighten-1" id="tblBills">
							<h5 style="font-weight:bold;">Unpaid Bills</h5>
							<thead>
								<th></th>
								<th>Date</th>
								<th>Amount</th>
								<th>Due Date</th>							
							</thead>
							
							<tbody>
								<tr>
									<td>
										<input type="checkbox" class="filled-in" id="testA"/>
										<label for="testA"></label>
									</td>
									<td>12/12/12</td>
									<td>10000.00</td>
									<td>12/20/12</td>
								</tr>
								
								<tr>
									<td>
										<input type="checkbox" class="filled-in" id="testB"/>
										<label for="testB"></label>
									</td>
									<td>12/12/12</td>
									<td>10000.00</td>
									<td>12/20/12</td>
								</tr>
								
								<tr>
									<td>
										<input type="checkbox" class="filled-in" id="testC"/>
										<label for="testC"></label>
									</td>
									<td>12/12/12</td>
									<td>10000.00</td>
									<td>12/20/12</td>
								</tr>
								
								<tr>
									<td>
										<input type="checkbox" class="filled-in" id="testD"/>
										<label for="testD"></label>
									</td>
									<td>12/12/12</td>
									<td>10000.00</td>
									<td>12/20/12</td>
								</tr>
								
								<tr>
									<td>
										<input type="checkbox" class="filled-in" id="testE"/>
										<label for="testE"></label>
									</td>
									<td>12/12/12</td>
									<td>10000.00</td>
									<td>12/20/12</td>
								</tr>
								
								<tr>
									<td>
										<input type="checkbox" class="filled-in" id="testF"/>
										<label for="testF"></label>
									</td>
									<td>12/12/12</td>
									<td>10000.00</td>
									<td>12/20/12</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>	
@stop

@section('script')
<script>
$(document).ready(function(){
	$("#tblBills").DataTable({
		"columns": [
			{ "orderable": false },
			null,
			null,
			null
		] ,  
		"pageLength":5,
		"bLengthChange": false,
		"bFilter": false
	});		
	
	 $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="1"){           
            $(".payradio").show();
        }
		 else{
			 $(".payradio").hide();
		 }
	 });
			 
});
</script>


@stop