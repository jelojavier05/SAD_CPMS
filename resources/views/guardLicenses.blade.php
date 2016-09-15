@extends('layout.maintenanceLayout')

@section('title')
Guard Licenses
@endsection

@section('content')
<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Guard Licenses</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2" style="padding-left:2%;padding-right:2%;">
<!--            <div class="row">-->
               

                <div class="col s6 offset-s9">
                <button style="margin-top: 30px;" id="btnRenew" class=" z-depth-1 btn-large blue" >
                    <i class="material-icons left">refresh</i>Renew Licenses
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:10px;">
                    <table class="striped white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width:50px;" class="grey lighten-1"></th>                                
                                <th class="grey lighten-1">License No.</th>
                                <th class="grey lighten-1">Name</th>
                                <th class="grey lighten-1">Address</th>								
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                                <tr>
                                    <td><input type="checkbox" id="test1" />
      									<label for="test1"></label>
									</td>                                    
                                    <td>2013-12345-MN-0</td>
                                    <td >Paul Lee</td>                                    
                                    <td>900 Kamusta Street Paloma, Las Pinas Metro Manila</td>									
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal renew license-->
<div id="modalRenewGuardLicense" class="modal modal-fixed-footer ci" style="overflow:hidden; width:700px;max-height:100%; height:400px; margin-top:60px;">
    <div class="modal-header">
      <div class="h">
        <h3><center>License Renewal</center></h3>  
      </div>
    </div>
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
          <ul class="collection with-header" id="collectionActive">
            <li class="collection-header" style="font-weight:bold;">
				<div class="row">
					<div class="col s6">
						<label for="test1">From</label>
						<input type="date" placeholder="" id="test1">
					</div>
					
					<div class="col s6">
						<label for="test2">To</label>
						<input type="date" placeholder="" id="test2">
					</div>
				</div>
			</li>         
          </ul>
        </div>
      </div>
    </div>
    <div class="modal-footer ci" style="background-color: #00293C;">
      <button class="btn green waves-effect waves-light" name="" id = "" style="margin-right: 30px;">OK
      </button>
    </div>
  </div>
<!--modal renew license end-->


@stop

@section('script')
<script>

$("#dataTable").DataTable({
             "columns": [
            {"searchable": false},			            
            null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			
		});
$("#btnRenew").click(function(){
	$("#modalRenewGuardLicense").openModal();
});
	
</script>


@stop