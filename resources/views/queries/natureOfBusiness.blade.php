@extends('layout.maintenanceLayout')

@section('title')
Nature of Business - Query
@endsection

@section('content')

<div class="row" style="margin-top:-30px;">


<div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Nature of Business</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%;">
        <div class="container white lighten-2 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;">
<!--            <div class="row">-->
                               
				
				<div class="nav-wrapper">
				<form>
				<div class="input-field col s3 push-s2">
					<input id="mySearch" type="search">
					<label for="search"><i class="material-icons">search</i></label>
<!--					<i class="material-icons">close</i>-->
				</div>
				
				</div>
<!--            </div>-->
        
        
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="striped" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>                                
                                <th class="blue darken-3 white-text">ID</th>
                                <th class="blue darken-3 white-text">Name</th>
								<th class="blue darken-3 white-text">Rate per Hour</th>
                                
                            </tr>
                        </thead>

                        <tbody>
							<tr>
								<td>1</td>
								<td>Salon</td>
								<td>100</td>
							</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
		
@section('script')
<script>
$(document).ready(function(){
		
		$("#dataTable").DataTable({
             "columns": [           
            null,
            null,
			null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
//			"lengthMenu": [5,10,15,20],
//			"bFilter": false
			"bLengthChange": false


		});
});
	
</script>		
@stop