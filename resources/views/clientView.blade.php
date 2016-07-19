@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')

<div class="row">
	
	<div class="col s10 push-s2">
      <ul class="tabs">
        <li class="tab col s3"><a href="#Active">Active</a></li>
        <li class="tab col s3"><a href="#Pending">Pending</a></li>
      </ul>
    </div>
	
<!-------------------------------------------Active------------------------------------------------->
		<div class="col s12 push-s1" id="Active" >
			<div class="row" id="activeClient">
				<div class="col s8">
					<div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
			<!--            <div class="row">-->
							<div class="col s6 push-s1">
								<h4 class="blue-text">Client (Active)</h4>
							</div>

			<!--
							<div class="col s3 offset-s3">
								<a style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="/client/registration/basicInfo">
									<i class="material-icons left">add</i> ADD
								</a>
							</div>
			-->
			<!--            </div>-->

						<div class="row">
							<div class="col s11" style="margin: -15px 25px 25px 25px;">
								<table class="highlight white" style="border-radius:10px;" id="dataTable">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th style="width:50px;"></th>
											<th>ID</th>
											<th>Name</th>
											<th>Person In Charge</th>
											<th style="width:50px;"></th>


										</tr>
									</thead>

									<tbody>

											<tr>


												<td>
													<button class="buttonUpdate btn col s12"  name="" id="" >
														<i class="material-icons">edit</i>
													</button>
												<label for=""></label>
												</td>

												<td>
													<button class="buttonDelete btn red col s12" id="">
														<i class="material-icons">delete</i>
													</button>
												</td>
												<td id = "">1</td>
												<td id = "">PUP Mabini Campus</td>
												<td id = "">Ted Pylon</td>
												
												<td>
													<button id="detaillist" class="btn blue col s12" onclick="Materialize.showStaggeredList('#collectionActive')" >
													MORE
													</button>
												</td>

											</tr>

									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			
<!---------------------------------------ActiveMoreCollection------------------------------------------------>
				<div class="col s4 pull-s1" style="margin-top:25px;">	
					<ul class="collection with-header" id="collectionActive">
							<li class="collection-header" style="opacity:0;"><h5 style="font-weight:bold;">Details</h5></li>
						<div style="visibility:hidden;" id="detailcontainer">
							
							<li class="collection-item" style="font-weight:bold; opacity:0;">Nature of Business:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Bank</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Contact Number (Client):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09123456789</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Person in Charge:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Emilio Aguinaldo</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Contact Number (Person in Charge):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09987654321</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Address:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Hello Street Pasig City, Metro Manila</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Area Size (approx. in square meters):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;1000</div>
							</li>

							<li class="collection-item" style="font-weight:bold; opacity:0;">Population (approx.):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;10000</div>
							</li>
							
							<li class="collection-item" style="font-weight:bold; opacity:0;">Number of Guards:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;10</div>
							</li>
						</div>
						
					</ul>
				</div>
<!-------------------------------------------------------------------------------------------------->
			</div>
		</div>
	
<!-------------------------------------------------------------------------------------------->
	
