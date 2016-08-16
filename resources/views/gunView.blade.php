@extends('layout.maintenanceLayout')

@section('title')
Gun
@endsection

@section('content')

<div class="row">	
    
    <div class="col s12 push-s1" id="Active" >
        <div class="row" id="activeGuns">
            <div class="col s8">
                <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
                    <div class="col s6 push-s1">
                        <h4 class="blue-text">Guns<h4>
                    </div>
                    
                    <div class="row">
                        <div class="col s11" style="margin: -15px 25px 25px 25px;">
                            <table class="highlight white" style="border-radius:10px;" id="dataTable">
                                <thead>
                                    <tr>
                                        <th style="width:50px;"></th>
                                        <th style="width:50px;"></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type of Gun</th>
                                        <th style="width:50px;"></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>
                                            <button class="buttonUpdate btn col s12 modal-trigger" href="#modaleditGun"  name="" id="" >
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
                                        <td id = "">Arctic Warfare Magnum</td>
                                        <td id = "">Sniper</td>
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
            
            <div class="col s4 pull-s1" style="margin-top:25px;">	
                <ul class="collection with-header" id="collectionActive">
                    <li class="collection-header" style="opacity:0;"><h5 style="font-weight:bold;">Details</h5></li>
                    
                    <div style="visibility:hidden;" id="detailcontainer">
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Manufacturer:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Remington</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Serial Number:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;2013-01234-SJ-0</div>
                        </li>
                        <li class="collection-header" style="font-weight:bold; opacity:0;"><h5 style="font-weight:bold;">License</h5>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">License Number:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;123456789</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Date Issued:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;11/29/2015</div>
                        </li>
                        <li class="collection-item" style="font-weight:bold; opacity:0;">Date Expired:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;11/29/2016</div>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    
    
    
</div>

<div id="modaleditGun" class="modal modal-fixed-footer" style="overflow:hidden; width:700px;max-height:100%; height:400px; margin-top:30px;">
        <div class="modal-header" style="background-color:#01579b !important;"><h4>Gun</h4></div>
        	<div class="modal-content">
				
				<div class="row">
					<div class="col s12">
						<div class="input-field col s6">
							<input placeholder=" " id="clientNumberEdit" maxlength="10" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
							<label data-error="Incorrect" for="clientNumberEdit">Contact Number (Client)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="personInChargeEdit" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
							<label for="personInChargeEdit" data-error="Incorrect">Person in Charge</label>
						</div>

						<div class="input-field col s6">
							<input placeholder=" " id="personNumberEdit" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
							<label data-error="Incorrect" for="personNumberEdit">Contact Number (Person In Charge)</label>

						</div>
						
						<div class="input-field col s6">
							<input placeholder=" " id="areaSizeEdit" type="text" class="validate" pattern="[0-9. ]{2,}" required="" aria-required="true">
							<label data-error="Incorrect" for="areaSizeEdit">Area Size (approx. in square meters)</label>

						</div>
					
						<div class="input-field col s6">
							<input placeholder=" " id="populationEdit" type="text" class="validate" pattern="[0-9, ]{2,}" required="" aria-required="true">
							<label data-error="Incorrect" for="populationEdit">Population (approx.)</label>

						</div>
					</div>
				</div>
    		</div>
			
			<div class="modal-footer" style="background-color:#01579b !important;">
				<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnSave">Update
					
				</button>
			</div>
</div>

@stop
	
@section('script')

<script> 
$(document).ready(function(){

});
</script>

<script type="text/javascript">
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
	
	$('#detaillist').click(function() {
			$('#detailcontainer').css({
				'visibility': 'visible',
				'height': '400px'
			});
		});
</script>

<script>
	$(document).ready(function(){
    	$('ul.tabs').tabs();
      });
</script>
@stop