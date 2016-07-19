@extends('layout.tempclientLayout')

@section('title')
Type of Contract
@endsection

@section('content')	

<!---------------------------------------ActiveMoreCollection------------------------------------------------>
<div class="row">			
	<div class="col s6 push-s3" style="margin-top:25px;">	
		<ul class="collection with-header" id="collectionActive">
			<li class="collection-header" ><h4 style="font-weight:bold;">Details</h4></li>
				<div >
							
					<li class="collection-item" style="font-weight:bold;">Nature of Business:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Bank</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Contact Number (Client):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09123456789</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Person in Charge:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Emilio Aguinaldo</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Contact Number (Person in Charge):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;09987654321</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Address:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;Hello Street Pasig City, Metro Manila</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Area Size (approx. in square meters):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;1000</div>
					</li>

					<li class="collection-item" style="font-weight:bold;">Population (approx.):<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;10000</div>
					</li>
							
					<li class="collection-item" style="font-weight:bold;">Number of Guards:<div style="font-weight:normal;">&nbsp;&nbsp;&nbsp;10</div>
					</li>
				</div>
						
		</ul>
	</div>
</div>
<!-------------------------------------------------------------------------------------------------->

@stop

@section('script')
<script>
$(document).ready(function(){
    confirm();
    
});

</script>
@stop