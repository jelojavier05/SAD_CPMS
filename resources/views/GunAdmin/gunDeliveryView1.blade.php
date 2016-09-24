@extends('layout.maintenanceLayout')

@section('title')
Delivery
@endsection

@section('content')	
<div class="row">
	<div class="col s7 push-s1">
		<!-- Delivery and Pickup Table -->
			<div class="container grey lighten-2 z-depth-2 animated fadeInUp" style="border-radius: 10px; margin-top:-10px;margin-left:16%; padding-left:2%;padding-right:2%;">
				<div class="col s6" style="margin-top:-15px;">
					<h3 class="blue-text">Delivery and Pickup</h3>
				</div>
				<div class="col s3 offset-s3">
					<a style="margin-top: 20px;" id="" class=" z-depth-1 btn-large blue" href="/gunDeliveryCart">Deliver</a>
				</div>
				<div class="row">
					<div class="col s12" style="margin-top:0px;">
						<table class="highlight white" style="border-radius:10px;" id="dataTable">
							<thead>
								<tr>
								<th>ID</th>
								<th>Client</th>
								<th>Date Released</th>
								<th style="width:50px;"></th>
								</tr>
							</thead>
							<tbody>
								@foreach($delivery as $value)
									<tr>
										<td id = "">{{$value->intGunDeliveryHeaderID}}</td>
										<td id = "">{{$value->strClientName}}</td>
										<td>{{$value->dateDeliver}}</td>
										<td>
											<button class=" btn blue btnMore" id="{{$value->intGunDeliveryHeaderID}}">MORE</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<!-- Delivery and Pickup Table -->
	</div>
		
	<div class ="col s5 animated fadeInUp" style="margin-top:-25px;">
		<!--		GUN DELIVERY-->
			<div class="col s12" style="display:none;" id = 'divGunDelivery'>
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header"><h5 style="font-weight:bold;">Details - Delivery</h5></li>
					<div class="" style="">
						<li class="collection-item">
							<div class="row">
								<div class="col s4">Delivered By:</div>
								<div class="col s6" id="deliveredBy">Mang Tomas</div>
							</div>
						</li>
						<li class="collection-item">
							<div class="row">
								<div class="col s4">Contact Number:</div>
								<div class="col s6" id="contactNumber">09123456789</div>
							</div>
						</li>
						<li class="collection-item">
							<div class="row">
								<div class="col s4">Delivery Code:</div>
								<div class="col s6" id="deliveryCode">ABC123</div>
							</div>
						</li>
						<li class="collection-item">
							<div class="row">
								<div class="col s4">Status:</div>
								<div class="col s6" id="deliveryStatus">Test</div>
							</div>
						</li>
						<li class="collection-item">
						<div class="row">
							<div class="col s4">Received By:</div>
							<div class="col s6" id="deliveryReceivedBy">Test</div>
						</div>
					</li>
						<li class="collection-header">
							<table class="striped" id="tblDeliveryOnly">
								<h5 style="font-weight:bold;">Items</h5>
								<thead>
									<th>Serial Number</th>
									<th>Name</th>
									<th>Gun Type</th>
									<th>Rounds</th>
								</thead>
								<tbody>
								</tbody>
							</table>
						</li>
					</div>
				</ul>
			</div>
		<!--		GUN DELIVERY END-->

		<!-- GUN delivery/PICKUP -->
			<div class="col s12" style="display:none;" id = 'divGunDeliveryPickup'>
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header"><h5 style="font-weight:bold;">Details - Pickup And Delivery</h5></li>
					<li class="collection-item">
						<div class="row">
							<div class="col s4">Person Handling:</div>
							<div class="col s6" id="swapDeliveryPerson">Mang Juan</div>
						</div>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s4">Contact Number:</div>
							<div class="col s6" id="swapDeliveryContact">09123456789</div>
						</div>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s4">Delivery/Pickup Code:</div>
							<div class="col s6" id="swapDeliveryCode">ZXC456</div>
						</div>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s4">Status:</div>
							<div class="col s6" id="swapDeliveryStatus">Test</div>
						</div>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s4">Received By:</div>
							<div class="col s6" id="swapReceivedBy">Test</div>
						</div>
					</li>
					<!-- items delivered table			 -->
						<li class="collection-item">
							<table class="striped" id="tblDelivered">
								<h5 class="green-text" style="font-weight:bold;">Items Delivered</h5>
								<thead>
									<th>Serial Number</th>
									<th>Name</th>
									<th>Gun Type</th>
									<th>Rounds</th>
								</thead>
								<tbody>
								</tbody>
							</table>
						</li>
					<!-- items delivered table end -->
					<!--			items pick up	-->
						<li class="collection-item">
							<table class="striped" id="tblPickup">
								<h5 class="red-text" style="font-weight:bold;">Items Returned</h5>
								<thead>
									<th>Serial Number</th>
									<th>Name</th>
									<th>Gun Type</th>
								</thead>
								<tbody>
								</tbody>
							</table>
						</li>
					<!-- items pick up end -->
				</ul>
			</div>
		<!-- GUN delivery/PICKUP END -->
		
		<!-- GUN pickup -->
			<div class="col s12" style="display:none;" id='divGunPickup'>
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header"><h5 style="font-weight:bold;">Details - Pickup</h5></li>
					<div class="" style="">
						<li class="collection-item">
							<div class="row">
								<div class="col s4">Picked Up By:</div>
								<div class="col s6" id="returnPerson">Mang Pedro</div>
							</div>
						</li>
						<li class="collection-item">
							<div class="row">
								<div class="col s4">Contact Number:</div>
								<div class="col s6" id="returnContact">09123456789</div>
							</div>
						</li>
						<li class="collection-item">
							<div class="row">
								<div class="col s4">Pick Up Code:</div>
								<div class="col s6" id="returnCode">QWE789</div>
							</div>
						</li>
						<li class="collection-item">
							<div class="row">
								<div class="col s4">Status:</div>
								<div class="col s6" id="returnStatus">Test</div>
							</div>
						</li>
						<li class="collection-item">
							<div class="row">
								<div class="col s4">Received By:</div>
								<div class="col s6" id="returnReceivedBy">Test</div>
							</div>
						</li>
						<li class="collection-header">
							<table class="striped" id="tblPickupOnly">
								<h5 style="font-weight:bold;">Items</h5>
								<thead>
									<th>Serial Number</th>
									<th>Name</th>
									<th>Gun Type</th>
								</thead>
								<tbody>
								</tbody>
							</table>
						</li>
					</div>
				</ul>
			</div>
		<!-- GUN Pickup -->
	</div>
