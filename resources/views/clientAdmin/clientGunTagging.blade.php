@extends('layout.maintenanceLayout')

@section('title')
Client
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
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable">

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
								<table class="striped grey lighten-1" style="border-radius:10px;" id="dataTable2">

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
			<button class="btn-large blue waves-effect z-depth-2 left" id="btnBack" style="margin-top:20px;">Back</button>
			<a class="btn-large blue waves-effect z-depth-2 right " id="btnNext" style="margin-top:20px;">Proceed</a>
		</div>
	</div>
</div>

<!-------------------------------------------------modalRounds---------------------->
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

@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
        var tableGun = [];
        var tableAdded = [];
        var gunRounds = [];
        
        $.ajax({

            type: "GET",
            url: "{{action('GunViewController@getGuns')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: { 

            },
            success: function(data){
                var table = $('#dataTable').DataTable();
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
                confirm ('guard pending');
            }
        });//get guard waiting
        
        $('#dataTable').on('click', '.buttonAdd', function(){ 
             
            $('#modalRounds').openModal();
            $('#btnAddRounds').val(this.id);
           
        });
        
        $('#dataTable2').on('click', '.buttonRemove', function(){
            var id = this.id;
            $.each(tableAdded, function(index, value) {
                if (value.intGunID == id){
                    var roundCount = $('#intRounds').val();
                    tableAdded.splice(index,1);
                    tableGun.push(value);
                    gunRounds.splice(index,1);
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
		
		$("#dataTable2").DataTable({
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
		
		$('#btnBack').click(function(){
             window.location.href = '{{ URL::to("/clientView") }}';
        });
        
        $('#btnNext').click(function(){
           if (tableAdded.length != 0){
               
               var type = [];
               var gunID = [];
               var rounds = [];
               $.each(tableAdded, function(index, value){
                   type[index] = value.strTypeOfGun;
                   gunID[index] = value.intGunID;
                   rounds[index] = gunRounds[index];
               });
               
               $.ajax({
                    type: "POST",
                    url: "{{action('GunTaggingController@post')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        type:type,
                        gunID:gunID,
                        rounds:rounds
                    },
                    success: function(data){
                        window.location.href = '{{ URL::to("/client/registration/contractInfo") }}';
                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occured. </span>');
                        Materialize.toast(toastContent, 1500,'red', 'edit');

                    }
                });//ajax
           }else{
                var toastContent = $('<span>You should add gun first.</span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');   
           }
        });
        
        function refreshTable(){
            var table = $('#dataTable').DataTable();
            var table2 = $('#dataTable2').DataTable();
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
                    '<button id="' + value.intGunID+ '" class="btn red buttonRemove">X</button>',
                    '<h id = "licenseNumber' +value.intGunID + '">' + value.strLicenseNumber +'</h>',
                    '<h id = "name' +value.intGunID + '">' + value.strGunName +'</h>',
                    '<h id = "type' +value.intGunID + '">' + value.strTypeOfGun +'</h>',
                    '<h id = "rounds' +value.intGunID + '">' + gunRounds[index] +'</h>'
                ]).draw();
            });//foreach  
        }
	});
</script>
@stop