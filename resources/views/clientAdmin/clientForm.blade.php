@extends('layout.maintenanceLayout')

@section('title')
Client
@endsection

@section('content')



<div class="row">
	<div class="col s6 push-s4" style=" margin-left:10px; margin-top: 1%;">
		<div class="container-fluid grey lighten-4 z-depth-2" style="border: 1px solid black; border-radius:5px;" id="personaldata">
			<h2 class = "blue white-text" style="margin-top:0px;">Client</h2>
			<div class = "row">
				<div class='col s10 push-s1'>
					
					<div class="input-field col s6 offset-s6 pull-s6">
						<select id = "natureSelect">
						  <option value="" disabled selected>Choose</option>
                            @foreach($natureOfBusinesses as $value)
                            <option id = "nob{{$value->intNatureOfBusinessID}}" value = "{{$value->intNatureOfBusinessID}}">{{$value->strNatureOfBusiness}}</option>
                            
                            @endforeach
                            
						</select>
    					<label>Nature of Business</label>

					</div>
					
					<div class="input-field col s6">
						<input placeholder=" " id="clientName" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label for="clientName"  data-error="Incorrect">Client Name</label>
					</div>
					
				
					<div class="input-field col s6">
							<input placeholder=" " id="clientcontactLandline" maxlength="10" type="text" class="validate" pattern="[0-9+]{7,}" required="" aria-required="true">
							<label data-error="Incorrect" for="clientcontactLandline">Contact Number (Client)</label>

					</div>
					
					<div class="input-field col s6">
						<input placeholder=" " id="personInCharge" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true">
						<label for="personInCharge" data-error="Incorrect">Person in Charge</label>
					</div>
					
					<div class="input-field col s6">
						<input placeholder=" " id="piccontactCp" maxlength="13" type="text" class="validate" pattern="[0-9+]{11,}" required="" aria-required="true">
						<label data-error="Incorrect" for="clientcontactCp">Contact Number (Person In Charge)</label>

					</div>
				
					
					<div class="input-field col s12">
						<input placeholder=" " id="address" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true">
						<label data-error="Incorrect" for="address">Address</label>

					</div>
					
					<div class = "input-field col s6">    
					   <select  id = "provinceSelect">
						   <option disabled selected>Choose Province</option>
				            @foreach($provinces as $value)
                            <option id = "province{{$value->intProvinceID}}" value = "{{$value->intProvinceID}}">{{$value->strProvinceName}}</option>
                            @endforeach
					   </select>
					</div>
					
					<div class = "input-field col s6">    
					   <select  id = "citySelect" name = "" >
						   <option disabled selected>Choose City</option>
					   </select>
					</div>
				
				</div>
			</div>
		
		</div>
		<center><a style="margin-top:20px;" class=" z-depth-2 btn-large green" id = "btnSave">Save</a></center>
	</div>
	
</div>

@stop

@section('script')
<script>
    
    $(document).ready(function() {
        var city;
        
        $('select').material_select();
        
        $.ajax({
            type: "GET",
            url: "{{action('CityController@get')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                city = data;
            }
        }); //city
        
        $('#provinceSelect').on('change',function(){
            var id = $('#provinceSelect').val();
            getCity(id);
        });
        
        function getCity(provinceID){
            var $selectDropdown = 
                $("#citySelect")
                .empty()
                .html(' ');
            $selectDropdown.append(
                        $("<option></option>")
                        .attr("value",0)
                        .attr("disabled", 'disabled')
                        .text('Choose City')
                    );
            $.each(city, function(index, subcatObj){
                if (subcatObj.intProvinceID == provinceID){
                    $selectDropdown.append(
                        $("<option></option>")
                        .attr("id",subcatObj.intCityID)
                        .text(subcatObj.strCityName)
                    );
                }
            });

            $("#citySelect").material_select();
        }
        
        $('#btnSave').click(function(){
            $.ajax({

                type: "POST",
                url: "{{action('ClientRegistrationController@insert')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    natureOfBusiness: $('#natureSelect').val() ,
                    clientName: $('#clientName').val() ,
                    clientContactNumber: $('#clientcontactLandline').val() ,
                    personInCharge: $('#personInCharge').val() ,
                    personContactNumber: $('#piccontactCp').val() ,
                    address: $('#address').val(),
                    province: $('#provinceSelect').val() , 
                    city: $('#citySelect').val()
                    
                },
                success: function(data){

                },
                error: function(xhr){
                    console.log(data);
                }
            });//ajax
        });
        
    });
        
</script>

@stop