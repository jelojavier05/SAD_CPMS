@extends('layout.maintenanceLayout')

@section('title')
Delivery
@endsection

@section('content')	
<div class="row">
    <div class="col s7 push-s1">
        <div class="container grey lighten-2 z-depth-2 animated fadeInUp" style="border-radius: 10px; margin-top:40px;margin-left:16%; padding-left:2%;padding-right:2%;">
            <div class="col s6" style="margin-top:-15px;">
                <h3 class="blue-text">Delivery and Pickup</h3>
            </div>
            
            <div class="col s3 offset-s3">
                <a style="margin-top: 20px;" id="" class=" z-depth-1 btn-large blue" href="/gunDeliveryCart">
                    Deliver
                </a>
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
                                    <button class=" btn blue btnMore" id="{{$value->intGunDeliveryHeaderID}}">
                                        MORE
                                    </button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
	
	<div class ="col s5 animated fadeInUp" style="margin-top:-25px;">
		
<!--		GUN DELIVERY-->
		<div class="col s12" style="display:;">
			<ul class="collection with-header">
				<li class="collection-header"><h5 style="font-weight:bold;">Details</h5></li>
				<div class="" style="">
				<li class="collection-item">
					<div class="row">
						<div class="col s4">
							Delivered By:
						</div>
						<div class="col s6" id="">
							Mang Tomas
						</div>
					</div>
				</li>
				
				<li class="collection-item">
					<div class="row">
						<div class="col s4">
							Contact Number:
						</div>
						<div class="col s6" id="">
							09123456789
						</div>
					</div>
				</li>
				
				<li class="collection-item">
					<div class="row">
						<div class="col s4">
							Delivery Code:
						</div>
						<div class="col s6" id="">
							ABC123
						</div>
					</div>
				</li>
				
				<li class="collection-item">
					<div class="row">
						<div class="col s4">
							Status:
						</div>
						<div class="col s6" id="">
							Test
						</div>
					</div>
				</li>
				
				<li class="collection-header">
					<table class="striped" id="tblDelivery">
						<h5 style="font-weight:bold;">Items</h5>
						<thead>
							<th>Serial Number</th>
							<th>Name</th>
							<th>Gun Type</th>
							<th>Rounds</th>
							<th>Status</th>
						</thead>
						
						<tbody>
							<tr>
								<td>123-321</td>
								<td>Mauser41</td>
								<td>Pistol</td>
								<td>45</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Mauser41</td>
								<td>Pistol</td>
								<td>45</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Mauser41</td>
								<td>Pistol</td>
								<td>45</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Mauser41</td>
								<td>Pistol</td>
								<td>45</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Mauser41</td>
								<td>Pistol</td>
								<td>45</td>
								<td>Test</td>
							</tr>
						</tbody>
					</table>
				</li>
				</div>
			</ul>
		</div>
<!--		GUN DELIVERY END-->
		
<!--		GUN PICKUP-->
		<div class="col s12" style="display:none;">
			<ul class="collection with-header">
				<li class="collection-header"><h5 style="font-weight:bold;">Details</h5></li>
				
				<li class="collection-item">
					<div class="row">
						<div class="col s4">
							Person Handling:
						</div>
						<div class="col s6" id="">
							Mang Juan
						</div>
					</div>
				</li>
				
				<li class="collection-item">
					<div class="row">
						<div class="col s4">
							Contact Number:
						</div>
						<div class="col s6" id="">
							09123456789
						</div>
					</div>
				</li>
				
				<li class="collection-item">
					<div class="row">
						<div class="col s4">
							Delivery/Pickup Code:
						</div>
						<div class="col s6" id="">
							ZXC456
						</div>
					</div>
				</li>
				
				<li class="collection-item">
					<div class="row">
						<div class="col s4">
							Status:
						</div>
						<div class="col s6" id="">
							Test
						</div>
					</div>
				</li>
<!--	items delivered table			-->
				<li class="collection-item">
					<table class="striped" id="tblDelivered">
						<h5 class="green-text" style="font-weight:bold;">Items Delivered</h5>
						<thead>
							<th>Serial Number</th>
							<th>Name</th>
							<th>Gun Type</th>
							<th>Rounds</th>
							<th>Status</th>
						</thead>
						
						<tbody>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							
						</tbody>
					</table>
				</li>
