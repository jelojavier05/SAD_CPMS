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
								<th>Client Name</th>
								<th>Date</th>
								<th>Amount</th>
							</thead>
							
							<tbody>
								<tr>
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
	$("#tblPaidClients").DataTable({
		"columns": [
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