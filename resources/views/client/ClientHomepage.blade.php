@extends('client.ClientDashboard')
@section('title')
Client Homepage
@endsection


@section('content')

<body style="overflow:hidden" onload="window.scrollTo(0, 0);">
<div class='row'>
	<div class="col s12 l9 offset-l3" style="height:600px;">
		<div class="col s6 l6" >
      	 <div class="card animated flipInX" style="background-color:#1E434C" >
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'clientNumber'>12</span>
              <p style="margin-left:10px;">Guards</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">accessibility</i>
            </div>
            <div class="card-action" style="background-color:#1E434C">
              <center>
                  <a href="#!" class="white-text btn transparent z-depth-0 guardbtn" onclick="Materialize.showStaggeredList('#guardcontainer')" >See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
      </div>
	  
	  <div class="col s6 l6">
		<div class="card animated flipInX" style="background-color:#9B4F0F">
            <div class="card-content white-text">

              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'gunNumber'>10</span>
              <p style="margin-left:10px;">Guns</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">security</i>

            </div>
            <div class="card-action" style="background-color:#9B4F0F">
              <center>
                  <a href="#!" class="white-text btn transparent z-depth-0 gunbtn" onclick="Materialize.showStaggeredList('#guncontainer')">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div> 
	  </div>
		
	<div class="col s12">
		<table class="striped white" style="border:1px solid black;" id="dataTablePresentGuards">
			<h4 style="font-weight:bold;">Present Guards</h4>
			<thead>
				<th>Name</th>
				<th>Gender</th>
			</thead>
			
			<tbody>
				<tr>
					<td>Tim Duncan</td>
					<td>Male</td>
				</tr>
				<tr>
					<td>Tim Duncan</td>
					<td>Male</td>
				</tr>
				<tr>
					<td>Tim Duncan</td>
					<td>Male</td>
				</tr>
				<tr>
					<td>Tim Duncan</td>
					<td>Male</td>
				</tr>
				<tr>
					<td>Tim Duncan</td>
					<td>Male</td>
				</tr>
				<tr>
					<td>Tim Duncan</td>
					<td>Male</td>
				</tr>
			</tbody>
		</table>
	</div>	

	</div>
</div>


<!--ITEMSguard-->
<!--<div class="row">	-->
<div class='container-fluid' style="height:600px; margin-top:50px;">
    <div class="row">
			<div class="col s12 l4 push-l3">
                
                     <ul class="collection with-header " id="guardcontainer" style="border:none;">
		              	<li class="collection-header guardscroll" style="opacity:0;"><h5 style="font-weight:bold;">Guards</h5><a href="#!" class="btn blue right btnbackguard" style="margin-top:-40px;"><i class="material-icons">vertical_align_top</i></a></li>            	        			
                                <div id="guardlist" style="">	
                                    <li class="collection-item" style="opacity:0;">
                                        <div class="row">
                                            <div class="col s6">
                                                2013-12345-MN-0
                                            </div>
                                            <div class="col s6">
                                                Abdul Jakul
                                            </div>
                                        </div>
                                    </li>

                                    <li class="collection-item" style="opacity:0;">
                                        <div class="row">
                                            <div class="col s6">
                                                2013-12345-MN-0
                                            </div>
                                            <div class="col s6">
                                                Abdul Jakul
                                            </div>
                                        </div>
                                    </li>

                                    <li class="collection-item" style="opacity:0;">
                                        <div class="row">
                                            <div class="col s6">
                                                2013-12345-MN-0
                                            </div>
                                            <div class="col s6">
                                                Abdul Jakul
                                            </div>
                                        </div>
                                    </li>

                                    <li class="collection-item" style="opacity:0;">
                                        <div class="row">
                                            <div class="col s6">
                                                2013-12345-MN-0
                                            </div>
                                            <div class="col s6">
                                                Abdul Jakul
                                            </div>
                                        </div>
                                    </li>

                                    <li class="collection-item" style="opacity:0;">
                                        <div class="row">
                                            <div class="col s6">
                                                2013-12345-MN-0
                                            </div>
                                            <div class="col s6">
                                                Abdul Jakul
                                            </div>
                                        </div>
                                    </li>	
                                </div>    	       			
		          </ul>
        </div>
                    
                    
                <div class="col s12 l4 push-l3">	
		<ul class="collection with-header gunscroll" id="guncontainer" style="border:none;">
			<li class="collection-header" style="opacity:0;">
                <h5 style="font-weight:bold;">Guns</h5>
                <a href="#!" class="btn blue right btnbackgun" style="margin-top:-40px;"><i class="material-icons">vertical_align_top</i></a></li>            	        			
				<div id="gunlist" style="">	
					<li class="collection-item" style="opacity:0;">
						<div class="row">
							<div class="col s6">
								123-321
							</div>
							<div class="col s6">
								M4A1
							</div>
						</div>
					</li>
					
					<li class="collection-item" style="opacity:0;">
						<div class="row">
							<div class="col s6">
								123-321
							</div>
							<div class="col s6">
								M4A1
							</div>
						</div>
					</li>
					
					<li class="collection-item" style="opacity:0;">
						<div class="row">
							<div class="col s6">
								123-321
							</div>
							<div class="col s6">
								M4A1
							</div>
						</div>
					</li>
					
					<li class="collection-item" style="opacity:0;">
						<div class="row">
							<div class="col s6">
								123-321
							</div>
							<div class="col s6">
								M4A1
							</div>
						</div>
					</li>
					
					<li class="collection-item" style="opacity:0;">
						<div class="row">
							<div class="col s6">
								123-321
							</div>
							<div class="col s6">
								M4A1
							</div>
						</div>
					</li>
					
					
				</div>
                	       			
		  </ul>
	   </div>
		         
	   </div>
    </div>

<!--ITEMSguardend-->

<!--ITEMSgun-->
	
	</div>
</body>
<!--</div>-->


<!--ITEMSgunend-->
@stop

@section('script')
<script>
$('.guardbtn').click(function() {
			
	$('#guardlist').css({	
		'max-height': '230px',
		'overflow': 'scroll',
		'overflow-x': 'hidden',		
	});
	
	$('body').animate({
        scrollTop: $(".guardscroll").offset().top},
        'slow');
});

$('.btnbackguard').click(function() {
			
	$('body').animate({
        scrollTop: $(".cards").offset().top},
        'slow');
});

$('.btnbackgun').click(function() {
			
	$('body').animate({
        scrollTop: $(".cards").offset().top},
        'slow');
});
	
$('.gunbtn').click(function() {
			
	$('#gunlist').css({	
		'max-height': '230px',
		'overflow': 'scroll',
		'overflow-x': 'hidden',		
	});
	
	$('body').animate({
        scrollTop: $(".gunscroll").offset().top},
        'slow');
});
</script>

<script>
	$('#dataTablePresentGuards').DataTable({
             "columns": [         								
			null,
			null
            ] ,  
			"pageLength":5,
			"bLengthChange":false,
			"bFilter" : false
		});
</script>

@stop
