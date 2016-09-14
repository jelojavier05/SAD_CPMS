@extends('layout.maintenanceLayout')

@section('title')
Additional Gun Request
@endsection

@section('content')

<div class="row">
	<div class="col s10 push-s2" style=" margin-left:10px; margin-top: 0.5%;">
		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="">
			<h4 class = "blue darken-3 white-text" style="margin-top:0px; padding-bottom:10px;">Tagging</h4>
			<div class='row'></div>
			<div class = "row">
				<div class='col s6' style="margin-top:-3%;">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px; padding-bottom:1%;">
					<h4 class="blue darken-1 white-text">Guns</h4>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="tableAvailableGun">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th>License No</th>
											<th>Name</th>
											<th>Type of Gun</th>
										</tr>
									</thead>

									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col s6" style="margin-top:-3%;">
					<div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:5px;">
						<h4 class="blue darken-1 white-text">Selected</h4>
						<div class="row">
							<div class="col s12">
								<table class="striped grey lighten-1" style="border-radius:10px;" id="tableSelectedGun">

									<thead>
										<tr>
											<th style="width:50px;"></th>
											<th>License No</th>
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
			<div class="col s12">
				<button class="btn-large blue waves-effect z-depth-2 left" id="btnBack" style="margin-top:20px;">Back</button>
				<button class="btn-large blue waves-effect z-depth-2 right " id="btnOK" style="margin-top:20px;">OK</button>
			</div>
		</div>
	</div>
</div>

<!--modal gun rounds-->
<div id="modalRounds" class="modal modal-fixed-footer" style="overflow:hidden; width:200px !important; height:260px !important; border-radius:15px; margin-top:100px;">
    <div class="modal-header" style="background-color:#01579b !important;"><h2 class="center-align">Rounds</h2></div>
    
    <div class="modal-content"> 
        <div class="row">
            <div class="col s10 push-s1">
                <div class="input-field">
                    <input id="intRounds" type="number" class="validate" required="" aria-required="true">
                    <label for="">Rounds</label> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer" style="background-color:#01579b !important;">
        <button class="btn waves-effect waves-light green" name="action" style="margin-right:47px;" id = "btnAddRounds">Add
        </button>
    </div>
</div>
<!--modal gun rounds end-->

<!--modal tagged gun summary-->
<div id="modalGunSummary" class="modal modal-fixed-footer ci" style="overflow:hidden; width:550px;max-height:100%; height:540px; margin-top:0px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>Summary</center></h3>  
      </div>
    </div>
    
    <div class="modal-content"> 
        <div class="row">
            <div class="col s10 push-s1">
                <ul class="collection with-header">
					<li class="collection-header">
						<h5 style="font-weight:bold;">Selected Guns</h5>
					</li>
					
					<li class="collection-item">
						<table class="striped" id="tableGunSummary">
							<thead>
								<th class='grey lighten-1'>License Number</th>
								<th class='grey lighten-1'>Name</th>
								<th class='grey lighten-1'>Type of Gun</th>
								<th class='grey lighten-1'>Rounds</th>
							</thead>
							
							<tbody>
							</tbody>
						</table>
					</li>
				</ul><div class='row'></div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer ci" style="background-color: #00293C;">
        <button class="btn waves-effect waves-light green" name="action" style="margin-right:47px;" id = "btnGunSave">Save
        </button>
    </div>
</div>
<!--modal tagged gun summary end-->

@stop

@section('script')