<!------------------------------------------Pending----------------------------------------->

		<div class="col s12 push-s1" id="Pending" >
	
			<div class="row" id="pendingClient">
				<div class="col s8">
					<div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
			<!--            <div class="row">-->
							<div class="col s6 push-s1">
								<h4 class="blue-text">Client (Pending)</h4>
							</div>

						<div class="row">
							<div class="col s12" style="margin-top:-20px;">
								<table class="highlight white" style="border-radius:10px;" id="dataTable2">

									<thead>
										<tr>
											<th style="width:10px;"></th>
											<th>ID</th>
											<th>Name</th>
											<th>Guard Count</th>
											<th style="width:10px;"></th>

										</tr>
									</thead>

									<tbody>
                                        @foreach($clientPending as $value)
											<tr>
												<td>
													<button class="buttonNotification btn blue col s12 " id="{{$value->intClientPendingID}}" href="#modalsendNoti">
														<i class="material-icons">send</i>
													</button>
                                                    
                                                    <input type = "hidden" id = "clientID{{$value->intClientPendingID}}" value = "{{$value->intClientID}}">
												</td>
												<td id = "">{{ $value->intClientPendingID }}</td>
												<td id = "">{{ $value->strClientName }}</td>
												<td>
													
													<a id="guardlist" class="btn col s12" onclick="Materialize.showStaggeredList('#collectionPending')">5/{{$value->intNumberOfGuard}}</a>
												
												</td>
												
												<td>
													<button class="btn green col s12" id="">
														Proceed
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
				
				<!---------------------------------------PendingMoreCollection------------------------------------------------>
				<div class="col s4 pull-s1" style="margin-top:25px;">	
					<ul class="collection with-header" id="collectionPending">
						<li class="collection-header" style="opacity:0;">
									<ul class="tabs" style="overflow:hidden;">
										<li class="tab col s3"><a class="active" href="#guardcontainer">Guards</a></li>
										<li class="tab col s3"><a href="#pendingDetails">Details</a></li>
									</ul>
						</li>
						
						<!-------------------------Details------------------>
						<div style="overflow:scroll; overflow-x:hidden; height:400px;" id="pendingDetails">
						<li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Bank</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09123456789</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Emilio Aguinaldo</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09987654321</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Hello Street Pasig City, Metro Manila</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;1000</div>
						</li>
						
						<li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;10000</div>
						</li>
						</div>
						
						<!------------------Guards-------------->
						
						<div id="guardcontainer" style="visibility:hidden;">
						
						<li class="collection-item" style="opacity:0;">Marco Polo</li>
					    <li class="collection-item" style="opacity:0;">Ferdinand Magellan</li>
					    <li class="collection-item" style="opacity:0;">Manuel Roxas</li>
					    <li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						<li class="collection-item" style="opacity:0;">Generoso Cupal</li>
						</div>
						
					</ul>
				</div>
<!-------------------------------------------------------------------------------------------------->
				
				
			</div>
		</div>
<!------------------------------------------------------------------------------------------->
	
<!-----------------------------------Modal----------------------------------------------------->

<div id="modalsendNoti" class="modal modal-fixed-footer" style="overflow:hidden; width:700px;max-height:100%; height:570px; margin-top:-30px;">
        <div class="modal-header"><h4>Send Notification</h4></div>
        	<div class="modal-content">
				
				<div class="row">
					<div class="col s12">
						<button class="btn blue col s12" style="width:20%;" id="btnSuggested">
                            Suggested
                        </button>
                        <table class="striped white" style="border-radius:10px; width:100%;" id="dataTablenoti">
                            
							<thead>
								<th style="width:10px;"></th>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
                                <th>Province</th>
                                <th>City</th>
							</thead>

							<tbody>
                                <tr>
									<td style="height:-15px;">
										
										  <input type="checkbox" id="" value = "">
										  <label for=""></label>
										
									</td>
									<td style="height:-15px;"></td>
									<td style="height:-15px;"></td>
									<td style="height:-15px;"></td>
                                    <td style="height:-15px;"></td>
                                    <td style="height:-15px;"></td>
								</tr>
									
							</tbody>

						</table>
					</div>
				</div>
	<!-- Modal Button Save -->
				
		
    		</div>
			
			<div class="modal-footer" style="background-color:#01579b !important;">
				<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSendNotification">Send
					<i class="material-icons right">send</i>
				</button>
			</div>
</div>
</div>

	


@stop
	
@section('script')


