@extends('layout.maintenanceLayout')

@section('title')
Guard Form
@endsection
 
@section('content')

<div class="row">
    <div class="col s12 push-s2">
        <nav>
          <div class="nav-wrapper blue darken-3">
				<div class="row">	
					<div class="col s12 offset-s1">
						
							<a href="{{URL::route('personaldata')}}" class="breadcrumb ci">Personal Data</a>
							<a href="{{URL::route('educationalbackground')}}" class="breadcrumb ci">Educational Background</a>
	 					    <a href="{{URL::route('sgbackground')}}" class="breadcrumb ci">SG Background</a>
				
					</div>
				</div>
			</div>
        </nav>
    </div>
</div>



<div class="row">
	<div class="col s4 push-s3" style="margin-left:10px; margin-top:30px;">
		 <div class="card animated slideInLeft z-depth-1" style="height:350px;">
			 <div class="col l12">
                    <div class="col l6 push-l2">
                        <i class="material-icons" style="font-size:16rem">star</i>
                    </div>
                    <div class="col l6 pull-l1">
                        <div class="row"></div>
                        <div class="row"></div>
                    </div>
                </div>
			 <div class="card-content">
				 <span class="card-title activator grey-text text-darken-4">Armed Services<i class="material-icons right animated infinite flash" style="font-size:3rem">add</i></span>
			 </div>
			 <div class="card-reveal">
				 <span class="card-title grey-text text-darken-4">Armed Services<i class="material-icons right">close</i></span>				 
			
				 <div class="row">		
					 <div class="col s12">
						 <div class = "input-field col s8 offset-s4 pull-s4">    
							 <select id = "armedService" >
								 <option disabled selected value = "0">Choose armed services if any</option>
								 @foreach($armedservices as $armedservice)
								 <option id = "option{{$armedservice->intArmedServiceID}}" value = "{{$armedservice->intArmedServiceID}}">{{$armedservice->strArmedServiceName}}</option>
								 @endforeach
							 </select>
							 <label data-error="Incorrect" for="armedService">Armed Service</label>
						 </div>
						 <div class="input-field col s6">
							 <select id = "armedServiceRank">
								 <option value="" disabled selected>Choose Rank</option>  
							 </select>
							 <label data-error="Incorrect" for="armedServiceRank">Rank</label>
						 </div>
						 <div class="input-field col s6">
							 <select id = "armedServiceYear">
								 <option value="" disabled selected>----</option>  
							 </select>
							 <label data-error="Incorrect" for="armedServiceYear">Year</label>
						 </div>
						
                    
						 <div class="input-field col s6">
							 <input class="with-gap" name="radio" type="radio" id="dischargedHonorably" value = "Honorably"/>
							 <label for="dischargedHonorably">Discharged Honorably</label>
							 <input class="with-gap" name="radio" type="radio" id="dischargedDishonorably"  value="Dishonorably"/>
							 <label for="dischargedDishonorably">Discharged Dishonorably</label>
						 </div>
						 <div class="input-field col s6">
							 <input placeholder = " " id="reason" type="text" class="validate" pattern="[A-za-z0-9 ]{2,}" required="" aria-required="true" >
							 <label data-error="Incorrect" for="reason">Reason</label>
						 </div>
					 </div>
				 </div>
			 </div>
		</div>
	</div>
	
	
	
	<div class="col s4 push-s3" style="margin-left:10px; margin-top:30px;">
		 <div class="card animated slideInLeft z-depth-1" style="height:350px;">
			 <div class="col l12">
                    <div class="col l6 push-l2">
                        <i class="material-icons" style="font-size:16rem">description</i>
                    </div>
                    <div class="col l6 pull-l1">
                        <div class="row"></div>
                        <div class="row"></div>
                    </div>
                </div>
			 <div class="card-content">
				 <span class="card-title activator grey-text text-darken-4">Government Examinations<i class="material-icons right animated infinite flash" style="font-size:3rem">add</i></span>
			 </div>
			 <div class="card-reveal">
				 <span class="card-title grey-text text-darken-4">Government Examinations<i class="material-icons right">close</i></span>
				 
            <div class='row'>
				<div class="col s12">
					<button style="margin-left:250px;" class="z-depth-1 btn green modal-trigger" href="#modalgovexamAdd">ADD</button>
					<table class="striped white" id = "dataTable">
                <thead>
                    <tr>
						<th ></th>
                        <th ></th>
                        <th>Name</th>
                        <th>Ratings</th>
                        <th>Date Taken</th>
                    </tr>
                </thead>
                <tbody> 

                </tbody>
            </table>
				</div>
			</div>
			 </div>
		</div>
	</div>
	
</div>