<script>
	$(document).ready(function(){
		var tableGun = [];
		var tableGunID = [];
    var tableAdded = [];
    var gunRounds = [];
    var requestIdentifier;

		$.ajax({
      type: "GET",
      url: "{{action('GunViewController@getGuns')}}",
      success: function(data){
        var table = $('#tableAvailableGun').DataTable();
        table.clear().draw();
        $.each(data, function(index, value) {
          if (value.boolFlag == 1){
            tableGun.push(value);
            table.row.add([
                '<button id="' + value.intGunID+ '" class="btn green buttonAdd"><i class="material-icons">add</i></button>',
                '<h id = "licenseNumber' +value.intGunID + '">' + value.strLicenseNumber +'</h>',
                '<h id = "name' +value.intGunID + '">' + value.strGunName +'</h>',
                '<h id = "type' +value.intGunID + '">' + value.strTypeOfGun +'</h>'
            ]).draw();
              
          }
        });//foreach   
      },
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
      }
  	});//get guard waiting

  	$.ajax({
      type: "GET",
      url: "{{action('ClientAddGunProceedController@getRequestIdentifier')}}",
      success: function(data){
      	requestIdentifier = data;
      },
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
      }
  	});//get guard waiting

  	$('#tableAvailableGun').on('click', '.buttonAdd', function(){ 
      $('#modalRounds').openModal();
      $('#btnAddRounds').val(this.id);
    });

    $('#tableSelectedGun').on('click', '.buttonRemove', function(){
      var id = this.id;
      $.each(tableAdded, function(index, value) {
        if (value.intGunID == id){
          var roundCount = $('#intRounds').val();
          tableAdded.splice(index,1);
          tableGun.push(value);
          gunRounds.splice(index,1);
          tableGunID.splice(index,1);
          return false;
        }
      });//foreach   
      refreshTable();
    });

    $('#btnAddRounds').click(function(){
	    var roundCount = $('#intRounds').val();
	    if (roundCount > 0 && roundCount < 100){
	        var id = $('#btnAddRounds').val();
	        
	        $.each(tableGun, function(index, value) {
	            if (value.intGunID == id){
	                var roundCount = $('#intRounds').val();
	                tableGun.splice(index,1);
	                tableAdded.push(value);
	                tableGunID.push(value.intGunID);
	                gunRounds.push(roundCount);
	                return false;
	            }
	        });//foreach   
	        refreshTable(); 
	        $('#modalRounds').closeModal();
	        $('#intRounds').val(0);
	    }else{
	        var toastContent = $('<span>Please Check Your Input. </span>');
	        Materialize.toast(toastContent, 1500,'red', 'edit');
	    }      
    });

    $('#btnOK').click(function(){
    	if (tableAdded.length > 0){
    		var table = $('#tableGunSummary').DataTable();
    		table.clear().draw();
	    	$.each(tableAdded, function(index, value) {
	        table.row.add([
	          '<h id = "licenseNumber' +value.intGunID + '">' + value.strLicenseNumber +'</h>',
	          '<h id = "name' +value.intGunID + '">' + value.strGunName +'</h>',
	          '<h id = "type' +value.intGunID + '">' + value.strTypeOfGun +'</h>',
	          '<h id = "rounds' +value.intGunID + '">' + gunRounds[index] +'</h>'
	        ]).draw();
	      });//foreach  
				$('#modalGunSummary').openModal();
    	}else{
    		var toastContent = $('<span>Select Gun.</span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');
    	}
		});

		$('#btnGunSave').click(function(){
				$.ajax({
	        type: "POST",
	        url: "{{action('ClientAddGunProceedController@insertGunOrder')}}",
	        beforeSend: function (xhr) {
	            var token = $('meta[name="csrf_token"]').attr('content');

	            if (token) {
	                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	            }
	        },
	        data: {
	        	arrGunAdded: tableGunID,
	        	arrGunRound: gunRounds
	        },
	        success: function(data){
	        	swal({
							title: "Success! You accepted the gun request.",
							text: "Go to Delivery page.",
							type: "success"
						},
						function(){
							window.location.href = '{{ URL::to("/adminInbox") }}';
						});

	        },
	        error: function(data){
						var toastContent = $('<span>Error Database.</span>');
						Materialize.toast(toastContent, 1500,'red', 'edit');

	        }
	      });//ajax
		});

    function refreshTable(){
      var table = $('#tableAvailableGun').DataTable();
      var table2 = $('#tableSelectedGun').DataTable();
      table.clear().draw();
      table2.clear().draw();
      
      $.each(tableGun, function(index, value) {
          table.row.add([
              '<button id="' + value.intGunID+ '" class="btn green buttonAdd"><i class="material-icons">add</i></button>',
              '<h id = "licenseNumber' +value.intGunID + '">' + value.strLicenseNumber +'</h>',
              '<h id = "name' +value.intGunID + '">' + value.strGunName +'</h>',
              '<h id = "type' +value.intGunID + '">' + value.strTypeOfGun +'</h>'
          ]).draw();
      });//foreach  
      
      $.each(tableAdded, function(index, value) {
          table2.row.add([
              '<button id="' + value.intGunID+ '" class="btn red buttonRemove"><i class="material-icons">close</i></button>',
              '<h id = "licenseNumber' +value.intGunID + '">' + value.strLicenseNumber +'</h>',
              '<h id = "name' +value.intGunID + '">' + value.strGunName +'</h>',
              '<h id = "type' +value.intGunID + '">' + value.strTypeOfGun +'</h>',
              '<h id = "rounds' +value.intGunID + '">' + gunRounds[index] +'</h>'
          ]).draw();
      });//foreach  
    }
	});

</script>

<script>

	$('#btnBack').click(function(){
	 window.location.href = '{{ URL::to("/adminInbox") }}';
	});	
		
	

	$('.buttonAdd').click(function(){
		$('#modalRounds').openModal();
	})


		
	$("#tableAvailableGun").DataTable({
		"columns": [
		{ "orderable": false },
		null,
	    null,
		null
	    ] ,  
		"pageLength":5,
		"lengthMenu": [5,10,15,20]
	    }); 
			
	$("#tableSelectedGun").DataTable({
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
		
	$("#tableGunSummary").DataTable({
	    "columns": [    
	    null,
		null,
		null,
		null
		] ,  
		"pageLength":3,	
		bFilter:false,
		bLengthChange:false
	 }); 
</script>

@stop