@extends('securityguard.SecurityGuardDashboard1')

@section('title')
Security Change Location
@endsection


@section('content')
<div class="row">
    <div class="col l12">
        <div class="col s10 push-s2" style=";max-height:100% !important;height:550px !important;">
			<div class="row">
				<div class="row"> 
					<div class="col s12 l12 pull-s1 push-l1">
						<h3 class="blue-text" style="font-family:Myriad Pro;margin-left:-3%;margin-top:9.2%">Change Location</h3>
					</div>  
				</div>
				<div class="row">
					<div class="col s6 l12 pull-s3" style="margin-top:-2%;">
						<div class="container z-depth-2" style="background-color:#F0EFEA;width:900px;border: .5px solid grey">
							<div class="row">
								<div class="col s6 l12" >
									<table class="centered" style="border-radius:10px;" id="dataTable">										
										<thead>
											<tr>
												<th style="width:50px;" class="blue darken-3 white-text">Client Name</th>
												<th style="width:50px;" class="blue darken-3 white-text">Contact Number</th>
												<th style="width:50px;" class="blue darken-3 white-text">Nature of Business</th>
												<th style="width:50px;" class="blue darken-3 white-text">Location</th>
												<th style="width:50px;" class="blue darken-3 white-text">Action</th>
													
												
											</tr>
										</thead>
										
										<tbody>
											@foreach($clients as $value)
											<tr>

												<td>{{$value->strClientName}}</td>
												<td>{{$value->strContactNumber}}</td>
												<td>{{$value->strNatureOfBusiness}}</td>
												<td>{{$value->strCityName}}, {{$value->strProvinceName}}</td>
												
												<td>
													<button id="{{$value->intClientID}}" class="btn blue buttonGuards">
														More
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
                </div>
            </div>
          </div>
        </div>
      </div>
    
<!--modal client guards list   -->
<div id="modalClientGuardList" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;min-height:650px; margin-top:-60px;">
            <div class="modal-header">
              	<div class="h">
        			<h3><center>Current Guards</center></h3>  
        		</div>
            </div>
        	
        	<div class="modal-content">
        		<div class="row">
        			<div class="col s12">
        				<ul class="collection with-header" id="collectionActive">											
							<li class="collection-item">
        						<div class="row">
        							<div class="col s12">
        								
        								<table class="striped white" style="border-radius:10px; width:100%;" id="dataTableGuards">
        									<thead>
        										<th class="grey lighten-1" style="width:10px;"></th>
        										<th class="grey lighten-1">Name</th>
        										<th class="grey lighten-1">City</th>
        										<th class="grey lighten-1">Province</th>
        									</thead>
        									<tbody>
        									</tbody>
        								</table>
        							</div>
        						</div>
                            </li>
        			</div>
        		</div>
        	</div>

            <!-- button -->
            <div class="modal-footer ci" style="background-color: #00293C;">
        		<button class="btn blue waves-effect waves-light" id = "btnSend" style="margin-right: 30px;">Send<i class="material-icons right">send</i>
                </button>
        	</div>
		</div>
<!--	modal client guards list end-->
	
