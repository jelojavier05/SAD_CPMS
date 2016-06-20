@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection

@section('content')

<div class="row">
    <div class="col s10 push-s2" style="margin-left:10px;">
        <nav>
            <div class="nav-wrapper blue">
                <div class="row">	
                    <div class="col s12">
                        <a href="{{URL::route('personalDataBC')}}" class="breadcrumb">Personal Data</a>
                        <a href="{{URL::route('educationalBackgroundBC')}}" class="breadcrumb">Educational Background</a>
                        <a href="{{URL::route('sgBackground')}}" class="breadcrumb">SG Background</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col s8 push-s3" style="margin-left:10px;">
        <div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
            <legend><h4>Armed Services</h4></legend>
            <div class="row" style="margin:5%;">
                <div class="row">
                    <div class = "col s7">    
                        <select id = "" name = "strTypeOfGun">
                            <option disabled selected   >Choose armed services if any</option>
                            @foreach($armedservices as $armedservice)
                                <option id = "option{{$armedservice->intArmedServiceID}}">{{$armedservice->strArmedServiceName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input  id="rank" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true" >
                        <label data-error="Incorrect" for="rank">Rank</label>
                    </div>
                    <div class="input-field col s6">
                        <input  id="armedServiceYear" type="date" class="datepicker"  required="" aria-required="true">
                        <label class="active" data-error="Incorrect" for="armedServiceYear">Armed Service Year</label>
                    </div>
                    <div class="input-field col s6">
                        <input class="with-gap" name="discharge" type="radio" id="dischargedHonorably" />
                        <label for="dischargedHonorably">Discharged Honorably</label>
                        <input class="with-gap" name="discharge" type="radio" id="dischargedDishonorably"  />
                        <label for="dischargedDishonorably">Discharged Dishonorably</label>
                    </div>
                    <div class="input-field col s6">
                        <input  id="reason" type="text" class="validate" pattern="[A-za-z ][^0-9]{2,}" required="" aria-required="true" >
                        <label data-error="Incorrect" for="reason">Reason</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class ="row">
    <div class = "col s8 push-s3" style="margin-left:10px;">
        <div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
            <legend><h4>Government Exam</h4></legend>
			<button style="margin-top:-10%; margin-left:650px;" id="btnAdd" class="z-depth-1 btn green modal-trigger" href="#modalgovexamAdd">
                        <i class="material-icons left">add</i> ADD
            </button>
            <table class="striped white">
                <thead>
                    <tr>
                        <th></th>
						<th style="width:50px;"></th>
                        <th style="width:50px;"></th>
                        <th>Name</th>
                        <th>Ratings</th>
                        <th>Date Taken</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td>
                                <div>
                                    <input type="checkbox" id="" />
                                    <label for=""></label>
                                </div>
                            </td>
                            <td>
                                  <button class="buttonUpdate btn modal-trigger "  name="" id="" href="#modalgovexamEdit" >
                                     <i class="material-icons">edit</i>
                                  </button>
                                    	<label for="edit"></label>
                             </td>
							
							
                            
							<td>
                                  <button class="buttonDelete btn red " id="" >
                                       <i class="material-icons">delete</i>
                                  </button>
                            </td>
							
							<td><!--- dito ung name--->HELLO EXAM</td>
							
                            <td>
                                <div>
                                    <input size="9" id="rating" type="text" class="validate" pattern="[A-za-z0-9 ]{1,}" required="" aria-required="true">
                                    <label data-error="Incorrect" for="rating"></label>
                                </div>
                            </td>
                            <td>
                                <div class="col s7">
                                    <input id="dateTaken" type="date" class="validate"  required="" aria-required="true">
                                    <label data-error="Incorrect" for="dateTaken"></label>
                                </div>
                            </td>
                        </tr>
                       
                </tbody>
            </table>
        </div>
        <button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" id="backArmed">Back</button>
        <button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextArmed">Next</button>
    </div>
</div>

<!------------------------------------Modal govexamAdd--------------------------->
<div id="modalgovexamAdd" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:420px !important;">
	<div class="modal-header"><h3>Government Exam</h3></div>
		<div class="modal-content">
			<div class="row">
				<div class = "col s10 push-s1">    
				   <select class="browser-default" id = "" name = "">
					   <option disabled selected>Choose Government Exam</option>
						  <option id = "1">Test1</option>
						  <option id = "2">Test2</option>
						  <option id = "3">Test3</option>
					   	  <option id = "4">Test4</option>
						  <option id = "5">Test5</option>
						  
				   </select>
				</div>
				
				<div class="col s10 push-s1">
					<div class="input-field">
						<input id="strRating" type="text" class="validate" name = "rating" required="" aria-required="true">
							<label for="strRating">Rating</label> 
					</div>
				</div>
				
				<div class="input-field col s10 push-s1">
						<input  id="dateTaken" type="date" class="datepicker"  required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="startDate">Date Taken</label>
				</div>
				
				<div class = "center-align">
					<button style="margin-top:20px;" class=" z-depth-2 btn-large green " id="">Add</button>
				</div>
			</div>
		</div>
</div>
<!------------------------------------modal govexamEdit--------------------------------------------------->
<div id="modalgovexamEdit" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:420px !important;">
	<div class="modal-header"><h3>Government Exam</h3></div>
		<div class="modal-content">
			<div class="row">
				<div class = "col s10 push-s1">    
				   <select class="browser-default" id = "" name = "">
					   <option disabled selected>Choose Government Exam</option>
						  <option id = "1">Test1</option>
						  <option id = "2">Test2</option>
						  <option id = "3">Test3</option>
					   	  <option id = "4">Test4</option>
						  <option id = "5">Test5</option>
					   <option id = "6">Test6</option>
					   <option id = "5">Test5</option>
					   
					   
						  
				   </select>
				</div>
				
				<div class="col s10 push-s1">
					<div class="input-field">
						<input id="editRating" type="text" class="validate" name = "rating" required="" aria-required="true">
							<label for="editRating">Rating</label> 
					</div>
				</div>
				
				<div class="input-field col s10 push-s1">
						<input  id="editdateTaken" type="date" class="datepicker"  required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="editdateTaken">Date Taken</label>
				</div>
				
				<div class = "center-align">
					<button style="margin-top:20px;" class=" z-depth-2 btn-large blue " id="">Save</button>
				</div>
			</div>
		</div>
</div>

@stop
    
@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        
        $('#backArmed').click(function(){
            window.location.href = '{{ URL::to("/guard/registration/educationalBackground") }}';
        });
        
        $('#nextArmed').click(function(){
            window.location.href = '{{ URL::to("guard/registration/requirement") }}';
        });
        
    });
        
</script>

@stop