@extends('layout.maintenanceLayout')

@section('title')
Paid Clients
@endsection

@section('content')
<div class="row">
	<div class="col s10 offset-s2" style="margin-top:-10px;">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header animated fadeInUp" style="max-height:550px;">
					<li class="collection-header">
						<table class="striped grey lighten-1" id="tblPaidClients">
							<h5 class="blue-text" style="font-weight:bold;">Paid Clients</h5>
							<thead>
								<th style="width:100px;"></th>
								<th>Client Name</th>
								<th>Date</th>
								<th>Amount</th>
							</thead>
							
							<tbody>
								<tr>
									<td>
									<button class="btn blue tooltipped right waves-effect col s12" data-position="bottom" data-delay="50" data-tooltip="Generate PDF"  id = ''><i class="material-icons">picture_as_pdf</i></button>
									</td>
									<td>LandBank Pilar</td>
									<td>01/01/17</td>
									<td>10000.00</td>
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
		url: "{{action('PaidClientsController@getPaidClient')}}",
		success: function(data){
			var table = $('#tblPaidClients').DataTable();
			table.clear().draw();

			$.each(data, function (index,value){
				var button = '<button class="btnPDF btn blue tooltipped right waves-effect col s12" data-position="bottom" data-delay="50" data-tooltip="Generate PDF"  id = "'+value.intPaymentID+'"><i class="material-icons">picture_as_pdf</i></button>';
				table.row.add([
					button,
					'<h>' + value.strClientName + '</h>',
					'<h>' + moment(value.datetimePayment).format('MMMM Do YYYY, h:mm:ss a') + '</h>',
					'<h>' + value.deciAmount + '</h>',
				]).draw();
			});	
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//ajax

	$('#tblPaidClients').on('click', '.btnPDF', function(){
		var id = this.id;
		$.ajax({
			type: "GET",
			url: "/getPayment/paymentPDF?paymentID=" + id,
			success: function(data){
				window.open('/getPayment', '_blank');
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			}
		});//ajax
	});
});
</script>

<script>
$(document).ready(function(){
	$("#tblPaidClients").DataTable({
		"columns": [
			{"orderable":false},
			null,
			null,
			null
		] ,  
		"pageLength":5,
		"lengthMenu": [5,10,15,20]
	});
});
		
</script>
@stop