<!--modal alert pending swap location/client-->
<div id="modalPendingSwapLocationRequestAlert" class="modal modal-fixed-footer ci" style="overflow:hidden; width:550px; max-height:100%; height:500px; margin-top:10px;">
    <div class="modal-header">
		<div class="h">
			<h3><center>Warning</center></h3>  
		</div>

	</div>
    <div class="modal-content">
        <div class="row">
            <div class="col s12" style="margin-top:-10px;">
                <ul class="collection with-header" >
					
					<li class="collection-header" >
						<div class="red-text" style="font-weight:bold;"><h5 class="animated shake">You Still Have a Pending Location Request!</h5></div>
					</li>
					
					<li class="collection-header" >
						<div class='row'>
							<div class='col s4'>
								<div style="font-weight:bold;">Requested Client:</div>
							</div>
										
							<div class="col s3" style="margin-left:-10px;" id = ''>
								ChinaBank
							</div>
							
							<div class="col s3">
								<div style="font-weight:bold;">Contact Number:</div>
							</div>
							
							<div class="col s2" id="">
								09090909090
							</div>
						</div>
					</li>
					
					
					<li class="collection-header" >
						<div class='row'>
							<div class='col s4'>
								<div style="font-weight:bold;">Guard Requested:</div>
							</div>
										
							<div class="col s3" style="margin-left:-10px;" id = ''>
								Larry Bird
							</div>
							
							<div class="col s3">
								<div style="font-weight:bold;">Contact Number:</div>
							</div>
							
							<div class="col s2" id="">
								09123456789
							</div>
						</div>
					</li>
										
					
					<li class="collection-item" style="font-weight:bold;">Date Sent:<div style="font-weight:normal;" id = ''>&nbsp;&nbsp;&nbsp;01/01/2016</div>
					</li>						
                
                </ul>
            </div>
        </div>
		<div class="row"></div>
    </div>
    
    <div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn green " name="" id = "" style="margin-right: 30px;">OK
            </button>
	</div>
</div>	
<!--modal alert pending swap location/client end-->
@stop

@section('script')
<script>
$(document).ready(function(){
	$('#dataTable').on('click', '.buttonGuards', function(){
		
		if (hasPendingRequest()){
			$('#modalPendingSwapLocationRequestAlert').openModal();
		}else{
			$('#modalClientGuardList').openModal();   
			refreshTableGuard(this.id);
		}
	});

	$('#btnSend').click(function(){
		var guardIDSelected = $('input[name=guard]:checked').val();

		if (guardIDSelected != null){
			sendData(guardIDSelected);
		}else{
			var toastContent = $('<span>Please select guard.</span>');
			Materialize.toast(toastContent, 1500,'red', 'edit');
		}
		
	});

	function refreshTableGuard(id){
		$.ajax({
            type: "GET",
            url: "/securitychangelocation/get/clientactiveguards?clientID=" + id,
            success: function(data){
            	var table = $('#dataTableGuards').DataTable();
            	table.clear().draw();
            	$.each(data, function(index,value){
            		table.row.add([
            			'<input name="guard" class = "with-gap radioGuard" type="radio" id="radio'+value.intGuardID+'" value = "'+value.intGuardID+'"/> <label for="radio'+value.intGuardID+'"></label>',
	                    '<h>' + value.strFirstName +' '+ value.strLastName +'</h>',
	                    '<h>' + value.strCityName +'</h>',
	                    '<h>' + value.strProvinceName +'</h>'
	                ]).draw(false);
            	});
            }
        });//ajax
	}

	function hasPendingRequest(){
		var checker;
		$.ajax({
            type: "GET",
            url: "{{action('SecurityChangeLocationController@hasPendingRequest')}}",
            success: function(data){
            	checker = data;
            },async:false
        });//ajax

		return checker;
	}

	function sendData(id){
		$.ajax({
            type: "POST",
            url: "{{action('SecurityChangeLocationController@sendRequest')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                guardIDSelected: id
            },
            success: function(data){
            	swal({
						title: "Success!",
						text: "Request has been sent. Please wait for response.",
						type: "success"
					},
					function(){
					window.location.href = '{{ URL::to("/securitychangelocation") }}';
				});
            },
            error: function(data){
				var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');

            }
        });//ajax
	}
}); 
</script>

<script>
	$('.slider').slider({full_width: true});
	$("#dataTableGuards").DataTable({
         "columns": [
		{"orderable": false},
        null,
		null,
		null
        ] ,  
		"pageLength":5,
		"lengthMenu": [5,10,15,20]
	});
	$("#dataTable").DataTable({
         "columns": [          
        null,
        null,
		null,
		null,
		{"searchable": false}
        ] ,  
		"pageLength":5,
		"lengthMenu": [5,10,15,20]
	});
</script>
@stop