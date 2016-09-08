@extends('layout.maintenanceLayout')

@section('title')
Delivery
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2">
		
		<div class ="col s5" style=" margin-top:38px;">
			<div class="col s12">
				<div class="container-fluid grey lighten-5 z-depth-2 animated fadeInUp" style="border-radius:5px; border: 1px solid black;">
					<h4 class = "blue white-text" style="margin-top:0px;">Summary</h4>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable">

									<thead>
										<tr>
											
											<th>Serial Number</th>
											<th>Name</th>
											<th>Type of Gun</th>
											<th>Rounds</th>
										</tr>
									</thead>

									<tbody>   
                                        @foreach($gunSelected as $value)
                                        <tr>
                                            <td>{{$value->serialNumber}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->type}}</td>
                                            <td>{{$value->rounds}}</td>
                                        </tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col s7">
			<div class="col s12" style=" margin-left:10px; margin-top: 6%;">
				<div class="container-fluid grey lighten-4 z-depth-2 animated fadeInUp" style="border: 1px solid black; border-radius:5px; padding-bottom:1%;" id="personaldata">
					<h4 class = "blue white-text" style="margin-top:0px;">Delivery</h4>
					<div class = "row">
						<div class="col s10 push-s1">
							<form>

                                <div class="input-field col s3 offset-s9 pull-s9">
                                <input  id="orderID" type="text" class="blue-text" readonly required="" aria-required="true" value = '{{$orderDetail->intGunOrderHeaderID}}'>
									<label for="orderID">Order ID</label>
								</div>
                                
                                <div class="input-field col s8 offset-s2 pull-s2">
									<input  id="clientName" type="text" class="blue-text" readonly required="" aria-required="true" value = '{{$orderDetail->strClientName}}'>
									<label for="clientName">Client Name</label>
								</div>
                                
                                
                                <div class="input-field col s8 offset-s2 pull-s2">
									<input  id="address" type="text" class="blue-text" readonly required="" aria-required="true" value = '{{$orderDetail->strAddress}}  {{$orderDetail->strCityName}}, {{$orderDetail->strProvinceName}}'>
									<label for="address">Address</label>
								</div>
                                
                                  <div class="input-field col s3 offset-s9 pull-s9">
									<input  id="contactNumber" type="text" class="blue-text" readonly required="" aria-required="true" value= '{{$orderDetail->strContactNumber}}'>
									<label for="contactNumber">Contact Number</label>
								</div>

								<div class="input-field col s6">
									<input placeholder=" " id="deliveredBy" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
									<label for="deliveredBy"  data-error="Incorrect">Delivered By</label>
								</div>

								<div class="input-field col s6">
									<input placeholder=" " id="contactNumber" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
									<label data-error="Incorrect" for="contactDeliver">Contact Number (Delivery)</label>
								</div>

								<div class="input-field col s6">
									<input placeholder=" " id="deliveryCode" type="text" aria-required="true" readonly="" class="blue-text">
									<label data-error="Incorrect" for="deliveryCode">Delivery Code</label>
								</div>

								<div class="input-field col s6">
									<a class="btn-large green waves-effect z-depth-2 right" id="btnDeliveryCode" style="margin-top:20px;" >Generate Code</a>
								</div>
								

							</form>

						</div>
					</div>	
					
				</div>
			</div>
		</div>
	</div>
		<div class=" col s5 push-s4">
				<a class="btn-large blue waves-effect z-depth-2 left" id="" style="margin-top:20px;" href="/gunDeliveryCart">Cancel</a>
				<a class="btn-large green waves-effect z-depth-2 right" id="btnDeliver" style="margin-top:20px;" >Deliver</a>
		</div>
</div>

@stop

@section('script')


<script>
	$(document).ready(function(){

		$('#deliveryCode').val(getRandomPassword());

		$('#btnDeliveryCode').click(function(){
			$('#deliveryCode').val(getRandomPassword());
		});

        $('#btnDeliver').click(function(){
            var deliveredBy = $('#deliveredBy').val();
            var contactNumber = $('#contactNumber').val();
            $.ajax({
                type: "POST",
                url: "{{action('GunDeliveryController@postDelivery')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    deliveredBy: deliveredBy,
                    contactNumber: contactNumber,
                    deliveryCode: $('#deliveryCode').val()
                },
                success: function(data){

                	swal({
						title: "Success!",
						text: "Delivery Recorded!",
						type: "success"
					},function(){
						window.location.href = '{{ URL::to("/gunDeliveryView") }}';
					});
                },
                error: function(data){
                    var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');

                }
            });//ajax
        });

        function getRandomPassword(){
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( var i=0; i < 8; i++ ){
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            return text;
        }
        
        $("#dataTable").DataTable({
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