<script type="text/javascript">
	$(document).ready(function(){
        var clientID;
        var clientPendingID;
        var guardWaiting;
        var guardChecked;
        var guardHasNotification;
        
        $.ajax({

            type: "GET",
            url: "{{action('ClientViewController@getGuardWaiting')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: { 

            },
            success: function(data){
                guardWaiting = data;
            },

            error: function(data){
                confirm('mali');
            },async:false
        });//ajax
        
        $.ajax({

            type: "GET",
            url: "{{action('ClientViewController@getClientPending')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: { 

            },
            success: function(data){
                var table = $('#dataTablenoti').DataTable();
                table.clear().draw();
                
                for(intLoop = 0; intLoop < data.length; intLoop ++){

                    table.row.add([
                        '<button class="buttonNotification btn blue col s12 " id="{{$value->intClientPendingID}}" href="#modalsendNoti"><i class="material-icons">send</i></button><input type = "hidden" id = "clientID{{$value->intClientPendingID}}" value = "{{$value->intClientID}}">',

                        '<h style="height:-15px;">' + guardWaiting[intLoop].intGuardID + '</h>',
                        '<h style="height:-15px;">' + guardWaiting[intLoop].strFirstName + '</h>',
                        '<h style="height:-15px;">' + guardWaiting[intLoop].strLastName + '</h>',
                        '<h style="height:-15px;">' + guardWaiting[intLoop].strProvinceName + '</h>',
                        '<h style="height:-15px;">' + guardWaiting[intLoop].strCityName + '</h>',
                    ]).draw(false);
                    
                }
            },

            error: function(data){
                confirm('mali');
            },async:false
        });//ajax
        
        
        
        $('#dataTable2').on('click', '.buttonNotification', function(){
            clientID = 'clientID' + this.id;
            clientPendingID = this.id;
            $('#modalsendNoti').openModal();
            populateTable(clientPendingID);
        });
        
        $('#btnSendNotification').click(function(){
            getCheckedGuard();
            if (guardChecked.length > 0){
                
                sendData();
            }else{
                confirm ('magcheck ka bes! para tumuloy');
            }
        });
        
        $("#dataTable").DataTable({
                 "columns": [
                { "orderable": false },
                { "orderable": false },
                null,
                null,
				null,
				{ "orderable": false }
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
		
		$("#dataTable2").DataTable({
                 "columns": [
				{ "orderable": false },
                null,
                null,
				{ "orderable": false },
				{ "orderable": false }
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
		
		$("#dataTablenoti").DataTable({
                 "columns": [
                { "orderable": false },
                null,
                null,
				null,
                null,
                null
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
		
        $('#guardlist').click(function() {
			$('#guardcontainer').css({
				'visibility': 'visible',
				'max-height': '400px',
				'overflow': 'scroll',
				'overflow-x': 'hidden',
				'height': '100%'
			});
		});
		
		$('#detaillist').click(function() {
			$('#detailcontainer').css({
				'visibility': 'visible',
				'overflow': 'scroll',
				'overflow-x': 'hidden',
				'height': '400px'
			});
		});
        
        function sendData(){

            $.ajax({

                type: "POST",
                url: "{{action('ClientViewController@sendGuardPendingNotification')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    guardWaiting: guardChecked,
                    clientPendingID: clientPendingID,
                    currentDate: 
                },
                success: function(data){
                    swal("Success!", "Record has been Added!", "success");
                    $('#modalsendNoti').closeModal();
                },
                error: function(data){
                    var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');

                }
            });//ajax
        }//send data
        
        function populateTable(notificationID){
            var table = $('#dataTablenoti').DataTable();
            table.clear().draw();
            $.ajax({

                type: "GET",
                url: "/clientView/get/clientPendingNotification?notificationID=" + notificationID,
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                success: function(data){
                    guardHasNotification = data;
                },
                error: function(data){
                    var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');

                },async:false
                
            });//ajax
            
            for(intLoop = 0; intLoop < guardWaiting.length; intLoop ++){
                var boolchecker = true;
                for (intLoop2 = 0; intLoop2 < guardHasNotification.length; intLoop2 ++){
                    if (guardWaiting[intLoop].intGuardID == guardHasNotification[intLoop2].intGuardID){
                        boolchecker = false;
                        break;
                    }
                }
                
                if (boolchecker){
                    table.row.add([
                        '<input type="checkbox" id="checkBox' +guardWaiting[intLoop].intGuardID  + '" value = "'+ guardWaiting[intLoop].intGuardID +'"><label for="checkBox' + guardWaiting[intLoop].intGuardID + '"></label>',
                        
                        '<h style="height:-15px;">' + guardWaiting[intLoop].intGuardID + '</h>',
                        '<h style="height:-15px;">' + guardWaiting[intLoop].strFirstName + '</h>',
                        '<h style="height:-15px;">' + guardWaiting[intLoop].strLastName + '</h>',
                        '<h style="height:-15px;">' + guardWaiting[intLoop].strProvinceName + '</h>',
                        '<h style="height:-15px;">' + guardWaiting[intLoop].strCityName + '</h>',
                    ]).draw(false);
                }
            }
            
            
            
//            console.log(guardHasNotification[0].intGuardID);
        }
        
        function getCheckedGuard(){
            var intCounter = 0;
            guardChecked = [];
            for(intLoop = 0; intLoop < guardWaiting.length; intLoop ++){
                var guardID = 'checkBox' + guardWaiting[intLoop]['intGuardID'];
                if ($('#' + guardID).is(':checked')){
                    guardChecked[intCounter] = guardWaiting[intLoop]['intGuardID'];
                    intCounter++;
                }
            }
        }
    });
		
		

</script>

<script>
	$(document).ready(function(){
			$('ul.tabs').tabs();
		  });
</script>
@stop