@extends('client.ClientDashboard')
@section('title')
Bills
@endsection

@section('content')
<div class="row">
	<div class="col s10 offset-s2" style="margin-top:-25px;">
		<div class="row">
			
			<div class="col s6" style="margin-top:25px;">
				<ul class="collection with-header animated fadeInUp" style="max-height:550px;">
					<li class="collection-header">
						<table class="striped grey lighten-1" id="tblUnpaid">
							<h5 class="red-text" style="font-weight:bold;">Unpaid Bills</h5>
							<button class="btn blue tooltipped z-depth-1" data-position="bottom" data-delay="50" data-tooltip="Generate Voucher" style="margin-left:400px; margin-top:-45px; position:absolute;"><i class="material-icons">print</i></button>
							<thead>
								<th>Date</th>
								<th>Amount</th>								
							</thead>
							
							<tbody>
								<tr>
									<td>01/11/17</td>
									<td>10000.00</td>
								</tr>
								
							</tbody>
						</table>
					</li>
				</ul>
			</div>
			
			<div class="col s6" style="margin-top:25px;">
				<ul class="collection with-header animated fadeInUp" style="max-height:550px;">
					<li class="collection-header">
						<table class="striped grey lighten-1" id="tblPaid">
							<h5 class="green-text" style="font-weight:bold;">Paid Bills</h5>
							<thead>
								<th>Date Paid</th>
								<th>Amount</th>								
							</thead>
							
							<tbody>
								<tr>
									<td>11/11/16</td>
									<td>12000.00</td>
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
	$.ajax({
		type: "GET",
		url: "{{action('UnpaidClientsController@getUnpaidBill')}}",
		success: function(data){
			var table = $('#tblUnpaid').DataTable();
			table.clear().draw();
			console.log(data);
			$.each(data, function(index, value){
				table.row.add([
					'<h>' + value.strDate + '</h>',
					'<h>' + value.totalAmount + '</h>',
				]).draw();
			});
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//ajax
});
</script>

<script>
	$(document).ready(function(){
		$("#tblUnpaid").DataTable({
			"columns": [
				null,
				null				
			] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
		
		$("#tblPaid").DataTable({
			"columns": [
				null,
				null				
			] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});
		
	});
</script>
@stop