@extends('layout.maintenanceLayout')

@section('title')
Rank
@endsection

@section('content')

<div class="row">
    <div class="col s12 push-s1">
        <div class="container grey lighten-2 z-depth-2" style="border-radius: 10px; margin-top:25px;">
            <div class="col s7 push-s1">
                <h3 class="blue-text">Rank</h3>
            </div>
            
            <div class="col s3 offset-s2">
                <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalrankAdd">
                    <i class="material-icons left">add</i> ADD
                </button>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="highlight white" style="border-radius:10px;" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th style="width:50px;"></th>
                                <th>ID</th>
                                <th>Armed Service</th>
                                <th>Rank</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($ranks as $rank)
                                <tr>
                                    <td> 
                                        <div class="switch" style="margin-right: -80px;">
                                        <label>
                                            @if ($rank->boolFlag==1)
                                                <input type="checkbox" checked class = "checkboxFlag" id = "{{$rank->intRankID}}">
                                            @else
                                                <input type="checkbox" class = "checkboxFlag" id = "{{$rank->intRankID}}" >
                                            @endif
                                            <span class="lever"></span>
                                        </label>
                                        </div>
                                    </td>

                                    <td>
                                        <button class="buttonUpdate btn" name="" id="{{$rank->intRankID}}">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <label for=""></label>
                                    </td>

                                    <td>
                                        <button class="buttonDelete btn red" id="{{$rank->intRankID}}" >
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                    <td id = "id{{$rank->intRankID}}">{{$rank->intRankID}}</td>
                                    <td id = "as{{$rank->intRankID}}">{{$rank->ArmedService->strArmedServiceName}}</td>
                                    <input type="hidden" id = "asID{{$rank->intRankID}}" value = "{{$rank->intArmedServiceID}}" >
                                    <td id = "rank{{$rank->intRankID}}">{{$rank->strRank}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal BA ADD -->

<div id="modalrankAdd" class="modal modal-fixed-footer" style="overflow:hidden; width: 500px !important; height:400px !important; margin-top:50px;  border-radius:10px;">
        <div class="modal-header"><h4>Rank</h4></div>
        	<div class="modal-content">
				

					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="intRankID" type="text" class="validate" name = "" disabled>
								<label for="intRankID">Rank ID</label>
							</div>
						</div>
            		</div>
					
					<div class="row">
						<div class = "col 9">    
							<select  class="browser-default" id = "addArmedService">
								<option disabled selected value = "0">Armed Service</option>
                                @foreach($armedServices as $armedService)
                                    <option id = "{{ $armedService->intArmedServiceID}}" value = "{{ $armedService->intArmedServiceID}}">{{$armedService->strArmedServiceName}}</option>
                                @endforeach
							</select>
						</div>
					</div>
					
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="addRank" type="text" class="validate" name = "" required="" aria-required="true">
								<label for="addRank">Rank</label> 
							</div>
						</div>
            		</div>
						
	<!-- Modal Button Save -->
    		</div>
			<div class="modal-footer" style="background-color:#01579b !important;">
			<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
    			<i class="material-icons right">send</i>
  			</button>
    		</div>
		</div>
<!-- MODAL BA EDIT -->
<div id="modalrankEdit" class="modal modal-fixed-footer" style="overflow:hidden; width: 500px !important; height:400px !important; margin-top:50px;  border-radius:10px;">
	<div class="modal-header"><h4>Rank</h4></div>
        	<div class="modal-content">
				
					
					<div class="row">
						<div class="col s8">
							<div class="input-field">
								<input  id="editID" type="text" class="validate" name = "" readonly required="" aria-required="true" value = " ">
								<label for="editID">Rank ID</label>
							</div>
						</div>
            		</div>
				
					<div class="row">
						<div class = "col 9">    
							<select  class="browser-default" id = "editAS">
								<option disabled selected value = "0">Armed Service</option>
								@foreach($armedServices as $armedService)
                                    <option id = "{{ $armedService->intArmedServiceID}}" value = "{{ $armedService->intArmedServiceID}}">{{$armedService->strArmedServiceName}}</option>
                                @endforeach
							</select>
						</div>
					</div>
				
					<div class="row">
						<div class="col s5">
							<div class="input-field">
								<input id="editname" type="text" class="validate" name = "" required="" aria-required="true" value = " ">
								<label for="editname">Rank</label> 
							</div>
						</div>
            		</div>
						
	<!-- Modal Button Save -->
				
		
    		</div>
		<div class="modal-footer" style="background-color:#01579b !important;">
			
			<button class="btn waves-effect waves-light" name="action1" style="margin-right: 30px;" id = "btnUpdate">Update
    			<i class="material-icons right">send</i>
  			</button>
			
			
			
			
    	</div>
</div>

@stop

@section('script')

<script type="text/javascript">
	$(document).ready(function(){
        var arrAS;
        $.ajax({ 
            type: 'GET', 
            url: '{{ URL::to("/maintenance/armedservice/get") }}', 
            data: { get_param: 'value' },
            dataType: 'json',
            success: function (data) { 
                arrAS = data;   
                
            },
            error: function(data){

            }
        });//ajax      
        
        $("#dataTable").DataTable({
             "columns": [
            {"searchable": false},
			{"searchable": false},
			{"searchable": false},
            null,
            null,
			null
            ] ,  
//		    "pagingType": "full_numbers",
			"pageLength":5,
			"lengthMenu": [5,10,15,20]
		});

        $('#btnAddSave').click(function(){
            if ($('#addRank').val().trim() && $('#addArmedService option:selected').val() != 0){
                $.ajax({

                    type: "POST",
                    url: "{{action('RankController@create')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        asID: $('#addArmedService option:selected').val(),
                        rank: $('#addRank').val()
                    },
                    success: function(data){

                        refreshTable();
                        $('#modalrankAdd').closeModal();
                        swal("Success!", "Record has been Added!", "success");

                    },
                    error: function(data){
                        var toastContent = $('<span>Error Occured. </span>');
                        Materialize.toast(toastContent, 1500,'red', 'edit');
                        console.error();
                    }
                });//ajax

             }else{
                var toastContent = $('<span>Please Check Your Input. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');
            }
        });
        
        $("#btnUpdate").click(function(){
            if ($('#editID').val().trim() && $('#editname').val().trim() && $('#editAS option:selected').val() != 0){
                $.ajax({
                    type: "POST",
                    url: "{{action('RankController@update')}}",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        id: $('#editID').val(),
                        rank: $('#editname').val(),
                        asID: $('#editAS').val()
                    },
                    success: function(data){
                        refreshTable();
                        $('#modalrankEdit').closeModal();
                        swal("Success!", "Record has been Updated!", "success");
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

        });//button update clicked
        
        $('#dataTable').on('click', '.buttonUpdate', function(){
            $('#modalrankEdit').openModal();
            var itemID = "id" + this.id;
            var itemName = "rank" + this.id;
            var itemAS = "asID" + this.id;
            
            document.getElementById('editID').value = $("#"+itemID).html();
            document.getElementById('editname').value = $("#"+itemName).html();
            $('#editAS').val($('#'+itemAS).val());

        });
        
        $('#dataTable').on('click', '.buttonDelete', function(){
            var deleteID = this.id;  

            swal({   title: "Are you sure?",   
                text: "Record will be deleted!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                closeOnConfirm: false 
            }, 
            function(){
                $.ajax({
                    type: "POST",
                    url: "{{action('RankController@delete')}}",
                    beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');
                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data: {
                        id: deleteID
                    },
                    success: function(data) {
                        swal("Deleted!", "Record has been successfully deleted!", "success");
                        refreshTable();
                    },
                    error: function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                        console.log(data);
                    }
                });//ajax
            });
	   });
        
        $('#dataTable').on('click', '.checkboxFlag', function(){
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
                url: "{{action('RankController@flag')}}",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    id: this.id,
                    flag: flag
                },
                success: function(data){
                    var toastContent = $('<span>Status Changed.</span>');
                    Materialize.toast(toastContent, 1500,'green', 'edit');
                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500, 'edit');
                }
            });//ajax
        });
        
        function refreshTable(){
            var dataTable = $('#dataTable').DataTable();
            dataTable.clear().draw(); //clear all the row
            $.ajax({ 
                type: 'GET', 
                url: '{{ URL::to("/maintenance/rank/get") }}', 
                data: { get_param: 'value' },
                dataType: 'json',
                success: function (data) { 
                    
                    $.each(data, function(index, element) {
                        $('#asID' + data[index].intRankID).remove();
                        var flag = data[index].boolFlag;
                        var asName = getAS(data[index].intArmedServiceID);
                        if (flag){
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" checked class = "checkboxFlag" id = "'+data[index].intRankID+'"><span class="lever"></span></label></div>';
                        }else{
                            var checkbox = '<div class="switch" style="margin-right: -80px;"><label><input type="checkbox" class = "checkboxFlag" id = "'+data[index].intRankID+'"><span class="lever"></span></label></div>';
                        }
                        
                        dataTable.row.add([
                            checkbox,
                            '<button class="buttonUpdate btn" id="' +data[index].intRankID+'" ><i class="material-icons">edit</i></button>',
                            '<button class="buttonDelete btn red" id="'+ data[index].intRankID +'"><i class="material-icons">delete</i></button>',
                            '<h id = "id' +data[index].intRankID + '">' + data[index].intRankID +'</h>',
                            '<h id = "as' +data[index].intRankID + '" value = "' + data[index].intArmedServiceID+'">' + asName +'</h>',
                            '<h id = "rank' +data[index].intRankID + '">' + data[index].strRank +'</h>' ]).draw();
                        
                        $('<input>').attr({
                            type: 'hidden',
                            id: 'asID' + data[index].intRankID ,
                            value: data[index].intArmedServiceID
                        }).appendTo('#dataTable');
                    });//foreach

                },
                error: function(data){
                    var toastContent = $('<span>Error Occur. </span>');
                    Materialize.toast(toastContent, 1500,'red', 'edit');
                     console.log(data);
                }
            });//ajax

        }//refresh table
        
        function getAS(asID){
            var asName;
            
            $.each(arrAS, function(index, element) {
                if (asID == arrAS[index].intArmedServiceID){
                    asName = arrAS[index].strArmedServiceName;
                    return false;
                }
            });
            return asName;
        }
        
	});
</script>

@stop