<div class="row">
	<div class="col s6 push-s4">
		<button style="margin-top:1px;" class=" z-depth-2 btn-large blue left animated slideInLeft" id="backArmed">Back</button>
        <button style="margin-top:1px;" class=" z-depth-2 btn-large blue right animated slideInLeft" id = "nextArmed">Next</button>
	</div>
</div>

<!------------------------------------Modal govexamAdd--------------------------->
<div id="modalgovexamAdd" class="modal modal-fixed-footer" style="overflow:hidden; width:500px !important; height:420px !important;">
	<div class="modal-header" style="background-color:#01579b !important;">
		
						
						 <legend><h4>Government Examination</h4></legend>
				
					
			
	
	</div>
		<div class="modal-content">
			<div class="row">
				<div class = "col s7 push-s2">    
				   <select class="browser-default" id = "addGovernmentExam">
                       <option disabled selected>Choose Government Exam</option>
                       @foreach ($governmentExams as $governmentExam)
                            <option id = "{{$governmentExam->intGovernmentExamID}}" value = "{{$governmentExam->strGovernmentExam}}">{{$governmentExam->strGovernmentExam}}</option>
                       @endforeach
				   </select>
				</div>
				
				<div class="col s10 push-s1">
					<div class="input-field">
						<input id="strRating" type="text" class="validate" name = "rating" required="" aria-required="true">
							<label for="strRating">Rating</label> 
					</div>
				</div>
				
				<div class="input-field col s10 push-s1">
						<input  id="addDateTaken" type="date" class="datepicker"  required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="startDate">Date Taken</label>
				</div>
				
				<div class = "center-align">
					<button style="margin-top:20px;" class=" z-depth-2 btn-large green " id="btnAdd">Add</button>
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
				   <select class="browser-default" id = "editGovernmentExam" name = "">
					   <option disabled selected>Choose Government Exam</option>
					   @foreach ($governmentExams as $governmentExam)
                            <option id = "{{$governmentExam->intGovernmentExamID}}" value = "{{$governmentExam->strGovernmentExam}}">{{$governmentExam->strGovernmentExam}}</option>
                       @endforeach
						  
				   </select>
				</div>
				
				<div class="col s10 push-s1">
					<div class="input-field">
						<input id="editRating" type="text" class="validate" name = "rating" required="" aria-required="true" value = " ">
							<label for="editRating">Rating</label> 
					</div>
				</div>
				
				<div class="input-field col s10 push-s1">
						<input  id="editdateTaken" type="date" class="datepicker"  required="" aria-required="true">
						<label class="active" data-error="Incorrect" for="editdateTaken">Date Taken</label>
				</div>
				
				<div class = "center-align">
					<button style="margin-top:20px;" class=" z-depth-2 btn-large blue " id="btnUpdate">Save</button>
				</div>
			</div>
		</div>
</div>
@stop
    
