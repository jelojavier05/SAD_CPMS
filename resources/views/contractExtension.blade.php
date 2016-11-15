@extends('layout.maintenanceLayout')

@section('title')
Contract Extensions
@endsection

@section('content')
<div class="row" style="margin-top:-30px;">        
	<div class="row">         
		<div class="row"> 
			<div class="col s5 push-s3" style="margin-left:-2%">    
				<h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Contract Extensions</h3>
			</div>    
		</div>   
	</div>
 
	<div class="col s12 push-s1" style="margin-top:-4%">
		<div class="container white lighten-2 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%; padding-top:1%;">
			<div class="row">
				<div class="col s12" style="margin-top:-5px;">
					<table class="striped white" style="border-radius:10px;" id="tblContractExtensions">
						<thead>
							<tr>
								<th class="grey lighten-1 "></th>
                <th class="grey lighten-1 ">Client Name</th>
								<th class="grey lighten-1 ">Date End</th>
								<th class="grey lighten-1 ">Person In Charge</th>
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

<!--modal extend contract-->
<div id="modalExtend" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:630px; margin-top:-50px;">
	<div class="modal-header">
		<div class="h">
			<h3><center>Contract Extension</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="">
					<li class="collection-header">
						<h5 style="font-weight:bold;">Current Contract Details</h5>
					</li>
					<li class="collection-item">
						<div class="row">
							<div class="col s6">
								<div style="font-weight:bold;">Type of Contract</div>
								<div id="strTypeOfContractName">Contract 1</div>
							</div>
							
							<div class='col s6'>
								<div style="font-weight:bold;">Duration(Months)</div>
								<div id="intMonthsDuration">12</div>
							</div>														
						</div>
						
						<div class="row">
							<div class="col s6">
								<div style="font-weight:bold;">Start Date</div>
								<div id="dateStart">10/10/15</div>
							</div>
							
							<div class="col s6">
								<div style="font-weight:bold;">End Date</div>
								<div id="dateEnd">10/10/16</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s6">
								<div style="font-weight:bold;">Rate per Hour</div>
								<div id="deciRate">120.00</div>
							</div>
						</div>
					</li>

					<li class="collection-item">
						<h5 style="font-weight:bold;">Set New Rate Per Hour (Optional)</h5>
						<div class="row">
							<div class="input-field col s6">																	
								<input placeholder=""  id="deciRateNew" type="text" class="validate" pattern="[0-9., ]{2,}">	
								<label data-error="Incorrect" class="active" style="color:#64b5f6;"  for="deciRateNew">New Rate Per Hour</label>
							</div>
						</div>
					</li>

					<li class = 'collection-item'>
						<div class="col s5 push-s1">
							<p class="blue-text">Client will be billed during the</p>
						</div>
						
						<div class="col s2 push-s1">
							<input type="number" id="intDayMonth" required="" aria-required="true" placeholder=" " max="31" min="1" value = '1'>		
						</div>
						
						<div class="col s4 push-s1">
							<p class="blue-text">day of the month.</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
    <!-- button -->
	<div class="modal-footer ci" style="background-color: #00293C;">
		<button class="btn blue waves-effect" name="" id = "btnProceed" style="margin-right: 30px;">Proceed</button>
	</div>
</div>
<!--modal extend contract end-->

<!--modal client login-->
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
		<button class="btn large waves-effect green" name="action" style="margin-right: 30px;" id = "btnChangePasswordSave">OK
		</button>
	</div>	
</div>
<!--modal client login end-->
@stop

@section('script')


<script>
$(document).ready(function(){
	var arrDate;
	var extensionDate;
	var contractID;

	$("#tblContractExtensions").DataTable({             
	 "columns": [     
	 {"orderable": false},
	 null,
	 null,
	 null
	 ] ,  
	 "pageLength":5,
	 "lengthMenu": [5,10,15,20],		
	});

	$('#tblContractExtensions').on('click', '.btnExtend', function(){
		$('#modalExtend').openModal();	
		contractID = this.id;

		$.ajax({
			type: "GET",
			url: "/contractextensions/getContractInfo?contractID=" + contractID,
			success: function(data){
				$('#strTypeOfContractName').text(data.strTypeOfContractName);
				$('#dateStart').text(data.dateStart);
				$('#dateEnd').text(data.dateEnd);
				$('#deciRate').text(data.deciRate);
				$('#intMonthsDuration').text(data.intMonthsDuration);
				$('#deciRateNew').val(data.deciRate);
			},
			error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
			}
		});//ajax
	});
	
	$('.btnEnd').click(function(){
		swal({   title: "Are you sure?",
			  	 text: "Contract Will not be Extended",
			     type: "warning",
			     showCancelButton: true,
			     confirmButtonColor: "#DD6B55",
			     confirmButtonText: "Yes",
			     closeOnConfirm: false
			 },
			     function(){
		});
	});
	
	$('#btnProceed').click(function(){
		var deciNewRate = parseFloat($('#deciRateNew').val());
		if (deciNewRate > 0){

			billingDates();
			
			$.ajax({
				type: "POST",
				url: "{{action('ContractExtensionsController@extendContract')}}",
				beforeSend: function (xhr) {
					var token = $('meta[name="csrf_token"]').attr('content');
					if (token) {
						return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					}
				},
				data: {
					arrDate: arrDate,
					deciNewRate: deciNewRate,
					extensionDate: extensionDate,
					contractID: contractID
				},
				success: function(data){
					$('#modalExtend').closeModal();
					swal("Success!", "Contract Extended", "success");
				},
				error: function(data){
					var toastContent = $('<span>Error Database.</span>');
					Materialize.toast(toastContent, 1500,'red', 'edit');
				}
			});//ajax
			
		}else{
			var toastContent = $('<span>Check your input.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
	});

	function billingDates(){
		var dayStart = $('#intDayMonth').val();
		var dateEnd = new Date($('#dateEnd').text());
		var tempCurrentMonth = new Date(dateEnd.getFullYear(), dateEnd.getMonth() + 2, 0);
		var counter = 0;
		var monthDuration = $('#intMonthsDuration').text();

		arrDate = [];

		while(counter != monthDuration){
                
      var year = tempCurrentMonth.getFullYear();
      var month = tempCurrentMonth.getMonth() + 1;
      var day = dayStart;
      var lastDay = new Date(year, month, 0).getDate();
      
      if (lastDay < dayStart){
          day = lastDay;
      }
      var monthTemp = month - 1;
      var tempDate = moment(new Date(year,monthTemp, day)).format();
      arrDate.push(tempDate);
      extensionDate = tempDate;
      tempCurrentMonth = new Date(year, month, 1);
      
      counter ++;
  	}
	}
});
</script>

<script>
$(document).ready(function(){

	$.ajax({
		type: "GET",
		url: "{{action('ContractExtensionsController@getContractExtension')}}",
		success: function(data){	
			var table = $('#tblContractExtensions').DataTable();
			table.clear().draw();
			console.log(data);
			$.each(data,function(index,value){
				var buttonExtend = '<button class="btn col s12 waves-effect green btnExtend" id = "'+value.intContractID+'">Extend</button>';

				table.row.add([
					buttonExtend,
					'<h>' + value.strClientName + '</h>',
					'<h>' + value.dateEnd + '</h>',
					'<h>' + value.strPersonInCharge + '</h>'
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
@stop