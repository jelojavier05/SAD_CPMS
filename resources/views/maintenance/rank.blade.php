@extends('layout.maintenanceLayout')

@section('title')
Rank
@endsection

@section('content')

<div class="row" style="margin-top:-30px;">


<div class="row"> 
        
    <div class="row">
 
     <div class="col s5 push-s3" style="margin-left:-2%">
    
                   <h3 class="blue-text animated fadeIn" style="font-family:Myriad Pro;margin-top:9.2%">Rank</h3>
                </div>
    
    </div>
   
    </div>
    <div class="col s12 push-s1" style="margin-top:-4%">
        <div class="container white lighten-2 z-depth-2 animated fadeIn">
<!--            <div class="row">-->
               

                <div class="col s3 offset-s9">
                    <button style="margin-top: 30px;" id="btnAdd" class=" z-depth-2 btn-large green modal-trigger" href="#modalrankAdd">
                        <i class="material-icons left">add</i> ADD
                    </button>
                </div>
<!--            </div>-->
        
            <div class="row">
                <div class="col s12" style="margin-top:-20px;">
                    <table class="striped white" style="border-radius:10px;" id="dataTable">

                        <thead>
                            <tr>
                                <th style="width:50px;" class="blue darken-3 white-text"></th>
                                <th style="width:50px;" class="blue darken-3 white-text">Actions</th>
								<th style="width:50px;" class="blue darken-3 white-text"></th>
                                <th class="blue darken-3 white-text">ID</th>
                                <th class="blue darken-3 white-text">Armed Service</th>
                                <th class="blue darken-3 white-text">Rank</th>
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

<!-- Modal rank ADD -->

<div id="modalrankAdd" class="modal modal-fixed-footer" style="overflow:hidden; width: 500px !important; height:350px !important; margin-top:50px;  border-radius:10px;">
        <div class="modal-header">
                <div class="h">
                    <h3><center>Rank</center></h3>  
				</div>

        	</div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="row">
                                               
                                  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
											<select  class="browser-default" id = "addArmedService">
												<option disabled selected value = "0">Armed Service</option>
												@foreach($armedServices as $armedService)
													<option id = "{{ $armedService->intArmedServiceID}}" value = "{{ $armedService->intArmedServiceID}}">{{$armedService->strArmedServiceName}}</option>
												@endforeach
											</select> 

                                        </div>
                                  </div>
                            	
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
									  	<div class="row"></div>
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">star</i>
                            				<input id="addRank" type="text" class="validate" name = "" required="" aria-required="true">
											<label for="addRank">Rank</label> 

                                        </div>
                                  </div>
                        </div>
	
    		 
 
        </div>
			<div class="modal-footer" style="background-color:#00293C; !important;">
			<button class="btn waves-effect waves-light" name="action" style="margin-right: 30px;" id = "btnAddSave">Save
    			<i class="material-icons right">send</i>
  			</button>
    		</div>
		</div>
<!-- MODAL rank EDIT -->
<div id="modalrankEdit" class="modal modal-fixed-footer" style="overflow:hidden; width: 500px !important; height:400px !important; margin-top:50px;  border-radius:10px;">
	<div class="modal-header">
                <div class="h">
                    <h3><center>Rank</center></h3>  
				</div>

        	</div>
        	<div class="modal-content">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="row">
                                               
                                <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
											<input  id="editID" type="text" class="validate" name = "" readonly required="" aria-required="true" value = " ">
											<label for="editID">Rank ID</label> 

                                        </div>
                                  </div>  
						
								<div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>  
                                        <div class="input-field col s12">
											<select  class="browser-default" id = "editAS">
												<option disabled selected value = "0">Armed Service</option>
												@foreach($armedServices as $armedService)
													<option id = "{{ $armedService->intArmedServiceID}}" value = "{{ $armedService->intArmedServiceID}}">{{$armedService->strArmedServiceName}}</option>
												@endforeach
											</select> 

                                        </div>
                                  </div>
                            	
								  <div class="col s10 push-s1" style="margin-top:-30px;">      
                                            
                                        <div class="row"></div>
									  	<div class="row"></div>
                                        <div class="input-field col s12">
											<i class="material-icons prefix" style="font-size:35px;">star</i>
                            				<input id="editname" type="text" class="validate" name = "" required="" aria-required="true" value = " ">
											<label for="editname">Rank</label> 

                                        </div>
                                  </div>
                        </div>
	
    		 
 
        </div>
		<div class="modal-footer" style="background-color:#00293C; !important;">
			
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
						refreshTextfield();

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
		
		function refreshTextfield(){            
            document.getElementById('addRank').value = "";						
        }
        
	});
</script>

@stop