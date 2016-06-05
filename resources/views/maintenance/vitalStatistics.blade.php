@extends('layout.maintenanceLayout')

@section('title')
Body Attributes
@endsection

@section('content')
<!-- START -->
<div class="row">
    <div class="col s12">
        <div class="col s5 push-s3">
            <div class="flow-text">
                <h1 class="colortitle blue-text text-darken-3">Body Attributes</h1>
            </div>
        </div>
        
        <div class="col s2 push-s4">
            <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large waves-effect waves-light green hide-on-med-and-down modal-trigger" href="#modalvitalstatisticsAdd">
                <i class="material-icons left">add</i> ADD
            </button>
            </br></br>
        </div>
    </div>
    <!-- TABLE -->
    <div class="row">
        <div class="col s10 push-s2">
            <div class="scroll z-depth-2" style=" border-radius: 10px; margin: 5%; margin-top:-20px;">
                <table class="highlight white" style="border-radius: 10px; margin-top: -8%" id="dataTable">
                    <div class="right-align">
                        <div class="fixed-action-btn horizontal click-to-toggle">
                            <button class="btn-floating btn-large green hide-on-large-only waves-effect waves-light modal-trigger" href="#modalvitalstatisticsAdd">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                    
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th data-field="id">ID</th>
                            <th data-field="name">Name</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($vitalStatistics as $vitalStatistic)
                            <tr>
                                <td> 
                                    <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            Deactivate
                                            @if ($vitalStatistic->boolFlag==1)
                                                <input type="checkbox" checked class = "checkboxFlag" id = "{{ $vitalStatistic->intVitalStatisticsID }}">
                                            @else
                                                <input type="checkbox" class = "checkboxFlag" id = "{{ $vitalStatistic->intVitalStatisticsID }}">
                                            @endif
                                            <span class="lever"></span>
                                            Activate
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <button class="buttonUpdate btn modal-trigger"  name="vitalStatistic" id="{{ $vitalStatistic->intVitalStatisticsID }}" href="#modalvitalstatisticsEdit" style="margin-right:-20px;">
                                        <i class="material-icons">edit</i>
                                    </button>
                                <label for="{{ $vitalStatistic->intVitalStatisticsID }}"></label> </td>

                                <td>
                                    <button class="buttonDelete btn red" style="margin-left:-100px;" id="{{ $vitalStatistic->intVitalStatisticsID }}">
                                        <i class="material-icons" >delete</i>
                                    </button>
                                </td>

                                <td id = "id{{ $vitalStatistic->intVitalStatisticsID }}">
                                    {{ $vitalStatistic->intVitalStatisticsID }}
                                </td>

                                <td id = "name{{ $vitalStatistic->intVitalStatisticsID }}">
                                    {{ $vitalStatistic->strVitalStatisticsName }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </br></br></br></br></br>
    </div>

    <!-- Modal Armed Service ADD -->
    <div id="modalvitalstatisticsAdd" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header">
            <h2>Vital Statistics</h2>
        </div>
        
        <div class="modal-content">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col s8">
                    <div class="input-field">
                        <input  id="intVitalStatisticsID" type="text" class="validate" name = "vitalStatisticsID" disabled>
                        <label for="intVitalStatisticsID">Vital Statistic ID</label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col s5">
                    <div class="input-field">
                        <input id="strVitalStatistics" type="text" class="validate" name = "vitalStatistics" required="" aria-required="true">
                        <label for="strArmedServiceDesc">Vital Statistic Type</label> 
                    </div>
                </div>
            </div>
            
            <!-- Modal Button Save -->
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save    
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <!-- Modal Button Save -->
        </div>
    </div>
    <!-- Modal Armed Service ADD -->

    <!-- MODAL Armed Service EDIT -->
    <div id="modalvitalstatisticsEdit" class="modal modal-fixed-footer" style="overflow:hidden;">
        <div class="modal-header">
            <h2>Body Attributes</h2>
        </div>
        
        <div class="modal-content">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <div class="col s8">
                    <div class="input-field">
                        <input  id="editID" type="text" class="validate" name = "vitalStatisticsID" readonly required="" aria-required="true" value = "test">
                        <label for="editID">Body Attribute ID</label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col s5">
                    <div class="input-field">
                        <input id="editname" type="text" class="validate" name = "vitalStatistics" required="" aria-required="true" value = "test">
                        <label for="editname">Body Attribute Type</label> 
                    </div>
                </div>
            </div>
            <!-- Modal Button Save -->
            <input id = "okayCancel"type="hidden" name="okayCancelChecker" value="">
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <!-- Modal Button Save -->
        </div>
    </div>
    <!-- MODAL Armed Service EDIT -->
</div>
	

@stop

@section('script')
<script type="text/javascript">

	$(document).ready(function(){
		
		$("#dataTable").DataTable({
             "columns": [
            { "orderable": false },
            { "orderable": false },
            { "orderable": false },
            null,
            null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
        


		});
 
		$("#btnAddSave").click(function(){
          if ($('#strVitalStatistics').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('VitalStatisticsController@addVitalStatistics')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					vitalStatistics: $('#strVitalStatistics').val(),
				},
				success: function(data){
					var toastContent = $('<span>Record Added.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                    window.location.href = "{{action('VitalStatisticsController@index')}}";
				},
				error: function(data){
					var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                    
				}


			});//ajax
            }else{
                var toastContent = $('<span>Please Check Your Input. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }


		});//button add clicked
        
        $("#btnUpdate").click(function(){
          if ($('#editname').val().trim()){
			$.ajax({
				
				type: "POST",
				url: "{{action('VitalStatisticsController@updateVitalStatistics')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					vitalStatisticsID: $('#editID').val(),
                    vitalStatistics: $('#editname').val(),
				},
				success: function(data){
					 window.location.href = "{{action('VitalStatisticsController@index')}}";
					var toastContent = $('<span>Record Updated.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                   
				},
				error: function(data){
					var toastContent = $('<span>Error Occured. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                    
				}


			});//ajax
              }else{
                var toastContent = $('<span>Please Check Your Input. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }

		});//button add clicked
        
        $(".buttonDelete").click(function(){
            if(confirm('Are you sure you want to delete the record?')){
				
                $.ajax({

                    type: "POST",
                    url: "{{action('VitalStatisticsController@deleteVitalStatistics')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        vitalStatisticsID: this.id

                    },
                    success: function(data){
                        var toastContent = $('<span>Record Deleted.</span>');
                        Materialize.toast(toastContent, 1500, 'edit');
                         window.location.href = "{{action('VitalStatisticsController@index')}}";
                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occur. </span>');
                        Materialize.toast(toastContent, 1500, 'edit');

                    }

                });//ajax
            }
        });
        
		$(".buttonUpdate").click(function(){

			var itemID = "id" + this.id;
			var itemName = "name" + this.id;

			document.getElementById('editID').value = $("#"+itemID).html();
			document.getElementById('editname').value = $("#"+itemName).html();

		});

		$(".checkboxFlag").click(function(){
            
            var $this = $(this);
            var flag;
            // $this will contain a reference to the checkbox   
            if ($this.is(':checked')) {
                flag = 1;
            } else {
                flag = 0;
            }
           $.ajax({
				
				type: "POST",
				url: "{{action('TypeOfGunController@flagTypeOfGun')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
				data: {
					typeOfGunID: this.id,
                    flag: flag
				},
				success: function(data){
					
				},
				error: function(data){
					var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500, 'edit');
                    
				}

			});//ajax
             
        });//checkbox clicked
	});//document ready
</script>

@stop