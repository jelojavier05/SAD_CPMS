@extends('layout.tempclientLayout')

@section('title')
Type of Contract
@endsection

@section('content')	

<div class="row">
    <div class="col s8">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:50px;">
            <div class="col s12">
                <h4 class="blue-text">Security Guard (1/10)</h4>
			</div>
        
            <div class="row">
                <div class="col s12" style="margin-top:-40px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
								<th style="width:50px;"></th>
                                <th>License Number</th>
                                <th>Name</th>
                            </tr>
                        </thead>

                        <tbody>
                           
                            <tr>
                                <td>
                                    <button class="buttonMore btn blue col s12" id="">
                                        MORE
                                    </button>
                                </td>
                                <td id = "">test1</td>
                                <td id = "">test2</td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
<!------------------------containerMoreDetails----------------------------------->
    <div class ="col s4 pull-s1" style="overflow:scroll; overflow-x:hidden; height:500px; margin-top:30px;">
        <div class="col s12">
            <div class="container-fluid grey lighten-5 z-depth-1" style="border-radius:15px;">
                <div class="blue darken-1 white-text" style="position:fixed; z-index:100; width:395px; height: 38px; font-size:30px;">Details</div>
                <div class="row">
                    <div class="col s12">
                        <div class="card grey darken-1">
                            <div class="card-content">
                                <div>
                                    <span class = "card-title black-text" style="font-weight:bold;">Personal Data:</span>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">First Name:</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "firstName"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">Middle Name:</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "middleName"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">Last Name:</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "lastName"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">License Number:</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "licenseNumber"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">Address:</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id= "address"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">Age:</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "age"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">Gender:</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "gender"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">Place of Birth:</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "placeOfBirth"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">Contact Number (Mobile):</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "mobileNumber"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">Contact Number (Landline):</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "landlineNumber"></p>
                                </div>
                                <div>
                                    <p style="color: #eeeeee; font-size: 20px;">Civil Status:</p>
                                </div>
                                <div>
                                    <p style="color:#212121; font-size: 18px;" id = "civilStatus"></p>
                                </div>
                                <div>
                                    <span class = "card-title black-text" style="font-weight:bold;">Body Attributes:</span>
                                </div>
                                
                                    <div>
                                        <p style="color: #eeeeee; font-size: 20px;" id = "">  </p>
                                        <p style="color:#212121; font-size: 18px;" id = "">N/A</p>
                                    </div>
                                
                                <div>
                                    <span class = "card-title black-text" style="font-weight:bold;">Armed Services:</span>
                                </div>
                                <div>
                                    <p style="color:#eeeeee; font-size: 18px;" id = "armedService">N/A</p>
                                </div>
                                <div>
                                    <span class = "card-title black-text" style="font-weight:bold;">Government Exams:</span>
                                </div>
                                <div>
                                    
                                        <p style="color:#eeeeee; font-size: 18px;" id = "">• Test</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
<!---------------------------------------------------------------------------------------------------------->

</div>

@stop

@section('script')

<script type="text/javascript">
$(document).ready(function(){
    $("#dataTable").DataTable({
         "columns": [
        { "orderable": false },
        null,
        null
        ] ,  
        "pageLength":5,
        "bLengthChange": false
    });

    
});
</script>

@stop