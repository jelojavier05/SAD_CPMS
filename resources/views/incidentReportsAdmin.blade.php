@extends('layout.maintenanceLayout')

@section('title')
Guard Transfer History
@endsection

@section('content')
<div class="row" style="margin-top:-30px;">
        
	<div class="row"> 
        
		<div class="row">
 
			<div class="col s5 push-s3" style="margin-left:-2%">
				<h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Incident Reports</h3>
			</div>
    
		</div>
   
	</div>
 
	<div class="col s12 push-s1" style="margin-top:-4%">
		<div class="container white lighten-2 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;padding-top:1%;">
<!--            <div class="row">-->               			
            
			<div class="row">
				<div class="col s12" style="margin-top:-5px;">
					<table class="striped white" style="border-radius:10px;" id="tblIncidentReports">
						<thead>
							<tr>
								<th style="width:50px;" class="grey lighten-1 "></th>                                
                                <th class="grey lighten-1 ">Date</th>
                                <th class="grey lighten-1 ">Client</th>                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
								<td><button class="btn blue btnOpenReport waves-effect"><i class="material-icons">open_in_browser</i></button></td>
								<td>12/12/12</td>
								<td>LandBank</td>
							</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal reports-->
<div id="modalReport" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:470px; margin-top:-10px;">
	<div class="modal-header">
		<div class="h">
			<h3><center>Report</center></h3>  
		</div>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<ul class="collection with-header" id="collectionActive">
					<li class="collection-header">
						<div class="row">
							<div class="col s3">
								<h5 style="font-weight:bold;">Date:</h5>
							</div>
							
							<div class="col s3">
								<h5></h5>
							</div>
							
							<div class="col s3">
								<h5 style="font-weight:bold;">Time:</h5>
							</div>
						</div>
					</li>
					<li class="collection-header" style="font-weight:bold;">
						<div class="row">
							<div class="col s5">
								<h5 style="font-weight:bold;">Security Guards:</h5>
							</div>
							
							<div class="col s6 pull-s1">								
								<div id = "" style="font-weight:normal;">&nbsp;Test Test</div>
								<div id = "" style="font-weight:normal;">&nbsp;Test Test</div>
								<div id = "" style="font-weight:normal;">&nbsp;Test Test</div>
							</div>
						</div>
					</li>
					<li class="collection-item"></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="modal-footer ci modal-close" style="background-color: #00293C;">
		<button class="btn green waves-effect waves-light" name="" id = "" style="margin-right: 30px;">OK
		</button>
    </div>
</div>
<!--modal reports end-->
@stop

@section('script')
<script>
$(document).ready(function(){
$("#tblIncidentReports").DataTable({             
	 "columns": [     
	 {"orderable": false},
	 null,
	 null
	 ] ,  
	 "pageLength":5,
	 "lengthMenu": [5,10,15,20],		
});	

$('.btnOpenReport').click(function(){
	$('#modalReport').openModal();
});
});
</script>
@stop