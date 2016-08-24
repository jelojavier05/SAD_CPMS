@extends('client.ClientDashboard')
@section('title')
Client Homepage
@endsection


@section('content')

<div class='row'>
	<div class="col s9 push-s2">
		<div class="col s6 push-s1" >
      	 <div class="card animated flipInX" style="background-color:#1E434C" >
            <div class="card-content white-text">
              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'clientNumber'>12</span>
              <p style="margin-l	eft:10px;">Guards</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">accessibility</i>
            </div>
            <div class="card-action" style="background-color:#1E434C">
              <center>
                  <a href="/clientguardrequest" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div>
      </div>
	  
	  <div class="col s6 push-s1">
		<div class="card animated flipInX" style="background-color:#9B4F0F">
            <div class="card-content white-text">

              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'gunNumber'>10</span>
              <p style="margin-left:10px;">Guns</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">security</i>

            </div>
            <div class="card-action" style="background-color:#9B4F0F">
              <center>
                  <a href="/gunView" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div> 
	  </div>

	</div>
</div>

<div class='row'>
	<div class="col s9 push-s2">
		<div class="col s6 push-s1" >
			<div class="card animated flipInX" style="background-color:#9B4F0F">
				<div class="card-content white-text">

					<span class="card-title" style="font-size:40px; font-weight:bold;" id = 'gunNumber'>10</span>
					<p style="margin-left:10px;">Guns</p>
					<i class="material-icons right" style="font-size:5rem; margin-top:-70px;">security</i>

				</div>
				<div class="card-action" style="background-color:#9B4F0F">
					<center>
						<a href="/gunView" class="white-text">See All</a>
						<i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
					</center>
				</div>
				
				<div class="card-reveal">
				  <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
				  <p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div> 
		</div>
	  
	  <div class="col s6 push-s1">
		<div class="card animated flipInX" style="background-color:#9B4F0F">
            <div class="card-content white-text">

              <span class="card-title" style="font-size:40px; font-weight:bold;" id = 'gunNumber'>10</span>
              <p style="margin-left:10px;">Guns</p>
			  <i class="material-icons right" style="font-size:5rem; margin-top:-70px;">security</i>

            </div>
            <div class="card-action" style="background-color:#9B4F0F">
              <center>
                  <a href="/gunView" class="white-text">See All</a>
                  <i class="material-icons white-text" style="font-size:1rem; margin-left:-15px;">chevron_right</i>
              </center>
            </div>
          </div> 
	  </div>

	</div>
</div>

@stop
