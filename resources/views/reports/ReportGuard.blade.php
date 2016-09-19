@extends('layout.maintenanceLayout')

@section('title')
Admin Reports
@endsection

@section('content')


<style>
.dataTables_filter
	{
    display: none;
	}
</style>
 <div class="row">
    <div class="col s12 push-s1">
        <div class="container blue-grey lighten-4 z-depth-2 animated fadeIn" style="padding-left:2%; padding-right:2%;">
			<div class="row"></div>
			<div class="row">
				<div class="col s8">
					<div class="input-field col s4">
						<label class="active" style="color:#64b5f6;"  for="dateOfbirth">From</label>	
				        <input placeholder=""  id="dateOfbirth" type="date" class="datepicker">
					</div>

					<div class="input-field col s4">
						<label class="active" style="color:#64b5f6;"  for="dateOfbirth">To</label>	
				        <input placeholder=""  id="dateOfbirth" type="date" class="datepicker">
					</div>

					<!--<div class="input-field col s4">
						  <select>
                                <option disabled selected>Choose an Option</option>
                                <option>Clients</option>
                                <option>Guards</option>
                                <option>Guns</option>
                                <option>Requests</option>
					       </select>
						<label>Reports</label>
					</div>-->
				</div>
			
				<div class="col s4">
					<div class="input-field col s12">
						<nav style="height:55px;margin-top:-4%">
							<div class="nav-wrapper blue-grey lighten-3">
								<form>
									<div class="input-field" style="">
										<input id="mySearch" type="search" placeholder="Search" required>
										<label for="search"><i class="material-icons">search</i></label>									
									</div>
								</form>
							</div>
						</nav>
					</div>	
				</div>
            </div>
            
            <div class="row">
    <div class="col l12">
    
        <div id="container" style="min-width: 300px; height: 400px; margin: 0 auto;"></div>
    
    
    </div>

</div>
        </div>
     </div>
</div>


@stop


@section('script')

</script>
@stop