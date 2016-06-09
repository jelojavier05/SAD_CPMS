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
						<a class="breadcrumb">Personal Data</a>
						<a class="breadcrumb">Educational Background</a>
						<a class="breadcrumb">Armed Services</a>
						<a class="breadcrumb">Government Exam</a>
					</div>
				</div>
			</div>
		</nav>
	</div>
</div>

<!----------------------------------------------PAGES-------------------------------------->
<!-------------------------------------Military Training Page Start---------------------------------->
<div class ="row">
	<div class = "col s8 push-s3" style="margin-left:10px;">
		<div class="container-fluid grey lighten-4 z-depth-1" style="border: 1px solid black; border-radius:5px;">
			<legend><h4>Government Exam</h4></legend>
			<table class="highlight white">
										   			<thead>
														<tr>
															<th></th>
                                                            <th>Name</th>
															<th>Ratings</th>
															<th>Date Taken</th>
														</tr>
													</thead>
													
													<tbody>

                                                           @foreach($governmentexams as $governmentexam)
                                                            <tr>
                                                                <td>
                                                                    <div>


                                                                        <input type="checkbox" id="governmentexam{{$governmentexam->intGovernmentExamID}}" />
      																	<label for="governmentexam{{$governmentexam->intGovernmentExamID}}"></label>


                                                                    </div>
                                                                </td>

                                                                <td>
                                                                        {{$governmentexam->strGovernmentExam}}

                                                                </td>

                                                                <td>
                                                                    <div>
                                                                        <input size="9" id="rating" type="text" class="validate" pattern="[A-za-z0-9 ]{1,}" required="" aria-required="true">
                                                                        <label data-error="Incorrect" for="rating"></label>

                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div>
                                                                        <input id="dateTaken" type="date" class="validate"  required="" aria-required="true">
                                                                        <label data-error="Incorrect" for="dateTaken"></label>

                                                                    </div>
                                                                </td>
                                                            </tr>
														@endforeach
													</tbody>
										   		</table>

<!--
					                   </div>
					
                                       <div class="row" style="margin:5%;">
-->
					
					
				                        </div>
        <button style="margin-top:20px;" class=" z-depth-2 btn-large blue left" id = "backGovernment">Back</button>
        <button style="margin-top:20px;" class=" z-depth-2 btn-large blue right" id = "nextGovernment">Next</button>
		</div>
                                            
	</div>
</div>
<!-------------------------------------Personal Data Page End---------------------------------->
@stop


@section('script')
<script>
    
    $(document).ready(function() {
        $('select').material_select();
        
        $('#backGovernment').click(function(){
            window.location.href = '{{ URL::to("/guardRegistration/armedService") }}';
        });
        
        $('#nextGovernment').click(function(){
            window.location.href = '{{ URL::to("/guardRegistration/requirement") }}';
        });
        
    });
        
</script>

@stop