@extends('layout.maintenanceLayout')

@section('title')
Gun Licenses
@endsection

@section('content')


<div class="row" style="margin-top:-30px;">
  <div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text" style="font-family:Myriad Pro;margin-top:9.2%">Gun Licenses</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2">
<!--            <div class="row">-->
               

                <div class="col s6 offset-s9">
                <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large blue" >
                    <i class="material-icons left">refresh</i>Renew Licenses
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:10px;">
                    <table class="striped white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width:50px;" class="grey lighten-1"></th>                                
                                <th class="grey lighten-1">Serial No.</th>
                                <th class="grey lighten-1">Name</th>
                                <th class="grey lighten-1">License No.</th>
								<th class="grey lighten-1">License Expiration Date</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                                <tr>
                                    <td><input type="checkbox" id="test1" />
      									<label for="test1"></label>
									</td>                                    
                                    <td>123-123-123</td>
                                    <td >M4A1</td>                                    
                                    <td>456-456-456</td>
									<td>12/12/2016</td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('script')
<script>

$("#dataTable").DataTable({
             "columns": [
            {"searchable": false},			
            null,
            null,
			null,
			null
            ] ,  
			"pageLength":5,
			"lengthMenu": [5,10,15,20],
			
		});
	
</script>


@stop