<!--		items delivered table end-->
<!--			items pick up	-->
				<li class="collection-item">
					<table class="striped" id="tblPickup">
						<h5 class="red-text" style="font-weight:bold;">Items Returned</h5>
						<thead>
							<th>Serial Number</th>
							<th>Name</th>
							<th>Gun Type</th>
							<th>Rounds</th>
							<th>Status</th>
						</thead>
						
						<tbody>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							<tr>
								<td>123-321</td>
								<td>Glock</td>
								<td>Pistol</td>
								<td>60</td>
								<td>Test</td>
							</tr>
							
						</tbody>
					</table>
				</li>
<!--		items pick up end-->
			</ul>
		</div>
<!--		GUN PICKUP END-->
	</div>

</div>


<!--ETO YUNG LUMA CONTAINER-->

<!--
<div class="container-fluid grey lighten-5 z-depth-1 animated fadeInUp" style="border-radius:15px;margin-left:-6%">
            <div class="blue darken-1 white-text" style="position:static; z-index:100; width:405px; height: 38px; font-size:30px;">Details</div>
				<div class="row">
				    <div class="col s12" style="margin-top:5px; overflow:scroll; overflow-x:hidden; height:500px;">
							  <div class="card grey darken-1">
									<div class="card-content">
										<div>
											<span class = "card-title white-text">Delivered By:</span>
										</div>

										<div>
											<p id = 'deliveredBy'></p>
										</div>

										<div>
											<span class = "card-title white-text">Contact No.:</span>
										</div>

										<div>
											<p id = 'contactNumber'></p>
										</div>

                                        <div>
                                            <span class = "card-title white-text">Delivery Code</span>
                                        </div>

                                        <div>
                                            <p id = 'deliveryCode'></p>
                                        </div>

                                        <div>
                                            <span class = "card-title white-text">Status:</span>
                                        </div>

                                        <div>
                                            <p id = 'deliveryStatus'></p>
                                        </div>

                                        <div id = 'reason' style="display: none;">
                                            <span class = "card-title white-text">Reason:</span>
                                        </div>

                                        <div id = 'deliveryReason' style="display: none;">
                                            <p id = 'strReason'></p>
                                        </div>

										<div>
											<span class = "card-title white-text">Items:</span>
										</div>
										
										<table class="bordered" id = 'tableItem'>
											<thead>
											  <tr>
												  <th class="white-text">Serial Number</th>
												  <th class="white-text">Name</th>
												  <th class="white-text">Type of Gun</th>
												  <th class="white-text">Rounds</th>
                                                  <th class="white-text">Status</th>
											  </tr>
											</thead>

											<tbody>
											  
											</tbody>
										</table>
                                        

                                        
									</div>

								  </div>
								</div>
							  </div>
					</div>
-->




<!--END END END-->



@stop
	
@section('script')


<script type="text/javascript">
	$(document).ready(function(){
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
        
        $('#dataTable').on('click','.btnMore',function(){
            var id = this.id;
            
            $.ajax({

                type: "GET",
                url: "/gunDeliveryView/get/deliveryinformation?id=" +id,
                success: function(data){

                    $('#deliveredBy').text(data.information.strDeliveredBy);
                    $('#contactNumber').text(data.information.strContactNumber);
                    $('#deliveryCode').text(data.information.strDeliveryCode);
                    $('#tableItem tr').not(function(){ return !!$(this).has('th').length; }).remove();
                    var strDeliveryStatus;

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
                        var strStatus;

                        if (value.boolStatus == 0){
                            strStatus = 'Return';
                        }else if (value.boolStatus == 1){
                            strStatus = 'On Delivery';
                        }else if (value.boolStatus == 2){
                            strStatus = 'Accepted';
                        }

                        $('#tableItem tr:last').after('<tr><td>' + value.strSerialNumber + '</td><td>' + value.strGunName +'</td><td>' + value.strTypeOfGun + '</td><td>' + value.intRounds +'</td><td>'+strStatus+'</td></tr>');
                    });
                }
            });
        });
	});
</script>

<script>
$(document).ready(function(){
	$("#tblDelivery").DataTable({
			 "columns": [
			{ "orderable": false },
			{ "orderable": false },
			{ "orderable": false },
			{ "orderable": false },
			{ "orderable": false }
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
			{ "orderable": false }
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
			{ "orderable": false },
			{ "orderable": false }
			] ,  
			"pageLength":3,
			"bLengthChange": false,
			"bFilter" :false
		});
});
</script>
@stop