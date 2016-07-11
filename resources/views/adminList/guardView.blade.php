@extends('layout.maintenanceLayout')

@section('title')
Guard
@endsection

@section('content')

<div class="row">
    <div class="col s8 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:50px;">
            <div class="col s6">
                <h3 class="blue-text">Security Guard</h3>
            </div>

            <div class="col s3 offset-s3">
                <a style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green " href="/guard/registration/personaldata">
                    <i class="material-icons left">add</i> ADD
                </a>
            </div>
        
            <div class="row">
                <div class="col s12" style="margin-top:-5px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
								<th style="width:50px;"></th>
								<th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Name</th>
								<th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>


                                <td>
                                    <button class="buttonUpdate btn modal-trigger" name="" id="" href="#modalRequirements">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <label for=""></label>
                                </td>

                                <td>
                                    <button class="buttonDelete btn blue "  id="">
                                        MORE
                                    </button>
                                </td>
                                <td id = "">1</td>
                                <td id = "">Mang Jose</td>
                                <td id = "">Male</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
<!------------------------containerMoreDetails----------------------------------->
    <div class ="col s4" style="overflow:scroll; overflow-x:hidden; height:500px; margin-top:30px;">
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
                                @foreach($bodyAttributes as $bodyAttribute)
                                    <div>
                                        <p style="color: #eeeeee; font-size: 20px;"> {{$bodyAttribute->strBodyAttributeName}} </p>
                                        <p style="color:#212121; font-size: 18px;" id = "bodyAttribute{{$bodyAttribute->intBodyAttributeID}}">N/A</p>
                                        </br>
                                    </div>
                                @endforeach
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
                                    @foreach($governmentExams as $value)
                                        <p style="color:#eeeeee; font-size: 18px;" id = "governmentExam{{$value->intGovernmentExamID}}">• {{ $value->strGovernmentExam }} - N/A</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
<!---------------------------------------------------------------------------------------------------------->
<div id="modalRequirements" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:330px !important;">
    <div class="modal-header"><h2>Requirements</h2></div>
    
    <div class="modal-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
        <div class="row">
            <div class="col s3">
                <input type="checkbox" id="1" value = ""/>
                <label for="1" class="black-text">test1</label></br>
			
            </div>
			
			<div class="col s3">
                <input type="checkbox" id="2" value = ""/>
                <label for="2" class="black-text">test2</label></br>
			
            </div>
	
			<div class="col s3">
                <input type="checkbox" id="3" value = ""/>
                <label for="3" class="black-text">test3</label></br>
			
            </div>

			<div class="col s3">
                <input type="checkbox" id="4" value = ""/>
                <label for="4" class="black-text">test4</label></br>
			
            </div>

			<div class="col s3">
                <input type="checkbox" id="5" value = ""/>
                <label for="5" class="black-text">test5</label></br>
			
            </div>

        </div>
    </div>
    
    <div class="modal-footer" style="background-color:#01579b !important;">
        <button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
</div>


@stop
	
@section('script')


<script type="text/javascript">
	$(document).ready(function(){
        $("#dataTable").DataTable({
                 "columns": [
                { "orderable": false },
                { "orderable": false },
                null,
				null,
				null
                ] ,  
                "pageLength":5,
				"lengthMenu": [5,10,15,20]
            });
	});
</script>
@stop