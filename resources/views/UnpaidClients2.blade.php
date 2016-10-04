@extends('layout.maintenanceLayout')

@section('title')
Unpaid Clients
@endsection

@section('content')

<!-- Client Table -->
	<div class="row" style="margin-top:-30px;">
		<div class="row"> 
			<div class="row">
				<div class="col s5 push-s3" style="margin-left:-2%">
					<h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Unpaid Clients</h3>
				</div>
			</div>
		</div>
		<div class="col s12 push-s1" style="margin-top:-4%">
			<div class="container white lighten-2 z-depth-2" style="padding-left:2%; padding-right:2%;">       
				<div class="row">
					<div class="col s12" style="margin-top:10px;">
						<table class="striped white" style="border-radius:10px;" id="dataTable">							
							<thead>
								<tr>
									<th class="grey lighten-1"></th>                                
									<th class="grey lighten-1">Client ID</th>
									<th class="grey lighten-1">Client Name</th>																
								</tr>
							</thead>
							<tbody>
								@foreach($unpaidBill as $value)
								<tr>
									<td>
									<button class="btn blue col s6 btnMore" id = '{{$value->intClientID}}'>MORE</button>
									</td>                                    
									<td>{{$value->intClientID}}</td>
									<td >{{$value->strClientName}}</td>                                    									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Client Table -->

<!--modal client bills-->
	<div id="modalClientBills" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:650px; margin-top:-60px;">
		<div class="modal-header">
			<div class="h">
				<h3><center>Dates Unpaid</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				<div class="col s12">
					<div class="row">
						<div class="col s12">
							<ul class="collection with-header">
								<li class="collection-header">
									<div class="row">
										<div class="col s7">
											<h5 style="font-weight:bold;">Official Receipt Number:</h5>
										</div>
										
										<div class="col s5 pull-s1">
											<h5 style="font-weight: normal;" id="">929292929292929292</h5>
										</div>
									</div>										
								</li>				
								<li class="collection-header">
									<h5 style="font-weight:bold;">Payment Options</h5>
									<div>
										<input class="with-gap" name="group1" type="radio" id="test1" value="0" checked/>
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
											<div class="input-field col s6">
												<input type="text"  id = 'strBankName' placeholder="e.g. BDO">                                
												<label for="strBankName">Bank Name</label>                                 
											</div>
											<div class="input-field col s6">
												<input type="text" id = 'strName' placeholder="e.g. Juan Dela Cruz">                                
												<label for="strName">Name</label>                                 
											</div>
											<div class="input-field col s6">
												<input id="dateIssued" type="date" placeholder=" ">                                
												<label class="active" for="">Date</label>                                 
											</div>	
											<div class="input-field col s6">
												<input id="strCheckNumber" type="text"  name = "" placeholder="e.g.123-321">                                
												<label for="">Cheque Number</label>                                 
											</div>
											<div class="input-field col s6">
												<input type="number" id="deciCheckAmount" min="1" max="99999">                
												<label for="">Amount</label>                                 
											</div>							
										</div>
									</div>
								</li>
								<li class="collection-item"></li>
								</div>

								<li class="collection-item">
									<div class="row">
										<div class="col s12">
											<table class="striped grey lighten-1" id="tblBills" style="width:100%;">
												<h5 style="font-weight:bold;">Unpaid Bills</h5>
												<thead>
													<th></th>
													<th>Date</th>
													<th>Amount</th>						
												</thead>

												<tbody>
													<tr>
														<td>
															<input type="checkbox" class="filled-in" id="testA"/>
															<label for="testA"></label>
														</td>
														<td>12/12/12</td>
														<td>10000.00</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer ci" style="background-color: #00293C;">
	      <button class="btn blue waves-effect" name="" id = "btnPay" style="margin-right: 30px;">PAID
	      </button>
		</div>
	</div>
<!--modal client bills end-->

<!-- admin login Start-->
	<div id="modalLogin" class="modal modal-fixed-footer ci" style="overflow:hidden; width:40% !important; margin-top:50px !important;  max-height:100% !important; height:320px !important; border-radius:10px;">      
		<div class="modal-header">
			<div class="h">
				<h3><center>Login</center></h3>  
			</div>
		</div>
		<div class="modal-content">
			<div class="row">
				<div class="col s10 push-s1" style="margin-top:-30px;">      
					<div class="row"></div>  
					<div class="input-field col s12">
						<i class="material-icons prefix" style="font-size:35px;">account_circle</i>
						<input id="" type="text" class="validate" name = "" required="" aria-required="true">
						<label for="">Username</label> 
					</div>
				</div>
				<div class="col s10 push-s1" style="margin-top:-30px;">      
					<div class="row"></div>
					<div class="row"></div>  
					<div class="input-field col s12">
						<i class="material-icons prefix" style="font-size:35px;">vpn_key</i>
						<input id="strNew" type="password" class="validate" name = "" required="" aria-required="true">
						<label for="">Password</label> 
					</div>
				</div>
				
			</div>
		</div>
		<div class="modal-footer" style="background-color: #00293C;">
			<button class="btn large waves-effect waves-light green" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">OK
			</button>
		</div>	
	</div>
