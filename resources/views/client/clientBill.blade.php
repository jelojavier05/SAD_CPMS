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
							<thead>
								<th>Date</th>
								<th>Amount</th>					
							</thead>
							
							<tbody>
								
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
								<th></th>
								<th>OR Number</th>
								<th>Date Paid</th>
								<th>Amount</th>								
							</thead>
							
							<tbody>
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
	});//unpaid

	$.ajax({
		type: "GET",
		url: "{{action('ClientBillController@getPaidBill')}}",
		success: function(data){
			console.log(data);
			var table = $('#tblPaid').DataTable();
			table.clear().draw();

			$.each(data, function (index,value){
				var button = '<button class="btn blue tooltipped z-depth-1 btnGenerate" data-position="bottom" data-delay="50" data-tooltip="Generate Voucher" id = "'+value.intPaymentID+'"><i class="material-icons">print</i></button>';

				table.row.add([
					button,
					'<h>' + value.strReceiptNumber + '</h>',
					'<h>' + value.strDate + '</h>',
					'<h>' + value.deciAmount + '</h>',
				]).draw();
			});
		},
		error: function(data){
			var toastContent = $('<span>Error Database.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});//paid

	$('#tblPaid').on('click', '.btnGenerate', function(){
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