</div>
@stop
	
@section('script')


<script type="text/javascript">
	$(document).ready(function(){
	  $('#dataTable').on('click','.btnMore',function(){
      var id = this.id;
      $.ajax({
        type: "GET",
        url: "/gunDeliveryView/get/deliveryinformation?id=" +id,
        success: function(data){
        	console.log(data);
        	if (data.information.tinyintType == 0){
        		gunDelivery(data);
        	}else if (data.information.tinyintType == 1){
        		gunDeliveryAndPickup(data);
        	}else if (data.information.tinyintType == 2){
        		gunPickup(data);
        	}
        }
      });
	  });

	  function gunDelivery(data){
	  	showHideDiv('divGunDelivery', 'divGunDeliveryPickup','divGunPickup');

	  	$('#deliveredBy').text(data.information.strDeliveredBy);
      $('#contactNumber').text(data.information.strContactNumber);
      $('#deliveryCode').text(data.information.strDeliveryCode);
      $('#tblDeliveryOnly tr').not(function(){ return !!$(this).has('th').length; }).remove();
      $('#deliveryReceivedBy').text(data.information.strFirstName + ' ' + data.information.strLastName);
      var strDeliveryStatus;
      console.log(data);
      if (data.information.boolStatus == 1){
          strDeliveryStatus = 'On Delivery';
      }else{
          strDeliveryStatus = 'Verified';
      }

      $('#deliveryStatus').text(strDeliveryStatus);

      if (data.reason){
          $('#reason').show();
          $('#deliveryReason').show();
          $('#strReason').text(data.reason);
      }else{
          $('#reason').hide();
          $('#deliveryReason').hide();
      }

      $.each(data.detail, function(index, value){
        $('#tblDeliveryOnly tr:last').after('<tr><td>' + value.strSerialNumber + '</td><td>' + value.strGunName +'</td><td>' + value.strTypeOfGun + '</td><td>' + value.intRounds +'</td></tr>');
      });
	  }

	  function gunDeliveryAndPickup(data){
	  	showHideDiv('divGunDeliveryPickup', 'divGunDelivery','divGunPickup');
	  	$('#swapDeliveryPerson').text(data.information.strDeliveredBy);
      $('#swapDeliveryContact').text(data.information.strContactNumber);
      $('#swapDeliveryCode').text(data.information.strDeliveryCode);
      $('#tblDelivered tr').not(function(){ return !!$(this).has('th').length; }).remove();
      $('#tblPickup tr').not(function(){ return !!$(this).has('th').length; }).remove();
			$('#swapReceivedBy').text(data.information.strFirstName + ' ' + data.information.strLastName);
      if (data.information.boolStatus == 1){
          strDeliveryStatus = 'On Delivery';
      }else{
          strDeliveryStatus = 'Verified';
      }

      $('#swapDeliveryStatus').text(strDeliveryStatus);

      $.each(data.detail, function(index, value){
        $('#tblDelivered tr:last').after('<tr><td>' + value.strSerialNumber + '</td><td>' + value.strGunName +'</td><td>' + value.strTypeOfGun + '</td><td>' + value.intRounds +'</td></tr>');
      });

      $.each(data.swapGunPickup, function(index, value){
        $('#tblPickup tr:last').after('<tr><td>' + value.strSerialNumber + '</td><td>' + value.strGunName +'</td><td>' + value.strTypeOfGun + '</td></tr>');
      });
	  }

	  function gunPickup(data){
	  	showHideDiv('divGunPickup', 'divGunDeliveryPickup','divGunDelivery');
	  	$('#returnPerson').text(data.information.strDeliveredBy);
      $('#returnContact').text(data.information.strContactNumber);
      $('#returnCode').text(data.information.strDeliveryCode);
      $('#tblPickupOnly tr').not(function(){ return !!$(this).has('th').length; }).remove();
			$('#returnReceivedBy').text(data.information.strFirstName + ' ' + data.information.strLastName);
      if (data.information.boolStatus == 1){
          strDeliveryStatus = 'On Delivery';
      }else{
          strDeliveryStatus = 'Verified';
      }

      $('#returnStatus').text(strDeliveryStatus);

      $.each(data.detail, function(index, value){
        $('#tblPickupOnly tr:last').after('<tr><td>' + value.strSerialNumber + '</td><td>' + value.strGunName +'</td><td>' + value.strTypeOfGun + '</td></tr>');
      });
	  }

	  function showHideDiv(show, hide1, hide2){
	  	$('#' + show).show();
	  	$('#' + hide1).hide();
	  	$('#' + hide2).hide();
	  }
	});
</script>

<script>
	$(document).ready(function(){
		$("#tblDeliveryOnly").DataTable({
				 "columns": [
				{ "orderable": false },
				{ "orderable": false },
				{ "orderable": false },
				{ "orderable": false },
				] ,  
				"pageLength":3,
				"bLengthChange": false,
				"bFilter" :false
			});
		
		$("#tblPickupOnly").DataTable({
				 "columns": [
				{ "orderable": false },
				{ "orderable": false },
				{ "orderable": false },
				] ,  
				"pageLength":3,
				"bLengthChange": false,
				"bFilter" :false
			});

		$("#tblDelivered").DataTable({
				 "columns": [
				{ "orderable": false },
				{ "orderable": false },
				{ "orderable": false },
				{ "orderable": false },
				] ,  
				"pageLength":3,
				"bLengthChange": false,
				"bFilter" :false
			});
		
		$("#tblPickup").DataTable({
				 "columns": [
				{ "orderable": false },
				{ "orderable": false },
				{ "orderable": false },
				] ,  
				"pageLength":3,
				"bLengthChange": false,
				"bFilter" :false
			});
		
		$("#dataTable").DataTable({
	     "columns": [
	    { "orderable": false },
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