<!-- admin login End -->

@stop

@section('script')
<script>
$(document).ready(function(){

	var arrUnpaidBill;
	var arrCheckedBill;
	var deciTotalAmount;
	var clientID;

	$('input[type="radio"]').click(function(){
    if($(this).attr("value")=="1"){           
			$(".payradio").show();
		}else{
		 $(".payradio").hide();
	 	}
	});//radio button

	$('#dataTable').on('click', '.btnMore', function(){
		clientID = this.id;
		arrUnpaidBill = [];
		$.ajax({
			type: "GET",
			url: "/unpaidclients/get/UnpaidBill?clientID=" + clientID,
			success: function(data){
				$("#modalClientBills").openModal();
				var table = $('#tblBills').DataTable();
				table.clear().draw();
				arrUnpaidBill = data;
				$.each(data, function(index, value){
					var checkbox = '<input type="checkbox" class="filled-in" id="checkbox'+value.intClientBillingDateID+'"/><label for="checkbox'+value.intClientBillingDateID+'">';
					var strAmount = commaSeparateNumber(value.totalAmount);
					table.row.add([
						checkbox,
						'<h>' + value.strDate + '</h>',
						'<h id = "amount'+value.intClientBillingDateID+'">' + strAmount + '</h>'
					]).draw();
				});
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			},async:false
		});//ajax
	});

	$('#btnPay').click(function(){
		arrCheckedBill = [];
		var paymentMode = $('input[name=group1]:checked').val();
		var bankName = '';
		var dateIssued = '';
		var checkNumber = '';
		var clientName = '';
		var amount = '';

		if (paymentMode == 1){
			bankName = $('#strBankName').val();
			clientName = $('#strName').val();
			dateIssued = $('#dateIssued').val();
			checkNumber = $('#strCheckNumber').val();
			amount = $('#deciCheckAmount').val();
		}

		if (setCheckedItems() && checkAmount(paymentMode)){
			
			$.ajax({
				type: "POST",
				url: "{{action('UnpaidClientsController@payBill')}}",
				beforeSend: function (xhr) {
					var token = $('meta[name="csrf_token"]').attr('content');
					if (token) {
						return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					}
				},
				data: {
					arrCheckedBill: arrCheckedBill,
					deciTotalAmount: deciTotalAmount,
					paymentMode: paymentMode,
					bankName: bankName,
					dateIssued: dateIssued,
					checkNumber: checkNumber,
					clientName: clientName,
					amount: amount,
					clientID: clientID
				},
				success: function(data){
					swal({
						title: "Success!",
						type: "success"
					},
						function(){
						window.location.href = '{{ URL::to("/unpaidclients") }}';
					});

				},
				error: function(data){
					var toastContent = $('<span>Error Database.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
				}
			});//ajax
		}
	});

	function setCheckedItems(){
		var checker = false;
		deciTotalAmount = 0;
		$.each(arrUnpaidBill, function(index, value){
			if ($('#checkbox' + value.intClientBillingDateID).is(':checked')){
				arrCheckedBill.push(value.intClientBillingDateID);
				deciTotalAmount += value.totalAmount;
				checker = true;
			}
		});

		if (!checker){
			var toastContent = $('<span>Select Bill</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}

		return checker;
	}

	function checkAmount(paymentMode){
		if (paymentMode == 0){
			return true;
		}else{
			var deciCheckAmount = $('#deciCheckAmount').val();
			if (deciTotalAmount <= deciCheckAmount){
				return true;
			}else {
				var toastContent = $('<span>Cheque Amount is less than to total amount.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
				return false;
			}
		}
	}

	function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
        val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }
});
</script>

<script>
	$(document).ready(function(){
		$("#tblBills").DataTable({
			"columns": [
				{ "orderable": false },
				null,
				null,
			] ,  
			"pageLength":5,
			"bLengthChange": false,
			"bFilter": false
		});		

		 $("#dataTable").DataTable({
			"columns": [
			{"searchable": false},			
			null,
			null
			] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],

		});
				 
	});
</script>
@stop