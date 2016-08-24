@extends('layout.maintenanceLayout')

@section('title')
Test
@endsection

@section('content')

<div class="row">
	<div class='col s4 push-s3'>
		<ul class="collection with-header" id="" style="border:1px solid black;">
			<li class="collection-header blue white-text " ><h5 style="font-weight:bold;">Log</h5>
			</li>
			<div class="sidenavhover" style="min-height:300px; max-height:300px;">
				<li class="collection-item">
					<div class="row">
						<div class="col s5">	
							Kobe Bean Bryant<!--<div style="font-weight:normal;" id = 'firstName'>&nbsp;&nbsp;&nbsp;Time-In</div>-->
						</div>
						<div class="col s3">
							Time In
						</div>
						<div class="col s3">
							12:30AM
						</div>
					</div>
				</li>
					
				<li class="collection-item">
					<div class="row">
						<div class="col s5">	
							Lebron James
						</div>
						<div class="col s3">
							Time In
						</div>
						<div class="col s3">
							04:30AM
						</div>
					</div>
				</li>
				
				<li class="collection-item">
					<div class="row">
						<div class="col s5">	
							Lebron James
						</div>
						<div class="col s3">
							Time Out
						</div>
						<div class="col s3">
							12:30PM
						</div>
					</div>
				</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
				<li class="collection-item">test</li>
			</div>
		</ul>
	</div>
</div>
<div class='row'>
	<div class="col s6 push-s6">
		<label for="birthdate" class='active'>Date of Birth</label>
		<input type="date" class="datepicker" id="birthdate">
	</div>

</div>
 
	
	
@stop

@section('script')

<script>
$('.datepicker').pickadate({
    selectMonths: true, 
    selectYears: 15 
  });
</script>

@stop