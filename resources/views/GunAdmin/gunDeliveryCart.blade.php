@extends('layout.maintenanceLayout')

@section('title')
Delivery
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style=" margin-left:10px; margin-top: 0.5%;">
<!--		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="">-->
<!--			<h3 class = "blue darken-3 white-text" style="margin-top:0px; padding-bottom:10px;">Tagging</h3>-->
			<div class = "row">
				
				
				<div class="col s6">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px; padding-bottom:1%;">
					<h4 class="blue darken-1 white-text">Gun Order</h4>
						<div class="row">
							<div class="col s12">
								<table class ="striped grey lighten-1" style="border-radius:10px;" id="dataTableOder">
									
									<thead>
										<tr>
											<th>ID</th>
											<th>Client Name</th>
											<th>Date Time</th>
											<th></th>
										</tr>
									</thead>
									
									<tbody>
                                        @foreach($orderHeader as $value)
										<tr>
											<td>{{$value->intGunOrderHeaderID}}</td>
											<td>{{$value->strClientName}}</td>
											<td>{{$value->datetimeCreate}}</td>
											<td><button class="btn blue waves-effect waves-light btnMore" id = '{{$value->intGunOrderHeaderID}}'>MORE</button></td>
										</tr>
                                        @endforeach
									</tbody>
									
								</table>
							</div>
						</div>
                        
                        <div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTableGun">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th>Serial Number</th>
											<th>Name</th>
											<th>Type of Gun</th>
											<th>Rounds</th>
										</tr>
									</thead>

									<tbody>                        
											
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col s6" style="margin-top:2px;">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
						<h4 class="blue darken-1 white-text">Selected</h4>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTableSelected">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th>Serial Number</th>
											<th>Name</th>
											<th>Type of Gun</th>
											<th>Rounds</th>
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
<!--		</div>-->
		<div class=" col s6 push-s3">
				<a class="btn-large blue waves-effect z-depth-2 left" id="" style="margin-top:20px;" href="/gunDeliveryView">Cancel</a>
				<a class="btn-large blue waves-effect z-depth-2 right" style="margin-top:20px;" id = 'btnProceed'>Proceed</a>
		</div>
	</div>
</div>

@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
        var tableGun = [];
        var tableSelected = [];
        var orderID;
        $('#dataTableOder').on('click','.btnMore', function(){
            orderID = this.id;
            $.ajax({
                type: "GET",
                url: '/gunDeliveryCart/get/gunorderdetail?id=' + this.id,
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                success: function(data){
                    
                    var dataTableGunArr = $('#dataTableGun').DataTable();
                    dataTableGunArr.clear().draw();
                    
                    $.each(data, function(index, value) {
                        tableGun.push(value);
                        dataTableGunArr.row.add([
                            '<button class="btn green btnAdd" id = ' + value.intGunOrderDetailID + '><i class="material-icons">add</i></button>',
                            '<h id = "serialNumber' +value.intGunOrderDetailID + '">' + value.strSerialNumber +'</h>',
                            '<h id = "name' +value.intGunOrderDetailID + '">' + value.strGunName +'</h>',
                            '<h id = "type' +value.intGunOrderDetailID + '">' + value.strTypeOfGun +'</h>',
                            '<h id = "round' +value.intGunOrderDetailID + '">' + value.intRounds +'</h>'
                        ]).draw();
                    });//foreach  
                    
                },
                error: function(data){
                    var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                }
            });//ajax 
        });
        
        $('#dataTableGun').on('click', '.btnAdd', function(){
            var id = this.id;
            $.each(tableGun, function(index, value) {
                
                if (value.intGunOrderDetailID == id){
                    
                    tableGun.splice(index,1);
                    tableSelected.push(value);    
                    refreshTable();
                    return false;
                }
            });//foreach   
            
        });
        
        $('#dataTableSelected').on('click','.btnRemove', function(){
            var id = this.id;
            $.each(tableSelected, function(index, value) {
                
                if (value.intGunOrderDetailID == id){
                    tableSelected.splice(index,1);
                    tableGun.push(value);    
                    refreshTable();
                }
            });//foreach  
        });
        
        $('#btnProceed').click(function(){
             if (tableSelected.length > 0){
                 var serialNumber = [];
                 var name = [];
                 var type = [];
                 var rounds = [];
                 var id = [];
                 
                 $.each(tableSelected, function(index,value){
                     serialNumber[index] = value.strSerialNumber; 
                     name[index] = value.strGunName;
                     type[index] = value.strTypeOfGun;
                     rounds[index] = value.intRounds;
                     id[index] = value.intGunOrderDetailID;
                 });
                 
                 $.ajax({
                    type: "POST",
                    url: "{{action('GunDeliveryCartController@postSelectedGun')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        type:type,
                        id:id,
                        rounds:rounds,
                        serialNumber: serialNumber,
                        name: name,
                        orderID: orderID
                    },
                    success: function(data){
                        window.location.href = '{{ URL::to("/gunDelivery") }}';
                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occured. </span>');
                        Materialize.toast(toastContent, 1500,'red', 'edit');

                    }
                });//ajax
             }else{
                 var toastContent = $('<span>Please select gun.</span>');
                 Materialize.toast(toastContent, 1500,'red', 'edit');
             }
        });
		
		$('#dataTableGun').DataTable({
             "columns": [
            { "orderable": false },
            null,
            null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
         }); 
		
		$('#dataTableSelected').DataTable({
             "columns": [
            { "orderable": false },
            null,
            null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
         }); 
		
		$('#dataTableOder').DataTable({
             "columns": [
            null,
            null,
			null,
			{ "orderable": false }
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
         });
        
        function refreshTable(){
            var dataTableGunArr = $('#dataTableGun').DataTable();
            var dataTableSelectedArr = $('#dataTableSelected').DataTable();
            dataTableGunArr.clear().draw();
            dataTableSelectedArr.clear().draw();
            
            $.each(tableGun, function(index, value) {
                dataTableGunArr.row.add([
                    '<button class="btn green btnAdd" id = ' + value.intGunOrderDetailID + '><i class="material-icons">add</i></button>',
                    '<h id = "serialNumber' +value.intGunOrderDetailID + '">' + value.strSerialNumber +'</h>',
                    '<h id = "name' +value.intGunOrderDetailID + '">' + value.strGunName +'</h>',
                    '<h id = "type' +value.intGunOrderDetailID + '">' + value.strTypeOfGun +'</h>',
                    '<h id = "round' +value.intGunOrderDetailID + '">' + value.intRounds +'</h>'
                ]).draw();
            });//foreach  
            
            $.each(tableSelected, function(index, value) {
                dataTableSelectedArr.row.add([
                    '<button class="btn red btnRemove" id = ' + value.intGunOrderDetailID + '>X</button>',
                    '<h id = "serialNumber' +value.intGunOrderDetailID + '">' + value.strSerialNumber +'</h>',
                    '<h id = "name' +value.intGunOrderDetailID + '">' + value.strGunName +'</h>',
                    '<h id = "type' +value.intGunOrderDetailID + '">' + value.strTypeOfGun +'</h>',
                    '<h id = "round' +value.intGunOrderDetailID + '">' + value.intRounds +'</h>'
                ]).draw();
            });//foreach  
        }
		
	});
</script>
@stop