@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        var table = $('#dataTable').DataTable();
        var arrGovernmentExam = [];
        var intCounter = 0;
        var intIndex;
        var $armedServiceYear = $('#armedServiceYear');
        var geID = [];
        var geDate = [];
        var geRating = [];
        var rank = [];
        
        for(intLoop = (new Date).getFullYear(); intLoop >= 1980; intLoop --){
            $armedServiceYear.append(
                $("<option></option>")
                .attr("id",intLoop)
                .text(intLoop)
            );
        }//year
        
        $.ajax({

            type: "GET",
            url: "{{action('SGBackgroundController@getGovernmentExam')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                if (data){
                    for (intLoop = 0; intLoop < data.length; intLoop ++){
                        arrGovernmentExam[intLoop] = [];
                        arrGovernmentExam[intLoop][0] = data[intLoop].id;
                        arrGovernmentExam[intLoop][1] = data[intLoop].rating;
                        arrGovernmentExam[intLoop][2] = data[intLoop].date;
                        arrGovernmentExam[intLoop][4] = data[intLoop].name;
                        intCounter ++;
                    }
                    console.log(data);
                    refreshTable();
                }else{
                    
                }
            }
        }); //get govermentExam
        
        $.ajax({
            type: "GET",
            url: "{{action('RankController@get')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                rank = data;
            }
        }); //rank
        
        $.ajax({

            type: "GET",
            url: "{{action('SGBackgroundController@getArmedService')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function(data){
                if (data){
                    
                    $("#armedService option[id='option"+ data.id +"']").attr("selected", "selected");
                    var id = $('#armedService').children(":selected").val();
                    getRank(id);
                    
                    $("#armedServiceRank option[id='"+ data.rank +"']").attr("selected", "selected");
                    $('#rank').val(data.rank);
                    $('#armedServiceYear').val(data.year);
                    $('#reason').val(data.reason);
                    $("#discharged" + data.radio).prop( "checked", true );
                    
                    $('select').material_select();
                }else{
                    
                }
            }
        }); //get armed service
        
        
        
        $('#armedService').on('change', function(){
            var id = $(this).children(":selected").val();
            getRank(id);
        });
        
        function getRank(id){
            var $selectDropdown = 
                $("#armedServiceRank")
                .empty()
                .html(' ');
            $selectDropdown.append(
                        $("<option></option>")
                        .attr("value",0)
                        .attr("disabled", 'disabled')
                        .text('Choose Rank')
                    );
            $.each(rank, function(index, subcatObj){
                if (subcatObj.intArmedServiceID == id){
                    $selectDropdown.append(
                        $("<option></option>")
                        .attr("id",subcatObj.intRankID)
                        .text(subcatObj.strRank)
                    );
                }
            });

            $("#armedServiceRank").material_select();
        }
        
        $('#backArmed').click(function(){
            window.location.href = '{{ URL::to("/guard/registration/educationalbackground") }}';
        });
        
        $('#nextArmed').click(function(){
            sendData();
            window.location.href = '{{ URL::to("/guard/registration/requirement") }}';
        });
        
        $('#btnAdd').click(function(){
            var governmentExamID = $('#addGovernmentExam').children(":selected").attr("id");
            if (isGovernmentExamExist(governmentExamID)){
                
                var governmentExam = $('#addGovernmentExam').val();
                table.row.add([
                    '<button class="buttonUpdate btn col s12" id = "id'+ governmentExamID +'" value = "'+ governmentExamID + '"><i class="material-icons">edit</i></button><label for="edit"></label>',
                    '<button class="buttonDelete btn red col s12" value = "' +governmentExamID +'"><i class="material-icons">delete</i></button>',
                    '<h id = "name' + governmentExamID+ '">' + governmentExam + '</h>',
                    '<h id = "rating' + governmentExamID + '">' + $('#strRating').val() + '</h>',
                    '<h id = "date' + governmentExamID + '">' +  $('#addDateTaken').val() + '</h>'

                ]).draw(false);
                
                $('#modalgovexamAdd').closeModal();

                arrGovernmentExam[intCounter] = [];
                arrGovernmentExam[intCounter][0] = governmentExamID; //ID
                arrGovernmentExam[intCounter][1] = $('#strRating').val(); // value
                arrGovernmentExam[intCounter][2] = $('#addDateTaken').val(); //date taken
                arrGovernmentExam[intCounter][3] = intCounter;
                arrGovernmentExam[intCounter][4] = governmentExam; //name

                intCounter ++;
            }else{
                var toastContent = $('<span>Error Occur. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
                //notification here
            }
        });
        
        table.on('click', '.buttonUpdate', function(){
            $('#modalgovexamEdit').openModal();
            
            var rating = 'rating' + this.value;
            var date = 'date' + this.value;
            $('#editRating').val($('#' + rating).text());
            $('#editdateTaken').val($('#' + date).text());
            $("#editGovernmentExam option[id='"+ this.value +"']").attr("selected", "selected");
            
            for (intLoop = 0; intLoop < intCounter; intLoop ++){
                if (arrGovernmentExam[intLoop][0] == this.value){
                    intIndex = arrGovernmentExam[intLoop][3];
                    break;
                }
            }
        });
        
        table.on('click', '.buttonDelete', function(){
            
            var intGovernmentID = this.value;
            swal({   title: "Are you sure?",   
                text: "Record will be deleted!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                closeOnConfirm: true 
            }, 
            function(){
                
                for (intLoop = 0; intLoop < intCounter; intLoop ++){
                    if (intGovernmentID == arrGovernmentExam[intLoop][0]){
                        delete arrGovernmentExam[intLoop][0];
                        break;
                    }
                }
                
                var intCounterTemp = intCounter;
                var intCount = 0;
                for (intLoop = 0; intLoop < intCounterTemp; intLoop ++){
                    if (arrGovernmentExam[intLoop][0]!=null){
                        //arrTemp[intCount] = [];
                        arrGovernmentExam[intCount][0] = arrGovernmentExam[intLoop][0];
                        arrGovernmentExam[intCount][1] = arrGovernmentExam[intLoop][1];
                        arrGovernmentExam[intCount][2] = arrGovernmentExam[intLoop][2];
                        arrGovernmentExam[intCount][3] = intCount;
                        arrGovernmentExam[intCount][4] = arrGovernmentExam[intLoop][4];
                        
                        intCount ++;
                        
                    }
                }
                arrGovernmentExam.pop();
                //arrGovernmentExam = arrTemp.slice();
                intCounter--;
                refreshTable();
                
            });
        });
        
        $('#btnUpdate').click(function(){
            var governmentExamID = $('#editGovernmentExam').children(":selected").attr("id");
            var boolChecker = true;
            for (intLoop = 0; intLoop < intCounter; intLoop ++){
                if (governmentExamID == arrGovernmentExam[intLoop][0] && 
                    intIndex != arrGovernmentExam[intLoop][3]){
                    boolChecker = false;
                    break;
                }
            }
            
            if (boolChecker){
                for (intLoop = 0; intLoop <= intCounter; intLoop ++){
                    if (intIndex == arrGovernmentExam[intLoop][3]){
                        arrGovernmentExam[intLoop][0] = governmentExamID;
                        arrGovernmentExam[intLoop][1] = $('#editRating').val();
                        arrGovernmentExam[intLoop][2] = $('#editdateTaken').val();
                        break;
                    }else{

                    }
                }
                
                $('#modalgovexamEdit').closeModal();
                refreshTable();
            }else{
                var toastContent = $('<span>Error Occur. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
                //notification here
            }
            
                
            
        });
        
        function GovernmentExam(id, rating, date, name) {
            this.id = id;
            this.rating = rating;
            this.date = date;
            this.name = name;
        }
        
        function isGovernmentExamExist(governmentExamID){
            var boolChecker = true;
            for (intLoop = 0; intLoop < intCounter; intLoop ++){
                if (governmentExamID == arrGovernmentExam[intLoop][0]){
                    boolChecker = false;
                    break;
                }
            }
            return boolChecker;
        }
        
        function refreshTable(){
            table.clear().draw();
            for (intLoop = 0; intLoop < intCounter; intLoop ++){
                table.row.add([
                    '<button class="buttonUpdate btn" id = "id'+ arrGovernmentExam[intLoop][0] +'" value = "'+ arrGovernmentExam[intLoop][0] + '"><i class="material-icons">edit</i></button><label for="edit"></label>',
                    '<button class="buttonDelete btn red " id="" value = "'+arrGovernmentExam[intLoop][0]+'"><i class="material-icons">delete</i></button>',
                    '<h id = "name' + arrGovernmentExam[intLoop][0]+ '">' + arrGovernmentExam[intLoop][4] + '</h>',
                    '<h id = "rating' + arrGovernmentExam[intLoop][0] + '">' + arrGovernmentExam[intLoop][1] + '</h>',
                    '<h id = "date' + arrGovernmentExam[intLoop][0] + '">' +  arrGovernmentExam[intLoop][2] + '</h>'

                ]).draw();
            }
        }
        
        function sendData(){
            var armedServiceID = $("#armedService option:selected").val();
            var rankID = $('#armedServiceRank').children(":selected").attr("id");
            var governmentExam = [];
            var geID =[];
            var geRating =[];
            var geDate =[];
            
            if (armedServiceID != 0){
                
                var objArmedService = {
                    id: armedServiceID,
                    name: $('#armedService option:selected').text(),
                    rank: rankID,
                    rankname: $('#armedServiceRank option:selected').text(),
                    year: $("#armedServiceYear").val(),
                    reason: $('#reason').val(),
                    radio: $('input[name = radio]:checked').val()
                };  
            }
            
            if (arrGovernmentExam.length != 0){
                for (intLoop = 0; intLoop < intCounter; intLoop ++){
                    var objGovernmentExam = new GovernmentExam(
                        arrGovernmentExam[intLoop][0],
                        arrGovernmentExam[intLoop][1],
                        arrGovernmentExam[intLoop][2],
                        arrGovernmentExam[intLoop][4]
                    );
                    
                    geID[intLoop] = arrGovernmentExam[intLoop][0];
                    geRating[intLoop] = arrGovernmentExam[intLoop][1];//rating
                    geDate[intLoop] = arrGovernmentExam[intLoop][2];//taken
                    
                    governmentExam.push(objGovernmentExam);
                }
                console.log(governmentExam);
            }
                
            $.ajax({

                type: "POST",
                url: "{{action('SGBackgroundController@post')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    armedService: objArmedService,
                    governmentExam:governmentExam,
                    
                    asID: armedServiceID,
                    asRank: rankID,
                    asYear: $("#armedServiceYear").val(),
                    asDischarge: $('input[name = radio]:checked').val(),
                    asReason: $('#reason').val(),
                    geID: geID,
                    geRating: geRating,
                    geDate: geDate
                    
                },
                success: function(data){
                    
                },
                error: function(data){
                    confirm('error send data');
                    console.error();
                }
            });//ajax
        }
        
    });
        
</script>

@stop